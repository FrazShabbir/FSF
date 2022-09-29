@extends('backend.main')
@section('title', 'Page')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@push('css')
    <style>
        .heading-bottom-line{
            width: 150px;
            height: 2px;
            background: #1f3d73;
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
                                        <h2 class="mb-0"><u>User Registration Form</u></h2>
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
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center mb-5">
                                                <img class="rounded-circle" width="160px" src="http://i.pravatar.cc/500?img=7" alt="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="">
                                                <div class="mb-4">
                                                    <h3>
                                                        Personal Information
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
                                                                <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Father's Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="row mb-4">
                                                            <div class="col-6">
                                                                <p class="mb-0 text-dark">Sur Name</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Gender</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Date of Birth</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Passport No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">European Residence Card No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Native Country</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">ID Card No. (Native Country)</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Address (Native Country)</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Cell No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Email</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Country</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Community</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Province</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">City</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Area / Street / House No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
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
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Relation</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Cell No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Complete Address</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
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
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Relation</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Cell No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Complete Address</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
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
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Relation</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Cell No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Complete Address</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
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
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Relation</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Cell No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Complete Address</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
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
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Sur Name</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Passport No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Cell No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Complete Address</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
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
                                                            <p class="mb-0 text-dark">Where do you want to be buried?</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Do you have any relatives registered in this fund?</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <h5>
                                                                Registered Relative
                                                            </h5>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Full Name</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Father's Name</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Relation</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Cell No.</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Complete Address</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">How much will you pay annually into this fund?</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <p class="mb-0 text-dark">Signature</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <img class="mb-0 float-right font-weight-bold" src="" alt="signatures">
                                                            {{-- <p class="mb-0 float-right font-weight-bold">Saad Ahmad</p> --}}
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection

@push('js')

@endpush
