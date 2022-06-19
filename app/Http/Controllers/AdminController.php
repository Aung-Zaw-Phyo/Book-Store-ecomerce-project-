<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Book;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use App\Models\Review;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class AdminController extends Controller
{
    public function __construct () {
        $this->middleware('admin');
    }

    public function index () {
        return view('admin.index',[
            'books' => Book::latest()->paginate(8),
            'count' => Book::all()->count()
        ]);
    }

    public function cart_edit (Book $book) {
        return view('admin.book_edit', [
            'categories'=>Category::all(),
            'book' => $book,
        ]);
    }

    public function cart_update (Book $book) {
        $formData = request()->validate([
            "name" => ['required'],
            "author" => ['required'],
            "price" => ['required'],
            "category_id" => ['required', Rule::exists('categories', 'id')],
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail') ? 
                                    request()->file('thumbnail')->store('thumbnails') : $book->thumbnail;
        $book->update($formData);
        return redirect('/admin/products')->with('info', 'Book updated successfully!');
            
    }
    
    public function cart_destroy ($id) {
        $book = Book::find($id);
        $book->delete();
        return back()->with('info', 'Deleted product successfully!');
    }

    public function book_create () {
        return view('admin.book_create', [
            'categories'=>Category::all()
        ]);
    }

    public function product_store () {

        $formData = request()->validate([
            "name" => ['required'],
            "author" => ['required'],
            "price" => ['required'],
            'thumbnail' => ['required'],
            "category_id" => ['required', Rule::exists('categories', 'id')],
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Book::create($formData);

        // email system 
        $subscribers = Subscriber::all();
        $subscribers->each(function ($subscriber) use ($formData) {
            Mail::to($subscriber->user->email)->queue(new SubscriberMail($formData));
        });

        return redirect('/admin/products')->with('info', 'Created book successfully!');
    }

    public function categories () {
        return view('admin.categories', [
            'categories'=>Category::paginate(20)
        ]);
    }

    public function category_edit (Category $category) {
        return view('admin.category_edit', [
            'category' => $category,
        ]);
    }

    public function category_update (Category $category) {
        $formData = request()->validate([
            'name' => ['required', 'min:3', Rule::unique('categories', 'name')],
        ]);
        $category->update($formData);
        return redirect('/admin/categories')->with('info', 'Category updated successfully!');
    }
    
    public function category_destroy ($id) {
        $category = Category::find($id);
        $category->delete();
        return back()->with('info', 'Deleted category!');
    }
    
    public function category_create () {
        return view('admin.category_create');
    }

    public function category_store () {
        $formData = request()->validate([
            'name' => ['required', 'min:3', Rule::unique('categories', 'name')],
        ]);
        Category::create($formData);
        return redirect('/admin/categories')->with('info', 'Created category successfully!');
    }


    public function pending_order () {
        return view('/admin.pending_order', [
            'pendingOrders'=>Order::where('action', 'pending')->paginate(6)
        ]);
    }

    public function order_update ($id) {
        $order = Order::find($id);
        $action = request('action');
        $order->action=$action;
        $order->save();
        return back()->with('info', "Order $action");
    }

    public function pending_order_destroy ($id) {
        $order = Order::find($id);
        $order->delete();
        return back()->with('info', 'Deleted pending order!');
    }

    public function completed_order () {
        return view('/admin.completed_order', [
            'completedOrders'=>Order::where('action', 'completed')->latest()->paginate(6)
            // 'completedOrders'=>Order::latest()->paginate(3)->whereIn('action', 'completed')
        ]);
    }

    public function completed_order_destroy ($id) {
        $order = Order::find($id);
        $order->delete();
        return back()->with('info', 'Deleted completed order!');
    }

    public function income () {
        return view('admin.income', [
            "pending"=>Order::all()->whereIn('action', 'pending'),
            "completed"=>Order::all()->whereIn('action', 'completed'),
        ]);
    }

    public function users () {
        return view('admin.users', [
            'users' => User::paginate(10)
        ]);
    }

    public function user_destroy ($id) {
        $user = User::find($id);
        $user->delete();
        return back()->with('info', 'Deleted user!');
    }

    public function subscribers () {
        return view('admin.subscribers', [
            'subscribers'=>Subscriber::paginate(10)
        ]);  
    }


    public function messages () {
        return view('admin.messages', [
            'messages'=>Message::latest()->paginate(6)
        ]);
    }

    public function message_destroy ($id) {
        $message = Message::find($id);
        $message->delete();
        return redirect('/admin/messages')->with('info', 'Deleted message!');
    }

    public function reviews () {
        return view('admin.reviews', [
            'reviews'=>Review::latest()->paginate(6)
        ]);
    }

    public function review_destroy ($id) {
        $review = Review::find($id);
        $review->delete();
        return redirect('/admin/reviews')->with('info', 'Deleted review!');
    }

    // real admin 

    public function real_admin () {
        if (request('username')) {
            $users = User::where('username', "LIKE", "%".request('username')."%")->where('is_admin', false)->get();
        }
        return view('admin.real_admin', [
            'users' => User::all(),
            'admins' => User::all()->where('is_admin', true),
            'clients' => User::all()->where('is_admin', false),
            'searchUsers' => $users??false
        ]);
    }

    public function posts ($id) {
        return view('admin.posts', [
            'user'=>User::find($id)
        ]);
    }

    public function permit ($id) {
        $admin = User::find($id);
        if ($admin->is_admin) {
            $admin->is_admin=false;
            $admin->save();
            return back()->with('info', 'This user is not allowed to be admin!');
        } else {
            $admin->is_admin=true;
            $admin->save();
            return back()->with('info', 'This user is allowed to be admin!');
        }
        
    }

    public function admin_destroy ($id) {
        $admin = User::find($id);
        $admin->delete();
        return back()->with('info', 'Deleted a normal admin successfully!');
    }
    
    
    

}   
