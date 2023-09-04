<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContactForm () {
        return view('contact.create');
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send email
        // Mail::to('contact@example.com')->send(new ContactFormMail($request));

        return redirect()->route('contact.create')->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons bientôt.');
    }
}
