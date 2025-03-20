<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:10'],
            'email' => ['required', 'email'],
            'description' => ['required', 'string']
        ]);

        Mail::to(env('MAIL_CONTACT'))->send(new ContactFormMail($validated));
        return back()->with('success', 'Успешно изпратено!');
    }
}
