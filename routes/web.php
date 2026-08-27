<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Foods\FoodsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admins\AdminsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;

// ⬤ General Public Routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // باقي روتات المستخدم...
});
Route::get('/', [HomeController::class, 'index']);

Route::get('/menu', [FoodsController::class, 'menu'])->name('menu');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/count', [HomeController::class, 'count'])->name('count');
Auth::routes();
// ⬤ Food (Cart, Checkout, Payment)
Route::get('foods/food-details/{id}', [FoodsController::class, 'foodDetails'])->name('food.details');
Route::post('foods/food-details/{id}', [FoodsController::class, 'cart'])->name('food.cart');
Route::get('foods/cart-details/{id}', [FoodsController::class, 'cartDetails'])->name('cart.details');
Route::post('foods/cart/{foodId}/increase', [FoodsController::class, 'increaseQuantity'])->name('cart.increaseQuantity');
Route::post('foods/cart/{foodId}/decrease', [FoodsController::class, 'decreaseQuantity'])->name('cart.decreaseQuantity');
Route::delete('foods/cart/{foodId}', [FoodsController::class, 'destroy'])->name('cart.destroy');
Route::get('foods/checkout/{id}', [FoodsController::class, 'checkoutPrepare'])->name('food.checkout.prepare');
Route::post('foods/checkout/{id}', [FoodsController::class, 'checkout'])->name('food.checkout');
Route::get('foods/order-confirmation/{id}', [FoodsController::class, 'orderConfirmation'])->name('order.confirmation');
Route::get('/foods/payment/{order_id}', [PaymentController::class, 'showPaymentPage'])->name('foods.payment');

// ⬤ Reservation (Login Required to View)
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/my-reservations', [ReservationController::class, 'myReservations'])->middleware('auth')->name('reservation.my');
Route::put('/reservation/confirm/{id}', [ReservationController::class, 'markArrived'])->name('reservations.arrived');
// ⬤ Review (Login Required to Create)
Route::get('/foods/review/create', [FoodsController::class, 'create'])->name('foods.reviews');
Route::post('/foods/review/store', [FoodsController::class, 'store'])->name('reviews.store');


//show all ordders
Route::get('/foods/my-orders', [FoodsController::class, 'myOrderss'])->middleware('auth')->name('orders.my');


// ⬤ Admin Authentication
Route::get('/admin/login', [AdminsController::class, 'viewLogin'])->name('admin.login');
Route::post('/admin/login', [AdminsController::class, 'logins'])->name('admin.login.post');
Route::post('/admin/logout', [AdminsController::class, 'logout'])->name('admin.logout');

// ⬤ Admin Dashboard (Protected)
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard}
    Route::get('/dashboard', [App\Http\Controllers\Admins\AdminsController::class, 'dashboard'])->name('dashboard');
    // باقي روتات الأدمن...


    // Admin CRUD
    Route::get('/admins', [AdminsController::class, 'index'])->name('index');
    Route::get('/admins/create', [AdminsController::class, 'create'])->name('create');
    Route::post('/admins/store', [AdminsController::class, 'store'])->name('store');
    Route::get('/admins/{id}/edit', [AdminsController::class, 'edit'])->name('edit');
    Route::put('/admins/{id}', [AdminsController::class, 'update'])->name('update');
    Route::delete('/admins/{id}', [AdminsController::class, 'destroy'])->name('destroy');

    // Orders
    Route::get('/orders', [AdminsController::class, 'showOrders'])->name('orders');
    Route::delete('/orders/{id}', [AdminsController::class, 'destroys'])->name('orders.delete');

    // Foods CRUD
    Route::get('/foods', [AdminsController::class, 'showFoods'])->name('foods');
    Route::get('/foods-create', [AdminsController::class, 'createFood'])->name('foods.create');
    Route::post('/foods-store', [AdminsController::class, 'storeFood'])->name('foods.store');
    Route::get('/foods/{id}/edit', [AdminsController::class, 'editFood'])->name('foods.edit');
    Route::put('/foods/{id}', [AdminsController::class, 'updateFood'])->name('foods.update');
    Route::delete('/foods/{id}', [AdminsController::class, 'destroyFood'])->name('foods.delete');
    Route::get('/categories-create', [AdminsController::class, 'createCategory'])->name('category.create');
    Route::post('/categories-store', [AdminsController::class, 'storeCategory'])->name('category.store');

    // Bookings
    Route::get('/bookings', [AdminsController::class, 'showBookings'])->name('bookings');
    Route::delete('/bookings/{id}', [AdminsController::class, 'destroyBooking'])->name('bookings.delete');
});


Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');


Route::get('/paypal/success/{id}', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');

