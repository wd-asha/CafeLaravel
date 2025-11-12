<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    public function index()
    {
        $tables = Table::latest()->paginate(5);
        $trashed = Table::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view('admin.table.index', compact('tables', 'trashed'));
    }

    public function create()
    {
        return view('admin.table.create');
    }

    public function store(Request $request)
    {
        $data = array();
        $data['name']= $request->name;
        Table::create($data);
        $notification = array(
            'message' => 'Новый столик создан',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.tables');
    }

    public function delete($id)
    {
        Table::find($id)->delete();
        $notification = array(
            'message' => 'Столик в корзине',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $table = Table::find($id);
        return view('admin.table.edit', compact( 'table'));
    }

    public function restore($id)
    {
        Table::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Столик восстановлен',
            'alert-type' => 'success'
        );
        /* to the dishes list page */
        return Redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        /* find a Table */
        $table = Table::onlyTrashed()->find($id);
        /* delete a Table */
        Table::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Столик удален',
            'alert-type' => 'success'
        );
        /* to the Tables list page */
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['name'] = $request->name;
        /* update Table */
        $update = Table::find($id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Столик обновлен',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Нечего обновлять',
                'alert-type' => 'success'
            );
        }
        /* to the Tables list page */
        return Redirect()->route('admin.tables')->with($notification);
    }
}
