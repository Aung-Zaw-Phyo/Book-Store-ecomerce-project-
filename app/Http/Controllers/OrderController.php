<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order () {
        $orders = auth()->user()->orders->whereIn('action', 'pending');
        return view('books.order', [
            'orders'=>$orders
        ]);
    }
}
