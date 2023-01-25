@extends('frontend.main')
@section('title', 'Index Page')

@section('styles')
@endsection

@push('css')
@endpush

@section('extra_class_2')
position-absolute w-100 z-index-1
@endsection

@section('extra_class')
justify-content-start
@endsection

@section('banner')
  
@include('frontend.partial._navbar')
    <!--header end-->


    <!--hero section start-->

    <section class="custom-py-1 position-relative hero-shape3 overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5 col-xl-6 order-lg-2 mb-8 mb-lg-0">
                    <!-- Image -->
                    <img src="{{ asset('frontend/assets/images/hero/fsf-hero.png') }}" class="img-fluid" alt="...">
                </div>
                <div class="col-12 col-lg-7 col-xl-6 order-lg-1">
                    <h1 class="display-4 mb-3">
                        FSF Your App <span class="font-w-7">Better & Faster</span>
                    </h1>
                    <!-- Text -->
                    <p class="lead text-muted mb-4">We use the latest technologies it voluptatem accusantium doloremque
                        laudantium. Build a Beautiful, Clean & Modern Design website with flexible Bootstrap components.</p>
                    <!-- Buttons -->
                    <a href="#" class="btn btn-sm btn-primary text-start me-1"> <i
                            class="la la-apple me-2 ic-2x d-inline-block"></i>
                        <div class="d-inline-block"> <small class="d-block">Available On The</small>
                            App Store</div>
                    </a>
                    <a href="#" class="btn btn-sm btn-dark text-start"> <i
                            class="la la-android me-2 ic-2x d-inline-block"></i>
                        <div class="d-inline-block"> <small class="d-block">Android App On</small>
                            Google Play</div>
                    </a>
                </div>
            </div>
            <!-- / .row -->
        </div>
        <!-- / .container -->
    </section>

    <!--hero section end-->

