@extends('backend.main')
@section('title', 'Page')

@section('styles')
@endsection

@push('css')
    <style>
        canvas {
            background: #fff;
            display: block;
            /* margin: 10px auto 10px; */
            margin-bottom: 20px;
            border-radius: 5px;
            /* box-shadow: 0 4px 0 0 #222; */
            cursor: crosshair;
            border: 1px dashed #d0d0d0;
        }



        /* Avatar */
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }

        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }

        .avatar-upload .avatar-edit input+label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input+label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 4px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endpush



@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Validate Wizard</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="stepwizard mt-4">
                                <div class="stepwizard-row setup-panel">
                                    <div id="user" class="wizard-step active">
                                        <a href="#user-detail" class="active btn">
                                            <i class="text-primary">1.</i><span>Personal Info</span>
                                        </a>
                                    </div>
                                    <div id="user" class="wizard-step">
                                        <a href="#document-detail" class="btn btn-default disabled active">
                                            <i class="text-primary">2.</i><span>Relative Info (spain)</span>
                                        </a>
                                    </div>
                                    <div id="user" class="wizard-step">
                                        <a href="#bank-detail" class="btn btn-default disabled active">
                                            <i class="text-primary">3.</i><span>Relative Info (Native)</span>
                                        </a>
                                    </div>
                                    <div id="user" class="wizard-step">
                                        <a href="#representative" class="btn btn-default disabled active">
                                            <i class="text-primary">4.</i><span>Representative Info</span>
                                        </a>
                                    </div>
                                    <div id="user" class="wizard-step">
                                        <a href="#suplementery" class="btn btn-default disabled active">
                                            <i class="text-primary">5.</i><span>Suplementary</span>
                                        </a>
                                    </div>
                                    <div id="user" class="wizard-step">
                                        <a href="#confirm-data" class="btn btn-default disabled active">
                                            <i class="text-primary">6.</i><span>Sign page</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <form class="form" action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row setup-content px-3" id="user-detail" style="display: flex;">
                                    <div class="col-12">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"
                                                     name="avatar"  />
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview"
                                                    style="background-image: url({{asset('placeholder.png')}});">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="full_name">Full Name:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="full_name" name="full_name"
                                                    placeholder="Enter Your Full Name" required
                                                    value="{{ old('full_name') }}">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your full name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="father_name">Father's Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="father_name"
                                                    name="father_name" placeholder="Enter Your Father's Name" required
                                                    value="{{ old('full_name') }}">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your complete father's name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0" for="surname">Sur
                                                Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="surname" name="surname"
                                                    placeholder="Enter Your Sur Name" required value="{{ old('surname') }}">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your sur-name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="gender">Gender</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option selected value="">Select
                                                        Gender
                                                    </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select your gender.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="dob">Date of Birth</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" name="dob" id="dob"
                                                    placeholder="Enter Your Date of Birth" max="{{ date('Y-m-d') }}"
                                                    value="{{ old('dob') }}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your correct date of birth.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="passport_number">Passport No.</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="passport_number"
                                                    id="passport_number" placeholder="Enter Your Passport No." required
                                                    value="{{ old('passport_number') }}">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your correct passport no.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="nie">European Residence Card No.</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="nie" id="nie"
                                                    placeholder="Enter Your European Residence Card No." required
                                                    value="{{ old('nie') }}">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your Residence Card No.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="native_country">Native Country</label>
                                            <div class="col-sm-12">
                                                <select name="native_country" id="native_country" class="form-control"
                                                    required>
                                                    <option value="" selected disabled>Choose Your Native
                                                        Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">
                                                            {{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your native country.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="native_id">ID Card No. (Native Country)</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="native_id"
                                                    id="native_id" placeholder="Enter Your ID Card No. (Native Country)"
                                                    required value="{{ old('native_id') }}">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your Native countery Id card no.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="native_country_address">Address (Native Country)</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="native_country_address" id="native_country_address"
                                                    placeholder="Enter Your Address (Native Country)" required>{{ old('native_country_address') }}</textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your native country address.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="phone">Cell No.</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    placeholder="2345678" required value="{{ old('phone') }}">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your cell No.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="user_email">Email</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="johndoe@gmail.com" required value="{{ old('email') }}">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter your REmail.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="mb-4">
                                            Residensial Information
                                        </h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="country">Country</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="country" id="country_id" required>
                                                    <option selected value="" disabled>Select Your Country
                                                    </option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">
                                                            {{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your residential country
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="community">Community</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="community" id="community">
                                                    <option selected value="dsds">Select Your Community</option>
                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your community
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="province">Province</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="province" id="province_id" required
                                                    value="{{ old('full_name') }}">
                                                    <option selected value="">Select Your </option>

                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your Province.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="city">City</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="city" id="city_id" required>
                                                    <option selected value="">Select Your
                                                        City
                                                    </option>

                                                </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your City.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="area">Area
                                                / Street / House No.</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="area" id="area" placeholder="Enter Your  Area / Street / House No."
                                                    required>
                                                            </textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your complete Residence Card No.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button class="btn btn-primary nextBtn btn-lg pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content px-3" id="document-detail" style="display: none;">
                                    <div class="col-12">
                                        <h4 class="mb-4">
                                            Realtive 1
                                        </h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="s_relative_1_name">Full Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="s_relative_1_name"
                                                    name="s_relative_1_name" placeholder="Enter Relative Full Name"
                                                    required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter reletives full name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="s_relative_1_relation">Relation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="s_relative_1_relation"
                                                    name="s_relative_1_relation" placeholder="Enter Your Realtion">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your realation.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="s_relative_1_phone">Cell No.</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="s_relative_1_phone"
                                                    name="s_relative_1_phone" placeholder="Enter Relative Cell No.">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your Cell no.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="s_relative_1_address">Complete Address</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="s_relative_1_address" id="s_relative_1_address"
                                                    placeholder="Enter Relative Complete Address">ds</textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your complete Residence.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="mb-4">
                                            Realtive 2
                                        </h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="s_relative_2_name">Full Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="s_relative_2_name"
                                                    name="s_relative_2_name" placeholder="Enter Relative Full Name">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter reletives full name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="s_relative_2_relation">Relation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="s_relative_2_relation"
                                                    name="s_relative_2_relation" placeholder="Enter Your Realtion">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your realation.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="s_relative_2_phone">Cell No.</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="s_relative_2_phone"
                                                    name="s_relative_2_phone" placeholder="Enter Relative Cell No.">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your Cell no.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="s_relative_2_address">Complete Address</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="s_relative_2_address" id="s_relative_2_address"
                                                    placeholder="Enter Relative Complete Address">
                                                            </textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your complete Residence.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button class="btn btn-primary nextBtn btn-lg pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content px-3" id="bank-detail" style="display: none;">
                                    <div class="col-12">
                                        <h4 class="mb-4">
                                            Realtive 1
                                        </h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="n_relative_1_name">Full Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="n_relative_1_name"
                                                    name="n_relative_1_name" placeholder="Enter Relative Full Name">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter reletives full name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="n_relative_1_relation">Relation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="n_relative_1_relation"
                                                    name="n_relative_1_relation" placeholder="Enter Your Realtion">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your realation.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="n_relative_1_phone">Cell No.</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="n_relative_1_phone"
                                                    name="n_relative_1_phone" placeholder="Enter Relative Cell No.">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your Cell no.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="n_relative_1_address">Complete Address</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="n_relative_1_address" id="n_relative_1_address"
                                                    placeholder="Enter Relative Complete Address">
                                                            </textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your complete Residence.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="mb-4">
                                            Realtive 2
                                        </h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="n_relative_2_name">Full Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="n_relative_2_name"
                                                    name="n_relative_2_name" placeholder="Enter Relative Full Name">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter reletives full name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="n_relative_2_relation">Relation</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="n_relative_2_relation"
                                                    name="n_relative_2_relation" placeholder="Enter Your Realtion">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your realation.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="n_relative_2_phone">Cell No.</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="n_relative_2_phone"
                                                    name="n_relative_2_phone" placeholder="Enter Relative Cell No.">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your cell No..
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="n_relative_2_address">Complete Address</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="n_relative_2_address" id="n_relative_2_address"
                                                    placeholder="Enter Relative Complete Address">
                                                            </textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your complete Residence.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button class="btn btn-primary nextBtn btn-lg pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content px-3" id="representative" style="display: none;">
                                    <div class="col-12">
                                        <h4 class="mb-4">
                                            Representative Information
                                        </h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="rep_name">Full
                                                Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="rep_name"
                                                    name="rep_name" placeholder="Enter Representative Full Name">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your full name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="rep_surname">Sur
                                                Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="rep_surname"
                                                    name="rep_surname" placeholder="Enter Representative Sur Name">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your sur name
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="rep_passport_no">Passport No.</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="rep_passport_no"
                                                    name="rep_passport_no"
                                                    placeholder="Enter Representative Passport No.">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your passport no.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="rep_phone">Cell
                                                No.</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="rep_phone"
                                                    name="rep_phone" placeholder="Enter Representative Cell No.">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your cell no.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row mb-4">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="rep_address">Complete Address</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" name="rep_address" id="rep_address"
                                                    placeholder="Enter Representative Complete Address"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your Complete Addrtess.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6"></div>
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="rep_confirmed"
                                                name="rep_confirmed" value="1">
                                            <label class="custom-control-label" for="rep_confirmed">Have you
                                                informed him that you are appointing this person as your
                                                Representative in FSF and this person will be authorized to
                                                collect your remaining amount?</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button class="btn btn-primary nextBtn btn-lg pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content px-3" id="suplementery" style="display: none;">
                                    <div class="col-12 mb-4">
                                        <p>Where do you want to be buried?</p>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="residential" name="buried_location"
                                                class="custom-control-input" value="Spain" checked>
                                            <label class="custom-control-label" for="residential"> Spain
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="native" name="buried_location"
                                                class="custom-control-input" value="Native Country">
                                            <label class="custom-control-label" for="native"> Native Country
                                            </label>
                                        </div>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please select any one of these
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <p>Do you have any relatives registered in this fund?</p>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="registed_relative_yes" value="Yes"
                                                name="registered_relatives" class="custom-control-input">
                                            <label class="custom-control-label" for="registed_relative_yes">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="registed_relative_no" value="No"
                                                name="registered_relatives" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="registed_relative_no">No</label>
                                        </div>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please select anr one of these
                                        </div>
                                    </div>
                                    <div id="reg_relative_passport_no" class="d-none w-100">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group row mb-4">
                                                <label class="control-label col-sm-12 align-self-center mb-0"
                                                    for="registered_relative_passport_no">Relative Passport
                                                    No.</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control"
                                                        id="registered_relative_passport_no"
                                                        name="registered_relative_passport_no"
                                                        placeholder="Enter Registered Relative Passport No.">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please enter your relative Passport no
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <p>How much will you pay annually into this fund?</p>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="no_amount_anual" name="annually_fund_amount"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="no_amount_anual"> I will
                                                not give any amount annually </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="amount_anual_30" name="annually_fund_amount"
                                                class="custom-control-input" value="30">
                                            <label class="custom-control-label" for="amount_anual_30"> € 30
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="amount_anual_50" name="annually_fund_amount"
                                                class="custom-control-input" value="50">
                                            <label class="custom-control-label" for="amount_anual_50"> € 50
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="amount_anual_70" name="annually_fund_amount"
                                                class="custom-control-input" value="70">
                                            <label class="custom-control-label" for="amount_anual_70"> € 70
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="amount_anual_90" name="annually_fund_amount"
                                                class="custom-control-input" value="90">
                                            <label class="custom-control-label" for="amount_anual_90"> € 90
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="amount_anual_100" name="annually_fund_amount"
                                                class="custom-control-input" value="100" checked>
                                            <label class="custom-control-label" for="amount_anual_100"> € 100
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="amount_anual_other" value="other"
                                                name="annually_fund_amount" class="custom-control-input">
                                            <label class="custom-control-label" for="amount_anual_other">
                                                Other </label>
                                        </div>
                                        <div id="other_amount" class="d-none w-100">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group row mb-4">
                                                    <label class="control-label col-sm-12 align-self-center mb-0"
                                                        for="other_annually_fund_amount">Enter Other Amount</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            id="other_annually_fund_amount"
                                                            name="other_annually_fund_amount"
                                                            placeholder="Enter Anually Fund Amount">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter select anual fund
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="text-right">
                                            <button class="btn btn-primary nextBtn btn-lg pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content px-3" id="confirm-data" style="display: none;">
                                    <div class="col-12 mb-4">
                                        <div id="signature">
                                            <canvas width="500" height="200"></canvas>
                                            <div class="controls">
                                                <a class="btn btn-primary" href="#" id="clearSig">Clear
                                                    Signature</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="declaration_confirm"
                                                name="declaration_confirm" value="1">
                                            <label class="custom-control-label" for="declaration_confirm">Have you
                                                read carefully to all the conditions and regulations of this
                                                funeral service fund?</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button class="btn btn-primary nextBtn btn-lg pull-right"
                                                type="submit">Finish</button>
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
    {{-- Anual Amount Others --}}
    <script>
        $(document).ready(function() {
            $('input[type=radio][name=annually_fund_amount]').change(function() {
                if (this.value == 'other') {
                    $("#other_amount").removeClass('d-none');
                    $('#other_annually_fund_amount').prop('required', true);


                } else {
                    $("#other_amount").addClass('d-none');
                    $('#other_annually_fund_amount').prop('required', false);

                }
            });
        });
    </script>
    {{-- Signature Pad JS --}}
    {{-- <script>
        var color = "#000000";
        var context = $("canvas")[0].getContext("2d");
        var canvas = $("canvas");
        var lastEvent;
        var mouseDown = false;
        var weight = "3";

        // //Bind weight val to selection on click
        var updateWeight = function() {
            return weight;
        };

        //Draw on the canvas on mouse events
        canvas.mousedown(function(e) {
            lastEvent = e;
            mousedown = true;
        }).mousemove(function(e) {
            if (mousedown) {
                context.beginPath();
                context.moveTo(lastEvent.offsetX, lastEvent.offsetY);
                context.lineTo(e.offsetX, e.offsetY);
                context.strokeStyle = color;
                context.lineWidth = updateWeight();
                context.stroke();
                lastEvent = e;
            }
        }).mouseup(function() {
            mousedown = false;
        }).mouseleave(function() {
            canvas.mouseup();
        });

        //Download your drawing
        var downloadImg = function() {
            var img = canvas[0].toDataURL("image/png");
            var $imgLink = $("#download").attr("href", img);
        }

        var clearSig = function() {
            context.clearRect(0, 0, 500, 200);
        }


        $("#download").click(downloadImg);
        $("#clearSig").click(clearSig);
    </script> --}}
    {{-- Upload Avatar --}}
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function() {

            readURL(this);
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

<script>
    $(document).ready(function() {
        $('input[type=radio][name=registered_relatives]').change(function() {
            if (this.value == 'Yes') {
                $("#reg_relative_passport_no").removeClass('d-none');
            } else if (this.value == 'No') {
                $("#reg_relative_passport_no").addClass('d-none');
            }
        });
    });
</script>
{{-- Anual Amount Others --}}
<script>
    $(document).ready(function() {
        $('input[type=radio][name=annually_fund_amount]').change(function() {
            if (this.value == 'other') {
                $("#other_amount").removeClass('d-none');
            } else {
                $("#other_amount").addClass('d-none');
            }
        });
    });
</script>
{{-- Signature Pad JS --}}
@endpush
