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

    /* --------------------- */
    /*    Show all Hours     */
    /* --------------------- */
    public function index()
    {
        $hours = WorkingHour::latest()->paginate(5);
        $trashed = WorkingHour::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view('admin.hours.index', compact('hours', 'trashed'));
    }
    /* -- end show all hours -- */

    /* ------------------- */
    /*      Create Hour    */
    /* ------------------- */
    public function create()
    {
        return view('admin.hours.create');
    }
    /* -- end create hour -- */

    /* -------------------- */
    /*      Save new Hour   */
    /* -------------------- */
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
    /* -- end save new hour -- */

    /* -------------- */
    /*  Trashed Hour  */
    /* -------------- */
    public function delete($id)
    {
        WorkingHour::find($id)->delete();
        $notification = array(
            'message' => 'Время в корзине',
            'alert-type' => 'success'
        );
        /* to Hours list page */
        return Redirect()->back()->with($notification);
    }
    /* end trashed hour */

    /* ------------------ */
    /*      Edit Hour     */
    /* ------------------ */
    public function edit($id)
    {
        $hour = WorkingHour::find($id);
        return view('admin.hours.edit', compact( 'hour'));
    }
    /* -- end edit hour -- */

    /* ---------------------- */
    /*      Restore Hour      */
    /* ---------------------- */
    public function restore($id)
    {
        WorkingHour::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Время восстановлен',
            'alert-type' => 'success'
        );
        /* to Hours list page */
        return Redirect()->back()->with($notification);
    }
    /* -- end restore hour -- */

    /* -------------------- */
    /*      Destroy Hour    */
    /* -------------------- */
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
        /* to Hours list page */
        return Redirect()->back()->with($notification);
    }
    /* -- end destroy hour -- */

    /* --------------------- */
    /*      Update Hour      */
    /* --------------------- */
    public function update(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['day_of_week']= $request->day_of_week;
        $data['open_time']= $request->open_time;
        $data['close_time']= $request->close_time;
        /* update Hour */
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
        /* to Hours list page */
        return Redirect()->route('admin.hours')->with($notification);
    }
    /* -- end update hour -- */
}
