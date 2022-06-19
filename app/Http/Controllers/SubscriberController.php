<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribeHandler () {
        
        if (User::find(auth()->id())->isSubscribe()) {
            $subscription = auth()->user()->subscribers->first();
            $subscription->delete();
            return back()->with('info', 'Canceled subscription!');
        } else {
            auth()->user()->subscribers()->create();
            return back()->with('info', 'We will sent email new products messages.');
        }
    }
}
