@extends('frontend.main')
@section('title', 'Index Page')

@section('styles')
@endsection

@push('css')
@endpush
@section('banner')
<div class="main-banner" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="banner-content align-middle">
                    <h1>Make cool contact cards with vCard</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt
                        molestias accusamus harum ullam tempore debitis et, expedita, repellat delectus aspernatur neque itaque qui quod.
                    </p>
                    <div class="banner-button">
                        <a href="#google"><img src="{{asset('frontend/assets/images/Storebutton/app-store.png')}}" alt="app-store"></a>
                        <a href="#google-play"><img src="{{asset('frontend/assets/images/Storebutton/google-play.png')}}" alt="google-play"></a>
                    </div>
                    <p class="banner-span mt-3">* Available on iPhone, iPad and all Android devices</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="banner-img text-center align-middle">
                    <img src="{{asset('frontend/assets/images/Services/thumb-1.png')}}" class="banner-img-sizing" alt="welcome">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

        <!-- Counter Section -->
        <section class="counter bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-content">
                            <div class="counter-item">
                                <span data-toggle="counter-up">232</span>
                                <span>M</span>
                            </div>
                            <h5 class="mt-lg-4 mb-lg-0 mb-4">Themes</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-content sm-none">
                            <div class="counter-item">
                                <span data-toggle="counter-up">132</span>
                                <span>K</span>
                            </div>
                            <h5 class="mt-lg-4 mb-lg-0 mb-4">Downloads</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-content">
                            <div class="counter-item">
                                <span data-toggle="counter-up">432</span>
                                <span>M</span>
                            </div>
                            <h5 class="mt-lg-4 mb-lg-0 mb-4">Customer</h5>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="counter-content c-4">
                            <div class="counter-item">
                                <span data-toggle="counter-up">100</span>
                                <span>K</span>
                            </div>
                            <h5 class="mt-lg-4 mb-lg-0 mb-4">Testimonials</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Counter Ends -->

        <!-- About Section -->
        <section class="about" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="section-title">
                            <h2>What Makes vCard Different?</h2>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="image-box p-5 text-center">
                            <div class="icon-img mb-3">
                                <img src="{{asset('frontend/assets/images/About/layers.png')}}" alt="layers">
                            </div>
                            <div class="icon-text">
                                <h3 class="mb-2">User Friendly</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis culpa expedita dignissimos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="image-box p-5 my-md-0 my-4 text-center">
                            <div class="icon-img mb-3">
                                <img src="{{asset('frontend/assets/images/About/speak.png')}}" alt="speak">
                            </div>
                            <div class="icon-text">
                                <h3 class="mb-2">vCard Support</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis culpa expedita dignissimos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="image-box p-5 mt-md-4 mt-lg-0 text-center">
                            <div class="icon-img mb-3">
                                <img src="{{asset('frontend/assets/images/About/lock.png')}}" alt="lock">
                            </div>
                            <div class="icon-text">
                                <h3 class="mb-2">Secure Data</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis culpa expedita dignissimos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Abont Ends -->

        <!-- Manage Section -->
        <section class="service bg-grey" id="services">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-6 order-2 order-lg-1">
                        <div class="service-text">
                            <h2 class="m-adjust mb-4">How vCard Make your Life Style Easy</h2>
                            <ul>
                                <li class="media py-2">
                                    <div class="service-icon mr-4">
                                        <i class="fab fa-buffer"></i>
                                    </div>
                                    <div class="media-body">
                                        <p>Fully layered dolor sit amet, consectetur adipisicing elit. Facere, nobis, id expedita dolores officiis laboriosam.</p>
                                    </div>
                                </li>
                                <li class="media py-2">
                                    <div class="service-icon mr-4">
                                        <i class="fas fa-brush"></i>
                                    </div>
                                    <div class="media-body">
                                        <p>Customizable design dolor sit amet, consectetur adipisicing elit. Facere, nobis, id expedita dolores officiis laboriosam.</p>
                                    </div>
                                </li>
                                <li class="media py-2">
                                    <div class="service-icon mr-4">
                                        <i class="fas fa-burn"></i>
                                    </div>
                                    <div class="media-body">
                                        <p>Drop ipsum dolor sit amet, consectetur adipisicing elit. Facere, nobis, id expedita dolores officiis laboriosam.</p>
                                    </div>
                                </li>
                                <li class="media py-2">
                                    <div class="service-icon mr-4">
                                        <i class="fas fa-cart-arrow-down"></i>
                                    </div>
                                    <div class="media-body">
                                        <p>Marketing chart dolor sit amet, consectetur adipisicing elit. Facere, nobis, id expedita dolores officiis laboriosam.</p>
                                    </div>
                                </li>
                            </ul>
                            <a href="#learn" class="btn btn-borderd mt-4"> Learn More </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 order-1 order-lg-2 d-none d-lg-block">
                        <div class="service-img mx-auto">
                            <img src="{{asset('frontend/assets/images/welcome-mockup.png')}}" class="service-sec-img" alt="thumb">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Manage Ends -->

        <!-- Download Section -->
        <section class="download-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-9">
                        <div class="download-text text-center">
                            <h2 class="text-white">vCard is available for all devices</h2>
                            <p class="text-white my-3 d-none d-sm-block">
                                vCard is available for all devices, consectetur adipisicing elit. Itaque at harum quam explicabo.
                                Aliquam optio, delectus, dolorem quod neque eos totam. Delectus quae animi tenetur voluptates doloribus commodi
                                dicta modi aliquid deserunt, quis maiores nesciunt autem, aperiam natus.
                            </p>
                            <p class="text-white my-3 d-block d-sm-none">
                                vCard is available for all devices, consectetur adipisicing elit. Itaque at harum quam explicabo.
                                Aliquam optio, delectus, dolorem quod neque eos totam. Delectus quae animi tenetur voluptates doloribus commodi
                                dicta modi aliquid deserunt, quis maiores nesciunt autem, aperiam natus.
                            </p>
                            <div class="button-group justify-content-center">
                                <a href="#play" class="my-sm-1"><img src="{{asset('frontend/assets/images/Storebutton/google-play.png')}}" alt="play"></a>
                                <a href="#app" class="my-sm-1"><img src="{{asset('frontend/assets/images/Storebutton/app-store.png')}}" alt="app"></a>
                            </div>
                            <p class="banner-span mt-3">* Available on iPhone, iPad and all Android devices</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Download Ends -->

        <!-- Discover Section -->
        <section class="discover-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-6 order-2 order-lg-1">
                        <div class="discover-img mt-5 mt-lg-0">
                            <img src="{{asset('frontend/assets/images/Services/iphone_x.png')}}" class="img-fluid" alt="Discover">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 order-1 order-lg-2">
                        <div class="discover-text">
                            <h2 class="pb-4 m-adjust pb-sm-0">Easily commun with clients using vCard.</h2>
                            <p class="d-none d-sm-block pt-3 pb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam architecto modi nulla velit itaque minima deserunt esse qui, praesentium ad ea? Optio facere esse dolorum aspernatur modi.</p>
                            <ul class="check-list">
                                <li class="py-2">
                                    <div class="box-list media">
                                        <div class="icon align-self-center"><i class="fas fa-check"></i></div>
                                        <div class="media-body pl-3">
                                            <p>Combined with a handful of model sentence structures looks reasonable.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="box-list media">
                                        <div class="icon align-self-center"><i class="fas fa-check"></i></div>
                                        <div class="media-body pl-3">
                                            <p>Combined with a handful of model sentence structures looks reasonable.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="box-list media">
                                        <div class="icon align-self-center"><i class="fas fa-check"></i></div>
                                        <div class="media-body pl-3">
                                            <p>Combined with a handful of model sentence structures looks reasonable.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="box-list media">
                                        <div class="icon align-self-center"><i class="fas fa-check"></i></div>
                                        <div class="media-body pl-3">
                                            <p>Combined with a handful of model sentence structures looks reasonable.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="icon-box d-flex mt-3">
                                <div class="service-icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="service-icon mx-3">
                                    <i class="fas fa-envelope-open"></i>
                                </div>
                                <div class="service-icon">
                                    <i class="fas fa-video"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Discover Ends -->

        <!-- How It Works Section-->
        <section class="how_it_works">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="section-title">
                            <h2 class="text-white">How vCard works?</h2>
                            <p class="text-white my-3 mt-sm-4 mb-sm-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4 ">
                        <div class="single-work text-center px-3">
                            <div class="work-img">
                                <img src="{{asset('frontend/assets/images/works/download.png')}}" class="sizing" alt="work1">
                            </div>
                            <h3 class="text-white py-3">Install the App</h3>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius saepe, voluptates quis enim incidunt obcaecati?</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 ">
                        <div class="single-work text-center my-5 my-md-0 px-3">
                            <div class="work-img">
                                <img src="{{asset('frontend/assets/images/works/settings.png')}}" class="sizing" alt="work1">
                            </div>
                            <h3 class="text-white py-3">Setup your profile</h3>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius saepe, voluptates quis enim incidunt obcaecati?</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 ">
                        <div class="single-work after-none text-center px-3">
                            <div class="work-img">
                                <img src="{{asset('frontend/assets/images/works/app.png')}}" class="sizing" alt="work1">
                            </div>
                            <h3 class="text-white py-3">Enjoy the features!</h3>
                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius saepe, voluptates quis enim incidunt obcaecati?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- How It Works Ends -->

        <!-- ScreenShots Section -->
        {{-- <section class="screenshots">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="section-title">
                            <h2>Simple & Beautiful Interface</h2>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                              <img src="{{asset('frontend/assets/images/ScreenShots/1.jpg')}}" class="img-fluid" alt="ScreenShot1">
                            </div>
                            <div class="item">
                                <img src="{{asset('frontend/assets/images/ScreenShots/2.jpg')}}" class="img-fluid" alt="ScreenShot2">
                            </div>
                            <div class="item">
                                <img src="{{asset('frontend/assets/images/ScreenShots/3.jpg')}}" class="img-fluid" alt="ScreenShot3">
                            </div>
                            <div class="item">
                                <img src="{{asset('frontend/assets/images/ScreenShots/4.jpg')}}" class="img-fluid" alt="ScreenShot4">
                            </div>
                            <div class="item">
                                <img src="{{asset('frontend/assets/images/ScreenShots/5.jpg')}}" class="img-fluid" alt="ScreenShot5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- ScreenShots Ends -->

        <!-- Testimonial Section -->
        <section class="testimonial">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="section-title">
                            <h2>What Our Customers Are Saying</h2>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-card card">
                            <div class="card-top p-4">
                                <div class="card-icons">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                </div>
                                <h4 class="text-color mt-4 mb-3">Excellent service & support!!</h4>
                                <div class="card-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nam id facilis, provident doloremque placeat eveniet molestias laboriosam. Optio, esse.</p>
                                </div>
                                <div class="card-quote">
                                    <img src="{{asset('frontend/assets/images/Testimonial/quote.png')}}" alt="Quote">
                                </div>
                            </div>
                            <div class="client media p-4 bg-grey">
                                <div class="client-img">
                                    <img src="{{asset('frontend/assets/images/Testimonial/avatar-1.png')}}" alt="CLient1">
                                </div>
                                <div class="client-info media-body ml-4 align-self-center">
                                    <h5 class="client-name mb-2">Junaid Hasan</h5>
                                    <h6 class="secondary-text">CEO, Themeland</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-card card my-4 my-md-0">
                            <div class="card-top p-4">
                                <div class="card-icons">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                                <h4 class="text-color mt-4 mb-3">Nice work! Keep it up</h4>
                                <div class="card-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nam id facilis, provident doloremque placeat eveniet molestias laboriosam. Optio, esse.</p>
                                </div>
                                <div class="card-quote">
                                    <img src="{{asset('frontend/assets/images/Testimonial/quote.png')}}" alt="Quote">
                                </div>
                            </div>
                            <div class="client media p-4 bg-grey">
                                <div class="client-img">
                                    <img src="{{asset('frontend/assets/images/Testimonial/avatar-2.png')}}" alt="CLient1">
                                </div>
                                <div class="client-info media-body ml-4 align-self-center">
                                    <h5 class="client-name mb-2">Junaid Hasan</h5>
                                    <h6 class="secondary-text">CEO, Themeland</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-card card mt-md-4 mt-lg-0">
                            <div class="card-top p-4">
                                <div class="card-icons">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                </div>
                                <h4 class="text-color mt-4 mb-3">Great support!!</h4>
                                <div class="card-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis nam id facilis, provident doloremque placeat eveniet molestias laboriosam. Optio, esse.</p>
                                </div>
                                <div class="card-quote">
                                    <img src="{{asset('frontend/assets/images/Testimonial/quote.png')}}" alt="Quote">
                                </div>
                            </div>
                            <div class="client media p-4 bg-grey">
                                <div class="client-img">
                                    <img src="{{asset('frontend/assets/images/Testimonial/avatar-3.png')}}" alt="CLient1">
                                </div>
                                <div class="client-info media-body ml-4 align-self-center">
                                    <h5 class="client-name mb-2">Junaid Hasan</h5>
                                    <h6 class="secondary-text">CEO, Themeland</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial Ends -->

        <!-- Pricing Section -->
        {{-- <section class="pricing bg-grey" id="pricing">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="section-title">
                            <h2>Unlock Full Power Of vCard</h2>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-lg-8">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="single-pricing-plan text-center my-3 p-5">
                                    <div class="price-img">
                                        <img src="{{asset('frontend/assets/images/Pricing/basic.png')}}" alt="basic">
                                    </div>
                                    <div class="price-title my-2 my-sm-3">
                                        <h4 class="text-uppercase">Basic</h4>
                                    </div>
                                    <div class="pricings pb-2 pb-sm-3">
                                        <h2><small>$</small>46</h2>
                                    </div>
                                    <div class="price-description">
                                        <ul class="price-features">
                                            <li class="border-top py-3">5GB Linux Web Space</li>
                                            <li class="border-top py-3">5 MySQL Databases</li>
                                            <li class="border-top py-3">24/7 Tech Support</li>
                                            <li class="border-top border-bottom py-3">Daily Backups</li>
                                        </ul>
                                    </div>
                                    <div class="price-button">
                                        <a href="#" class="btn mt-4">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mt-4 mt-md-0">
                                <div class="single-pricing-plan text-center my-3 p-5">
                                    <div class="price-img">
                                        <img src="{{asset('frontend/assets/images/Pricing/premium.png')}}" alt="basic">
                                    </div>
                                    <div class="price-title my-2 my-sm-3">
                                        <h4 class="text-uppercase">Pro</h4>
                                    </div>
                                    <div class="pricings pb-2 pb-sm-3">
                                        <h2><small>$</small>126</h2>
                                    </div>
                                    <div class="price-description">
                                        <ul class="price-features">
                                            <li class="border-top py-3">10GB Linux Web Space</li>
                                            <li class="border-top py-3">50 MySQL Databases</li>
                                            <li class="border-top py-3">Unlimited Email</li>
                                            <li class="border-top border-bottom py-3">Daily Backups</li>
                                        </ul>
                                    </div>
                                    <div class="price-button">
                                        <a href="#" class="btn mt-4">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center pt-5">
                    <p class="text-body pt-4 fw-5">Not sure what to choose? <a href="contact.html">Contact Us</a></p>
                </div>
            </div>
        </section> --}}
        <!-- Pricing Ends -->

        <!-- Team Section -->
        {{-- <section class="team pb-40">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="section-title">
                            <h2>Our Team Experts</h2>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="single-team text-center mb-30">
                            <div class="team-img d-inline-block">
                                <img src="{{asset('frontend/assets/images/Team/team-1.png')}}" class="img-fluid" alt="team1">
                                <div class="team-overlay">
                                    <h4 class="team-name text-white">Junaid Hasan</h4>
                                    <h6 class="team-post text-white mt-2 mb-3">Founder $ CEO</h6>
                                    <div class="team-icons">
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-facebook-f"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-twitter"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-google-plus-g"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="single-team text-center mb-30">
                            <div class="team-img d-inline-block">
                                <img src="{{asset('frontend/assets/images/Team/team-2.png')}}" class="img-fluid" alt="team1">
                                <div class="team-overlay">
                                    <h4 class="team-name text-white">Jassica William</h4>
                                    <h6 class="team-post text-white mt-2 mb-3">Co-Founder</h6>
                                    <div class="team-icons">
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-facebook-f"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-twitter"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-google-plus-g"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="single-team text-center mb-30">
                            <div class="team-img d-inline-block">
                                <img src="{{asset('frontend/assets/images/Team/team-3.png')}}" class="img-fluid" alt="team1">
                                <div class="team-overlay">
                                    <h4 class="team-name text-white">Md. Arham</h4>
                                    <h6 class="team-post text-white mt-2 mb-3">Web Developer</h6>
                                    <div class="team-icons">
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-facebook-f"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-twitter"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-google-plus-g"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="single-team text-center mb-30">
                            <div class="team-img d-inline-block">
                                <img src="{{asset('frontend/assets/images/Team/team-4.png')}}" class="img-fluid" alt="team1">
                                <div class="team-overlay">
                                    <h4 class="team-name text-white">Yasmin Akter</h4>
                                    <h6 class="team-post text-white mt-2 mb-3">Graphic Designer</h6>
                                    <div class="team-icons">
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-facebook-f"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-twitter"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-google-plus-g"></i></a>
                                        <a href="#facebook" class="p-2 text-white"><i class="fab i fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Team Section Ends -->


        <!-- Blog Section -->
        {{-- <section class="blog-section" id="blog">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="section-title">
                            <h2>Blogs</h2>
                            <p class="mt-4">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="blog mb-30">
                            <div class="blog-img">
                                <img src="{{asset('frontend/assets/images/Blogs/1.jpg')}}" alt="blog1">
                            </div>
                            <div class="blog-txt">
                                <div class="blog-sub-txt">
                                    <a href="#" class="mr-2"><i class="mr-2 far fa-calendar-alt"></i>17 Jan 2021</a>
                                    <a class="float-right" href="#"><i class="mr-2 fas fa-comments"></i>13</a>
                                </div>
                                <div class="blog-heading">
                                    <a href="blogs-detail.html">This is a standard post</a>
                                </div>
                                <div class="blog-detail-txt">
                                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs ... <a href="blogs-detail.html"><b>Read More</b></a></p>
                                </div>
                                <div class="blog-read-more">
                                    <a href="#"><b>By Admin</b></a>
                                    <a href="#" class="blog-time">10 hours ago</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="blog mb-30">
                            <div class="blog-img">
                                <img src="{{asset('frontend/assets/images/Blogs/2.jpg')}}" alt="blog1">
                            </div>
                            <div class="blog-txt">
                                <div class="blog-sub-txt">
                                    <a href="#" class="mr-2"><i class="mr-2 far fa-calendar-alt"></i>18 Jan 2021</a>
                                    <a class="float-right" href="#"><i class="mr-2 fas fa-comments"></i>23</a>
                                </div>
                                <div class="blog-heading">
                                    <a href="blogs-detail.html">How often you read?</a>
                                </div>
                                <div class="blog-detail-txt">
                                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs ... <a href="blogs-detail.html"><b>Read More</b></a></p>
                                </div>
                                <div class="blog-read-more">
                                    <a href="#"><b>By Admin</b></a>
                                    <a href="#" class="blog-time">24 hours ago</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="blog mb-30">
                            <div class="blog-img">
                                <img src="{{asset('frontend/assets/images/Blogs/3.jpg')}}" alt="blog1">
                            </div>
                            <div class="blog-txt">
                                <div class="blog-sub-txt">
                                    <a href="#" class="mr-2"><i class="mr-2 far fa-calendar-alt"></i>15 Jan 2021</a>
                                    <a class="float-right" href="#"><i class="mr-2 fas fa-comments"></i>43</a>
                                </div>
                                <div class="blog-heading">
                                    <a href="blogs-detail.html">Business is very easy</a>
                                </div>
                                <div class="blog-detail-txt">
                                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs ... <a href="blogs-detail.html"><b>Read More</b></a></p>
                                </div>
                                <div class="blog-read-more">
                                    <a href="#"><b>By Admin</b></a>
                                    <a href="#" class="blog-time">2 days ago</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="show-more text-center">
                            <a href="blog.html" class="btn">Show More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Blog Ends -->

        <!-- Subscribe Section -->
        {{-- <section class="subscribe" id="subscribe">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="subscribe-content text-center">
                            <h2 class="m-adjust">Subscribe to get updates</h2>
                            <p class="my-4">
                                By subscribing you will get newsleter, promotions adipisicing elit. Architecto beatae, asperiores tempore repudiandae saepe aspernatur unde voluptate sapiente quia ex.
                            </p>
                            <form class="subscribe-form">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                                <button type="submit" class="btn btn-lg btn-block">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Subscribe Ends -->
@endsection


@section('scripts')
@endsection

@push('js')
@endpush
