<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

class PageController extends Controller
{
    public function about(): void
    {
        $this->view('front/about');
    }

    public function contact(): void
    {
        $this->view('front/contact');
    }

    public function sendContact(): void
    {
        $errors = $this->validate($_POST, [
            'name'    => 'required|min:2|max:255',
            'email'   => 'required|email',
            'subject' => 'required|min:3|max:255',
            'message' => 'required|min:10|max:5000',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        Contact::create([
            'name'    => $_POST['name'],
            'email'   => $_POST['email'],
            'subject' => $_POST['subject'],
            'message' => $_POST['message'],
        ]);

        $this->withSuccess('Message sent successfully! We will get back to you soon.');
        $this->redirectBack();
    }

    public function faqs(): void
    {
        $this->view('front/faq');
    }

    public function privacyPolicy(): void
    {
        $this->view('front/privacy-policy');
    }

    public function termsOfService(): void
    {
        $this->view('front/term-of-service');
    }

    public function notFound(): void
    {
        http_response_code(404);
        $this->view('front/404', [], 'front');
    }
}
