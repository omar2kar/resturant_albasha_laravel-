@extends('layouts.app')

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Reservation</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Reservation</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date</th>
                        <th scope="col">Num People</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Review</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->date_time }}</td>
                            <td>{{ $reservation->people_count }}</td>
                            <td>{{ $reservation->message }}</td>
                            <td>{{ $reservation->status }}
                                @if (empty($reservation->status))
                                    <form action="{{ route('reservations.arrived', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-success btn-sm">Mark as Arrived</button>
                                    </form>
                                @else
                                    <span class="text-success fw-bold">✅ Arrived</span>
                                @endif
                            </td>
                            <td>
                                @if ($reservation->status == 'Arrived')
                                    <a href="{{ route('foods.reviews') }}" class="btn btn-success">Review</a>
                                @else
                                    <span class="text-muted">Not available yet</span>
                                @endif
                            </td> 
                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>

    </div>
@endsection
