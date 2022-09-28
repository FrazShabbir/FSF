@extends('backend.main')
@section('title', 'Page')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@push('css')
    <style>
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
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <p class="mb-0 font-weight-bold text-dark">Full Name</p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="mb-0">Saad Ahmad</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <p class="mb-0 font-weight-bold text-dark">Full Name</p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="mb-0">Saad Ahmad</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <p class="mb-0 font-weight-bold text-dark">Full Name</p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="mb-0">Saad Ahmad</p>
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
