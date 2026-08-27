@extends('layouts.app')

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px;">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                </ol>
            </nav>
        </div>


        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        @foreach ($categories as $index => $category)
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 {{ $loop->first ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#tab-{{ $category->id }}">
                                    <i class="fa fa-utensils fa-2x text-primary"></i>
                                    <div class="ps-3">
                                        <small class="text-body">Category</small>
                                        <h6 class="mt-n1 mb-0">{{ ucfirst($category->name) }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>





                    <div class="tab-content">
                        @foreach ($categories as $category)
                            <div id="tab-{{ $category->id }}"
                                class="tab-pane fade show p-0 {{ $loop->first ? 'active' : '' }}">
                                <div class="row g-4">
                                    @foreach ($foodsByCategory[$category->id] as $food)
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center">
                                                <img class="flex-shrink-0 img-fluid rounded"
                                                    src="{{ asset('img/' . $food->image) }}" alt=""
                                                    style="width: 80px;">
                                                <div class="w-100 d-flex flex-column text-start ps-4">
                                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                        <span>{{ $food->name }}</span>
                                                        <span class="text-primary">${{ $food->price }}</span>
                                                    </h5>
                                                    <small class="fst-italic">{{ $food->description }}</small>
                                                    <a href="{{ route('food.details', $food->id) }}"
                                                        class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">view</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
