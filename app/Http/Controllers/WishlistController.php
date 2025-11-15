<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use Cart;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            // для авторизованного пользователя
            $user_id = Auth::id();
            $userName = auth()->user()->name;
            $address = auth()->user()->address;
            $email = auth()->user()->email;
            $phone = auth()->user()->phone;

        }else{
            $user_id = 0;
            // для гостя
        }

        $cartItems = Cart::content();
        $dishes = Dish::all();
        $order_yes = "";
        return view('wishlist', compact('dishes', 'cartItems', 'order_yes', 'address', 'email', 'phone', 'userName'));
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
