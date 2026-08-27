<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Admin; // تأكد من وجود هذا الموديل في المسار الصحيح
use App\Models\Food\Category;
use Illuminate\Support\Facades\Hash;
use App\Models\Food\Checkout; // تأكد من وجود هذا الموديل في المسار الصحيح
use App\Models\Food\Food; // تأكد من وجود هذا الموديل في المسار الصحيح
use App\Models\Food\resrvation; // تأكد من وجود هذا الموديل في المسار الصحيح
use App\Models\Reservation;

class AdminsController extends Controller
{
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function logins(Request $request)
{
     $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}

    public function dashboard()
{
    $foodsCount = Food::count();
    $ordersCount = Checkout::count();
    $bookingsCount = Reservation::count();
    $adminsCount = Admin::count();

    return view('admins.dashboard', compact('foodsCount', 'ordersCount', 'bookingsCount', 'adminsCount'));
}
    

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function index()
    {
        $admins = Admin::all(); // جلب كل الأدمنز
        return view('admins.index', compact('admins')); // تمريرهم للعرض في view admins.index
    }

    public function create()
    {
        return view('admins.create-admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins,email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        Admin::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.edit-admin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:admins,email,' . $id,
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $admin = Admin::findOrFail($id);

        $admin->email = $request->email;
        $admin->name = $request->name;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully.');
    }

    public function showOrders()
    {
        $orders = Checkout::all(); // جلب كل الطلبات
        return view('admins.show-order', compact('orders')); // تمريرهم للعرض في view admins.show-order
    }
    public function destroys($id)
    {
        $orders = Checkout::findOrFail($id);
        $orders->delete();

        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully.');
    }
    public function showFoods()
    {
        $foods = Food::all(); // جلب كل الأطعمة
        return view('admins.show-foods', compact('foods')); // تمريرهم للعرض في view admins.show-foods
    }

    public function destroyFood($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();

        return redirect()->route('admin.foods')->with('success', 'Food deleted successfully.');
    }

    public function createFood(){
    $categories = Category::all(); // يجب جلبها من جدول categories الحقيقي
return view('admins.create-food', compact('categories'));
    }
    public function storeFood(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required|string|max:1000',
        'categories_id' => 'required|exists:categories,id',

        'price' => 'required|numeric|min:0',
    ]);

    $image = $request->file('image');
    $imageName = $image->getClientOriginalName();
    $imagePath = public_path('img/' . $imageName);

    // إذا لم تكن الصورة موجودة، احفظها
    if (!file_exists($imagePath)) {
        $image->move(public_path('img'), $imageName);
    }

    Food::create([
        'name' => $request->name,
        'image' => $imageName,  // فقط اسم الصورة
        'description' => $request->description,
        'category_id' => $request->categories_id,
        'price' => $request->price,
    ]);

    return redirect()->route('admin.foods')->with('success', 'Food created successfully.');
}
public function editFood($id)
    {
        $food = Food::findOrFail($id);
        $categories = Category::all(); // يجب جلبها من جدول categories الحقيقي
        return view('admins.edit-foods', compact('food','categories'));
    }

    public function updateFood(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required|string|max:1000',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric|min:0',
    ]);

    $food = Food::findOrFail($id);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('img'), $imageName);
        $food->image = $imageName;
    }

    $food->name = $request->name;
    $food->description = $request->description;
    $food->category_id = $request->category_id;
    $food->price = $request->price;

    $food->save();

    return redirect()->route('admin.foods')->with('success', 'Food updated successfully.');
}
    public function showBookings()
    {
        $bookings = Reservation::all(); // جلب كل الحجوزات
        return view('admins.show-booking', compact('bookings')); // تمريرهم للعرض في view admins.show-bookings
    }

    public function destroyBooking($id)
    {
        $booking = Reservation::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully.');
    }

public function createCategory(){
return view('admins.create-category');
    }
    public function storeCategory(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $image = $request->file('image');

    Category::create([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.foods')->with('success', 'Food created successfully.');
}


}
    