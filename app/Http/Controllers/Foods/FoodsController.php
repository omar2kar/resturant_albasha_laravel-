<?php

namespace App\Http\Controllers\Foods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food\Food;
use App\Models\Food\Cart;
use App\Models\Food\Checkout;
use App\Models\Food\CheckoutItem;
use App\Models\Reviews;
use App\Models\Food\Category; // Ensure you have the correct namespace for the Category model

class FoodsController extends Controller
{
    public function foodDetails($id)
    {
        $foodItem = Food::find($id);
        return view('foods.food-details', compact('foodItem'));
    }

    public function menu()
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

    return view('menu', compact('categories', 'foodsByCategory', 'reviews'));
}

    public function cart(Request $request, $id)
    {
        Cart::create([
            "user_id" => $request->input('user-id'),
            "food_id" => $request->input('food-id'),
            "name" => $request->input('name'),
            "image" => $request->input('image'),
            "price" => $request->input('price'),
            "quantity" => 1,
        ]);

        return redirect()->route('food.details', $id)
            ->with('success', 'Food item added to cart successfully!');
    }

    public function cartDetails($id)
    {
        if (Auth()->user()) {
            $rawItems = Cart::where('user_id', $id)->get();

            $cartItems = $rawItems->groupBy('food_id')->map(function ($group) {
                $item = $group->first();
                $item->quantity = $group->sum('quantity');
                $item->total_price = $group->sum(function ($item) {
                    return $item->price * $item->quantity;
                });
                return $item;
            });

            return view('foods.cart-details', ['cartItems' => $cartItems]);
        } else {
            abort(400);
        }
    }

    public function increaseQuantity($foodId)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('food_id', $foodId)
            ->first();

        if ($cartItem) {
            Cart::create([
                'user_id' => $cartItem->user_id,
                'food_id' => $cartItem->food_id,
                'name' => $cartItem->name,
                'image' => $cartItem->image,
                'price' => $cartItem->price,
                'quantity' => 1,
            ]);
        }

        return back();
    }

    public function decreaseQuantity($foodId)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('food_id', $foodId)
            ->first();

        if ($cartItem) {
            $duplicate = Cart::where('user_id', $cartItem->user_id)
                ->where('food_id', $cartItem->food_id)
                ->latest()
                ->first();
            $duplicate?->delete();
        }

        return back();
    }

    public function destroy($foodId)
    {
        Cart::where('user_id', Auth::id())
            ->where('food_id', $foodId)
            ->delete();

        return back()->with('success', 'Item removed from cart.');
    }

    // هنا تم التعديل لتمرير total للسلة
    public function checkoutPrepare($id)
    {
        $cartItems = Cart::where('user_id', $id)->get();

        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('foods.checkout', ['userId' => $id, 'total' => $total]);
    }

    public function checkout(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'town' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'total' => 'required|numeric'
        ]);

        $checkout = Checkout::create([
            'user_id' => $id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'town' => $request->input('town'),
            'country' => $request->input('country'),
            'zipcode' => $request->input('zipcode'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'total_price' => $request->input('total'),
        ]);

        $cartItems = Cart::where('user_id', $id)->get();

        foreach ($cartItems as $item) {
            CheckoutItem::create([
                'checkout_id' => $checkout->id,
                'food_id' => $item->food_id,
                'name' => $item->name,
                'image' => $item->image,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'total_price' => $item->price * $item->quantity,
            ]);
        }

        

        // هنا بدل الإعادة للـ home، نعيد لصفحة تأكيد الطلب مع تمرير بيانات الطلب
        return redirect()->route('order.confirmation', ['id' => $checkout->id]);
    }

    // دالة جديدة لعرض صفحة تأكيد الطلب
    public function orderConfirmation($id)
    {
        $order = Checkout::with('items')->findOrFail($id);
        Cart::where('user_id', $order->user_id)->delete();
        return view('foods.order-confirmation', compact('order'));
    }

    public function myOrderss()
    {
        $userId = Auth::user()->id;

        $allOrders = Checkout::where('user_id', $userId)->get();


        return view('foods.my-orders', compact('allOrders'));
    }
    public function create()
    {
        return view('foods.reviews');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required',

            'review' => 'required',

        ]);

        $Review = reviews::create([

            'name' => $request->input('name'),
            'review' => $request->input('review'),

        ]);
        return view('foods.reviews');
    }

    public function oderssDelivered($id)
    {
        $orders = checkout::findOrFail($id);
        $orders->status = 'Delivered';
        $orders->save();

        return back()->with('success', 'Marked as Delivered.');
    }
}
