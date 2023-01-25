@extends('frontend.main')
@section('title', 'Create Contact Card')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js" integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="{{asset('frontend/assets/css/wizard.css')}}" />
<script src="{{asset('frontend/assets/js/wizard.js')}}"></script>
<script src="https://kit.fontawesome.com/c8243d796b.js" crossorigin="anonymous"></script>
@endsection

@push('css')
<style>

</style>
@endpush

@section('extra_class')
contact-page-navbar
@endsection

@section('banner')
{{-- <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d196344.1371271128!2d-104.8616648!3d39.7424105!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c7eb83b813ed1%3A0x401bdfcb1ed16e1a!2sDenver%20Botanic%20Gardens!5e0!3m2!1sen!2s!4v1616253609220!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>

</div> --}}
@endsection
@section('content')
{{-- Wizard Form --}}
@if (count($errors) > 0)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $error)
    <strong>Error: </strong> {{ $error }}
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
<section>
    <div class="container" style="padding:15%">

        <div class="stepwizard col-md-offset-3 mb-5" style="display: none">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Setup Your Profile</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Upload Image</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Contact Information</p>
                </div>
            </div>
        </div>



        <form id="form" onsubmit="return getPhones();" class="vcard_wizard_form" role="form" action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row setup-content" id="step-1">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        <h2 class="mb-5 text-center">Setup Your Profile</h2>
                        <div class="row">
                            <input type="hidden" name="slug" id="slug" value="{{ $slug }}">

                            <div class="col-lg-12">

                                <div class="form-group mb-4">
                                    <label class="control-label">Email*</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="johndoe@gmail.com" value="{{old('email')}}" required="required" autofocus>
                                    <p class="control_msg"></p>
                                </div>


                                <div class="form-group mb-4">
                                    <label class="control-label">Password*</label>
                                    <input type="password" required class="form-control" name="password" id="password" placeholder="*****">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label">Confirm Password*</label>
                                    <input type="password" required class="form-control" name="password_confirmation" id="password_confirm" placeholder="*****">
                                </div>
                                <div class="form-check mb-5">
                                    <input class="form-check-input " required name="terms" type="checkbox" value="1" id="term_check" checked>
                                    <label class="form-check-label" for="term_check">
                                        I agree with Terms & Conditions
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary px-5 rounded-pill nextBtn mb-5 pull-right first_step_btn" type="button">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        <h2 class="mb-5 text-center">Second Step </h2>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="mb-2 text-center">Upload your Avatar</h5>

                            </div>
                            <div class="col-12">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" name="avatar" accept=".png, .jpg, .jpeg" required />
                                        <label for="imageUpload">
                                            <i class="fal fa-cloud-upload"></i>
                                        </label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url({{asset('frontend/assets/images/user_placeholder.png')}});">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-2 text-center">Card Background Picture <small>Max Size:2000KB</small> </h5>

                                </div>
                                <div class="col-12">
                                    <div class="banner-upload">
                                        <div class="banner-edit">
                                            <input type='file' id="imageUpload_2" name="cover_image"
                                                accept=".png, .jpg, .jpeg"  class="form-control" />
                                            <label for="imageUpload_2">
                                                <i class="fal fa-cloud-upload"></i>
                                            </label>
                                        </div>
                                        <div class="banner-preview">
                                            <div id="cover_image_preview"
                                                style="background-image: url(https://repository-images.githubusercontent.com/297085169/aee2a480-7e7e-11eb-9f34-aa943f1978ea);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        <div class="text-center">
                            <button class="btn btn-warning rounded-pill px-5 mb-5 prevBtn btn-lg pull-left" type="button">Previous</button>

                            <button class="btn btn-primary px-5 rounded-pill nextBtn mb-5 pull-right" type="button">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        <h2 class="mb-5 text-center">Contact Information</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-5">
                                    <label class="control-label">First Name</label>
                                    <input type="text" required class="form-control" name="first_name" id="first_name" placeholder="John" value="{{old('first_name')}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-5">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" required class="form-control" name="last_name" id="last_name" placeholder="Doe" value="{{old('last_name')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-5">
                                    <label class="control-label">Organization</label>
                                    <input type="text" required class="form-control" name="organization" id="organization" placeholder="Add your organization" value="{{old('organization')}}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-5">
                                    <label class="control-label">Designation</label>
                                    <input type="text" required class="form-control" name="designation" id="Designation" placeholder="Add your Designation" value="{{old('designation')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-5">
                                    <label class="control-label">Address</label>
                                    <textarea type="text" required class="form-control" name="address" id="address" placeholder="Add your Address">{{old('address')}}</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-5">
                            <div class="col-lg-12" id="phones">
                                <div  class="row border radius-10 p-3 mb-2">

                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <span class="btn-dark p-2" role="button" onclick="add_phone();"> Add Phone </span>
                            </div>
                        </div>





                        <div class="row mb-5">
                            <div class="col-lg-12" id="emails">

                            </div>
                            <div class="col-lg-12 text-center">
                                <span class="btn-dark p-2" role="button" onclick="add_email();"> Add Email </span>
                            </div>
                        </div>


                        <div class="row mb-5">
                            <div class="col-lg-12" id="websites">
                                <div class="form-group mb-4">
                                    <label class="control-label">Website </label>
                                    <input type="text" class="form-control" name="website[]" placeholder="example.com" value="">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <span class="btn-dark p-2" role="button" onclick="add_website();"> Add Website </span>
                            </div>
                        </div>
                        <h3 class="mb-5 text-center">Your Social Media Information</h3>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Instagram</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="instagram"><i class="color-purple fab fa-instagram" style="font-size: 10px;margin-right:2px"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('instagram')}}" name="instagram" id="instagram" placeholder="Instagram handle" aria-describedby="instagram">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Twitter</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="twitter"></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('twitter')}}" name="twitter" id="twitter" placeholder="twitter handle" aria-describedby="twitter">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Facebook</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="facebook"><i class="color-purple fab fa-facebook" style="font-size: 10px;margin-right:2px"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('facebook')}}" name="facebook" id="facebook" placeholder="facebook handle" aria-describedby="facebook">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Google</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="google"><i class="color-purple fab fa-google" style="font-size: 10px;margin-right:2px"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('google')}}" name="google" id="google" placeholder="google handle" aria-describedby="google">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Linkedin</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="linkedin"><i class="color-purple fab fa-linkedin" style="font-size: 10px;margin-right:2px"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('linkedin')}}" name="linkedin" id="linkedin" placeholder="linkedin handle" aria-describedby="linkedin">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Youtube</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="youtube"><i class="color-purple fab fa-youtube" style="font-size: 10px;margin-right:2px"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('youtube')}}" name="youtube" id="youtube" placeholder="youtube handle" aria-describedby="youtube">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">TikTok</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="tiktok"><i class="color-purple fab fa-tiktok" style="font-size: 10px;margin-right:2px"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('tiktok')}}" name="tiktok" id="tiktok" placeholder="tiktok handle" aria-describedby="tiktok">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Pinterest</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="pinterest"><i class="color-purple fab fa-pinterest" style="font-size: 10px;margin-right:2px"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('pinterest')}}" name="pinterest" id="pinterest" placeholder="pinterest handle" aria-describedby="pinterest">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-warning rounded-pill px-5  prevBtn btn-lg pull-left" type="button">Previous</button>

                            <button class="btn btn-success px-5 rounded-pill btn-lg pull-right" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section>
@endsection


@section('scripts')
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function() {

        var navListItems = $('div.setup-panel div a')
            , allWells = $('.setup-content')
            , allNextBtn = $('.nextBtn')
            , allPrevBtn = $('.prevBtn');

        allWells.hide();

        navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href'))
                , $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allPrevBtn.click(function() {
            var curStep = $(this).closest(".setup-content")
                , curStepBtn = curStep.attr("id")
                , prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev()
                .children("a");

            prevStepWizard.removeAttr('disabled').trigger('click');
        });

        allNextBtn.click(function() {
            var curStep = $(this).closest(".setup-content")
                , curStepBtn = curStep.attr("id")
                , nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next()
                .children("a")
                , curInputs = curStep.find("input[type='file'],input[type='text'],input[type='email'],input[type='password'],input[type='checkbox'],input[type='url']")
                , isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-control").addClass("has-error");

                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });

</script>
{{-- Upload Image --}}
<script>
    $(document).ready(function() {
        $('first_step_btn');
        $("#imagePreview").on('click', function() {
            $("#imageUpload").click();
        })

        add_phone()
        add_email();

    });


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




    $("#imageUpload_2").change(function() {
        readURL2(this);
    });



</script>

@endpush
