@extends('layouts.app')

@section('content')
    <div class="container-xxl py-5 hero-header mb-5" style="margin-top: -25px;">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="hero-title">Deliciously Crafted Burgers Just for You</h1>
                    <p class="hero-desc">Experience the rich flavor of gourmet burgers made with fresh, premium ingredients.
                        Taste the passion in every bite.</p>
                    <a href="{{ route('menu') }}" class="btn btn-primary">View Our Menu</a>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid rotate-img" src="{{ asset('img/burger1.png') }}" alt="Burger Image">
                </div>
            </div>
        </div>
    </div>

    <!-- Services -->
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

    <!-- About -->
    <div class="container-xxl py-5">
        <div class="container about-item">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100" src="img/about-1.jpg" alt="About Image 1">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75" src="img/about-2.jpg" style="margin-top: 25%;"
                                alt="About Image 2">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75" src="img/about-3.jpg" alt="About Image 3">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-100" src="img/about-4.jpg" alt="About Image 4">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">Our Story</h5>
                    <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
                    <p class="mb-4">At Restoran, we believe that food is more than just a meal—it's an experience. From
                        the finest ingredients to expert preparation, we ensure every dish delights your taste buds.</p>
                    <p class="mb-4">With over 15 years of excellence and a team of 50 master chefs, we bring authentic
                        flavors with a modern twist to your plate every day.</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                <div class="ps-4">
                                    <p class="mb-0">Years of</p>
                                    <h6 class="text-uppercase mb-0">Experience</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                                <div class="ps-4">
                                    <p class="mb-0">Professional</p>
                                    <h6 class="text-uppercase mb-0">Chefs</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="{{ route('about') }}">Learn More</a>
                </div>
            </div>
        </div>
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
    <!-- Menu End -->


    <!-- Reservation Start -->
    <div class="container-xxl py-5 bg-dark px-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="video">
                    <button type="button" class="btn-play" data-bs-toggle="modal"
                        data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>

            <div class="col-md-6 bg-dark d-flex align-items-center">
                <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                    <h1 class="text-white mb-4">Book A Table Online</h1>
                    <form method="POST" action="{{ route('reservation.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date">
                                    <input type="datetime-local" name="date_time" class="form-control" id="datetime"
                                        required min="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d\TH:i') }}">
                                    <label for="datetime">Date & Time</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="people_count" class="form-select" id="select1" required>
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">People {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <label for="select1">No Of People</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="message" class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                    <label for="message">Special Request</label>
                                </div>
                            </div>
                            <div class="col-12">
                                @auth
                                    <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                                @else
                                    <button class="btn btn-secondary w-100 py-3" type="button" disabled>
                                        Please login to book
                                    </button>
                                @endauth
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                                allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation Start -->


    <!-- Team Start -->
    <div class="container-xxl pt-5 bg-dark pb-3">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
                <h1 class="mb-5">Our Master Chefs</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                        </div>
                        <h5 class="mb-0">Full Name</h5>
                        <small>Designation</small>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                        </div>
                        <h5 class="mb-0">Full Name</h5>
                        <small>Designation</small>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                        </div>
                        <h5 class="mb-0">Full Name</h5>
                        <small>Designation</small>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                        </div>
                        <h5 class="mb-0">Full Name</h5>
                        <small>Designation</small>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
   <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">

                    <div class="container">

                        <div class="text-center">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                            <h1 class="mb-5">Our Clients Say!!!</h1>
                        </div>

                        <div class="owl-carousel testimonial-carousel">
                            @foreach ($reviews as $review)
                                <div class="testimonial-item bg-transparent border rounded p-4">
                                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                                    <p>{{ $review->review }}</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded-circle"
                                            src="{{ asset('img/testimonial-1.jpg') }}"
                                            style="width: 50px; height: 50px;">
                                        <div class="ps-3">
                                            <h5 class="mb-1">{{ $review->name }}</h5>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>
    <!-- Testimonial End -->
@endsection
