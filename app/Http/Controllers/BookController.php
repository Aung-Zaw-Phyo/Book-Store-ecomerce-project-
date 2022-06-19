<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function home () { 
        return view('books.home', [
            'books' => Book::latest()->take(3)->get()
        ]);
    }

    public function index () {

        return view('books.shop', [
            'books' => Book::latest()->filter(request(['search', 'category']))->paginate(6),
        ]);
    }

    public function about () {
        return view('books.about', [
            'reviews' => Review::latest()->paginate(3)
        ]);
    }

    public function contact () {
        return view('books.contact');
    }

    
}
