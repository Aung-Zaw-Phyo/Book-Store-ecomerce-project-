<?php

namespace App\View\Components;

use App\Models\Cart;
use Illuminate\View\Component;

class cartCount extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $count = 0;
        if ( auth()->user() ) {
            $count = auth()->user()->carts->count();
        }
        return view('components.cart-count', [
            'count'=> $count
        ]);
    }
}
