<?php 

namespace App\Interfaces;

interface MailerInterface
{
    public function send($email, $message);
}
