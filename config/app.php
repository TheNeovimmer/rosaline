<?php
return [
    'name'   => getenv('APP_NAME') ?: 'Rosaline',
    'url'    => getenv('APP_URL') ?: 'https://rosaline.ddev.site',
    'env'    => getenv('APP_ENV') ?: 'development',
    'debug'  => filter_var(getenv('APP_DEBUG') ?: true, FILTER_VALIDATE_BOOLEAN),
    'upload_max_size' => 10 * 1024 * 1024,
    'allowed_extensions' => ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'],
];
