<?php

namespace App\Http\Controllers;

use App\Mail\EnquiryNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class EnquiryController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'type' => ['required', Rule::in(['scroll', 'contact', 'newsletter'])],
            'name' => ['required_unless:type,newsletter', 'nullable', 'string', 'max:120'],
            'email' => ['required', 'email:rfc', 'max:254'],
            'phone' => ['required_unless:type,newsletter', 'nullable', 'string', 'max:40'],
            'travel_enquiry' => ['required_if:type,scroll', 'nullable', 'string', 'max:5000'],
            'departure_date' => ['nullable', 'date'],
            'return_date' => ['nullable', 'date'],
            'destinations' => ['nullable', 'string', 'max:500'],
            'enquiry' => ['nullable', 'string', 'max:5000'],
        ]);

        if ($validated['type'] === 'newsletter') {
            $subject = 'Newsletter subscription';
            $details = ['Email' => $validated['email']];
        } else {
            $details = [
                'Name' => $validated['name'],
                'Email' => $validated['email'],
                'Phone' => $validated['phone'],
            ];
        }

        if ($validated['type'] === 'scroll') {
            $subject = 'New travel enquiry';
            $details['Travel enquiry'] = $validated['travel_enquiry'];
        } elseif ($validated['type'] === 'contact') {
            $subject = 'New contact request';
            $details['Expected departure date'] = $validated['departure_date'] ?? 'Not provided';
            $details['Expected return date'] = $validated['return_date'] ?? 'Not provided';
            $details['Destinations'] = $validated['destinations'] ?? 'Not provided';
            $details['Enquiry'] = $validated['enquiry'] ?? 'Not provided';
        }

        $body = collect($details)
            ->map(fn (string $value, string $label) => "{$label}:\n{$value}")
            ->implode("\n\n");

        $mail = new EnquiryNotification(
            subjectLine: $subject,
            messageBody: $body,
            replyToEmail: $validated['type'] === 'newsletter' ? null : $validated['email'],
            replyToName: $validated['type'] === 'newsletter' ? null : $validated['name'],
        );

        Mail::to('info@bideshjatraglobal.com')->send($mail);

        return response()->json(['message' => 'Thanks! Your enquiry has been sent.']);
    }
}
