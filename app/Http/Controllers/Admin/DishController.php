<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* --------------------- */
    /*    Show all Dishes    */
    /* --------------------- */
    public function index()
    {
        $dishes = Dish::latest()->paginate(5);
        $trashed = Dish::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();
        /* to the dishes list page */
        return view('admin.dish.index', compact('dishes', 'categories', 'trashed'));
    }
    /* -- end show all dishes -- */

    /* ------------------- */
    /*      Create Dish    */
    /* ------------------- */
    public function create()
    {
        $categories = Category::all();
        /* to the create new dish page */
        return view('admin.dish.create', compact('categories'));
    }
    /* -- end create dish -- */

    /* -------------------- */
    /*      Save new Dish   */
    /* -------------------- */
    public function store(Request $request)
    {
        /* preparing data for saving */
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['weight'] = $request->weight;
        $data['price'] = $request->price;
        $data['compound'] = $request->compound;
        $image = $request->image;
        if ($image) {
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('media/dish/' . $image_name);
            $data['image'] = 'media/dish/' . $image_name;
        }
        /* create new dish */
        Dish::create($data);
        $notification = array(
            'message' => 'Новое блюдо создано',
            'alert-type' => 'success'
        );
        /* to the dishes list page */
        return Redirect()->route('admin.dishes')->with($notification);
    }
    /* -- end save new dish -- */

    /* -------------- */
    /*  Trashed Dish  */
    /* -------------- */
    public function delete($id)
    {
        Dish::find($id)->delete();
        $notification = array(
            'message' => 'Блюдо в корзине',
            'alert-type' => 'success'
        );
        /* to Dishes list page */
        return Redirect()->back()->with($notification);
    }
    /* end trashed dish */

    /* ---------------------- */
    /*      Restore Dish      */
    /* ---------------------- */
    public function restore($id)
    {
        Dish::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Блюдо восстановлено',
            'alert-type' => 'success'
        );
        /* to the dishes list page */
        return Redirect()->back()->with($notification);
    }
    /* -- end restore dish -- */

    /* -------------------- */
    /*      Destroy Dish    */
    /* -------------------- */
    public function destroy($id)
    {
        /* find a dish */
        $dish = Dish::onlyTrashed()->find($id);
        /* delete photos if they exist */
        if($dish->image !== NULL) {
            $image = $dish->image;
            unlink($image);
        }
        /* delete a dish */
        Dish::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Блюдо удалено',
            'alert-type' => 'success'
        );
        /* to the dishes list page */
        return Redirect()->back()->with($notification);
    }
    /* -- end destroy dish -- */

    /* --------------------------- */
    /*      Show single Dish      */
    /* --------------------------- */
    public function show($id)
    {
        $categories = Category::all();
        $dish = Dish::find($id);
        /* to the dish`s show page */
        return view('admin.dish.show', compact('categories', 'dish'));
    }
    /* -- end show single dish -- */

    /* ------------------ */
    /*      Edit Dish     */
    /* ------------------ */
    public function edit($id)
    {
        $categories = Category::all();
        $dish = Dish::find($id);
        /* to Dishes edit page */
        return view('admin.dish.edit', compact('categories', 'dish'));
    }
    /* -- end edit dish -- */

    /* --------------------------- */
    /*      Update Dish Image      */
    /* --------------------------- */
    public function updatePhoto(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $old_image = $request->old_image;
        $image_yes = $request->file('image');
        $data = array();
        if($image_yes) {
            /* delete the previous image if there was one */
            if($old_image !== 'media/dish/empty-image.png') {
                unlink($old_image);
            };
            /* prepare and save a new image */
            $image = $request->file('image');
            $location = 'media/dish/';
            $name_image = hexdec(uniqid());
            $ext_image = strtolower($image->getClientOriginalExtension());
            $full_image = $location.$name_image.'.'.$ext_image;
            $image->move($location, $full_image);
            $data['image'] = $full_image;
            /* updating dish */
            Dish::find($id)->update($data);
            $notification = array(
                'message' => 'Изображение обновлено',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Изображение не обновлено',
                'alert-type' => 'error'
            );
        }
        /* to the dishes list page */
        return Redirect()->route('admin.dishes')->with($notification);
    }
    /* ---- end update dish images ---- */

    /* --------------------- */
    /*      Update Dish      */
    /* --------------------- */
    public function update(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['weight'] = $request->weight;
        $data['price'] = $request->price;
        $data['compound'] = $request->compound;
        /* update dish */
        $update = Dish::find($id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Блюдо обновлено',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Нечего обновлять',
                'alert-type' => 'success'
            );
        }
        /* to the dishes list page */
        return Redirect()->route('admin.dishes')->with($notification);
    }
    /* -- end update dish -- */

    public function status0($id)
    {
        Dish::find($id)->update([
            'status' => false
        ]);

        return Redirect()->back();
    }

    public function status1($id)
    {
        Dish::find($id)->update([
            'status' => true
        ]);

        return Redirect()->back();
    }


}
