@extends('backend.main')
@section('title', 'General Settings')

@section('styles')
@endsection

@push('css')
@endpush



@section('content')

    <div class="content-page" id="content-page">
        <div class="container-fluid ">
            <div class="row ">

                <div class="col-12">
                    <div class="iq-card">
                        <div class="iq-card-body px-4">
                            <div class="">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="general_setting-tab" data-toggle="tab"
                                            href="#general_setting" role="tab" aria-controls="general_setting"
                                            aria-selected="true">General Setting</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                            role="tab" aria-controls="contact" aria-selected="false">Contact
                                            Information</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="terms-tab" data-toggle="tab" href="#terms_tab"
                                            role="tab" aria-controls="terms" aria-selected="false">Terms and
                                            Conditions</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="cookies-tab" data-toggle="tab" href="#cookies"
                                            role="tab" aria-controls="cookies" aria-selected="false">Cookies
                                            Policies</a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="general_setting" role="tabpanel"
                                        aria-labelledby="general_setting-tab">
                                        <form action="{{ route('site_settings_save') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 mb-3">
                                                    <label for="role_name">Site Title</label>
                                                    <input type="text" class="form-control" id="site_title"
                                                        placeholder="FSF" name="site_title"
                                                        value="{{ fromSettings('site_title') ?? old('site_title') }}">
                                                </div>
                                                <div class="col-md-6 col-sm-12 mb-3">
                                                    <label for="short_title">Short Title</label>
                                                    <input type="text" class="form-control" id="short_title"
                                                        placeholder="FSF" name="short_title"
                                                        value="{{ fromSettings('short_title') ?? old('short_title') }}">
                                                </div>

                                                <div class="col-md-6 col-sm-12 mb-3">
                                                    <label for="role_name">Copyrights text</label>
                                                    <input type="text" class="form-control" id="copyrights"
                                                        placeholder="Copyright 2022 Finance FSF" name="copyrights"
                                                        value="{{ fromSettings('copyrights') ?? old('copyrights') }}">
                                                </div>

                                                {{-- <div class="col-md-6 col-sm-12 mb-3">
                                            <label for="">Dummy</label>
                                            <div class="form-group">
                                                <select class="form-control" name="role-select" id="role-select">
                                                    <option selected="" disabled="">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">In Active</option>
                                                </select>
                                            </div>
                                        </div> --}}

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 mb-3">
                                                    <div class="form-group">
                                                        <p class="required">Site Logo</p>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="logo"
                                                                id="logo">
                                                            <label class="custom-file-label" for="image">Choose Logo
                                                                (.png,.jpeg,jpg)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 mb-3">
                                                    {{-- // show the image here --}}
                                                    <img src="{{ asset(fromSettings('logo') ?? 'assets/images/logo.png') }}"
                                                        alt="" class="img-fluid" style="max-width:200px;">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 mb-3">
                                                    <div class="form-group">
                                                        <p class="required">Site favicon</p>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="favicon"
                                                                id="favicon">
                                                            <label class="custom-file-label" for="image">Choose Logo
                                                                (.png,.jpeg,jpg)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12 mb-3">
                                                    {{-- // show the image here --}}
                                                    <img src="{{ asset(fromSettings('favicon') ?? 'assets/images/logo.png') }}"
                                                        alt="" class="img-fluid" style="max-width:200px;">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-3">Submit</button>
                                            <button type="button" class="btn iq-bg-danger">Cancel</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <form action="{{ route('site_settings_save') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12 mb-3">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" id="phone"
                                                        placeholder="012678687" name="phone"
                                                        value="{{ fromSettings('phone') }}">
                                                </div>
                                                <div class="col-md-6 col-sm-12 mb-3">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address"
                                                        placeholder="Address" name="address"
                                                        value="{{ fromSettings('address') }}">
                                                </div>
                                                <div class="col-md-6 col-sm-12 mb-3">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="email" name="email"
                                                        value="{{ fromSettings('email') }}">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-3">Submit</button>
                                            <button type="button" class="btn iq-bg-danger">Cancel</button>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="terms_tab" role="tabpanel"
                                        aria-labelledby="terms-tab">
                                        <form action="{{ route('site_settings_save') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 mb-3">
                                                    <label for="terms">Terms</label>
                                                    <textarea type="text" class="form-control" id="terms" placeholder="Write your Policies" name="terms">{{ fromSettings('terms') }}</textarea>
                                                </div>

                                                <div class="col-md-12 col-sm-12 mb-3">
                                                    <label for="about">About</label>
                                                    <textarea type="text" class="form-control" id="about" placeholder="Write your About" name="about">{{ fromSettings('about') }}</textarea>
                                                </div>
                                                <div class="col-md-12 col-sm-12 mb-3">
                                                    <label for="privacy">privacy</label>
                                                    <textarea type="text" class="form-control" id="privacy" placeholder="Write your Policies" name="privacy">{{ fromSettings('privacy') }}</textarea>
                                                </div>

                                                <div class="col-md-12 col-sm-12 mb-3">
                                                    <label for="terms">Upload File</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="terms_pdf"
                                                            id="terms_pdf" accept=".pdf">
                                                        <label class="custom-file-label" for="terms_pdf">Choose PDF
                                                            (.pdf)</label>
                                                    </div>


                                                </div>
                                                @if (fromSettings('terms_pdf'))
                                                    <div class="col-md-12 col-sm-12 mb-3">
                                                        <a for="terms" download
                                                            href="{{ asset(fromSettings('terms_pdf')) }}"><i
                                                                class="las la-arrow-down"></i> Dowonload Terms and
                                                            Conditions </a>
                                                    </div>
                                                @endif


                                                <div class="col-md-12 col-sm-12 mb-3">
                                                    <label for="terms">Upload File (Urdu)</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            name="terms_pdf_urdu" id="terms_pdf_urdu" accept=".pdf">
                                                        <label class="custom-file-label" for="terms_pdf_urdu">Choose PDF
                                                            (.pdf)</label>
                                                    </div>


                                                </div>
                                                @if (fromSettings('terms_pdf_urdu'))
                                                    <div class="col-md-12 col-sm-12 mb-3">
                                                        <a for="terms" download
                                                            href="{{ asset(fromSettings('terms_pdf_urdu')) }}"><i
                                                                class="las la-arrow-down"></i> Dowonload Terms and
                                                            Conditions </a>
                                                    </div>
                                                @endif


                                                <div class="col-md-12 col-sm-12 mb-3">
                                                    <label for="terms">Upload File (About Manual)</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            name="manual" id="manual" accept=".pdf">
                                                        <label class="custom-file-label" for="manual">Choose PDF
                                                            (.pdf)</label>
                                                    </div>


                                                </div>
                                                @if (fromSettings('manual'))
                                                    <div class="col-md-12 col-sm-12 mb-3">
                                                        <a for="terms" download
                                                            href="{{ asset(fromSettings('manual')) }}"><i
                                                                class="las la-arrow-down"></i> Download Manual </a>
                                                    </div>
                                                @endif

                                                <div class="col-md-12 col-sm-12 mb-3">
                                                    <label for="privacy">Show Notification Icon</label>
                                                    <select name="notification_icon" id="" class="form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>



                                            </div>
                                            <button type="submit" class="btn btn-primary mr-3">Submit</button>
                                            <button type="button" class="btn iq-bg-danger">Cancel</button>
                                        </form>
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
    <script>
        var ct = 1;

        function new_link() {
            ct++;
            var div1 = document.createElement('div');
            div1.id = ct;
            // link to delete extended form elements
            var delLink =
                '<div style="text-align:right;margin-right:65px"><a class="btn btn-danger" href="javascript:delIt(' + ct +
                ')"><i class="las la-trash"></i>Delete</a></div>';
            div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
            document.getElementById('newlink').appendChild(div1);
        }
        // function to delete the newly added set of elements
        function delIt(eleId) {
            d = document;
            var ele = d.getElementById(eleId);
            var parentEle = d.getElementById('newlink');
            parentEle.removeChild(ele);
        }
    </script>

    <script src="https://cdn.ckeditor.com/4.20.0/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('terms');
        CKEDITOR.replace('privacy');
        CKEDITOR.replace('about');
    </script>
@endpush
