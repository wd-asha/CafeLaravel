<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    /* -------------------- */
    /*      Users list      */
    /* -------------------- */
    public function index()
    {
        $users = User::latest()->paginate(10);
        $trashed = User::onlyTrashed()->paginate(10);
        return view('admin.index', compact('users', 'trashed'));
    }
    /* -- end users list -- */

    /* -------------------- */
    /*      Trash user      */
    /* -------------------- */
    public function deleteUser($id)
    {
        User::find($id)->delete();
        $notification = array(
            'message' => 'Пользователь заблокирован!',
            'alert-type' => 'warning'
        );
        /* to users list */
        return Redirect()->back()->with($notification);
    }
    /* -- end trash user -- */

    /* --------------------- */
    /*      Restore user     */
    /* --------------------- */
    public function restoreUser($id)
    {
        User::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Пользователь разблокирован',
            'alert-type' => 'info'
        );
        /* to users list */
        return Redirect()->back()->with($notification);
    }
    /* -- end restore user -- */

    /* -------------------- */
    /*      Delete user      */
    /* -------------------- */
    public function destroyUser($id)
    {
        User::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Пользователь удален',
            'alert-type' => 'success'
        );
        /* to users list */
        return Redirect()->back()->with($notification);
    }
    /* -- end delete user -- */

}
