<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function send()
    {
        Mail::send('Email.send', [
                'title'=> 'hello martins',
                'content' => 'we are glad to see you in our newsletter'
        ],function ($message){
           $message->from('musictracker@mt.com','MusicTracker');
           $message->to('mlaganovskis@gmail.com');
        });

        return response()->json(['message' => 'Request completed']);
    }
}
