<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Place;
use App\Models\Table;
use Carbon\Carbon;
use App\Models\WorkingHour;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $tables = Table::all();
        $order_yes = "";
        return view('welcome', compact('order_yes', 'tables'));
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
        $tables = Table::all();
        $order_yes = "";
        return view('about', compact('dishes', 'categories', 'order_yes', 'tables'));
    }

    public function contacts()
    {
        $categories = Category::all();
        $dishes = Dish::all();
        return view('contacts', compact('dishes', 'categories'));
    }

    // БРОНИРОВАНИЕ СТОЛИКА
    public function place(Request $request)
    {
        $order_yes = "";
        //валидируем входные данные
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'places' => 'required|string|max:255',
        ]);

        $date = $request->date;
        $time = $request->time;
        $places = $request->places;
        $dayOfWeek = \Carbon\Carbon::parse($date)->locale('ru')->dayName;
        $workingHours = \App\Models\WorkingHour::where('day_of_week', $dayOfWeek)->first();

        if (!$workingHours) {
            return back()->with('order_error', 'В этот день кафе не работает.');
        }

        if ($time < $workingHours->open_time || $time > $workingHours->close_time) {
            return back()->with('order_error', "Выбранное время вне рабочего графика");
        }

        // Проверка пересечения брони (1 час)
        $requestedStart = \Carbon\Carbon::parse($time);
        $requestedEnd = (clone $requestedStart)->addHour();

        $conflictExists = \App\Models\Place::where('date', $date)
            ->where('places', $places)
            ->where(function ($query) use ($requestedStart, $requestedEnd) {
                $query
                    ->whereBetween('time', [$requestedStart->format('H:i:s'), $requestedEnd->format('H:i:s')])
                    ->orWhere(function ($q) use ($requestedStart, $requestedEnd) {
                        $q->where('time', '<', $requestedStart->format('H:i:s'))
                            ->whereRaw("ADDTIME(time, '1:00:00') > ?", [$requestedStart->format('H:i:s')]);
                    });
            })
            ->exists();

        if ($conflictExists) {
            return back()->with('order_error', 'На выбранное время столик уже забронирован');
        }

        \App\Models\Place::create($request->only(['name', 'phone', 'date', 'time', 'places']));
        $order_yes = "Заказ принят";
        $tables = Table::all();
        return redirect('/')
            ->with('order_yes', 'Заказ принят');
        /*return view('welcome', compact('order_yes', 'tables'));*/
        /*return back()->with('order_yes');*/
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

    public function checkPlace(Request $request)
    {
        $date = $request->date;
        $time = $request->time;
        $places = $request->places;

        if (!$date || !$time || !$places) {
            return response()->json([
                'status' => 'error',
                'message' => 'Выберите дату, время и место',
            ]);
        }

        $dayOfWeek = \Carbon\Carbon::parse($date)->locale('ru')->dayName;
        $workingHours = \App\Models\WorkingHour::where('day_of_week', $dayOfWeek)->first();

        if (!$workingHours) {
            return response()->json([
                'status' => 'error',
                'message' => 'В этот день кафе не работает',
            ]);
        }

        // Проверяем в пределах рабочего времени
        if ($time < $workingHours->open_time || $time > $workingHours->close_time) {
            return response()->json([
                'status' => 'error',
                'message' => "Выбранное время вне рабочего графика",
            ]);
        }

        // -------------------------
        // 🔹 Проверка пересечения брони
        // -------------------------
        $requestedStart = \Carbon\Carbon::parse($time);
        $requestedEnd = (clone $requestedStart)->addHour(); // бронь на 1 час

        $conflictExists = \App\Models\Place::where('date', $date)
            ->where('places', $places)
            ->where(function ($query) use ($requestedStart, $requestedEnd) {
                $query
                    ->whereBetween('time', [$requestedStart->format('H:i:s'), $requestedEnd->format('H:i:s')])
                    ->orWhere(function ($q) use ($requestedStart, $requestedEnd) {
                        $q->where('time', '<', $requestedStart->format('H:i:s'))
                            ->whereRaw("ADDTIME(time, '1:00:00') > ?", [$requestedStart->format('H:i:s')]);
                    });
            })
            ->exists();

        if ($conflictExists) {
            return response()->json([
                'status' => 'error',
                'message' => 'На выбранное время столик уже забронирован (пересечение по времени).',
            ]);
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'Место доступно для бронирования',
        ]);
    }



}
