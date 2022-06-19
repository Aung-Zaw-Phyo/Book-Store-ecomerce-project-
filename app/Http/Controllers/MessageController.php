<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    protected $guarded = ['id'];

    public function create () {
        $formData = request()->validate([
            'name'=>['required', 'min:3', 'max:255'],
            'email'=>['required', 'email'],
            'number'=>['required', 'min:5', 'max:255'],
            'message'=>['required', 'min:3'],
        ]);

        Message::create($formData);

        return redirect()->back()->with('info', 'Sent message successfully!');
    }
}
