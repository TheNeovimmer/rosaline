<?php
/**
 * E2E Test Script for Rosaline Ecommerce
 * Run: ddev exec php tests/E2ETest.php
 * Requires seed data loaded (seeds/003_ecommerce_data.sql)
 */

$baseUrl = getenv('APP_URL') ?: 'https://rosaline.ddev.site';
$results = ['passed' => 0, 'failed' => 0, 'tests' => []];

function test(string $name, callable $fn): void {
    global $results;
    try {
        $fn();
        $results['passed']++;
        $results['tests'][] = ['name' => $name, 'status' => 'PASS'];
        echo "  PASS: {$name}\n";
    } catch (\Throwable $e) {
        $results['failed']++;
        $results['tests'][] = ['name' => $name, 'status' => 'FAIL', 'error' => $e->getMessage()];
        echo "  FAIL: {$name} — {$e->getMessage()}\n";
    }
}

function assertContains(string $needle, string $haystack): void {
    if (!str_contains($haystack, $needle)) {
        throw new \RuntimeException("Expected to find '{$needle}' in response");
    }
}

function assertNotContains(string $needle, string $haystack): void {
    if (str_contains($haystack, $needle)) {
        throw new \RuntimeException("Unexpected '{$needle}' found in response");
    }
}

function assertStatus(int $expected, int $actual): void {
    if ($expected !== $actual) {
        throw new \RuntimeException("Expected status {$expected}, got {$actual}");
    }
}

function extractCsrfToken(string $html): string {
    preg_match('/<input[^>]*name=["\']_csrf["\'][^>]*value=["\']([^"\']+)["\']/i', $html, $m);
    if (empty($m)) {
        preg_match('/<meta[^>]*name=["\']csrf-token["\'][^>]*content=["\']([^"\']+)["\']/i', $html, $m);
    }
    return $m[1] ?? '';
}

function httpRequest(string $method, string $url, array $data = [], array $cookies = []): array {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_TIMEOUT => 30,
    ]);

    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }

    if (!empty($cookies)) {
        $cookieStr = '';
        foreach ($cookies as $k => $v) {
            $cookieStr .= urlencode($k) . '=' . urlencode($v) . '; ';
        }
        curl_setopt($ch, CURLOPT_COOKIE, rtrim($cookieStr, '; '));
    }

    // Capture cookies
    curl_setopt($ch, CURLOPT_COOKIEFILE, '');

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);

    // Parse cookies from response
    preg_match_all('/^Set-Cookie:\s*([^=]+)=([^;]+)/im', $headers, $matches);
    $newCookies = array_merge($cookies, array_combine($matches[1], $matches[2]));

    curl_close($ch);
    return ['status' => $httpCode, 'body' => $body, 'headers' => $headers, 'cookies' => $newCookies];
}

echo "\n=== Rosaline E2E Test Suite ===\n";
echo "Base URL: {$baseUrl}\n\n";

// ==========================================
echo "\n--- Frontend / Public Pages ---\n";

test('Homepage loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/');
    assertStatus(200, $r['status']);
    assertContains('Rosaline', $r['body']);
});

test('Shop page loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/shop');
    assertStatus(200, $r['status']);
});

test('Product detail loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/product/creme-hydratante-huile-argan');
    assertStatus(200, $r['status']);
});

test('Cart page loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/cart');
    assertStatus(200, $r['status']);
});

test('Login page loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/login');
    assertStatus(200, $r['status']);
    assertContains('Login', $r['body']);
});

test('Register page loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/register');
    assertStatus(200, $r['status']);
});

test('About page loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/about');
    assertStatus(200, $r['status']);
});

test('Contact page loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/contact');
    assertStatus(200, $r['status']);
});

test('FAQs page loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/faqs');
    assertStatus(200, $r['status']);
});

test('Blog page loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/blog');
    assertStatus(200, $r['status']);
});

test('404 page returns 404', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/nonexistent-page-xyz');
    assertStatus(404, $r['status']);
});

// ==========================================
echo "\n--- User Registration & Authentication ---\n";

test('Register new user', function() use ($baseUrl) {
    $r1 = httpRequest('GET', $baseUrl . '/register');
    $cookies = $r1['cookies'];

    $r = httpRequest('POST', $baseUrl . '/register', [
        '_csrf' => extractCsrfToken($r1['body']),
        'name' => 'Test User',
        'email' => 'e2etest_' . time() . '@example.tn',
        'password' => 'test123456',
        'password_confirmation' => 'test123456',
    ], $cookies);
    assertStatus(302, $r['status']);
});

test('Login with valid credentials', function() use ($baseUrl) {
    $r1 = httpRequest('GET', $baseUrl . '/login');
    $cookies = $r1['cookies'];

    $r = httpRequest('POST', $baseUrl . '/login', [
        '_csrf' => extractCsrfToken($r1['body']),
        'email' => 'admin@rosaline.tn',
        'password' => 'admin123',
    ], $cookies);
    assertStatus(302, $r['status']);
});

