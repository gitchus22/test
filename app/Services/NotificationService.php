<?php

namespace App\Services;

use App\Models\User;

class NotificationService
{
    protected $provider;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function notify($user)
    {
        $isSend = $this->provider->send($user->email, $user->name);

        $data = [
            'id' => $user->id,
            'email' => $user->email,
            'message' => $user->name,
            'result' => $isSend
        ];

        return $data;
    }
}