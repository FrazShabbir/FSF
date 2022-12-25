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
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="section-title">
                        <h2>Welcome Back</h2>
                        <p class="mt-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 pt-4 pt-md-0">
                    <div class="">
                        <form  action="{{route('login')}}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-12">

                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="*****" required="required">
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-lg btn-block mt-3">
                                        Login
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