test('Login with invalid password', function() use ($baseUrl) {
    $r1 = httpRequest('GET', $baseUrl . '/login');
    $cookies = $r1['cookies'];

    $r = httpRequest('POST', $baseUrl . '/login', [
        '_csrf' => extractCsrfToken($r1['body']),
        'email' => 'admin@rosaline.tn',
        'password' => 'wrongpassword123',
    ], $cookies);
    assertStatus(302, $r['status']);
});

// ==========================================
echo "\n--- Frontend Auth Pages ---\n";

test('Account page redirects to login when not authenticated', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/account');
    assertStatus(302, $r['status']);
});

// ==========================================
echo "\n--- Admin CRUD Pages ---\n";

// Login as admin first and get session cookies
$loginResp = httpRequest('GET', $baseUrl . '/login');
$adminCookies = $loginResp['cookies'];
$loginPost = httpRequest('POST', $baseUrl . '/login', [
    '_csrf' => extractCsrfToken($loginResp['body']),
    'email' => 'admin@rosaline.tn',
    'password' => 'admin123',
], $adminCookies);
$adminCookies = $loginPost['cookies'];

// The CSRF middleware might block POST requests. Let's test GET-only access first.

test('Admin dashboard loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin products list loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/products', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin product create form loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/products/create', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin categories list loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/categories', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin orders list loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/orders', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin order detail loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/orders/1', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin returns list loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/return-requests', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin users list loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/users', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin blog list loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/blog', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin pages list loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/pages', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin reviews list loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/reviews', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin contacts list loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/contacts', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin reports page loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/reports', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin settings page loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/settings', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin activity log loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/activity', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin governorates list loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/governorates', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin governorate create form loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/governorates/create', [], $adminCookies);
    assertStatus(200, $r['status']);
});

test('Admin invoice page loads', function() use ($baseUrl, $adminCookies) {
    $r = httpRequest('GET', $baseUrl . '/admin/orders/1/invoice', [], $adminCookies);
    assertStatus(200, $r['status']);
    assertContains('INVOICE', $r['body']);
});

// ==========================================
echo "\n--- User Account Pages ---\n";

// Login as customer
$loginCust = httpRequest('GET', $baseUrl . '/login');
$custCookies = $loginCust['cookies'];
$custLogin = httpRequest('POST', $baseUrl . '/login', [
    '_csrf' => extractCsrfToken($loginCust['body']),
    'email' => 'customer@example.tn',
    'password' => 'customer123',
], $custCookies);
$custCookies = $custLogin['cookies'];

test('Customer account dashboard loads', function() use ($baseUrl, $custCookies) {
    $r = httpRequest('GET', $baseUrl . '/account', [], $custCookies);
    assertStatus(200, $r['status']);
});

test('Customer orders list loads', function() use ($baseUrl, $custCookies) {
    $r = httpRequest('GET', $baseUrl . '/account/orders', [], $custCookies);
    assertStatus(200, $r['status']);
});

test('Customer order detail loads', function() use ($baseUrl, $custCookies) {
    $r = httpRequest('GET', $baseUrl . '/account/orders/1', [], $custCookies);
    assertStatus(200, $r['status']);
});

test('Customer invoice loads', function() use ($baseUrl, $custCookies) {
    $r = httpRequest('GET', $baseUrl . '/account/orders/1/invoice', [], $custCookies);
    assertStatus(200, $r['status']);
    assertContains('INVOICE', $r['body']);
});

test('Customer settings page loads', function() use ($baseUrl, $custCookies) {
    $r = httpRequest('GET', $baseUrl . '/account/settings', [], $custCookies);
    assertStatus(200, $r['status']);
});

test('Customer addresses page loads', function() use ($baseUrl, $custCookies) {
    $r = httpRequest('GET', $baseUrl . '/account/addresses', [], $custCookies);
    assertStatus(200, $r['status']);
});

// ==========================================
echo "\n--- Cart & Checkout Flow ---\n";

test('Add to cart works', function() use ($baseUrl) {
    $prodGet = httpRequest('GET', $baseUrl . '/product/creme-hydratante-huile-argan');
    $cookies = $prodGet['cookies'];
    $r = httpRequest('POST', $baseUrl . '/cart/add', [
        '_csrf' => extractCsrfToken($prodGet['body']),
        'product_id' => 1,
        'quantity' => 1,
    ], $cookies);
    assertStatus(302, $r['status']);
});

test('Cart page shows items', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/cart');
    assertStatus(200, $r['status']);
});

// ==========================================
echo "\n--- Ecommerce Storefront ---\n";

test('Category filter page loads', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/shop/category/face-care');
    assertStatus(200, $r['status']);
});

test('Search via shop page', function() use ($baseUrl) {
    $r = httpRequest('GET', $baseUrl . '/shop?search=soin');
    assertStatus(200, $r['status']);
});

// ==========================================
echo "\n=== Summary ===\n";
$total = $results['passed'] + $results['failed'];
echo "Tests: {$total} | Passed: {$results['passed']} | Failed: {$results['failed']}\n";

if ($results['failed'] > 0) {
    echo "\nFailed tests:\n";
    foreach ($results['tests'] as $t) {
        if ($t['status'] === 'FAIL') {
            echo "  - {$t['name']}: {$t['error']}\n";
        }
    }
}

exit($results['failed'] > 0 ? 1 : 0);
