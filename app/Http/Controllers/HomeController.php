<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Place;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $order_yes = "";
        return view('welcome', compact('order_yes'));
    }

    public function menu()
    {
        $categories = Category::all();
        $dishes = Dish::all();
        return view('menu', compact('dishes', 'categories'));
    }

    public function soup()
    {
        $categories = Category::all();
        $dishes = Dish::all();
        return view('soup', compact('dishes', 'categories'));
    }

    public function delivery()
    {
        $categories = Category::all();
        $dishes = Dish::all();
        return view('delivery', compact('dishes', 'categories'));
    }

    public function about()
    {
        $categories = Category::all();
        $dishes = Dish::all();
        $order_yes = "";
        return view('about', compact('dishes', 'categories', 'order_yes'));
    }

    public function contacts()
    {
        $categories = Category::all();
        $dishes = Dish::all();
        return view('contacts', compact('dishes', 'categories'));
    }

    public function place(Request $request)
    {
        $order_yes = "";
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'places' => 'required',
        ],
            [
                'name.required' => 'Укажите имя',
                'phone.required' => 'Укажите телефон',
                'date.required' => 'Укажите дату',
                'time.required' => 'Укажите время',
                'places.required' => 'Укажите места',
            ]);

        /* Prepare data for the order */
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['date'] = $request->date;
        $data['time'] = $request->time;
        $data['places'] = $request->places;
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        Place::create($data);
        $order_yes = "Заказ принят";
        return view('welcome', compact('order_yes'));
    }

    public function placeA(Request $request)
    {
        $order_yes = "";
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'places' => 'required',
        ],
            [
                'name.required' => 'Укажите имя',
                'phone.required' => 'Укажите телефон',
                'date.required' => 'Укажите дату',
                'time.required' => 'Укажите время',
                'places.required' => 'Укажите места',
            ]);

        /* Prepare data for the order */
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['date'] = $request->date;
        $data['time'] = $request->time;
        $data['places'] = $request->places;
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        Place::create($data);
        $order_yes = "Заказ принят";
        return view('about', compact('order_yes'));
    }
}
