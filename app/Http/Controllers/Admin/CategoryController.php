<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        /* actions for admin only */
        $this->middleware('admin');
    }

    /* ------------------------- */
    /*    Show all categories    */
    /* ------------------------- */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }
    /*  end show all categories  */

    /* ---------------------------------- */
    /*          Create new category       */
    /* ---------------------------------- */
    public function store(Request $request)
    {
        /* validation input data */
        $data = $request->validate([
            'title' => 'required|unique:categories|min:3'
        ],
            [
                'title.required' => 'Наименование обязательно',
                'title.unique' => 'Такая категория уже существует',
                'title.min' => 'Наименование менее чем 3 символа'
            ]);
        /* create category */
        Category::create([
            'title' => $request->title,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        /* to page with list categories */
        $notification = array(
            'message' => 'Категория добавлена',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* ----- end Create new category ----- */

    /* ------------------------------ */
    /*          Delete category       */
    /* ------------------------------ */
    public function delete($id)
    {
        Category::find($id)->forceDelete();
        $notification = array(
            'message' => 'Категория удалена',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* ---- end delete category ----- */
}
