<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* -------------------- */
    /*    Show all places   */
    /* -------------------- */
    public function index()
    {
        $places = Place::latest()->paginate(5);
        $trashed = Place::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        /* to the places list page */
        return view('admin.place.index', compact('places', 'trashed'));
    }
    /* end show all places */

    /* --------------- */
    /*  Trashed place  */
    /* --------------- */
    public function delete($id)
    {
        Place::find($id)->delete();
        $notification = array(
            'message' => 'Заказ в корзине',
            'alert-type' => 'success'
        );
        /* to the places list page */
        return Redirect()->back()->with($notification);
    }
    /* end trashed place */

    /* ---------------------- */
    /*      Restore Place     */
    /* ---------------------- */
    public function restore($id)
    {
        Place::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Заказ восстановлен',
            'alert-type' => 'success'
        );
        /* to the places list page */
        return Redirect()->back()->with($notification);
    }
    /* -- end restore place -- */

    /* ------------------- */
    /*    Destroy Place    */
    /* ------------------- */
    public function destroy($id)
    {
        /* find a place */
        $place = Place::onlyTrashed()->find($id);
        /* delete a place */
        Place::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Заказ удален',
            'alert-type' => 'success'
        );
        /* to the places list page */
        return Redirect()->back()->with($notification);
    }
    /* -- end destroy place -- */

}
