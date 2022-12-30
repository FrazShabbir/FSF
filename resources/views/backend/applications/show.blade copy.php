@extends('backend.main')
@section('title', 'Page')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@push('css')
    <style>
        body {
            scroll-behavior: smooth;
            transition: 0.4s all ease;
        }

        .heading-bottom-line {
            width: 150px;
            height: 2px;
            background: #1f3d73;
        }

        .enroll_show_nav {
            border-radius: 10px;
        }

        .enroll_show_nav .nav-link {
            margin-right: 55px;
            transition: 0.4s all ease;
            border-radius: 10px;
        }

        .enroll_show_nav .nav-link:hover {
            background: #1f3d73;
            color: #fff !important;
        }

        @media screen and (max-width: 576px) {
            .nav-item {
                background: #fff;
                padding-left: 20px !important;
            }
        }
    </style>
@endpush



@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="iq-card">
                        <div class="iq-card-header pt-5 pb-3">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="ml-4">
                                        <img src="{{ asset('frontend/images/fsf-logo.png') }}" width="100px"
                                            alt="DawatIslami Logo">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="text-center">
                                        <p class="mb-0"><i>Funeral Department</i></p>
                                        <h2 class="mb-0"><u>Enrollment: {{$application->application_id}}</u></h2>
                                        <p class="text-uppercase mb-0"><b>Dawateislami</b></p>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="mt-3 text-center">
                                    <p class="mb-0">Check & Audit</p>
                                    <div class="d-flex justify-content-center">
                                        <div class="border p-3"></div>
                                        <div class="border p-3"></div>
                                        <div class="border p-3"></div>
                                    </div>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                        <div class="iq-card-body p-5">
                            <div class="row">
                                <div class="col-12 mb-5">
                                    <nav class="navbar navbar-expand-lg navbar-light bg-light enroll_show_nav">
                                        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#enrol_show_nav" aria-controls="enrol_show_nav"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <div class="collapse navbar-collapse" id="enrol_show_nav">
                                            <ul class="navbar-nav ml-auto">
                                                <li class="nav-item">
                                                    <a class="nav-link ml-0" href="#personal_info">Personal Info</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#residential_relative_info">Residential
                                                        Relative Info</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#native_country_relative_info">Native Country
                                                        Relative Info</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#representative_info">Representative Info</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link mr-0" href="#supplementary_info">Supplementary
                                                        Info</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center mb-5">
                                                <img class="rounded-circle" width="160px"
                                                    src="{{$application->avatar ?? asset('placeholder.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="" id="personal_info">
                                                <div class="mb-4">
                                                    <h3>
                                                        Personal Information <small><span class="badge badge-info"><a href="{{route('users.show',$application->user_id)}}">View User</a> </span> <span class="badge badge-{{$application->status}}">{{$application->status}}</span> <a class="badge badge-{{$application->status}}" href="{{route('application.edit',$application->application_id)}}">Edit</a> <small><span class="badge badge-info">Exp:{{$application->renewal_date}}</span></small></small>
                                                    </h3>
                                                    <div class="heading-bottom-line"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Full Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->full_name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Father's Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->father_name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Sur Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->surname }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Gender</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->gender }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Date of Birth</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->dob }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Passport No.</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->passport_number }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">European Residence Card No.</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->nie }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Native Country</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->native_country }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">ID Card No. (Native Country)</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->native_id }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Address (Native Country)</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->native_country_address }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Cell No.</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->phone }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Email</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->user->email }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Country</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->country->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Community</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->community->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Province</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->province->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">City</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->city->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Area / Street / House No.</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->area }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="" id="residential_relative_info">
                                                <div class="mb-4">
                                                    <h3>
                                                        Residential Relative Information
                                                    </h3>
                                                    <div class="heading-bottom-line"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>
                                                        Relative 1
                                                    </h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Full Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->s_relative_1_name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Relation</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->s_relative_1_relation }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Cell No.</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->s_relative_1_phone }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Complete Address</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->s_relative_1_address }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>
                                                        Relative 2
                                                    </h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Full Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->s_relative_2_address }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Relation</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->s_relative_2_relation }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Cell No.</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->s_relative_2_phone }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Complete Address</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->s_relative_2_address }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="" id="native_country_relative_info">
                                                <div class="mb-4">
                                                    <h3>
                                                        Native Country Relative Information
                                                    </h3>
                                                    <div class="heading-bottom-line"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>
                                                        Relative 1
                                                    </h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Full Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->n_relative_1_name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Relation</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->n_relative_1_relation }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Cell No.</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->n_relative_1_phone }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Complete Address</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->n_relative_1_address }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <h5>
                                                        Relative 2
                                                    </h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Full Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->n_relative_2_name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Relation</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->n_relative_2_relation }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Cell No.</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->n_relative_2_phone }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Complete Address</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->n_relative_2_name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="" id="representative_info">
                                                <div class="mb-4">
                                                    <h3>
                                                        Representative Information
                                                    </h3>
                                                    <div class="heading-bottom-line"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Full Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->rep_name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Sur Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->rep_surname }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Passport No.</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->rep_passport_no }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Cell No.</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->rep_phone }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Complete Address</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->rep_address }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="" id="supplementary_info">
                                                <div class="mb-4">
                                                    <h3>
                                                        Supplementary Information
                                                    </h3>
                                                    <div class="heading-bottom-line"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Where do you want to be buried?
                                                                </p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->buried_location }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Do you have any relatives
                                                                    registered in this fund?</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    {{ $application->registered_relatives=='1'?'Yes':'No' }}</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">How much will you pay annually
                                                                    into this fund?</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">
                                                                    <span class="font-weight-bold mr-1">€</span>{{ $application->annually_fund_amount }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Signature</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <img class="mb-0 float-right font-weight-bold img-fluid" style="max-width: 300px"
                                                                    src="{{ $application->user_signature }}" alt="signatures">
                                                                {{-- <p class="mb-0 float-right font-weight-bold">{{$application->full_name}}</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            @if ($application->registered_relatives == 1)
                                                @php
                                                    $relative = App\Models\Application::where('passport_number', $application->registered_relative_passport_no)->first();
                                                @endphp

                                                <div class="" id="relative_registers">
                                                    <div class="mb-4">
                                                        <h3>
                                                            Registered Relative
                                                        </h3>
                                                        <div class="heading-bottom-line"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="row mb-4">
                                                                <div class="col-6">
                                                                    <p class="mb-0 text-dark">Full Name</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="mb-0 float-right font-weight-bold">
                                                                        {{ $relative->full_name }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="row mb-4">
                                                                <div class="col-6">
                                                                    <p class="mb-0 text-dark">Father Name</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="mb-0 float-right font-weight-bold">
                                                                        {{ $relative->father_name }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="row mb-4">
                                                                <div class="col-6">
                                                                    <p class="mb-0 text-dark">Passport No.</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="mb-0 float-right font-weight-bold">
                                                                        {{ $relative->passport_number }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="row mb-4">
                                                                <div class="col-6">
                                                                    <p class="mb-0 text-dark">Cell No.</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="mb-0 float-right font-weight-bold">
                                                                        {{ $relative->phone }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="row mb-4">
                                                                <div class="col-6">
                                                                    <p class="mb-0 text-dark">Complete Address</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="mb-0 float-right font-weight-bold">
                                                                        {{ $relative->area }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif



                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Application Tree</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">

                                <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                                    aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr>

                                            <th>Comments</th>
                                            <th>Status</th>
                                            <th>Done By</th>
                                            <th>Date</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($application->comments as $comment)
                                        <tr>
                                            <td>{{$comment->comment}}</td>
                                            <td><span class="badge badge-{{$comment->status}}">{{$comment->status}}</span></td>
                                            <td>{{$comment->user->full_name ?? $application->user->full_name}}</td>
                                            <td>{{date('d-M-Y',strtotime($comment->created_at))}}</td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                @if ($application->donations)
                @include('backend.partials.common._donation_stats',['data'=>$application])
                @endif

                @if ($application->status=='PERMANENT-CLOSED')
                @include('backend.partials.common.applicationClosedStats',['data'=>$application])
                @endif

            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection

@push('js')
@endpush
