<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Public Contact form handler (used by the Contact page and the footer form).
 *
 * Flow: validate → archive to contact_messages (audit copy) → send a Mailable
 * to the admin-configured receiving address. Mail failures never block the
 * submission — the message is always stored.
 */
class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:150'],
            'phone'   => ['nullable', 'string', 'max:60'],
            'subject' => ['nullable', 'string', 'max:180'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $data['ip_address'] = $request->ip();

        $contact = ContactMessage::query()->create($data);

        // The admin decides the destination in Admin ▸ Site Settings.
        $receiver = setting('identity.contact_receiver_email')
            ?: setting('identity.contact_email')
            ?: config('mail.from.address');

        try {
            if ($receiver) {
                Mail::to($receiver)->send(new ContactMessageMail($contact));
            }
        } catch (\Throwable $e) {
            // Never break the UX because the mail server is unreachable.
            report($e);
        }

        $message = 'Thank you! Your message has been sent — we will get back to you soon.';

        if ($request->expectsJson()) {
            return response()->json(['message' => $message], 201);
        }

        return back()->with('message', $message);
    }
}
