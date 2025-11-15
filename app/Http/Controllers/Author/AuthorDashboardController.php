<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Place;
use App\Models\Order;
use App\Models\User;

class AuthorDashboardController extends Controller
{
    public function index()
    {
        $accountLink = 'account';
        $tables = Table::all();
        return view('author.index', compact('tables', 'accountLink'));
    }

    public function change()
    {
        $accountLink = 'change';
        $tables = Table::all();
        return view('author.change', compact('tables', 'accountLink'));
    }

    public function save(Request $request)
    {
        $user = User::query()->findOrFail(auth()->id());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        $user->update($validated);
        return redirect()->route('author.index');
    }

    public function place()
    {
        $orders = Place::query()
            ->where('user_id', '=', auth()->id())
            ->orderBy('created_at', 'desc')
            /*->paginate(3);*/
        ->get();

        $accountLink = "place";
        return view('author.place', compact('accountLink', 'orders'));
    }

    public function order()
    {
        $orders = Order::query()
            ->where('user_id', '=', auth()->id())
            ->orderBy('created_at', 'desc')
            /*->paginate(3);*/
            ->get();

        $accountLink = "order";
        return view('author.order', compact('accountLink', 'orders'));
    }

    public function orderItems($order_id)
    {
        $order = Order::query()->findOrFail($order_id);
        $orderItems = OrderItem::query()->where('order_id', $order_id)->get();
        $accountLink = "order";
        $tables = Table::all();
        return view('author.orderItems', compact('accountLink', 'orderItems', 'order', 'tables'));
    }

}
