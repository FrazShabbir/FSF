@extends('backend.main')
@section('title', 'Page')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
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
    <style>
        .num {
            margin-top: 1px;
        }

        .sw-theme-dots>.nav .nav-link.active::after {
            background: #1e3d73 !important;
        }

        .sw-theme-dots>.nav .nav-link.done::after {
            background: #1e3d73cc !important;
        }

        .sw-theme-dots>.nav .nav-link.done {
            color: #1e3d73 !important;
        }

        .sw-theme-dots>.nav .nav-link.active {
            color: #1e3d73 !important;
        }

        .sw .toolbar>.sw-btn {
            background: #1e3d73;
            background-color: #1e3d73;
            border: 1px solid #1e3d73;
        }

        .sw>.progress>.progress-bar {
            background: #1e3d73;
            background-color: #1e3d73;
        }
    </style>
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
                            {{-- <form action="" > --}}
                            <!-- SmartWizard html -->
                            <div id="smartwizard">

                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-1">
                                            <div class="num">1</div>
                                            Personal Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-2">
                                            <span class="num">2</span>
                                            Relative Info (spain)
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-3">
                                            <span class="num">3</span>
                                            Relative Info (Native)
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#step-4">
                                            <span class="num">4</span>
                                            Representative
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#step-5">
                                            <span class="num">5</span>
                                            Supplementary
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#step-6">
                                            <span class="num">6</span>
                                            Sign page
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">

                                    <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                        <form id="form-1" class="needs-validation" novalidate>
                                            <div class="row mb-5">
                                                <div class="col-12">
                                                    <h4 class="mb-4">
                                                        Personal Information
                                                    </h4>
                                                </div>
                                                <div class="col-12">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview"
                                                                style="background-image: url('http://i.pravatar.cc/500?img=7');">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group row mb-4">
                                                        <label class="control-label col-sm-12 align-self-center mb-0"
                                                            for="full_name">Full Name:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="full_name"
                                                                name="full_name" placeholder="Enter Your Full Name"
                                                                required>
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
                                                                name="father_name" placeholder="Enter Your Father's Name"
                                                                required>
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
                                                        <label class="control-label col-sm-12 align-self-center mb-0"
                                                            for="surname">Sur Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="surname"
                                                                name="surname" placeholder="Enter Your Sur Name" required>
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
                                                            <select class="form-control" name="gender" id="gender"
                                                                disabled required>
                                                                <option selected value="" disabled="">Select
                                                                    Gender
                                                                </option>
                                                                <option>Male</option>
                                                                <option>Female</option>
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
                                                            <input type="text" class="form-control" name="dob"
                                                                id="dob" placeholder="Enter Your Date of Birth"
                                                                disabled>
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
                                                            <input type="text" class="form-control"
                                                                name="passport_number" id="passport_number"
                                                                placeholder="Enter Your Passport No." disabled>
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
                                                            <input type="text" class="form-control" name="nie"
                                                                id="nie"
                                                                placeholder="Enter Your European Residence Card No."
                                                                disabled>
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
                                                            <input type="text" class="form-control"
                                                                name="native_country" id="native_country"
                                                                placeholder="Enter Your Native Country" disabled>
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
                                                                id="native_id"
                                                                placeholder="Enter Your ID Card No. (Native Country)"
                                                                disabled>
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
                                                                placeholder="Enter Your Address (Native Country)" required></textarea>
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
                                                            <input type="text" class="form-control" name="phone"
                                                                id="phone" placeholder="Enter Your Cell No.">
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
                                                            <input type="text" class="form-control" name="user_email"
                                                                id="user_email" placeholder="Enter Your Email" required>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                  </div>
                                                                  <div class="invalid-feedback">
                                                                    Please enter your REmail.
                                                                  </div>
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
                                                            <select class="form-control" name="country" id="country"
                                                                required>
                                                                <option selected value="" disabled="">Select Your
                                                                    Country
                                                                </option>
                                                                <option></option>
                                                                <option></option>
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
                                                            <select class="form-control" name="community" id="community"
                                                                required>
                                                                <option selected value="" disabled="">Select Your
                                                                    Community</option>
                                                                <option></option>
                                                                <option></option>
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
                                                            <select class="form-control" name="province" id="province"
                                                                required>
                                                                <option selected value="" disabled="">Select Your
                                                                    Province
                                                                </option>
                                                                <option></option>
                                                                <option></option>
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
                                                            <select class="form-control" name="city" id="city"
                                                                required>
                                                                <option selected value="" disabled="">Select Your
                                                                    City
                                                                </option>
                                                                <option></option>
                                                                <option></option>
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
                                                            for="area">Area / Street / House No.</label>
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
                                            </div>
                                        </form>
                                    </div>

                                    <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                        <form id="form-2" class="needs-validation" novalidate>

                                            <div class="row mb-5">
                                                <div class="col-12">
                                                    <h4 class="mb-4">
                                                        Residential Relative Information
                                                    </h4>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="mb-4">
                                                        Realtive 1
                                                    </h6>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group row mb-4">
                                                        <label class="control-label col-sm-12 align-self-center mb-0"
                                                            for="s_relative_1_name">Full Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control"
                                                                id="s_relative_1_name" name="s_relative_1_name"
                                                                placeholder="Enter Relative Full Name" required>
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
                                                            <input type="text" class="form-control"
                                                                id="s_relative_1_relation" name="s_relative_1_relation"
                                                                placeholder="Enter Your Realtion">
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
                                                            <input type="text" class="form-control"
                                                                id="s_relative_1_phone" name="s_relative_1_phone"
                                                                placeholder="Enter Relative Cell No.">
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
                                                    <h6 class="mb-4">
                                                        Realtive 2
                                                    </h6>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group row mb-4">
                                                        <label class="control-label col-sm-12 align-self-center mb-0"
                                                            for="s_relative_2_name">Full Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control"
                                                                id="s_relative_2_name" name="s_relative_2_name"
                                                                placeholder="Enter Relative Full Name">
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
                                                            <input type="text" class="form-control"
                                                                id="s_relative_2_relation" name="s_relative_2_relation"
                                                                placeholder="Enter Your Realtion">
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
                                                            <input type="text" class="form-control"
                                                                id="s_relative_2_phone" name="s_relative_2_phone"
                                                                placeholder="Enter Relative Cell No.">
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
                                            </div>
                                        </form>
                                    </div>
                                    <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                        <form id="form-3" class="needs-validation" novalidate>

                                            <div class="row mb-5">
                                                <div class="col-12">
                                                    <h4 class="mb-4">
                                                        Native Country Relative Information
                                                    </h4>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="mb-4">
                                                        Realtive 1
                                                    </h6>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group row mb-4">
                                                        <label class="control-label col-sm-12 align-self-center mb-0"
                                                            for="n_relative_1_name">Full Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control"
                                                                id="n_relative_1_name" name="n_relative_1_name"
                                                                placeholder="Enter Relative Full Name">
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
                                                            <input type="text" class="form-control"
                                                                id="n_relative_1_relation" name="n_relative_1_relation"
                                                                placeholder="Enter Your Realtion">
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
                                                            <input type="text" class="form-control"
                                                                id="n_relative_1_phone" name="n_relative_1_phone"
                                                                placeholder="Enter Relative Cell No.">
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
                                                    <h6 class="mb-4">
                                                        Realtive 2
                                                    </h6>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group row mb-4">
                                                        <label class="control-label col-sm-12 align-self-center mb-0"
                                                            for="n_relative_2_name">Full Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control"
                                                                id="n_relative_2_name" name="n_relative_2_name"
                                                                placeholder="Enter Relative Full Name">
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
                                                            <input type="text" class="form-control"
                                                                id="n_relative_2_relation" name="n_relative_2_relation"
                                                                placeholder="Enter Your Realtion">
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
                                                            <input type="text" class="form-control"
                                                                id="n_relative_2_phone" name="n_relative_2_phone"
                                                                placeholder="Enter Relative Cell No.">
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
                                            </div>
                                        </form>
                                    </div>
                                    <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                        <form id="form-4" class="needs-validation" novalidate>

                                            <div class="row mb-5">
                                                <div class="col-12">
                                                    <h4 class="mb-4">
                                                        Representative Information
                                                    </h4>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group row mb-4">
                                                        <label class="control-label col-sm-12 align-self-center mb-0"
                                                            for="rep_name">Full Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="rep_name"
                                                                name="rep_name"
                                                                placeholder="Enter Representative Full Name" disabled>
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
                                                            for="rep_sername">Sur Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="rep_sername"
                                                                name="rep_sername"
                                                                placeholder="Enter Representative Sur Name" disabled>
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
                                                            <input type="text" class="form-control"
                                                                id="rep_passport_no" name="rep_passport_no"
                                                                placeholder="Enter Representative Passport No." disabled>
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
                                                            for="rep_phone">Cell No.</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="rep_phone"
                                                                name="rep_phone"
                                                                placeholder="Enter Representative Cell No." disabled>
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
                                                                placeholder="Enter Representative Complete Address" disabled>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                  </div>
                                                                  <div class="invalid-feedback">
                                                                    Please enter your Complete Addrtess.
                                                                  </div>
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-12">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="rep_confirmed" name="rep_confirmed" disabled>
                                                        <label class="custom-control-label" for="rep_confirmed">Have you
                                                            informed him that you are appointing this person as your
                                                            Representative in FSF and this person will be authorized to
                                                            collect your remaining amount?</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                                        <form id="form-5" class="needs-validation" novalidate>

                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <h4 class="mb-4">
                                                    Supplementary Information
                                                </h4>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <p>Where do you want to be buried?</p>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="residential" name="buried_location"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="residential"> Spain
                                                    </label>

                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="native" name="buried_location"
                                                        class="custom-control-input">
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
                                                    <label class="custom-control-label"
                                                        for="registed_relative_yes">Yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="registed_relative_no" value="No"
                                                        name="registered_relatives" class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="registed_relative_no">No</label>
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
                                                    <input type="radio" id="no_amount_anual"
                                                        name="annually_fund_amount" class="custom-control-input">
                                                    <label class="custom-control-label" for="no_amount_anual"> I will
                                                        not give any amount annually </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="amount_anual_30"
                                                        name="annually_fund_amount" class="custom-control-input">
                                                    <label class="custom-control-label" for="amount_anual_30"> € 30
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="amount_anual_50"
                                                        name="annually_fund_amount" class="custom-control-input">
                                                    <label class="custom-control-label" for="amount_anual_50"> € 50
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="amount_anual_70"
                                                        name="annually_fund_amount" class="custom-control-input">
                                                    <label class="custom-control-label" for="amount_anual_70"> € 70
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="amount_anual_90"
                                                        name="annually_fund_amount" class="custom-control-input">
                                                    <label class="custom-control-label" for="amount_anual_90"> € 90
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="amount_anual_100"
                                                        name="annually_fund_amount" class="custom-control-input">
                                                    <label class="custom-control-label" for="amount_anual_100"> € 100
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="amount_anual_other" value="other"
                                                        name="annually_fund_amount" class="custom-control-input">
                                                    <label class="custom-control-label" for="amount_anual_other">
                                                        Other </label>
                                                </div>



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
                                        </form>
                                    </div>
                                    <div id="step-6" class="tab-pane" role="tabpanel" aria-labelledby="step-6">
                                        <form id="form-6" class="needs-validation" novalidate>

                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <h4 class="mb-4">
                                                    Sign Your Form
                                                </h4>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div id="signature">
                                                    <canvas width="500" height="200"></canvas>
                                                    <div class="controls">
                                                        {{-- <a class="btn-green" href="#"
                                                                id="download">Download</a> --}}
                                                        <a class="btn btn-primary" href="#" id="clearSig">Clear
                                                            Signature</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="rep_confirmed" name="rep_confirmed">
                                                    <label class="custom-control-label" for="rep_confirmed">Have you
                                                        read carefully to all the conditions and regulations of this
                                                        funeral service fund?</label>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Include optional progressbar HTML -->
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>











                            {{-- <div class="row mb-5">
                                    <div class="col-12">
                                        <h4 class="mb-4">
                                            Donor Details:
                                        </h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="name">Name:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter Your Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="Contact">Contact No:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="Contact" name="Contact"
                                                    placeholder="Enter Contact No.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="resposibility">Resposibility</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="resposibility" id="resposibility">
                                                    <option selected value="" disabled="">Select Resposibility</option>
                                                    <option>0-18</option>
                                                    <option>18-26</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="ess_code">ESS Code:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="ess_code"
                                                    id="ess_code" placeholder="Enter ESS Code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h4 class="mb-4">
                                            Donation Details:
                                        </h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="amount">Amount:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                    placeholder="Enter Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="ac_name">AC Name:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="ac_name" id="ac_name"
                                                    placeholder="Enter AC Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="amount_words">Amount in Words:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="amount_words"
                                                    name="amount_words" placeholder="Enter Amount in Words:">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="donation_purpose">Donation Purpose</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="donation_purpose"
                                                    id="donation_purpose">
                                                    <option selected value="" disabled="">Select Donation Purpose</option>
                                                    <option>0-18</option>
                                                    <option>18-26</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h4 class="mb-4">
                                            Donation Sub Details:
                                        </h4>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="donation_head">Donation Head:</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="donation_head" id="donation_head">
                                                    <option selected value="" disabled="">Select Donation Head</option>
                                                    <option>0-18</option>
                                                    <option>18-26</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="project">Project:</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="project" id="project">
                                                    <option selected value="" disabled="">Select Project</option>
                                                    <option>0-18</option>
                                                    <option>18-26</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="department">Department:</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="department" id="department">
                                                    <option selected value="" disabled="">Select Department</option>
                                                    <option>0-18</option>
                                                    <option>18-26</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="center">Center:</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="center" id="center">
                                                    <option selected value="" disabled="">Select Center</option>
                                                    <option>0-18</option>
                                                    <option>18-26</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="location">Location:</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="location" id="location">
                                                    <option selected value="" disabled="">Select Location</option>
                                                    <option>0-18</option>
                                                    <option>18-26</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="remarks">Remarks:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="remarks" name="remarks"
                                                    placeholder="Enter Remarks">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="image">Upload Image:</label>
                                            <div class="col-sm-12">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input"
                                                        id="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0"
                                                for="description">Description:</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button type="submit" class="btn btn-danger">Cancle</button>
                                    </div>
                                </div> --}}
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript">
    </script>
