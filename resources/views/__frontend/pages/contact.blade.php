@extends('frontend.main')
@section('title', 'Index Page')

@section('styles')
@endsection

@push('css')
@endpush

@section('extra_class')
contact-page-navbar
@endsection

@section('banner')
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d196344.1371271128!2d-104.8616648!3d39.7424105!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c7eb83b813ed1%3A0x401bdfcb1ed16e1a!2sDenver%20Botanic%20Gardens!5e0!3m2!1sen!2s!4v1616253609220!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>

</div>
@endsection
@section('content')
     <!-- Contact Section -->
     <section class="contact bg-grey" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="section-title">
                        <h2>Stay Tuned</h2>
                        <p class="mt-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5">
                    <div class="contact-us">
                        <p class="mb-3">
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                            Latin literature from 45 BC, making it over 2000 years old.
                        </p>
                        <ul class="contact-info">
                            <li class="py-2">
                                <a class="media" href="#ew">
                                    <div class="social-icon mr-3">
                                        <i class="fas fa-home"></i> 
                                    </div>
                                    <span class="media-body align-self-center">Vestibulum nulla libero, convallis, tincidunt suscipit diam, DC 2002</span>
                                </a>
                            </li>
                            <li class="py-2">
                                <a class="media" href="#we">
                                    <div class="social-icon mr-3">
                                        <i class="fas fa-phone-alt"></i> 
                                    </div>
                                    <span class="media-body align-self-center">+1 230 456 789-012 345 6789</span>
                                </a>
                            </li>
                            <li class="py-2">
                                <a class="media" href="#we">
                                    <div class="social-icon mr-3">
                                        <i class="fas fa-envelope"></i> 
                                    </div>
                                    <span class="media-body align-self-center">dummy@lifo.com</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 offset-md-1 pt-4 pt-md-0">
                    <div class="contact-form">
                        <form method="POST" class="needs-validation" id="contact-form" novalidate>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name" required="required">
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subect" placeholder="Subject" required="required">
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-lg btn-block mt-3">
                                        <span class="text-white pr-3">
                                            <i class="fas fa-paper-plane"></i> 
                                        </span>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Ends -->
@endsection


@section('scripts')
@endsection

@push('js')
@endpush