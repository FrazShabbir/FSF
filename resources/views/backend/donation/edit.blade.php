@extends('backend.main')
@section('title', 'Update Donation | FSF')

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
                                <h4 class="card-title">Update Donation ({{$donation->donation_code}})</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('donation.update',$donation->donation_code) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="passport_number">Passport Number:</label>
                                        <input type="text" name="passport_number" readonly id="" class="form-control" placeholder="Passport Number" value="{{$donation->passport_number}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="" for="application_id">Application ID:</label>
                                        <input type="text" name="application_id" readonly id="" class="form-control" placeholder="W-App-778767" value="{{$donation->application->application_id}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="donor_bank_name">Donor Bank Name:</label>
                                        <input type="text" name="donor_bank_name" id="" class="form-control" placeholder="Bank ABC" required value="{{$donation->donor_bank_name}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="donor_bank_no">Account Number/IBAN:</label>
                                        <input type="text" name="donor_bank_no" id="" class="form-control" placeholder="Bank-90979" required value="{{$donation->donor_bank_no}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="iso2" class="required">FSF Bank Name</label>

                                        <select name="fsf_bank_id" id="" class="form-control" required>
                                            @foreach ($accounts as $key)
                                                <option value="{{ $key->id }}" {{$donation->fsf_bank_id==$key->id?'selected':''}} >{{ $key->name }} - {{$key->account_number}} - {{$key->bank}} - {{$key->city}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    
                             
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group row mb-4">
                                                <label class="control-label col-sm-12 align-self-center mb-0  required"
                                                    for="country">Country</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="country" id="country_id" required>
                                                        <option selected value="" disabled>Select Your Country </option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">
                                                                {{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group row mb-4">
                                                <label class="control-label col-sm-12 align-self-center mb-0  required"
                                                    for="community">Community</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="community" id="community" required>
                                                        <option selected value="dsds">Select Your Community</option>
                                                    </select>
    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group row mb-4">
                                                <label class="control-label col-sm-12 align-self-center mb-0  required"
                                                    for="province">Province</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="province" id="province_id" required>
                                                        <option selected value="">Select Your </option>
    
                                                    </select>
    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group row mb-4">
                                                <label class="control-label col-sm-12 align-self-center mb-0 required"
                                                    for="city">City</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="city" id="city_id" required>
                                                        <option selected value="">Select Your
                                                            City
                                                        </option>
    
                                                    </select>
    
                                                </div>
                                            </div>
                                        </div>
                                   


                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="amount">Amount:</label>
                                        <input type="number" step="0.01" name="amount" id="" class="form-control" placeholder="90" required value="{{$donation->amount}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="donation_date">Donation Date:</label>
                                        <input type="date" name="donation_date" id="" class="form-control" value="{{$donation->donation_date}}"  required>
                                    </div>
                             

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="status" class="required">Status</label>

                                        <select name="status" id="" class="form-control" required>
                                            <option value="APPROVED" {{$donation->status=='APPROVED'?'selected':''}}>APPROVED</option>
                                            <option value="PENDING" {{$donation->status=='PENDING'?'selected':''}}>PENDING</option>
                                            <option value="REJECTED" {{$donation->status=='REJECTED'?'selected':''}}>REJECTED/REFUNDED</option>
                                        </select>

                                    </div>
                             

                                    

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <p class="required">Receipt</p>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="receipt"
                                                    id="receipt"  accept=".png, .jpg, .jpeg">
                                                <label class="custom-file-label" for="image">Choose Logo
                                                    (.png,.jpeg,jpg)</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                              

                                <button type="submit" class="btn btn-primary mr-3">Update Donation</button>
                                <a href="{{ route('province.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

                            </form>
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
@endpush