@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div>
                        <h2 class="mb-0"><span class="font-w-4 d-block">Trusted people </span> with FSF</h2>
                    </div>
                </div>
                <div class="col-lg-8 mt-3 mt-lg-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-4">
                            <div class="counter">
                                <div class="counter-desc"> <span class="count-number h2 text-primary" data-to="50"
                                        data-speed="2000">50</span>
                                    <span class="h2 text-primary">+</span>
                                    <h6 class="text-muted mb-0">Support Member</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 mt-2 mt-sm-0">
                            <div class="counter">
                                <div class="counter-desc"> <span class="count-number h2 text-primary" data-to="99"
                                        data-speed="2000">99</span>
                                    <span class="h2 text-primary">+</span>
                                    <h6 class="text-muted mb-0">People Love Us</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 mt-2 mt-sm-0">
                            <div class="counter">
                                <div class="counter-desc"> <span class="count-number h2 text-primary" data-to="120"
                                        data-speed="2000">120</span>
                                    <span class="h2 text-primary">+</span>
                                    <h6 class="text-muted mb-0">Happy Customers</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-6">
                <div class="col-lg-4 col-md-6">
                    <div class="p-5" data-bg-color="#88C5DD">
                        <div class="f-icon"> <i class="flaticon-prototype-1"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Awesome Design</h5>
                        <p class="mb-0">Taking design from FSF design and typography, contemporary page layouts.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                    <div class="p-5" data-bg-color="#ffeff8">
                        <div class="f-icon"> <i class="flaticon-lightbulb"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Easy to Use</h5>
                        <p class="mb-0">Taking design from FSF design and typography, contemporary page layouts.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                    <div class="p-5" data-bg-color="#d3f6fe">
                        <div class="f-icon"> <i class="flaticon-friendship"></i>
                        </div>
                        <h5 class="mt-4 mb-3">User Friendly</h5>
                        <p class="mb-0">Taking design from FSF design and typography, contemporary page layouts.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--feature end-->


    <!--about start-->

    <section class="pb-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-6 mb-6 mb-lg-0">
                    <div class="text-center">
                        <img src="{{ asset('frontend/assets/images/app/section.png') }}" alt="Image"
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div>
                        <h2><span class="font-w-4 d-block">Unlimited features</span> awaiting for you</h2>
                        <p class="lead">We use the latest technologies it voluptatem accusantium doloremque laudantium,
                            totam rem aperiam.</p>
                    </div>
                    <div>
                        <div class="mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3"> <span class="list-dot" data-bg-color="#7550E5"
                                        style="background-color: rgb(1, 164, 121);"></span>
                                </div>
                                <p class="mb-0">Fast Performance technologies it voluptatem</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3"> <span class="list-dot" data-bg-color="#2f2f41"
                                        style="background-color: rgb(47, 47, 65);"></span>
                                </div>
                                <p class="mb-0">Quick Access For Build With Static Bootstarp Code</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-start">
                                <div class="me-3"> <span class="list-dot" data-bg-color="#7550E5"
                                        style="background-color: rgb(1, 164, 121);"></span>
                                </div>
                                <p class="mb-0">Easy to Manage Your All Data access to development</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--about end-->


    <!--testimonial start-->

    <section id="testimonials" class="custom-pt-2 position-relative bg-dark z-index-1">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-5">
                        <h2 class="mb-0 text-white"><span class="font-w-4 d-block">You can see our clients</span> feedback
                            what you say?</h2>
                    </div>
                    <div class="card border-0 bg-transparent">
                        <div class="card-body p-0"> <i
                                class="las la-quote-left ic-2x text-white bg-primary rounded-circle p-1"></i>
                            <p class="font-w-5 lead my-3 text-light">FSF Amazing Landing Page All-in-one, clean code,
                                Crative &amp; Modern design Professional Recommended crofessional and great experience.</p>
                            <div class="d-flex align-items-center">
                                <div>
                                    <img alt="Image" src="{{ asset('frontend/assets/images/testimonial/01.jpg') }}"
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="ms-3">
                                    <h5 class="text-primary mb-0">Raymond Lee</h5>
                                    <small class="text-muted fst-italic">- Founder</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                    <div class="card border-0 bg-transparent">
                        <div class="card-body p-0"> <i
                                class="las la-quote-left ic-2x text-white bg-primary rounded-circle p-1"></i>
                            <p class="font-w-5 lead my-3 text-light">FSF Amazing Landing Page All-in-one, clean code,
                                Crative &amp; Modern design Professional Recommended crofessional and great experience.</p>
                            <div class="d-flex align-items-center">
                                <div>
                                    <img alt="Image" src="{{ asset('frontend/assets/images/testimonial/02.jpg') }}"
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="ms-3">
                                    <h5 class="text-primary mb-0">Dani Karie</h5>
                                    <small class="text-muted fst-italic">- Supervisor</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 bg-transparent mt-5">
                        <div class="card-body p-0"> <i
                                class="las la-quote-left ic-2x text-white bg-primary rounded-circle p-1"></i>
                            <p class="font-w-5 lead my-3 text-light">FSF Amazing Landing Page All-in-one, clean code,
                                Crative &amp; Modern design Professional Recommended crofessional and great experience.</p>
                            <div class="d-flex align-items-center">
                                <div>
                                    <img alt="Image" src="{{ asset('frontend/assets/images/testimonial/03.jpg') }}"
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="ms-3">
                                    <h5 class="text-primary mb-0">Karlo Bond</h5>
                                    <small class="text-muted fst-italic">- Manager</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-1 overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#fff" fill-opacity="1"
                    d="M0,192L34.3,202.7C68.6,213,137,235,206,224C274.3,213,343,171,411,165.3C480,160,549,192,617,192C685.7,192,754,160,823,138.7C891.4,117,960,107,1029,128C1097.1,149,1166,203,1234,202.7C1302.9,203,1371,149,1406,122.7L1440,96L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
                </path>
            </svg>
        </div>
    </section>

    <!--testimonial end-->


    <!--services start-->

    <section id="smart_fetaures">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-12 order-lg-1 mb-5 mb-lg-0">
                    <div class="owl-carousel no-pb" data-dots="false" data-items="1" data-md-items="2"
                        data-sm-items="2" data-autoplay="true">
                        <div class="item">
                            <div class="p-3 m-5 shadow rounded">
                                <img class="img-fluid" src="{{ asset('frontend/assets/images/app/1.png') }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="p-3 m-5 shadow rounded">
                                <img class="img-fluid" src="{{ asset('frontend/assets/images/app/17.png') }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="p-3 m-5 shadow rounded">
                                <img class="img-fluid" src="{{ asset('frontend/assets/images/app/4.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="mb-5">
                        <h2 class="mb-0"><span class="font-w-4 d-block">FSF provide Unique</span> smart features</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <div class="me-3">
                                    <div class="f-icon-s p-3 rounded" data-bg-color="#88C5DD"> <i
                                            class="flaticon-dashboard"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-2">Online Application</h5>
                                    <p class="mb-0">Taking design from FSF design and typography layouts.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5 mt-md-0">
                            <div class="d-flex justify-content-between">
                                <div class="me-3">
                                    <div class="f-icon-s p-3 rounded" data-bg-color="#ffeff8"> <i
                                            class="flaticon-relationship"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-2">User Friendly</h5>
                                    <p class="mb-0">Taking design from FSF design and typography layouts.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="d-flex justify-content-between">
                                <div class="me-3">
                                    <div class="f-icon-s p-3 rounded" data-bg-color="#d3f6fe"> <i
                                            class="flaticon-solution"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-2">Online Donation</h5>
                                    <p class="mb-0">Taking design from FSF design and typography layouts.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="d-flex justify-content-between">
                                <div class="me-3">
                                    <div class="f-icon-s p-3 rounded" data-bg-color="#fff5d9"> <i
                                            class="flaticon-system"></i>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="mb-2">24/7 Support</h5>
                                    <p class="mb-0">Taking design from FSF design and typography layouts.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--services end-->


    <!--newsletter start-->

   @include('frontend.partial.newsletter')

    <!--newsletter end-->
@endsection


@section('scripts')
@endsection

@push('js')
@endpush
