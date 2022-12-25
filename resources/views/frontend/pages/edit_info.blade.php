@extends('frontend.main')
@section('title', getFullNameById($profile->id).' | Edit')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"
    integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"
    integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="{{asset('frontend/assets/css/wizard.css')}}" />
<script src="{{asset('frontend/assets/js/wizard.js')}}"></script>
@endsection

@push('css')

@endpush

@section('extra_class')
contact-page-navbar
@endsection

@section('banner')

@endsection
@section('content')


<section>
    <div class="container-fluid">

        <div class="mb-5">
            <a href="{{route('card.settings', $profile->username)}}">Card Settings</a>
        </div>

        <div class="stepwizard col-md-offset-3 mb-5" hidden>
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Edit Your Account</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Upload Image</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Add V-Card Information</p>
                </div>
            </div>
        </div>

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

        <form id="form" onsubmit="return getPhones();" class="vcard_wizard_form" role="form"
            action="{{route('contact.update',$profile->username)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row setup-content" id="step-1">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        <h3 class="mb-5 text-center">Update Your Account</h3>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="form-group mb-4">
                                    <label class="control-label">Email*</label>
                                    <input type="email" required class="form-control" name="email" id="email"
                                        placeholder="dummy@gmail.com" required value="{{$profile->email}}">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirm">
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary px-5 rounded-pill nextBtn mb-5 pull-right"
                                        type="button">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2">
                <div class="col-xs-6 col-md-offset-3">
                    <div class="col-md-12">
                        <h3 class="mb-5 text-center">Upload Your Picture</h3>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="mb-2 text-center">Profile Picture</h5>

                            </div>
                            <div class="col-12">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload">
                                            <i class="fal fa-cloud-upload"></i>
                                        </label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"
                                            style="background-image: url({{asset($profile->avatar)??'http://i.pravatar.cc/500?img=7'}});">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary px-5 rounded-pill nextBtn mb-5 pull-right"
                                type="button">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row setup-content" id="step-3">
                <div class="col-lg-6 col-lg-offset-3 offset-lg-3">
                    <div class="col-md-12">
                        <h3 class="mb-5 text-center">Your Contact Information</h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-5">
                                    <label class="control-label">First Name</label>
                                    <input type="text" required class="form-control" name="first_name" id="first_name"
                                        placeholder="John" value="{{$profile->first_name}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-5">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" required class="form-control" name="last_name" id="last_name"
                                        placeholder="Doe" value="{{$profile->last_name}}">
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="form-group mb-5">
                                    <label class="control-label">Organization</label>
                                    <input type="text" required class="form-control" name="organization"
                                        id="organization" placeholder="Add your organization"
                                        value="{{$profile->organization}}">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="form-group mb-5">
                                    <label class="control-label">Designation</label>
                                    <input type="text" required class="form-control" name="designation" id="Designation"
                                        placeholder="Add your Designation" value="{{$profile->designation}}">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="form-group mb-5">
                                    <label class="control-label">Address</label>
                                    <textarea type="text" required class="form-control" name="address" id="address"
                                        placeholder="Add your Address">{{$profile->address}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-lg-12" id="phones">

                                @foreach($profile->phones as $phone)

                                @php $container_id = "phone_container_". $phone->id; @endphp
                                <div class="row border radius-10 p-3 mb-2" id="{{$container_id}}">
                                    <div class="col-sm-12">
                                        <div class="form-group mb-4">
                                            <label class="control-label">Phone </label>
                                            <select class="form-control" name="additional_phone_type_{{$phone->id}}">
                                                @foreach($phoneTypes as $type)
                                                <option @if($type==$phone->type) selected @endif> {{$type }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-4">
                                            <input type="text" id="{{"phone_id_".$phone->id}}" target="{{"full_phone_".$phone->id}}" class="form-control
                                            phone_number" placeholder="" value="{{$phone->phone}}">
                                            <input type="hidden" id="{{"full_phone_".$phone->id}}" class="form-control"
                                            name="additional_phone_{{$phone->id}}" placeholder=""
                                            value="{{$phone->phone}}">
                                        </div>
                                    </div>

                                    @if (! $loop->first)

                                    <div class="col-sm-12">
                                        <i onclick="removeById('{{$container_id}}')"
                                            class="float-right fa fa-minus-circle fa-lg text-danger"></i>
                                    </div>
                                    @endif

                                </div>

                                @endforeach
                            </div>
                            <div class="col-lg-12 text-center pt-2">
                                <span class="btn-dark p-2" role="button" onclick="add_phone();"> Add Phone </span>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-lg-12" id="emails">


                                @foreach($profile->emails as $email)
                                @php $container_id = "email_container_". $email->id; @endphp
                                <div class="row border radius-10 p-3 mb-2" id="{{$container_id}}">


                                    <div class="col-sm-12">
                                        <div class="form-group mb-4">
                                            <label class="control-label">Email </label>
                                            <select class="form-control" name="additional_emails_type_{{$email->id}}">
                                                @foreach($emailTypes as $type)
                                                <option @if($type==$email->type) selected @endif>{{$type}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group mb-4">
                                            <input type="email" class="form-control"
                                                name="additional_emails_{{$email->id}}" placeholder="user@company.com"
                                                value="{{$email->email}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <i onclick="removeById('{{$container_id}}')"
                                            class="float-right fa fa-minus-circle fa-lg text-danger"></i>
                                    </div>

                                </div>

                                @endforeach

                            </div>
                            <div class="col-lg-12 text-center pt-2">
                                <span class="btn-dark p-2" role="button" onclick="add_email();"> Add Email </span>
                            </div>
                        </div>


                        <div class="row mb-5">
                            <div class="col-lg-12" id="websites">
                                @foreach($profile->websites as $row)
                                @php $container_id = "email_container_". $row->id; @endphp
                                <div class="form-group mb-4">
                                    <label class="control-label">Website </label>
                                    <input type="text" class="form-control" name="website[]" placeholder="example.com"
                                        value="{{$row->website}}">
                                </div>

                                <div class="col-sm-12">
                                    <i onclick="removeById('{{$container_id}}')"
                                        class="float-right fa fa-minus-circle fa-lg text-danger"></i>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-lg-12 text-center pt-2">
                                <span class="btn-dark p-2" role="button" onclick="add_website();"> Add Website </span>
                            </div>
                        </div>



                        <h3 class="mb-5 text-center">Your Social Media Information</h3>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Instagram</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="instagram"><i
                                                class="color-purple fab fa-instagram"
                                                style="font-size: 25px;margin-right:2px"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{$profile->instagram}}"
                                        name="instagram" id="instagram" placeholder="Instagram handle"
                                        aria-describedby="instagram">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Twitter</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="twitter"><i
                                                class="color-purple fab fa-twitter"
                                                style="font-size: 25px;margin-right:2px"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{$profile->twitter}}" name="twitter"
                                        id="twitter" placeholder="twitter handle" aria-describedby="twitter">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Facebook</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="facebook"><i
                                                class="color-purple fab fa-facebook"
                                                style="font-size: 25px;margin-right:2px"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{$profile->facebook}}"
                                        name="facebook" id="facebook" placeholder="facebook handle"
                                        aria-describedby="facebook">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Google</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="google"><i class="color-purple fab fa-google"
                                                style="font-size: 25px;margin-right:2px"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{$profile->google}}" name="google"
                                        id="google" placeholder="google handle" aria-describedby="google">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Linkedin</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="linkedin"><i
                                                class="color-purple fab fa-linkedin"
                                                style="font-size: 25px;margin-right:2px"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" value="{{$profile->linkedin}}"
                                        name="linkedin" id="linkedin" placeholder="linkedin handle"
                                        aria-describedby="linkedin">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Youtube</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="youtube"><i
                                                class="color-purple fab fa-youtube"
                                                style="font-size: 25px;margin-right:2px"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{$profile->youtube}}" name="youtube"
                                        id="youtube" placeholder="youtube handle" aria-describedby="youtube">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">TikTok</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="tiktok"><i class="color-purple fab fa-tiktok"
                                                style="font-size: 25px;margin-right:2px"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" value="{{$profile->tiktok}}" name="tiktok"
                                        id="tiktok" placeholder="tiktok handle" aria-describedby="tiktok">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label class="control-label">Pinterest</label>
                                <div class="input-group mb-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="pinterest"><i
                                                class="color-purple fab fa-pinterest"
                                                style="font-size: 25px;margin-right:2px"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" value="{{$profile->pinterest}}"
                                        name="pinterest" id="pinterest" placeholder="pinterest handle"
                                        aria-describedby="pinterest">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-success px-5 rounded-pill btn-lg pull-right"
                                type="submit">Submit</button>
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
            , allNextBtn = $('.nextBtn');

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


        $(".phone_number").each(function(index) {
            selector = "#" + $(this).attr('id')
            console.log(selector);
            loadPhoneValidator(selector);
        });
    });

</script>
{{-- Upload Image --}}
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
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#cover_image_preview').css('background-image', 'url(' + e.target.result + ')');
                $('#cover_image_preview').hide();
                $('#cover_image_preview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload_2").change(function() {
        readURL2(this);
    });

</script>
@endpush
