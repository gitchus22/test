<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use App\Services\NotificationService;
use App\Providers\SmtpServiceProvider;
use Illuminate\Support\Collection;

class SendNotificationController extends Controller
{
    public function sendNotification($id)
    {
        $user = User::findOrFail($id);

        $data = (new NotificationService(new SmtpServiceProvider()))->notify($user);

        return Response::json($data, 200, [
                'Content-Type' => 'application/json',
                'Charset' => 'utf-8'
        ], JSON_PRETTY_PRINT);
    }
}
