<?php

namespace App\Http\Controllers;

use App\Models\Food\Checkout;
use App\Models\Food\CheckoutItem;
use App\Models\Food\cart; // Ensure you have the correct namespace for the Cart model
use App\Models\Food\CartItem; // Ensure you have the correct namespace for the Cart
use App\Models\Food\Category; // Ensure you have the correct namespace for the Category model
use Illuminate\Http\Request;
use App\Models\Food\Food; // Ensure you have the correct namespace for the Food model
use Illuminate\Support\Facades\Auth;
use App\Models\Reviews; 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    //{$this->middleware('auth');}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 // تأكد أنك مستورد المودي

public function index()
{
    // استخرج الكاتيجوريز المرتبطة بمنتجات فقط
    $categories = Category::whereHas('foods')->get();

    // جلب المنتجات لكل كاتيجوري باستخدام الـ id كمفتاح
    $foodsByCategory = [];
    foreach ($categories as $category) {
        $foodsByCategory[$category->id] = Food::where('category_id', $category->id)
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();
    }

    // مراجعات
    $reviews = Reviews::orderBy('id', 'desc')->take(4)->get();

    return view('home', compact('categories', 'foodsByCategory', 'reviews'));
}



    public function about()
    {
   
    return view('about');
    }
   
    
    public function service()
    {

    return view('service');
    }

    public function contact()
    {
        return view('contact');
    }

   

public function count()
{
    $count = cart::where('user_id', Auth::id())
        ->selectRaw('SUM(price * quantity) as total_price')
        ->first();

    return view('home', compact('count'));
}

}