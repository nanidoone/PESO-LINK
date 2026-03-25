<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact');
    }

    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['required', 'string', 'max:180'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $lines = [
            'Name: '.$validated['name'],
            'Email: '.$validated['email'],
            'Phone: '.($validated['phone'] ?? '—'),
            '',
            $validated['message'],
        ];
        $body = implode("\n", $lines);

        $recipient = env('CONTACT_EMAIL', 'peso@manolofortich.gov.ph');

        Mail::raw($body, function ($message) use ($validated, $recipient) {
            $message->to($recipient)
                ->replyTo($validated['email'], $validated['name'])
                ->subject('[PESO Portal] '.$validated['subject']);
        });

        return redirect()->route('contact')->with('status', 'Thank you for your message. We will get back to you as soon as possible.');
    }
}
