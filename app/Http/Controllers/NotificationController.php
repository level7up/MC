<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Notification;

use App\Notifications\MyFirstNotification;

class NotificationController extends Controller
{
    
    
    public function sendNotification($id)

    {

        $user = User::find($id = 1);



        $details = [
            'To' => $user->email,

            'greeting' => 'Hello '.$user->name.'',

            'body' => 'This is CoderSea Mail',

            'thanks' => 'Thank you...',

            'actionText' => 'View My Site',

            'actionURL' => url('/'),

        ];



        Notification::send($user, new MyFirstNotification($details));
        return $msg = 'Notification Sent';

    }


    
    
}
