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
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">APPLICATION : <b>{{$application->application_id}}</b> <span class="badge badge-{{$application->status}}">{{$application->status}}</span> <small> <span class="badge badge-info">Exp: {{$application->renewal_date}}</span></small></h4> 
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
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" >2</a>
                    <p>Relative  (Residential)</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" >3</a>
                    <p>Relative  (Native)</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" >4</a>
                    <p>Rep Info</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-5" type="button" class="btn btn-default btn-circle" >5</a>
                    <p>Supplymentary</p>
                  </div>
                  <div class="stepwizard-step">
                    <a href="#step-6" type="button" class="btn btn-default btn-circle" >6</a>
                    <p>Sign</p>
                  </div>
                </div>
              </div>

              <div>
                <div class="row setup-content" id="step-1">
                  <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                      <h3>Personal Info</h3>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Full Name
                            </h6>
                            <p class="lead">
                              {{$application->full_name}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Father Name
                            </h6>
                            <p class="lead">
                              {{$application->father_name}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Sur Name
                            </h6>
                            <p class="lead">
                              {{$application->surname}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Gender
                            </h6>
                            <p class="lead">
                              {{$application->gender}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Date of Birth
                            </h6>
                            <p class="lead">
                              {{date('d-M-Y', strtotime($application->dob))}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Passport No.
                            </h6>
                            <p class="lead">
                              {{$application->passport_number}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              European Residence Card No.
                            </h6>
                            <p class="lead">
                              {{$application->nie}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Cell No.
                            </h6>
                            <p class="lead">
                              {{$application->phone}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Email Address
                            </h6>
                            <p class="lead">
                              {{$application->user->email}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <h6>Complete Residential Address</h6>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Country
                            </h6>
                            <p class="lead">
                              {{$application->country->name}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Community
                            </h6>
                            <p class="lead">
                              {{$application->community->name}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Province
                            </h6>
                            <p class="lead">
                              {{$application->province->name}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              City
                            </h6>
                            <p class="lead">
                              {{$application->city->name}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Area / Street / House No.
                            </h6>
                            <p class="lead">
                             {{$application->area}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Native Country:
                            </h6>
                            <p class="lead">
                              {{$application->native_country}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              ID Card No. (Native Country)
                            </h6>
                            <p class="lead">
                              {{$application->native_id}}

                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Complete Address (Native Country)
                            </h6>
                            <p class="lead">
                              {{$application->native_country_address}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <a class="btn btn-danger rounded-pill btnEdit  mb-5 pull-right ml-3" href="{{route('enrollment.edit',$application->application_id)}}" >EDIT</a>

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
                          <div class="">
                            <h6>
                              Full Name
                            </h6>
                            <p class="lead">
                              {{$application->s_relative_1_name}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Realtion
                            </h6>
                            <p class="lead">
                              {{$application->s_relative_1_relation}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Cell No.
                            </h6>
                            <p class="lead">
                              {{$application->s_relative_1_phone}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Complete Address
                            </h6>
                            <p class="lead">
                              {{$application->s_relative_1_address}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <h6>2st Relative</h6>
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="">
                              <h6>
                                Full Name
                              </h6>
                              <p class="lead">
                                {{$application->s_relative_2_name}}
                              </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Realtion
                            </h6>
                            <p class="lead">
                              {{$application->s_relative_2_relation}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Cell No.
                            </h6>
                            <p class="lead">
                              {{$application->s_relative_2_phone}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Complete Address
                            </h6>
                            <p class="lead">
                              {{$application->s_relative_2_address}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <a class="btn btn-danger rounded-pill btnEdit  mb-5 pull-right ml-3" href="{{route('enrollment.edit',$application->application_id)}}" >EDIT</a>
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
                          <div class="">
                            <h6>
                              Full Name
                            </h6>
                            <p class="lead">
                              {{$application->n_relative_1_name}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Realtion
                            </h6>
                            <p class="lead">
                              {{$application->n_relative_1_relation}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Cell No.
                            </h6>
                            <p class="lead">
                              {{$application->n_relative_1_phone}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Complete Address
                            </h6>
                            <p class="lead">
                              {{$application->n_relative_1_address}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <h6>2st Relative</h6>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Full Name
                            </h6>
                            <p class="lead">
                              {{$application->n_relative_2_name}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Realtion
                            </h6>
                            <p class="lead">
                              {{$application->n_relative_2_relation}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Cell No.
                            </h6>
                            <p class="lead">
                              {{$application->n_relative_2_phone}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Complete Address
                            </h6>
                            <p class="lead">
                              {{$application->n_relative_2_address}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <a class="btn btn-danger rounded-pill btnEdit  mb-5 pull-right ml-3" href="{{route('enrollment.edit',$application->application_id)}}" >EDIT</a>

                      <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right" type="button" >Next</button>
                    </div>
                  </div>
                  
                </div>
                <div class="row setup-content" id="step-4">
                  <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                      <h3>Representative Info</h3>
                      <div class="row">
                        <!-- <div class="col-12">
                          <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle mr-2"></i>You did not have access to edit Representative's Information
                          </div>
                        </div> -->
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Full Name
                            </h6>
                            <p class="lead">
                            {{$application->rep_name}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Sur Name
                            </h6>
                            <p class="lead">
                              {{$application->rep_surname}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Passport No.
                            </h6>
                            <p class="lead">
                              {{$application->rep_passport_no}}
                            </p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Cell No.
                            </h6>
                            <p class="lead">
                              {{$application->rep_phone}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Complete Address
                            </h6>
                            <p class="lead">
                              {{$application->rep_address}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                          <div class="form-check mt-3">
                            <label class="form-check-label">
                            <input class="form-check-input" checked disabled type="checkbox">
                            <span class="form-check-sign"></span>
                            Have you informed him that you are appointing this person as your Representative in FSF and this person will be authorized to collect your remaining amount?

                            </label>
                            </div>
                        </div>
                      </div>
                      <a class="btn btn-danger rounded-pill btnEdit  mb-5 pull-right ml-3" href="{{route('enrollment.edit',$application->application_id)}}" >EDIT</a>
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
                          <div class="">
                            <h6>
                              Where do you want to be buried?
                            </h6>
                            <p class="lead">
                            {{$application->buried_location}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="">
                            <h6>
                              Do you have any relatives registered in this fund?
                            </h6>
                            <p class="lead">
                              {{$application->registered_relatives==1?'Yes':'No'}}
                            </p>
                          </div>
                          <div class="realtive_input  mt-3">
                            <div class="row mb-5">
                              <div class="col-12">
                                <div>
                                  <div class="table-responsive">
                                    <table class="table small">
                                      <tbody>
                                        <tr>
                                          <th>
                                            Passport No.
                                          </th>
                                          <td class="text-right">
                                            4545HG6J
                                          </td>
                                        </tr>
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
                          <div class="">
                            <h6>
                              How much will you pay annually into this fund?
                            </h6>
                            <p class="lead">
                              € {{$application->annually_fund_amount}}
                            </p>
                          </div>
                        </div>
                      </div>
                      <a class="btn btn-danger rounded-pill btnEdit  mb-5 pull-right ml-3" href="{{route('enrollment.edit',$application->application_id)}}" >EDIT</a>
                      <button class="btn btn-primary rounded-pill nextBtn mb-5 pull-right" type="button" >Next</button>
                    </div>
                  </div>
                </div>
                <div class="row setup-content" id="step-6">
                  <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                      <div class="">
                        <h6 class="mb-3">
                          Signature
                        </h6>
                        <p class="lead">
                          <img width="300px" src="{{$application->user_signature}}" alt="sign">
                        </p>
                      </div>
                      <div class="row mb-5">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                          <div class="form-check mt-3">
                            <label class="form-check-label">
                            <input class="form-check-input" disabled checked type="checkbox">
                            <span class="form-check-sign"></span>
                            Have you read carefully to all the conditions and regulations of this funeral service fund?

                            </label>
                            </div>
                        </div>
                      </div>
                      <button class="btn btn-success rounded-pill mb-5 pull-right" type="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Status</b> </h4> 
        </div>
        <div class="card-body">
          <div class="container">
            @foreach ($application->comments as $status )
            <div class="row pb-3">
              <div class="col-12"><span class="badge badge-{{$status->status}}">{{$status->status}}</span></div>
              <div class="col-12">{{$status->comment}}</div>
              <div class="col-12">{{date('d-M-y',strtotime($status->created_at))}}</div>
            </div>
            @endforeach
         
          </div>
        </div></div></div>
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
