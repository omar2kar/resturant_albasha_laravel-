<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Carbon\Carbon;


class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'date_time' => 'required|date|after:today',
        'people_count' => 'required|integer|min:1',
        'message' => 'nullable|string',
        'status' => ['nullable', Rule::in(['Pending', 'Confirmed', 'Cancelled'])],
    ]);

    Reservation::create([
        'user_id' => Auth::check() ? Auth::id() : null,
        'name' => $request->name,
        'email' => $request->email,
        'date_time' => $request->date_time,
        'people_count' => $request->people_count,
        'message' => $request->message,
        'status' => null, // نترك الحالة فارغة في البداية
        ]);

        return back()->with('success', 'Your reservation has been saved!');
    }

    public function myReservations()
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('reservation.my_reservations', compact('reservations'));
    }

   public function markArrived($id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->status = 'Arrived';
    $reservation->save();

    return back()->with('success', 'Marked as arrived.');
}
}