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
    .setup-content{
      display: block;
      width: 100%!important;
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
  .other_amount{
    display: none;
  }
  .relative_input_div{
    display: none;
  }
    </style>
@endsection

@push('css')
@endpush

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Renew Registration Form</h4>
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
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Relative Info (Residential)</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Relative Info (Native)</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p>Representative Info</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                    <p>Supplymentary</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                    <p>Sing Page</p>
                  </div>
                </div>
              </div>

              <form role="form" action="" method="post">
                <div class="row setup-content" id="step-1">
                  <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                      <h3>Personal Info</h3>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Full Name</label>
                            <input type="text" required class="form-control" name="name" id="name" placeholder="Muhammad Ahmad">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Father Name</label>
                            <input type="text" required class="form-control" name="father_name" id="father_name" placeholder="Muhammad Akbar">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Sur Name</label>
                            <input type="text" required class="form-control" name="sur_name" id="name" placeholder="Khokhar">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Gender</label>
                            <select class="custom-select form-control" disabled name="gender">
                              <option selected disabled>Select your gender</option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Date of Birth</label>
                            <input type="date" disabled class="form-control" name="dob" id="dob">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Passport No.</label>
                            <input type="text" disabled class="form-control" name="passport_no" id="passport_no" placeholder="EZ785699">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">European Residence Card No.</label>
                            <input type="text" disabled class="form-control" name="eurp_residence_no" id="eurp_residence_no" placeholder="3857H858">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Cell No.</label>
                            <input type="text" required class="form-control" name="Cell_no" id="Cell_no" placeholder="+34032032090932">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Email Address</label>
                            <input type="mail" required class="form-control" name="email" id="email" placeholder="dummy@gmail.com">
                          </div>
                        </div>
                      </div>
                      <h6>Complete Residential Address</h6>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Country</label>
                            <select class="custom-select form-control" required name="country">
                              <option selected disabled>Select your Country</option>
                              <option value="spain">Spain</option>
                              <option value="ilty">Itly</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Community</label>
                            <select class="custom-select form-control" required name="community">
                              <option selected disabled>Select your Community</option>
                              <option value="dummy">Dummy</option>
                              <option value="dummy1">Dummy1</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Province</label>
                            <select class="custom-select form-control" required name="province">
                              <option selected disabled>Select your Province</option>
                              <option value="dummy">Dummy</option>
                              <option value="dummy1">Dummy1</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">City</label>
                            <select class="custom-select form-control" required name="city">
                              <option selected disabled>Select your City</option>
                              <option value="dummy">Dummy</option>
                              <option value="dummy1">Dummy1</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Area / Street / House No.</label>
                            <textarea type="mail" required class="form-control border rounded-pill" name="detailed_address" id="detailed_address" placeholder="Address"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Native Country:</label>
                            <input type="text" disabled class="form-control" name="native_country:" id="native_country:" placeholder="Pakistan">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">ID Card No. (Native Country)</label>
                            <input type="text" disabled class="form-control" name="id_no" id="id_no" placeholder="3400000000000">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Complete Address (Native Country)</label>
                            <textarea type="mail" required class="form-control border rounded-pill" name="detailed_address_native" id="detailed_address_native" placeholder="Address"></textarea>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right" type="button" >Next</button>
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
                            <input type="text" required class="form-control" name="residential_rel_one_name" id="residential_rel_one_name" placeholder="Muhammad Ahmad">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Realtion</label>
                            <input type="text" required class="form-control" name="residential_rel_one_realtion" id="residential_rel_one_realtion" placeholder="Father">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Cell No.</label>
                            <input type="text" required class="form-control" name="residential_rel_one_cell_no" id="residential_rel_one_cell_no" placeholder="Muhammad Ahmad">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Complete Address</label>
                            <textarea type="mail" required class="form-control border rounded-pill" name="residential_rel_one_address" id="residential_rel_one_address" placeholder="Address"></textarea>
                          </div>
                        </div>
                      </div>
                      <h6>2st Relative</h6>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Full Name</label>
                            <input type="text" required class="form-control" name="residential_rel_two_name" id="residential_rel_two_name" placeholder="Muhammad Ahmad">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Realtion</label>
                            <input type="text" required class="form-control" name="residential_rel_two_realtion" id="residential_rel_two_realtion" placeholder="Father">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Cell No.</label>
                            <input type="text" required class="form-control" name="residential_rel_two_cell_no" id="residential_rel_two_cell_no" placeholder="Muhammad Ahmad">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Complete Address</label>
                            <textarea type="mail" required class="form-control border rounded-pill" name="residential_rel_two_address" id="residential_rel_two_address" placeholder="Address"></textarea>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right" type="button" >Next</button>
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
                            <input type="text" required class="form-control" name="native_rel_one_name" id="native_rel_one_name" placeholder="Muhammad Ahmad">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Realtion</label>
                            <input type="text" required class="form-control" name="native_rel_one_realtion" id="native_rel_one_realtion" placeholder="Father">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Cell No.</label>
                            <input type="text" required class="form-control" name="native_rel_one_cell_no" id="native_rel_one_cell_no" placeholder="Muhammad Ahmad">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Complete Address</label>
                            <textarea type="mail" required class="form-control border rounded-pill" name="native_rel_one_address" id="native_rel_one_address" placeholder="Address"></textarea>
                          </div>
                        </div>
                      </div>
                      <h6>2st Relative</h6>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Full Name</label>
                            <input type="text" required class="form-control" name="native_rel_two_name" id="native_rel_two_name" placeholder="Muhammad Ahmad">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Realtion</label>
                            <input type="text" required class="form-control" name="native_rel_two_realtion" id="native_rel_two_realtion" placeholder="Father">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Cell No.</label>
                            <input type="text" required class="form-control" name="native_rel_two_cell_no" id="native_rel_two_cell_no" placeholder="Muhammad Ahmad">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Complete Address</label>
                            <textarea type="mail" required class="form-control border rounded-pill" name="native_rel_two_address" id="native_rel_two_address" placeholder="Address"></textarea>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right" type="button" >Next</button>
                    </div>
                  </div>
                </div>
                <div class="row setup-content" id="step-4">
                  <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                      <h3>Representative Info</h3>
                      <div class="row">
                        <div class="col-12">
                          <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle mr-2"></i>You did not have access to edit Representative's Information
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Full Name</label>
                            <input type="text" disabled class="form-control" name="representative_name" id="representative_name" placeholder="Muhammad Ahmad">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Sur Name</label>
                            <input type="text" disabled class="form-control" name="representative_surname" id="representative_surname" placeholder="Khokhar">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Passport No.</label>
                            <input type="text" disabled class="form-control" name="representative_passport_no" id="representative_passport_no" placeholder="4545HG6J">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Cell No.</label>
                            <input type="text" disabled class="form-control" name="representative_cell_no" id="representative_cell_no" placeholder="+34032032090932">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="control-label">Complete Address</label>
                            <textarea type="mail" disabled class="form-control border rounded-pill" name="representative_address" id="representative_address" placeholder="Address"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                          <div class="form-check mt-3">
                            <label class="form-check-label">
                            <input class="form-check-input" disabled type="checkbox">
                            <span class="form-check-sign"></span>
                            Have you informed him that you are appointing this person as your Representative in FSF and this person will be authorized to collect your remaining amount?

                            </label>
                            </div>
                        </div>
                      </div>
                      <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right" type="button" >Next</button>
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
                              <input class="form-check-input" type="radio" name="burried_place" id="native_country" value="option1" checked>
                              <label class="form-check-label pl-0" for="native_country">
                                Native country
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="burried_place" id="residential_country" value="option2">
                              <label class="form-check-label pl-0" for="residential_country">
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
                              <input class="form-check-input" type="radio" name="registered_relative" id="yes" value="realtive_input">
                              <label class="form-check-label pl-0" for="yes">
                                Yes
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="registered_relative" id="no" value="option2" checked>
                              <label class="form-check-label pl-0" for="no">
                                No
                              </label>
                            </div>
                          </div>
                          <div class="realtive_input relative_input_div mt-3">
                            <div class="row mb-3">
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Passport No.</label>
                                  <input type="text" required class="form-control" name="representative_passport_no" id="representative_passport_no" placeholder="4545HG6J">
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
                              <input class="form-check-input" type="radio" name="annual_amount" id="zero" value="option1" checked>
                              <label class="form-check-label pl-0" for="zero">
                                I will not give any amount annually
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="annual_amount" id="30" value="option2">
                              <label class="form-check-label pl-0" for="30">
                                € 30
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="annual_amount" id="50" value="option3">
                              <label class="form-check-label pl-0" for="50">
                                € 50
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="annual_amount" id="70" value="option4">
                              <label class="form-check-label pl-0" for="70">
                                € 70
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="annual_amount" id="90" value="option5">
                              <label class="form-check-label pl-0" for="90">
                                € 90
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="annual_amount" id="100" value="option6">
                              <label class="form-check-label pl-0" for="100">
                                € 100
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="annual_amount" id="others" value="others">
                              <label class="form-check-label pl-0" for="others">
                                Others
                              </label>
                            </div>
                          <div class="others other_amount mt-3">
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Enter Amount</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" required class="form-control" name="otheramount" id="otheramount" placeholder="75">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right" type="button" >Next</button>
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
                              <button type="button" class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                              <button type="button" class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                            </div>
                          </div>
                          <div class="row d-none">
                            <div class="col-md-12">
                              <textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <img id="sig-image" src="" alt="Your signature will go here!"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                          <div class="form-check mt-3">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-sign"></span>
                            Have you read carefully to all the conditions and regulations of this funeral service fund?

                            </label>
                            </div>
                        </div>
                      </div>
                      <button class="btn btn-success rounded-pill btn-lg pull-right" type="submit">Submit</button>
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
    $(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
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

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
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
  $(document).ready(function(){
      $('input[name="annual_amount"]').click(function(){
          var inputValue = $(this).attr("value");
          var targetBox = $("." + inputValue);
          $(".other_amount").not(targetBox).hide();
          $(targetBox).show();
      });
  });
  $(document).ready(function(){
      $('input[name="registered_relative"]').click(function(){
          var inputValue = $(this).attr("value");
          var targetBox = $("." + inputValue);
          $(".relative_input_div").not(targetBox).hide();
          $(targetBox).show();
      });
  });
  </script>
@endpush
