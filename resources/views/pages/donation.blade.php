@extends('backend.main')
@section('title', 'Page')

@section('styles')
@endsection

@push('css')
<style>
.avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  /* border-radius: 100%; */
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-preview > div {
  width: 100%;
  height: 100%;
  /* border-radius: 100%; */
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
            <div class="col-12">
                <div class="iq-card">
                    <div class="iq-card-header pt-5 pb-3">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="ml-4">
                                    <img src="{{asset('frontend/images/fsf-logo.png')}}" width="100px" alt="DawatIslami Logo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="text-center">
                                    <p class="mb-0"><i>Funeral Services Fund</i></p>
                                    <h2 class="mb-0"><u>Upload Donation Receipt</u></h2>
                                    <p class="text-uppercase"><b>Dawateislami</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="iq-card-body p-5">
                        <form action="">
                            <div class="row mb-5">
                                <div class="col-12">
                                    <h4 class="mb-4">
                                        Donor Details:
                                    </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-12 align-self-center mb-0" for="passport_no">Passport No.</label>
                                        <div class="col-sm-12">
                                           <input type="text" class="form-control" id="passport_no" required name="passport_no" placeholder="Enter Doner's Passport No.">
                                        </div>
                                     </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="mt-4">
                                        <button type="button" class="btn btn-primary mt-2">Submit</button>
                                    </div>
                                </div>
                                <div class="offset-lg-2 col-lg-8 offset-md-1 col-md-10 col-sm-12">
                                    <div class="">
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-bold text-dark">
                                                Name
                                            </p>
                                            <p>
                                                Muhammad Akabr
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-bold text-dark">
                                                Registration No.
                                            </p>
                                            <p>
                                                8490874738
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-bold text-dark">
                                                Donation Type
                                            </p>
                                            <p>
                                                FSF members Fund
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-bold text-dark">
                                                Donation Category
                                            </p>
                                            <p>
                                                FSF-22 (Auto as per signed Terms Policy)
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-bold text-dark">
                                                Beneficiary Bank Name
                                            </p>
                                            <p>
                                                Dummy Bank
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-bold text-dark">
                                                Beneficiary Bank AC No.
                                            </p>
                                            <p>
                                                8490874738
                                            </p>
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
                                        <label class="control-label col-sm-12 align-self-center mb-0" for="bank_name">Bank Name:</label>
                                        <div class="col-sm-12">
                                           <input type="text" class="form-control" id="bank_name" required name="bank_name" placeholder="Enter Donner's Bank Name">
                                        </div>
                                     </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-12 align-self-center mb-0" for="bank_ac_no">Bank Account No.</label>
                                        <div class="col-sm-12">
                                           <input type="text" class="form-control" id="bank_ac_no" required name="bank_ac_no" placeholder="Enter Donner's Bank Account No.">
                                        </div>
                                     </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-12 align-self-center mb-0" for="donation_amount">Donation Amount: (€)</label>
                                        <div class="col-sm-12">
                                           <input type="number" class="form-control" id="donation_amount" required name="donation_amount" placeholder="Enter Donation Amount">
                                        </div>
                                     </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-12 align-self-center mb-0" for="donation_date">Donation Date:</label>
                                        <div class="col-sm-12">
                                           <input type="date" class="form-control" name="donation_date" required id="donation_date" placeholder="Enter Donation Date:">
                                        </div>
                                     </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-12 align-self-center mb-0" for="image">Upload Image:</label>
                                        <div class="col-sm-12">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" required id="imageUpload" accept="image/*" >
                                                <label class="custom-file-label" for="image">Choose file</label>
                                             </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                </div>
                                <div class="offset-lg-2 col-lg-8 offset-md-1 col-md-10 col-sm-12">
                                    <div class="avatar-preview mt-5">
                                        <div id="imagePreview" style="background-image: url('../frontend/images/upload_img.jpeg');">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="submit" class="btn btn-danger">Cancle</button>
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
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
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
@endpush
