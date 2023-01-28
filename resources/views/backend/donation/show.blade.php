@extends('backend.main')
@section('title', 'Show Donation | FSF')

@section('styles')
@endsection

@push('css')
@endpush



@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Donation  Details({{$donation->donation_code}})</h4>
                            </div>
                            <div class="iq-header-title">
                                <button class="btn btn-primary">Applicant  ({{$donation->user->full_name}})</button>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                          
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="passport_number">Passport Number:</label>
                                        <input type="text"   id="" disabled class="form-control" placeholder="Passport Number" value="{{$donation->passport_number}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="" for="application_id">Application ID:</label>
                                        <input type="text"  id="" disabled class="form-control" placeholder="W-App-778767" value="{{$donation->application->application_id}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="donor_bank_name">Donor Bank Name:</label>
                                        <input type="text"  id="" disabled class="form-control" placeholder="Bank ABC" required value="{{$donation->donor_bank_name}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="donor_bank_no">Account Number/IBAN:</label>
                                        <input type="text"  id="" disabled class="form-control" placeholder="Bank-90979" required value="{{$donation->donor_bank_no}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="iso2" class="required">FSF Bank Name</label>
                                        <input type="text"  id="" disabled class="form-control" placeholder="Bank-90979" required value="{{$donation->fsf_bank_id}}">

                                      

                                    </div>

                                    

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="amount">Amount:</label>
                                        <input type="number" step="0.01" name="amount" id="" disabled class="form-control" placeholder="90" required value="{{$donation->amount}}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="donation_date">Donation Date:</label>
                                        <input type="date" name="donation_date" id="" disabled class="form-control" value="{{$donation->donation_date}}"  required>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="status" class="required">Status</label>
                                        <input type="text"  id="" disabled class="form-control" placeholder="Bank-90979" required value="{{$donation->status}}">

                                    </div>
                             

                                    

                                 

                                </div>

                              @if ($donation->status=='PENDING')
                              <a href="{{ route('donation.edit',$donation->donation_code) }}" class="btn btn-primary mr-3">Update Donation</a>

                              @endif

                              <a href="{{ route('donation.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

                         
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Donation Receipt ({{$donation->donation_code}})</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 mb-3">
                                        <img src="{{asset($donation->receipt)}}" alt="{{$donation->donation_code}}" class="img-fluid">
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
