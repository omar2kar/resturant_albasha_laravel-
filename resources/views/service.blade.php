@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5" style="margin-top: -25px;">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Service Start -->
        <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6">
                    <div class="service-item rounded pt-3">
                        <div class="p-4 text-center">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h5>Expert Chefs</h5>
                            <p>Crafted by seasoned chefs with years of culinary experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="service-item rounded pt-3">
                        <div class="p-4 text-center">
                            <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                            <h5>Premium Quality</h5>
                            <p>Only the freshest and finest ingredients go into every dish.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="service-item rounded pt-3">
                        <div class="p-4 text-center">
                            <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                            <h5>Easy Ordering</h5>
                            <p>Order online effortlessly and get your meal hot and fresh.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="service-item rounded pt-3">
                        <div class="p-4 text-center">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h5>Customer Support</h5>
                            <p>We are here to serve you around the clock with care and attention.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Service End -->


@endsection