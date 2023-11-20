<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderItem;
use Cart;

class CartController extends Controller
{
    /* -------------------------------------- */
    /*        Add dish to shopping cart       */
    /* -------------------------------------- */
    public function addCart(Request $request, $id)
    {
        $dish = Dish::find($id);

        Cart::add(
            [
                'id' => $dish->id,
                'name' => $dish->title,
                'qty' => 1,
                'price' => $dish->price,
                'weight' => $dish->weight,
                'options' => [
                    'image' => $dish->image,
                    'compound' => $dish->compound,
                ]
            ]
        );

        $notification = array(
            'message' => 'Блюдо добавлено в заказ',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -------- end add dish to shopping cart -------- */

    /* --------------------------------------------- */
    /*       Remove an item from shopping cart       */
    /* --------------------------------------------- */
    public function delete($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Блюдо удалено из заказа',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* --- end remove an item from shopping cart --- */

    /* ------------------------------------------ */
    /*       Destroy all from shopping cart       */
    /* ------------------------------------------ */
    public function destroy()
    {
        Cart::destroy();
        $notification = array(
            'message' => 'Блюда удалены из заказа',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* --- end destroy all from shopping cart --- */

    /* --------------------------------- */
    /*          Order formation          */
    /* --------------------------------- */
    public function check(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'delivery' => 'required',
        ],
            [
                'name.required' => 'Укажите имя',
                'phone.required' => 'Укажите телефон',
                'date.required' => 'Укажите дату доставки',
                'time.required' => 'Укажите время доставки',
                'delivery.required' => 'Укажите адрес доставки',
            ]);

        $content = Cart::content();
        /* Prepare data for the order */
        $data = array();
        $data['user_name'] = $request->name;
        $data['order_delivery'] = $request->delivery;
        $data['order_phone'] = $request->phone;
        $data['order_total'] = strval(Cart::priceTotal());
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        $order_id = Order::insertGetId($data);
        /* Prepare data for a shopping list */
        $details = array();
        foreach ($content as $row) {
            $details['order_id'] = $order_id;
            $details['dish_id'] = $row->id;
            $details['dish_title'] = $row->name;
            $details['dish_price'] = $row->price;
            $details['dish_weight'] = $row->weight;
            $details['created_at'] = Now();
            $details['updated_at'] = Now();
            OrderItem::insert($details);
        };
        /* Deleting the contents of the shopping cart */
        Cart::destroy();
        $order_yes = "Заказ принят";
        return view('welcome', compact('order_yes'));
    }
    /* --------------- end Order formation ------------------ */
}
