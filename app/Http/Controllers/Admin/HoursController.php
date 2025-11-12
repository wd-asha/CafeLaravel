<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkingHour;

class HoursController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    public function index()
    {
        $hours = WorkingHour::latest()->paginate(5);
        $trashed = WorkingHour::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view('admin.hours.index', compact('hours', 'trashed'));
    }

    public function create()
    {
        return view('admin.hours.create');
    }

    public function store(Request $request)
    {
        $data = array();
        $data['day_of_week']= $request->day_of_week;
        $data['open_time']= $request->open_time;
        $data['close_time']= $request->close_time;
        WorkingHour::create($data);
        $notification = array(
            'message' => 'Новое время создано',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.hours');
    }

    public function delete($id)
    {
        WorkingHour::find($id)->delete();
        $notification = array(
            'message' => 'Время в корзине',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $hour = WorkingHour::find($id);
        return view('admin.hours.edit', compact( 'hour'));
    }

    public function restore($id)
    {
        WorkingHour::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Время восстановлен',
            'alert-type' => 'success'
        );
        /* to the hours list page */
        return Redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        /* find a WorkingHour */
        $hour = WorkingHour::onlyTrashed()->find($id);
        /* delete a WorkingHour */
        WorkingHour::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Время удалено',
            'alert-type' => 'success'
        );
        /* to the WorkingHours list page */
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['day_of_week']= $request->day_of_week;
        $data['open_time']= $request->open_time;
        $data['close_time']= $request->close_time;
        /* update Table */
        $update = WorkingHour::find($id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Время обновлено',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Нечего обновлять',
                'alert-type' => 'success'
            );
        }
        /* to the Tables list page */
        return Redirect()->route('admin.hours')->with($notification);
    }
}
