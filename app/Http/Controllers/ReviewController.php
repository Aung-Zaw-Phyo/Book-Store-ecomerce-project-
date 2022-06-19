<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create () {
        $formData = request()->validate([
            'body' => ['required', 'min:5']
        ]);
        $formData['user_id'] = auth()->id();
        
        Review::create($formData);

        return redirect('/about')->with('info', 'Your review is on our page!');
    }

    public function destroy ($id) {
        $post = Review::findOrfail($id);
        $post->delete();
        return redirect()->back()->with('info', 'Deleted your review successfully!');
    }

    public function view_list ($id) {
        
        return view('books.view_list', [
            'orders' => User::find($id)->orders->whereIn('action', 'completed')
        ]);
    }
}
