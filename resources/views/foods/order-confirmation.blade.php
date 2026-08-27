@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Order Confirmation</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Confirmation</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-5">
    <div class="bg-dark text-white p-5 rounded">
        <h2>Thank you, {{ $order->name }}!</h2>
        <p>Your order #<strong>{{ $order->id }}</strong> has been placed successfully.</p>

        <h4 class="mt-4">Order Details:</h4>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Food Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>${{ number_format($item->total_price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="text-end">Total Price: ${{ number_format($order->total_price, 2) }}</h4>

        <h4 class="mt-5">Shipping Information:</h4>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phone:</strong> {{ $order->phone_number }}</p>
        <p><strong>Address:</strong> {{ $order->address }}, {{ $order->town }}, {{ $order->country }}, {{ $order->zipcode }}</p>

        <div class="d-flex justify-content-between">
            <a href="{{ route('home') }}" class="btn btn-secondary mt-4">Back to Home</a>
            <a href="{{ route('foods.payment', ['order_id' => $order->id]) }}" class="btn btn-success mt-4">Proceed to PayPal</a>
            
        </div>
    </div>
</div>
@endsection
