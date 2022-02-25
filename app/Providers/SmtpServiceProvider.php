<?php

namespace App\Providers;

use App\Interfaces\MailerInterface;
use Illuminate\Support\Facades\Mail;

class SmtpServiceProvider implements MailerInterface
{
    public function send($email, $message)
    {
        $to_name = $message;
        $to_email = $email;
        $data = array('name'=>$to_name, 'body' => 'Test mail');

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Laravel Test Mail');
            $message->from(env('MAIL_USERNAME'), 'Test Mail');
        });

        return (count(Mail::failures()) > 0 ? false : true);
    }
}
