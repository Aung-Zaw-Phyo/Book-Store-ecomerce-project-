<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart () {
        return view('books.cart', [
            'carts'=>auth()->user()->carts
        ]);
    }

    public function checkout () {
        return view('books.checkout', [
            'carts'=>auth()->user()->carts
        ]);
    }

    public function store () {
        $formData = request()->validate([
            'totalPrice' => ['required'],
            'books' => ['required'],
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required','email', 'min:3', 'max:255'],
            'number' => ['required',],
            'address' => ['required', 'min:3'],
            'city' => ['required'],
            'payment' => ['required'],
        ],[
            'books.required' => 'You need to shop before order!',
            'totalPrice.required' => 'You need to shop before order!',
        ]);
        $formData['user_id']=auth()->id();

        Order::create($formData);

        $carts = auth()->user()->carts;
        foreach ($carts as $cart) {
            $cart->delete();
        }

        return redirect('/order')->with('info', 'ordered successfully!');
    }

    public function create ($id) {
        $cart = new Cart;
        $cart->book_id=$id;
        $cart->user_id=auth()->id();
        $cart->total=request()->total;
        $cart->save();
        return redirect()->back()->with('info', 'Added cart successfully!');
    }

    public function delete ($id) {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('info', 'Deleted cart!');
    }

    public function deleteAll () {
        $carts = auth()->user()->carts;
        foreach ($carts as $cart) {
            $cart->delete();
        }
        return redirect()->back()->with('info', 'Deleted all carts!');
    }
}
