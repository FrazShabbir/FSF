@extends('members.main')
@section('title', 'Dashboard')

@section('styles')
    <style>
        /* body {
            margin-top:40px;
        } */
        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        /* .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;
        } */
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .setup-content {
            display: block;
            width: 100% !important;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        #sig-canvas {
            border: 2px dotted #CCCCCC;
            border-radius: 15px;
            cursor: crosshair;
        }

        .other_amount {
            display: none;
        }

        .relative_input_div {
            display: none;
        }
    </style>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"
integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"
integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
           .form-group label {
    font-weight: 500;
}

.radius-10 {
    border-radius: 10px;
}

.iti {
    width: 100%;
}
</style>
@endpush

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Application Update Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="container">

                            <div class="stepwizard col-md-offset-3 mb-5">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                        <p>Personal Info</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle"
                                            disabled="disabled">2</a>
                                        <p>Relative Info (Residential)</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-3" type="button" class="btn btn-default btn-circle"
                                            disabled="disabled">3</a>
                                        <p>Relative Info (Native)</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-4" type="button" class="btn btn-default btn-circle"
                                            disabled="disabled">4</a>
                                        <p>Representative Info</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-5" type="button" class="btn btn-default btn-circle"
                                            disabled="disabled">5</a>
                                        <p>Supplymentary</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-6" type="button" class="btn btn-default btn-circle"
                                            disabled="disabled">6</a>
                                        <p>Sign Page</p>
                                    </div>
                                </div>
                            </div>

                            <form role="form" action="{{ route('enrollment.update',$application->application_id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row setup-content" id="step-1">
                                    <div class="col-xs-6 col-md-offset-3">
                                        <div class="col-md-12">
                                            <h3>Personal Info</h3>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                        <input type="text" required class="form-control" name="full_name"
                                                            value="{{ $application->full_name ?? old('full_name') }}"
                                                            id="name" placeholder="Muhammad Ahmad">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Father Name</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{$application->father_name ?? old('father_name') }}" name="father_name"
                                                            id="father_name" placeholder="Muhammad Akbar">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Sur Name</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{$application->surname ?? old('surname') }}" name="surname" id="surname"
                                                            placeholder="Khokhar">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Gender</label>
                                                        <select class="custom-select form-control" required name="gender">
                                                            <option value="Male" {{$application->gender=='Male'?'selected':'' }}>Male</option>
                                                            <option value="Female"  {{$application->gender=='Female'?'selected':'' }}>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Date of Birth</label>
                                                        <input type="date" required class="form-control"
                                                            value="{{date('Y-m-d',strtotime($application->dob)) ?? old('dob') }}" name="dob" id="dob">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Passport No.</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{$application->passport_number ?? old('passport_number') }}" name="passport_number"
                                                            id="passport_number" placeholder="EZ785699">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">European Residence Card No.</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{$application->nie ?? old('nie') }}" name="nie" id="nie"
                                                            placeholder="3857H858">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Cell No. <small>Mention Country Code: +34032032090932</small></label>
                                                        <input type="tel" required class="form-control phone_number"
                                                            value="{{$application->phone ?? getuser()->phone ?? old('phone') }}" name="phone"
                                                            id="phone" placeholder="+34032032090932">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Email Address</label>
                                                        <input type="email" required class="form-control"
                                                            value="{{$application->user->email  ?? old('email') }}"
                                                            name="email" id="email" placeholder="dummy@gmail.com" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>Complete Residential Address</h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Country</label>
                                                        <select class="custom-select form-control" required name="country"
                                                            id="country_id">
                                                            <option selected value="{{$application->country_id}}">{{$application->country->name}}</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}">{{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Community</label>
                                                        <select class="custom-select form-control" required
                                                            name="community" id="community">
                                                            <option selected value="{{$application->community_id}}">{{$application->community->name}}</option>

                                                            <option >Select your Community</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Province</label>
                                                        <select class="custom-select form-control" required
                                                            name="province" id="province_id">
                                                            <option selected value="{{$application->province_id}}">{{$application->province->name}}</option>

                                                            <option >Select your Province</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">City</label>
                                                        <select class="custom-select form-control" required name="city"
                                                            id="city_id">
                                                            <option selected value="{{$application->city_id}}">{{$application->city->name}}</option>

                                                            <option >Select your City</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Area / Street / House No.</label>
                                                        <textarea required value="" class="form-control border rounded-pill" name="area"
                                                            id="area" placeholder="Address">{{ $application->area ?? old('area') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Native Country:</label>
                                                        <input type="text" required
                                                            value="{{ $application->native_country ??old('native_country') }}" class="form-control"
                                                            name="native_country" id="native_country:"
                                                            placeholder="Pakistan">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">ID Card No. (Native Country)</label>
                                                        <input type="text" required value="{{ $application->native_id ??old('native_id') }}"
                                                            class="form-control" name="native_id" id="native_id"
                                                            placeholder="3400000000000">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Complete Address (Native
                                                            Country)</label>
                                                        <textarea value="" required class="form-control border rounded-pill"
                                                            name="native_country_address" id="native_country_address" placeholder="Native Address">{{$application->native_country_address ?? old('native_country_address') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-2">
                                    <div class="col-xs-6 col-md-offset-3">
                                        <div class="col-md-12">
                                            <h3>Relative Info (Residential Country)</h3>
                                            <h6>1st Relative</h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{$application->s_relative_1_name ?? old('s_relative_1_name') }}"
                                                            name="s_relative_1_name" id="s_relative_1_name"
                                                            placeholder="Muhammad Ahmad">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Relation</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{ $application->s_relative_1_relation ?? old('s_relative_1_relation') }}"
                                                            name="s_relative_1_relation" id="s_relative_1_relation"
                                                            placeholder="Father">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Cell No. <small>Mention Country Code: +34032032090932</small></label>
                                                        <input type="text" required class="form-control phone_number"
                                                            value="{{ $application->s_relative_1_phone ?? old('s_relative_1_phone') }}"
                                                            name="s_relative_1_phone" id="s_relative_1_phone"
                                                            placeholder="Muhammad Ahmad">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Complete Address</label>
                                                        <textarea type="mail" required class="form-control border rounded-pill" 
                                                            name="s_relative_1_address" id="s_relative_1_address" placeholder="Address">{{ $application->s_relative_1_address ?? old('s_relative_1_address') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>2st Relative</h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{ $application->s_relative_2_name ?? old('s_relative_2_name') }}"
                                                            name="s_relative_2_name" id="s_relative_2_name"
                                                            placeholder="Muhammad Ahmad">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Relation</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{ $application->s_relative_2_relation ?? old('s_relative_2_relation') }}"
                                                            name="s_relative_2_relation" id="s_relative_2_relation"
                                                            placeholder="Father">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Cell No. <small>Mention Country Code: +34032032090932</small></label>
                                                        <input type="text" required class="form-control phone_number"
                                                            value="{{ $application->s_relative_2_phone ?? old('s_relative_2_phone') }}"
                                                            name="s_relative_2_phone" id="s_relative_2_phone"
                                                            placeholder="Muhammad Ahmad">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Complete Address</label>
                                                        <textarea type="mail" required class="form-control border rounded-pill" 
                                                            name="s_relative_2_address" id="s_relative_2_address" placeholder="Address">{{ $application->s_relative_2_address ?? old('s_relative_2_address') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-3">
                                    <div class="col-xs-6 col-md-offset-3">
                                        <div class="col-md-12">
                                            <h3>Relative Info (Native Country)</h3>
                                            <h6>1st Relative</h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{ $application->n_relative_1_name ?? old('n_relative_1_name') }}"
                                                            name="n_relative_1_name" id="n_relative_1_name"
                                                            placeholder="Muhammad Ahmad">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Relation</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{ $application->n_relative_1_relation ?? old('n_relative_1_relation') }}"
                                                            name="n_relative_1_relation" id="n_relative_1_relation"
                                                            placeholder="Father">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Cell No. <small>Mention Country Code: +34032032090932</small></label>
                                                        <input type="text" required class="form-control phone_number"
                                                            value="{{ $application->n_relative_1_phone ?? old('n_relative_1_phone') }}"
                                                            name="n_relative_1_phone" id="n_relative_1_phone"
                                                            placeholder="Muhammad Ahmad">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Complete Address</label>
                                                        <textarea type="mail" required class="form-control border rounded-pill" 
                                                            name="n_relative_1_address" id="n_relative_1_address" placeholder="Address">{{ $application->n_relative_1_address ?? old('n_relative_1_address') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6>2st Relative</h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{ $application->n_relative_2_name ?? old('n_relative_2_name') }}"
                                                            name="n_relative_2_name" id="n_relative_2_name"
                                                            placeholder="Muhammad Ahmad">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Relation</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{ $application->n_relative_2_relation ?? old('n_relative_2_relation') }}"
                                                            name="n_relative_2_relation" id="n_relative_2_relation"
                                                            placeholder="Father">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Cell No. <small>Mention Country Code: +34032032090932</small></label>
                                                        <input type="text" required class="form-control phone_number"
                                                            value="{{ $application->n_relative_2_phone ?? old('n_relative_2_phone') }}"
                                                            name="n_relative_2_phone" id="n_relative_2_phone"
                                                            placeholder="Muhammad Ahmad">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Complete Address</label>
                                                        <textarea type="mail" required class="form-control border rounded-pill"
                                                            name="n_relative_2_address" id="n_relative_2_address" placeholder="Address">{{ $application->n_relative_2_address ?? old('n_relative_2_address') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-4">
                                    <div class="col-xs-6 col-md-offset-3">
                                        <div class="col-md-12">
                                            <h3>Representative Info</h3>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{ $application->rep_name ?? old('rep_name') }}" name="rep_name" id="rep_name"
                                                            placeholder="Muhammad Ahmad">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Sur Name</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{ $application->rep_surname ?? old('rep_surname') }}" name="rep_surname"
                                                            id="rep_surname" placeholder="Khokhar">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Passport No.</label>
                                                        <input type="text" required class="form-control"
                                                            value="{{ $application->rep_passport_no ?? old('rep_passport_no') }}" name="rep_passport_no"
                                                            id="rep_passport_no" placeholder="4545HG6J">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Cell No. <small>Mention Country Code: +34032032090932</small></label>
                                                        <input type="text" required class="form-control phone_number"
                                                            value="{{ $application->rep_phone ?? old('rep_phone') }}" name="rep_phone"
                                                            id="rep_phone" placeholder="+34032032090932">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Complete Address</label>
                                                        <textarea type="mail" required class="form-control border rounded-pill"
                                                            name="rep_address" id="rep_address" placeholder="Address">{{ $application->rep_address ?? old('rep_address') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="form-check mt-3">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="rep_confirmed" value="1" checked readonly>
                                                            <span class="form-check-sign"></span>
                                                            Have you informed him that you are appointing this person as
                                                            your Representative in FSF and this person will be authorized to
                                                            collect your remaining amount?

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-5">
                                    <div class="col-xs-6 col-md-offset-3">
                                        <div class="col-md-12">
                                            <h3>Supplymentary Info</h3>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <p>Where do you want to be buried?</p>
                                                    <div class="d-flex mb-4">
                                                        <div class="form-check mr-4">
                                                            <input class="form-check-input" type="radio"
                                                                name="buried_location" id="native_country" value="NATIVE"
                                                                checked>
                                                            <label class="form-check-label pl-0" for="native_country">
                                                                Native country
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="buried_location" id="residential_country"
                                                                value="RESIDENTIAL">
                                                            <label class="form-check-label pl-0"
                                                                for="residential_country">
                                                                Residential country
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <p>Do you have any relatives registered in this fund?</p>
                                                    <div class="d-flex mb-4">
                                                        <div class="form-check mr-4">
                                                            <input class="form-check-input" type="radio"
                                                                name="registered_relatives" id="yes"
                                                                value="1">
                                                            <label class="form-check-label pl-0" for="yes">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="registered_relatives" id="no" value="0"
                                                                checked>
                                                            <label class="form-check-label pl-0" for="no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="reg_relative_passport_no" class="d-none  mt-3">
                                                        <div class="row mb-3">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Passport No.</label>
                                                                    <input type="text" class="form-control"
                                                                        value=""
                                                                        name="registered_relative_passport_no"
                                                                        id="registered_relative_passport_no_input"
                                                                        placeholder="4545HG6J">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-5">
                                                            <div class="col-12">
                                                                <div>
                                                                    <div class="table-responsive">
                                                                        <table class="table small">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>
                                                                                        Name
                                                                                    </th>
                                                                                    <td class="text-right">
                                                                                        Ali
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        Father Name
                                                                                    </th>
                                                                                    <td class="text-right">
                                                                                        Amjad
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        Registration No.
                                                                                    </th>
                                                                                    <td class="text-right">
                                                                                        93485DFG
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        Address
                                                                                    </th>
                                                                                    <td class="text-right">
                                                                                        9th Str, D Block <br>
                                                                                        Dummy City <br>
                                                                                        Dummy Country
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <p>How much will you pay annually into this fund?</p>
                                                    <div class="mb-4">
                                                        <div class="form-check mr-4">
                                                            <input class="form-check-input" type="radio"
                                                                name="annually_fund_amount_fixed" id="zero"
                                                                value="0">
                                                            <label class="form-check-label pl-0" for="zero">
                                                                I will not give any amount annually
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="annually_fund_amount_fixed" id="30"
                                                                value="30">
                                                            <label class="form-check-label pl-0" for="30">
                                                                € 30
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="annually_fund_amount_fixed" id="50"
                                                                value="50">
                                                            <label class="form-check-label pl-0" for="50">
                                                                € 50
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="annually_fund_amount_fixed" id="70"
                                                                value="70">
                                                            <label class="form-check-label pl-0" for="70">
                                                                € 70
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="annually_fund_amount_fixed" id="90"
                                                                value="90">
                                                            <label class="form-check-label pl-0" for="90">
                                                                € 90
                                                            </label>

                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="annually_fund_amount_fixed" id="100"
                                                                value="100" checked>
                                                            <label class="form-check-label pl-0" for="100">
                                                                € 100
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="annually_fund_amount_fixed" id="other"
                                                                value="other">
                                                            <label class="form-check-label pl-0" for="other">
                                                                Others
                                                            </label>
                                                        </div>
                                                        <div class="d-none mt-3" id="other_amount">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Enter Amount</label>
                                                                        <div class="input-group mb-3">
                                                                            {{-- <div class="input-group-prepend">
                                      <span class="input-group-text">$</span>
                                    </div> --}}
                                                                            <input type="text" class="form-control"
                                                                                name="annually_fund_amount"
                                                                                id="other_annually_fund_amount"
                                                                                placeholder="75" value="100">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-6">
                                    <div class="col-xs-6 col-md-offset-3">
                                        <div class="col-md-12">
                                            <h3>Signature</h3>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div>
                                                        <p>Sign Here</p>
                                                        <canvas id="sig-canvas" width="620" height="160">
                                                            Get a better browser.
                                                        </canvas>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-primary"
                                                                id="sig-submitBtn">Submit Signature</button>
                                                            <button type="button" class="btn btn-default"
                                                                id="sig-clearBtn">Clear Signature</button>
                                                        </div>
                                                    </div>
                                                    <div class="row d-none">
                                                        <div class="col-md-12">
                                                            <textarea id="sig-dataUrl" name="user_signature" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <img id="sig-image" src=""
                                                                alt="Your signature will go here!" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="form-check mt-3">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="declaration_confirm" value="1" checked
                                                                readonly>
                                                            <span class="form-check-sign"></span>
                                                            Have you read carefully to all the conditions and regulations of
                                                            this funeral service fund?
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success rounded-pill mb-5 pull-right"
                                                type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

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
    <script type="text/javascript">
        $(document).ready(function() {
            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function(e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function() {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next()
                    .children("a"),
                    curInputs = curStep.find(
                        "input[type='text'],input[type='email'],input[type='password'],input[type='url'],textarea"
                        ),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
    </script>

    <!-- Signature Canvas -->
    <script>
        (function() {
            window.requestAnimFrame = (function(callback) {
                return window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.oRequestAnimationFrame ||
                    window.msRequestAnimaitonFrame ||
                    function(callback) {
                        window.setTimeout(callback, 1000 / 60);
                    };
            })();

            var canvas = document.getElementById("sig-canvas");
            var ctx = canvas.getContext("2d");
            ctx.strokeStyle = "#222222";
            ctx.lineWidth = 4;

            var drawing = false;
            var mousePos = {
                x: 0,
                y: 0
            };
            var lastPos = mousePos;

            canvas.addEventListener("mousedown", function(e) {
                drawing = true;
                lastPos = getMousePos(canvas, e);
            }, false);

            canvas.addEventListener("mouseup", function(e) {
                drawing = false;
            }, false);

            canvas.addEventListener("mousemove", function(e) {
                mousePos = getMousePos(canvas, e);
            }, false);

            // Add touch event support for mobile
            canvas.addEventListener("touchstart", function(e) {

            }, false);

            canvas.addEventListener("touchmove", function(e) {
                var touch = e.touches[0];
                var me = new MouseEvent("mousemove", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(me);
            }, false);

            canvas.addEventListener("touchstart", function(e) {
                mousePos = getTouchPos(canvas, e);
                var touch = e.touches[0];
                var me = new MouseEvent("mousedown", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvas.dispatchEvent(me);
            }, false);

            canvas.addEventListener("touchend", function(e) {
                var me = new MouseEvent("mouseup", {});
                canvas.dispatchEvent(me);
            }, false);

            function getMousePos(canvasDom, mouseEvent) {
                var rect = canvasDom.getBoundingClientRect();
                return {
                    x: mouseEvent.clientX - rect.left,
                    y: mouseEvent.clientY - rect.top
                }
            }

            function getTouchPos(canvasDom, touchEvent) {
                var rect = canvasDom.getBoundingClientRect();
                return {
                    x: touchEvent.touches[0].clientX - rect.left,
                    y: touchEvent.touches[0].clientY - rect.top
                }
            }

            function renderCanvas() {
                if (drawing) {
                    ctx.moveTo(lastPos.x, lastPos.y);
                    ctx.lineTo(mousePos.x, mousePos.y);
                    ctx.stroke();
                    lastPos = mousePos;
                }
            }

            // Prevent scrolling when touching the canvas
            document.body.addEventListener("touchstart", function(e) {
                if (e.target == canvas) {
                    e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchend", function(e) {
                if (e.target == canvas) {
                    e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchmove", function(e) {
                if (e.target == canvas) {
                    e.preventDefault();
                }
            }, false);

            (function drawLoop() {
                requestAnimFrame(drawLoop);
                renderCanvas();
            })();

            function clearCanvas() {
                canvas.width = canvas.width;
            }

            // Set up the UI
            var sigText = document.getElementById("sig-dataUrl");
            var sigImage = document.getElementById("sig-image");
            var clearBtn = document.getElementById("sig-clearBtn");
            var submitBtn = document.getElementById("sig-submitBtn");
            clearBtn.addEventListener("click", function(e) {
                clearCanvas();
                sigText.innerHTML = "Data URL for your signature will go here!";
                sigImage.setAttribute("src", "");
            }, false);
            submitBtn.addEventListener("click", function(e) {
                var dataUrl = canvas.toDataURL();
                sigText.innerHTML = dataUrl;
                sigImage.setAttribute("src", dataUrl);
            }, false);

        })();
    </script>


    <script>
        $(document).ready(function() {
            $('input[type=radio][name=annually_fund_amount_fixed]').change(function() {
                if (this.value == 'other') {
                    $("#other_amount").removeClass('d-none');
                    var amount = $('input[type=radio][name="annually_fund_amount_fixed"]:checked').val();
                    $('#other_annually_fund_amount').val(100);
                    $('#other_annually_fund_amount').prop('required', true);
                } else {
                    $("#other_amount").addClass('d-none');
                    var amount = $('input[type=radio][name="annually_fund_amount_fixed"]:checked').val();
                    $('#other_annually_fund_amount').val(amount);
                    $('#other_annually_fund_amount').prop('required', true);

                }
            });

        });
    </script>
    <script>
        // $(document).ready(function(){
        //     $('input[name="annual_amount"]').click(function(){
        //         var inputValue = $(this).attr("value");
        //         var targetBox = $("." + inputValue);
        //         $(".other_amount").not(targetBox).hide();
        //         $(targetBox).show();
        //     });
        // });
    </script>

    <script>
        $(document).ready(function() {
            $('input[type=radio][name=registered_relatives]').change(function() {
                if (this.value == '1') {
                    $("#reg_relative_passport_no").removeClass('d-none');
                    $('#registered_relative_passport_no_input').prop('required', true);
                    // document.getElementById("reg_relative_passport_no").attributes["required"] = "";

                } else if (this.value == '0') {
                    $("#reg_relative_passport_no").addClass('d-none');
                    $('#registered_relative_passport_no_input').prop('required', false);

                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#country_id').on('change', function() {

                var country_id = this.value;
                $("#community").html('');
                $.ajax({
                    url: "{{ route('get.communities') }}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#community').html(
                            '<option value="">-- Select community --</option>');
                        $.each(result.community, function(key, value) {
                            $("#community").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            Center Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#community').on('change', function() {
                var community_id = this.value;
                $("#province_id").html('');
                $.ajax({
                    url: "{{ route('get.provinces') }}",
                    type: "POST",
                    data: {
                        community_id: community_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#province_id').html(
                            '<option value="">-- Select Province --</option>');
                        $.each(result.provinces, function(key, value) {
                            $("#province_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });


            $('#province_id').on('change', function() {
                var province_id = this.value;
                $("#city_id").html('');
                $.ajax({
                    url: "{{ route('get.cities') }}",
                    type: "POST",
                    data: {
                        province_id: province_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#city_id').html('<option value="">-- Select Province --</option>');
                        $.each(result.cities, function(key, value) {
                            $("#city_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });


        });
    </script>


{{-- <script>
    $(document).ready(function(){
        //check country code first in input field
     $('.phone_number').keyup(function(){
        let letter = $(this).charAt(1);
alert(letter)
     })
    })
</script> --}}

<script>
    $(".phone_number").each(function(index) {
        selector = "#" + $(this).attr('id')
        console.log(selector);
        loadPhoneValidator(selector);
       
    });

    function loadPhoneValidator(selector = ".phone_number") {

        var input = document.querySelector(selector);
        var iti = window.intlTelInput(input, {
            initialCountry: "es",
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
            
        });
        window.iti = iti;
    }
</script>
@endpush
