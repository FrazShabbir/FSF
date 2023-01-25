@extends('frontend.main')
@section('title', 'Index Page')

@section('styles')
@endsection

@push('css')
@endpush

@section('extra_class')

@endsection

@section('banner')
@include('frontend.partial._navbar')

<section class="hero-banner position-relative custom-pt-1 custom-pb-2 bg-dark" data-bg-img="{{asset('frontend/assets/images/bg/02.png')}}">
    <div class="container">
      <div class="row text-white text-center z-index-1">
        <div class="col">
          <h1 class="text-white">Contact Us</h1> 
        </div>
      </div>
      <!-- / .row -->
    </div>
    <!-- / .container -->
    <div class="shape-1 bottom">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1" d="M0,288L48,288C96,288,192,288,288,266.7C384,245,480,203,576,208C672,213,768,267,864,245.3C960,224,1056,128,1152,96C1248,64,1344,96,1392,112L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </section>
@endsection
@section('content')
<section>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12">
          <div class="d-flex align-items-center bg-white p-3 shadow-sm rounded">
            <div class="me-3">
              <div class="f-icon-s p-3 rounded" data-bg-color="#88C5DD"> <i class="flaticon-location"></i>
              </div>
            </div>
            <div>
              <h5 class="mb-1">Address:</h5>
              <span class="text-black">Road Wordwide Country, USA</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-3 mt-lg-0">
          <div class="d-flex align-items-center bg-white p-3 shadow-sm rounded">
            <div class="me-3">
              <div class="f-icon-s p-3 rounded" data-bg-color="#88C5DD"> <i class="flaticon-mail"></i>
              </div>
            </div>
            <div>
              <h5 class="mb-1">Email Us:</h5>
              <a class="btn-link" href="mailto:themeht23@gmail.com"> themeht23@gmail.com</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-3 mt-lg-0">
          <div class="d-flex align-items-center bg-white p-3 shadow-sm rounded">
            <div class="me-3">
              <div class="f-icon-s p-3 rounded" data-bg-color="#88C5DD"> <i class="flaticon-telephone"></i>
              </div>
            </div>
            <div>
              <h5 class="mb-1">Call Us:</h5>
              <a class="btn-link" href="tel:+912345678900">+91-234-567-8900</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="py-0">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div>
            <div>
              <h2><span class="font-w-4 d-block">Describe your project</span> and
  leave us your contact info</h2>
              <p class="lead">Get in touch and let us know how we can help.</p>
            </div>
            <form id="contact-form" class="row" method="post" action="php/contact.php">
              <div class="messages"></div>
              <div class="form-group col-md-6">
                <input id="form_name" type="text" name="name" class="form-control" placeholder="First Name" required="required" data-error="Name is required.">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-md-6">
                <input id="form_name1" type="text" name="name" class="form-control" placeholder="Last Name" required="required" data-error="Name is required.">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-md-6">
                <input id="form_email" type="email" name="email" class="form-control" placeholder="Email" required="required" data-error="Valid email is required.">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-md-6">
                <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Phone" required="required" data-error="Phone is required">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-md-6">
                <select class="form-control">
                  <option>- Select Service</option>
                  <option>Consulting</option>
                  <option>Finance</option>
                  <option>Marketing</option>
                  <option>Avanced Analytics</option>
                  <option>planning</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <input id="form_subject" type="tel" name="subject" class="form-control" placeholder="Subject" required="required" data-error="Subject is required">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-md-12">
                <textarea id="form_message" name="message" class="form-control h-auto" placeholder="Message" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                <div class="help-block with-errors"></div>
              </div>
              <div class="col mt-4">
                <button class="btn btn-primary">Send Messages</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-12 col-lg-6 mt-5 mt-lg-0">
          <div class="map h-100">
            <iframe class="w-100 h-100 border-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.840108181602!2d144.95373631539215!3d-37.8172139797516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1497005461921" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  
  <!--newsletter start-->
  
  @include('frontend.partial.newsletter')

  
  <!--newsletter end-->
@endsection


@section('scripts')
@endsection

@push('js')
@endpush