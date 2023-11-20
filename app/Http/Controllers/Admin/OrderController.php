<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* -------------------- */
    /*    Show all orders   */
    /* -------------------- */
    public function index()
    {
        $orders = Order::latest()->where('order_status', 0)->orderBy('id', 'desc')->paginate(5);
        /* to the orders list page */
        return view('admin.order.index', compact('orders'));
    }
    /* end show all orders */

    /* --------------- */
    /*    Show order   */
    /* --------------- */
    public function show($id)
    {
        $order = Order::find($id);
        $orderItems = OrderItem::all()->where('order_id', $id);
        /* to page with list departures this order */
        return view('admin.order.orderitems', compact('order', 'orderItems'));
    }
    /* end show order */

    /* ------------------------ */
    /* Set pending Status Order */
    /* ------------------------ */
    public function pending($id)
    {
        Order::find($id)->update([
            'order_status' => 0
        ]);
        $notification = array(
            'message' => 'Статус заказа изменен',
            'alert-type' => 'success'
        );
        /* to the orders list page */
        return Redirect()->back()->with($notification);
    }
    /* ------------------------------ */
    /* end show pending status orders */
    /* ------------------------------ */

    /* ------------------------ */
    /* Set process Status Order */
    /* ------------------------ */
    public function process($id)
    {
        Order::find($id)->update([
            'order_status' => 1
        ]);
        /* to page with list orders */
        $notification = array(
            'message' => 'Статус заказа изменен',
            'alert-type' => 'success'
        );
        /* to the orders list page */
        return Redirect()->back()->with($notification);
    }
    /* ----------------------------- */
    /* end set process status orders */
    /* ----------------------------- */

    /* -------------------------- */
    /* Show process Status Orders */
    /* -------------------------- */
    public function ordersProcess()
    {
        $orders = Order::latest()->where('order_status', 1)->orderBy('id', 'desc')->paginate(5);
        return view('admin.order.ordersProcess', compact('orders'));
    }
    /* ------------------------------ */
    /* end show process status orders */
    /* ------------------------------ */

    /* -------------------------- */
    /* Set delivered Status Order */
    /* -------------------------- */
    public function delivered($id)
    {
        Order::find($id)->update([
            'order_status' => 2
        ]);
        /* to page with list orders */
        $notification = array(
            'message' => 'Статус заказа изменен',
            'alert-type' => 'success'
        );
        /* to the orders list page */
        return Redirect()->back()->with($notification);
    }
    /* ------------------------------ */
    /* end set canceled status orders */
    /* ------------------------------ */

    /* ---------------------------- */
    /* Show delivered Status Orders */
    /* ---------------------------- */
    public function ordersDelivered()
    {
        $orders = Order::latest()->where('order_status', 2)->orderBy('id', 'desc')->paginate(5);
        return view('admin.order.ordersDelivered', compact('orders'));
    }
    /* -------------------------------- */
    /* end show delivered Status Orders */
    /* -------------------------------- */

    /* ------------------------- */
    /* Set canceled Status Order */
    /* ------------------------- */
    public function canceled($id)
    {
        Order::find($id)->update([
            'order_status' => 3
        ]);
        /* to page with list orders */
        $notification = array(
            'message' => 'Статус заказа изменен',
            'alert-type' => 'success'
        );
        /* to the orders list page */
        return Redirect()->back()->with($notification);
    }
    /* ------------------------------ */
    /* end set canceled status orders */
    /* ------------------------------ */

    /* --------------------------- */
    /* Show canceled Status Orders */
    /* --------------------------- */
    public function ordersCanceled()
    {
        $orders = Order::latest()->where('order_status', 3)->orderBy('id', 'desc')->paginate(5);
        return view('admin.order.ordersCanceled', compact('orders'));
    }
    /* ------------------------------- */
    /* end show canceled status orders */
    /* ------------------------------- */

    /* ---------------- */
    /*   Delete Order   */
    /* ---------------- */
    public function orderDelete($id)
    {
        /* select all products from the order */
        $orderItems = OrderItem::latest()->where('order_id', $id);
        /* remove all products from the order */
        $orderItems->each(function ($item, $key) {
            OrderItem::find($item->id)->forceDelete();
        });
        /* delete order */
        $order = Order::find($id)->forceDelete();
        /* to page with list orders */
        $notification = array(
            'message' => 'Заказ удален',
            'alert-type' => 'success'
        );
        /* to the orders list page */
        return Redirect()->back()->with($notification);
    }
    /* end delete order */
}
