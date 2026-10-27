<?php

use App\Mail\EnquiryNotification;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    Mail::fake();
});

test('the scroll popup validates and emails its travel enquiry', function () {
    $this->postJson(route('enquiries.store'), [
        'type' => 'scroll',
        'name' => 'Amina Rahman',
        'email' => 'amina@example.com',
        'phone' => '+8801712345678',
        'travel_enquiry' => 'I would like to visit Thailand.',
    ])->assertOk();

    Mail::assertSent(EnquiryNotification::class, fn (EnquiryNotification $mail) =>
        $mail->hasTo('info@bideshjatraglobal.com')
        && $mail->subjectLine === 'New travel enquiry'
        && str_contains($mail->messageBody, 'I would like to visit Thailand.')
    );
});

test('the contact modal emails required contact details and accepts its optional fields', function () {
    $this->postJson(route('enquiries.store'), [
        'type' => 'contact',
        'name' => 'Amina Rahman',
        'email' => 'amina@example.com',
        'phone' => '+8801712345678',
        'return_date' => '2027-01-10',
    ])->assertOk();

    Mail::assertSent(EnquiryNotification::class, fn (EnquiryNotification $mail) =>
        $mail->hasTo('info@bideshjatraglobal.com')
        && $mail->subjectLine === 'New contact request'
        && str_contains($mail->messageBody, 'Expected departure date:')
        && str_contains($mail->messageBody, "Expected return date:\n2027-01-10")
    );
});

test('the newsletter accepts an email without contact fields and emails the signup', function () {
    $this->postJson(route('enquiries.store'), [
        'type' => 'newsletter',
        'email' => 'reader@example.com',
    ])->assertOk();

    Mail::assertSent(EnquiryNotification::class, fn (EnquiryNotification $mail) =>
        $mail->hasTo('info@bideshjatraglobal.com')
        && $mail->subjectLine === 'Newsletter subscription'
        && str_contains($mail->messageBody, 'reader@example.com')
    );
});

test('required form fields are validated for both enquiry forms', function () {
    $this->postJson(route('enquiries.store'), [
        'type' => 'scroll',
        'email' => 'reader@example.com',
    ])->assertUnprocessable()
        ->assertJsonValidationErrors(['name', 'phone', 'travel_enquiry']);

    $this->postJson(route('enquiries.store'), [
        'type' => 'contact',
        'email' => 'reader@example.com',
    ])->assertUnprocessable()
        ->assertJsonValidationErrors(['name', 'phone']);

    Mail::assertNothingSent();
});
