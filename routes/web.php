<?php

use App\Models\WorkingHour;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('admin/index', ['App\Http\Controllers\Admin\AdminDashboardController', 'index'])->name('admin.index');
    Route::get('user/destroy/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'destroyUser'])->name('destroy.user');
    Route::get('user/restore/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'restoreUser'])->name('restore.user');
    Route::get('user/delete/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'deleteUser'])->name('delete.user');
});
Route::group(['middleware' => ['auth', 'author']], function(){
    Route::get('author/index', ['App\Http\Controllers\Author\AuthorDashboardController', 'index'])->name('author.index');
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
Route::get('soup', [App\Http\Controllers\HomeController::class, 'soup'])->name('soup');
Route::get('delivery', [App\Http\Controllers\HomeController::class, 'delivery'])->name('delivery');
Route::get('about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('contacts', [App\Http\Controllers\HomeController::class, 'contacts'])->name('contacts');
Route::get('wishlist', [App\Http\Controllers\WishlistController::class, 'index'])->name('wishlist');
Route::get('wishlist/delete/{rowId}', [App\Http\Controllers\WishlistController::class, 'delete'])->name('wishlist.delete');
Route::post('place', [App\Http\Controllers\HomeController::class, 'place'])->name('place');
Route::post('placeA', [App\Http\Controllers\HomeController::class, 'placeA'])->name('placeA');
Route::post('check', [App\Http\Controllers\CartController::class, 'check'])->name('check');

//Admin Category
Route::get('admin/categories', ['App\Http\Controllers\Admin\CategoryController', 'index'])->name('admin.categories');
Route::post('admin/category/store', ['App\Http\Controllers\Admin\CategoryController', 'store'])->name('admin.category.store');
Route::get('admin/category/delete/{id}', ['App\Http\Controllers\Admin\CategoryController', 'delete'])->name('admin.category.delete');

//Admin Tables
Route::get('admin/tables', ['App\Http\Controllers\Admin\TableController', 'index'])->name('admin.tables');
Route::get('admin/table/create', ['App\Http\Controllers\Admin\TableController', 'create'])->name('table.create');
Route::post('admin/table/store', ['App\Http\Controllers\Admin\TableController', 'store'])->name('table.store');
Route::post('admin/table/update/{id}', ['App\Http\Controllers\Admin\TableController', 'update'])->name('table.update');
Route::get('admin/table/edit/{id}', ['App\Http\Controllers\Admin\TableController', 'edit'])->name('table.edit');
Route::get('admin/table/delete/{id}', ['App\Http\Controllers\Admin\TableController', 'delete'])->name('table.delete');
Route::get('admin/table/restore/{id}', ['App\Http\Controllers\Admin\TableController', 'restore'])->name('table.restore');
Route::get('admin/table/destroy/{id}', ['App\Http\Controllers\Admin\TableController', 'destroy'])->name('table.destroy');

//Admin Hours
Route::get('admin/hours', ['App\Http\Controllers\Admin\HoursController', 'index'])->name('admin.hours');
Route::get('admin/hour/create', ['App\Http\Controllers\Admin\HoursController', 'create'])->name('hour.create');
Route::post('admin/hour/store', ['App\Http\Controllers\Admin\HoursController', 'store'])->name('hour.store');
Route::post('admin/hour/update/{id}', ['App\Http\Controllers\Admin\HoursController', 'update'])->name('hour.update');
Route::get('admin/hour/edit/{id}', ['App\Http\Controllers\Admin\HoursController', 'edit'])->name('hour.edit');
Route::get('admin/hour/delete/{id}', ['App\Http\Controllers\Admin\HoursController', 'delete'])->name('hour.delete');
Route::get('admin/hour/restore/{id}', ['App\Http\Controllers\Admin\HoursController', 'restore'])->name('hour.restore');
Route::get('admin/hour/destroy/{id}', ['App\Http\Controllers\Admin\HoursController', 'destroy'])->name('hour.destroy');

//Admin Dish
Route::get('admin/dishes', ['App\Http\Controllers\Admin\DishController', 'index'])->name('admin.dishes');
Route::get('admin/dish/create', ['App\Http\Controllers\Admin\DishController', 'create'])->name('dish.create');
Route::post('admin/dish/store', ['App\Http\Controllers\Admin\DishController', 'store'])->name('dish.store');
Route::post('admin/dish/update/{id}', ['App\Http\Controllers\Admin\DishController', 'update'])->name('dish.update');
Route::get('admin/dish/show/{id}', ['App\Http\Controllers\Admin\DishController', 'show'])->name('dish.show');
Route::get('admin/dish/edit/{id}', ['App\Http\Controllers\Admin\DishController', 'edit'])->name('dish.edit');
Route::get('admin/dish/delete/{id}', ['App\Http\Controllers\Admin\DishController', 'delete'])->name('dish.delete');
Route::get('admin/dish/restore/{id}', ['App\Http\Controllers\Admin\DishController', 'restore'])->name('dish.restore');
Route::get('admin/dish/destroy/{id}', ['App\Http\Controllers\Admin\DishController', 'destroy'])->name('dish.destroy');
Route::post('admin/dish/updatePhoto/{id}', ['App\Http\Controllers\Admin\DishController', 'updatePhoto'])->name('admin.dish.updatePhoto');
Route::get('admin/dish/status0/{id}', ['App\Http\Controllers\Admin\DishController', 'status0'])->name('dish.status0');
Route::get('admin/dish/status1/{id}', ['App\Http\Controllers\Admin\DishController', 'status1'])->name('dish.status1');

//Cart
Route::post('dish/addCart/{id}', ['App\Http\Controllers\CartController', 'addCart'])->name('dish.addCart');
Route::get('cart/delete/{rowId}', ['App\Http\Controllers\CartController', 'delete'])->name('cart.delete');
Route::get('cart/destroy', ['App\Http\Controllers\CartController', 'destroy'])->name('cart.destroy');

//Admin Orders
Route::get('admin/neworders', ['App\Http\Controllers\Admin\OrderController', 'index'])->name('admin.neworders');
Route::get('admin/order/delete/{id}', ['App\Http\Controllers\Admin\OrderController', 'orderDelete'])->name('admin.order.delete');
Route::get('admin/order/show/{id}', ['App\Http\Controllers\Admin\OrderController', 'show'])->name('admin.order.show');
Route::get('admin/order/pending/{id}', ['App\Http\Controllers\Admin\OrderController', 'pending'])->name('admin.order.pending');
Route::get('admin/orders/process', ['App\Http\Controllers\Admin\OrderController', 'ordersProcess'])->name('admin.orders.process');
Route::get('admin/order/process/{id}', ['App\Http\Controllers\Admin\OrderController', 'process'])->name('admin.order.process');
Route::get('admin/orders/delivered', ['App\Http\Controllers\Admin\OrderController', 'ordersDelivered'])->name('admin.orders.delivered');
Route::get('admin/order/delivered/{id}', ['App\Http\Controllers\Admin\OrderController', 'delivered'])->name('admin.order.delivered');
Route::get('admin/order/canceled/{id}', ['App\Http\Controllers\Admin\OrderController', 'canceled'])->name('admin.order.canceled');
Route::get('admin/orders/canceled', ['App\Http\Controllers\Admin\OrderController', 'ordersCanceled'])->name('admin.orders.canceled');

//Admin Place
Route::get('admin/places', ['App\Http\Controllers\Admin\PlaceController', 'index'])->name('admin.places');
Route::get('admin/place/delete/{id}', ['App\Http\Controllers\Admin\PlaceController', 'delete'])->name('admin.place.delete');
Route::get('admin/place/destroy/{id}', ['App\Http\Controllers\Admin\PlaceController', 'destroy'])->name('admin.place.destroy');
Route::get('admin/place/restore/{id}', ['App\Http\Controllers\Admin\PlaceController', 'restore'])->name('admin.place.restore');