@endsection

@push('js')
    {{-- <script>
        $(function() {
            // SmartWizard initialize
            $('#smartwizard').smartWizard({
                theme: 'dots',
            });
        });
    </script> --}}

    {{-- Relative Registration Check --}}
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
    <script>
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
    </script>
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




    <script type="text/javascript">
        // const myModal = new bootstrap.Modal(document.getElementById('confirmModal'));

        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            //autoAdjustHeight: false,
            theme: 'dots', // basic, arrows, square, round, dots
            transition: {
                animation: 'none'
            },
            toolbar: {
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                position: 'bottom', // none/ top/ both bottom
                // extraHtml: `<button class="btn btn-success" id="btnFinish" disabled onclick="onConfirm()">Complete Order</button>
                //           <button class="btn btn-danger" id="btnCancel" onclick="onCancel()">Cancel</button>`
            },
            anchor: {
                enableNavigation: true, // Enable/Disable anchor navigation
                enableNavigationAlways: false, // Activates all anchors clickable always
                enableDoneState: true, // Add done state on visited steps
                markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
                enableDoneStateNavigation: true // Enable/Disable the done state navigation
            },
        });


        function onCancel() {
            // Reset wizard
            $('#smartwizard').smartWizard("reset");

            // Reset form
            document.getElementById("form-1").reset();
            document.getElementById("form-2").reset();
            document.getElementById("form-3").reset();
            document.getElementById("form-4").reset();
            document.getElementById("form-5").reset();
            document.getElementById("form-6").reset();
        }



        function closeModal() {
            // Reset wizard
            $('#smartwizard').smartWizard("reset");

            // Reset form
            document.getElementById("form-1").reset();
            document.getElementById("form-2").reset();
            document.getElementById("form-3").reset();
            document.getElementById("form-4").reset();
            document.getElementById("form-5").reset();
            document.getElementById("form-6").reset();

            myModal.hide();
        }



        $(function() {
            // Leave step event is used for validating the forms
            $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIdx, nextStepIdx,
                stepDirection) {
                // Validate only on forward movement
                if (stepDirection == 'forward') {
                    let form = document.getElementById('form-' + (currentStepIdx + 1));
                    if (form) {
                        if (!form.checkValidity()) {
                            form.classList.add('was-validated');
                            $('#smartwizard').smartWizard("setState", [currentStepIdx], 'error');
                            $("#smartwizard").smartWizard('fixHeight');
                            return false;
                        }
                        $('#smartwizard').smartWizard("unsetState", [currentStepIdx], 'error');
                    }
                }
            });

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
                if (stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled').prop('disabled', true);
                } else if (stepPosition === 'last') {
                    $("#next-btn").addClass('disabled').prop('disabled', true);
                } else {
                    $("#prev-btn").removeClass('disabled').prop('disabled', false);
                    $("#next-btn").removeClass('disabled').prop('disabled', false);
                }

                // Get step info from Smart Wizard
                let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
                $("#sw-current-step").text(stepInfo.currentStep + 1);
                $("#sw-total-step").text(stepInfo.totalSteps);

                if (stepPosition == 'last') {
                    showConfirm();
                    $("#btnFinish").prop('disabled', false);
                } else {
                    $("#btnFinish").prop('disabled', true);
                }

                // Focus first name
                if (stepIndex == 1) {
                    setTimeout(() => {
                        $('#first_name').focus();
                    }, 0);
                }
            });




        });
    </script>
@endpush
