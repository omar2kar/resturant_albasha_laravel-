@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
    </div>
</div>

<div class="container">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cartItems as $item)
                    @php $total += $item->price * $item->quantity; @endphp
                    <tr>
                        <td><img src="{{ asset('img/' . $item->image) }}" style="width: 50px;"></td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('cart.decreaseQuantity', $item->food_id) }}" method="POST" style="display:inline-flex;">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary" type="submit">-</button>
                            </form>

                            <span class="mx-2 item-total">{{ $item->quantity }}</span>

                            <form action="{{ route('cart.increaseQuantity', $item->food_id) }}" method="POST" style="display:inline-flex;">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary" type="submit">+</button>
                            </form>
                        </td>
                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.destroy', $item->food_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-end">
            <h4>Total: ${{ number_format($total, 2) }}</h4>
            @if($total == 0)
                <p class="alert alert-warning">Your cart is empty.</p>
            @else
                <form method="GET" action="{{ route('food.checkout.prepare', Auth::id()) }}">
                    <button type="submit" class="btn btn-primary">Checkout</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
