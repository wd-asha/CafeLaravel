<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Cart;

class WishlistController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        $dishes = Dish::all();
        $order_yes = "";
        return view('wishlist', compact('dishes', 'cartItems', 'order_yes'));
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        $order_yes = "";
        if(Cart::count() === 0) {
            return view('welcome', compact('order_yes'));
        }else{
            return Redirect()->back();
        }
    }
}
