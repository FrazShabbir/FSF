@extends('frontend.main')
@section('title', getFullNameById($profile->id))

@section('styles')
<link rel="stylesheet" href="{{asset('frontend/assets/css/profiles/default.css')}}">
@endsection


@section('extra_class')
contact-page-navbar
@endsection

@section('banner')

@endsection
@section('content')
<section class="pt-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <div class="">
                    <div class="card_top_header">

                        <div class="card_profile_img">
                            <img class="picture" src="{{ asset($profile->avatar ?? 'https://www.treasury.gov.ph/wp-content/uploads/2022/01/male-placeholder-image.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="card_personal_content">
                        <h3 class="">
                            {{ getFullNameById($profile->id) }}
                        </h3>
                        <h5 class="mt-2">
                            {{ $profile->designation }}
                        </h5>
                        <p class="company mt-1 text-white">
                            {{ $profile->organization }}
                        </p>

                        <p class="company mt-1 text-white">
                            {{ $profile->address }}
                        </p>

                        {{-- <p class="mt-4 mb-2 text-white">
                            {{ $profile->bio }}
                        </p> --}}
                    </div>
                    <hr>

                    <div class="row mb-4">
                        <div class="col-md-4 col-sm-8 offset-md-4 col-sm-offset-2">
                            <a class="btn btn-lg btn-white" href="tel:{{$profile->phones->count()? $profile->phones->first()->phone : ""}}" role="button"> <i class="fa mr-2 fa-phone"> </i> Call </a>
                            @if($profile->emails->count())
                            <a class="btn btn-lg btn-white" href="mailto:{{$profile->emails? $profile->emails->first()->email : ""}}" role="button"> <i class="fa mr-2 fa-envelope"> </i> Email </a>
                            @endif
                        </div>

                    </div>

                    @if (checkSocials($profile->id) == true)

                    <div class="text-center mb-4">
                        @if ($profile->facebook)
                        <a class="" href="https://www.facebook.com/{{ $profile->facebook }}"><i class="text-white fa-2x fab fa-facebook"></i></a>
                        &nbsp;
                        @endif
                        @if ($profile->instagram)
                        <a class="" href="https://www.instagram.com/{{ $profile->instagram }}"><i class="text-white fa-2x fab fa-instagram"></i> </a>
                        &nbsp;
                        @endif
                        @if ($profile->twitter)
                        <a class="" href="https://www.twitter.com/{{ $profile->twitter }}"><i class="text-white fa-2x fab fa-twitter"></i> </a>
                        &nbsp;
                        @endif
                        @if ($profile->google)
                        <a class="" href="https://www.google.com/{{ $profile->google }}"><i class="text-white fa-2x fab fa-google"></i> </a>
                        &nbsp;
                        @endif
                        @if ($profile->tiktok)
                        <a class="" href="https://www.tiktok.com/{{ $profile->tiktok }}"><i class="text-white fa-2x fab fa-tiktok"></i></a>
                        &nbsp;
                        @endif
                        @if ($profile->youtube)
                        <a class="" href="https://www.youtube.com/{{ $profile->youtube }}"><i class="text-white fa-2x fab fa-youtube"></i></a>
                        &nbsp;
                        @endif
                        @if ($profile->pinterest)
                        <a class="" href="https://www.pinterest.com/{{ $profile->pinterest }}"><i class="text-white fa-2x fab fa-pinterest"></i> </a>
                        &nbsp;
                        @endif
                        @if ($profile->linkedin)

                        <a class="" href="https://www.linkedin.com/in/{{ $profile->linkedin }}"><i class="text-white fa-2x fab fa-linkedin"></i></a>
                        &nbsp;
                        @endif

                    </div>

                    @endif

                    {{-- <div class="">
                            <p class="sub_p_heading mb-4 text-white">Contact Information</p>
                        </div> --}}
                    <div class="contact_links">
                        @foreach($profile->phones as $phone)
                        <div class="row low_margin">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <a class="" href="tel:{{ $phone->phone }}"><i class="fa text-white mr-2 fa-phone-alt"></i> <span class="text-white">{{ $phone->phone }} </span> <span class="badge badge-secondary"> {{ $phone->type }} </span></a>
                            </div>
                        </div>
                        @endforeach



                        {{-- <p class="sub_p_heading mb-4 text-white">Email(s)</p> --}}

                        @foreach($profile->emails as $row)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <a class="" href="mailto:{{ $row->email }}"><i class="fa text-white mr-2 fa-envelope"></i> <span class="text-white">{{ $row->email }} </span> <span class="badge badge-secondary"> {{ $row->type }} </span></a>
                            </div>
                        </div>
                        @endforeach

                        @foreach($profile->websites as $row)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <a class="" target="_blank" href="{{ away($row->website) }}"> <span class="text-white"> <i class="fa mr-2 fa-globe"></i> {{ $row->website }} </span> </a>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div class="contact_links">
                        <div class="row mt-5">
                            <div class="col-md-4 col-sm-8 offset-md-4 col-sm-offset-2">
                                <a role="button" class="btn btn-white" href="{{ route('downloadVCard', $profile->username) }}"> <i class=" fa fa-download"></i> Save Contact </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>



@section('scripts')
@endsection

@push('js')
@endpush
