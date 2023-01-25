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

@endsection
@section('content')
     <!-- Contact Section -->
     <section class="contact bg-grey" id="contact">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-12 col-md-5">
                    
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