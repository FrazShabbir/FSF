@extends('backend.main')
@section('title', 'Page')

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
                                <h4 class="card-title">Edit Bank Details</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('account.update', $account->code) }}" method="POST">
                                @csrf
                                {{ @method_field('PUT') }}
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="bank_name" class="required">Account Type</label>
                                        <input type="text" class="form-control"
                                            value="{{ ucfirst($account->account_type) }} Account" disabled>

                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="bank" class="required">Bank Name</label>
                                        <input type="text" class="form-control" value="{{ $account->bank }}"
                                            name="bank" placeholder="e.g. HBL">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Account Title</label>
                                        <input type="text" class="form-control" value="{{ $account->name }}"
                                            name="name" placeholder="e.g. Raza">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="account_number" class="required">Account Number</label>
                                        <input type="text" class="form-control" value="{{ $account->account_number }}"
                                            id="account_number" name="account_number" placeholder="e.g. 23456789">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="blalnce" class="">Account Balance <small>(For Changing balance
                                                Please Create Vouchers)</small></label>
                                        <input type="number" disabled value="{{ $account->balance }}" class="form-control"
                                            id="balance" placeholder="e.g. 6000">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="cityr" class="required">Bank City</label>
                                        <input type="text" class="form-control" value="{{ $account->city }}"
                                            id="city" name="city" placeholder="e.g. Gujrat">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="cityr" class="required">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="ACTIVE" {{ $account->status == 'ACTIVE' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="INACTIVE" {{ $account->status == 'INACTIVE' ? 'selected' : '' }}>
                                                InActive</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-3">Submit</button>
                                <a href="{{ route('account.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#CreditAccount">
                                    Credit Account
                                </button>

                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#DebitAccount">
                                    Debit Account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="CreditAccount" tabindex="-1" role="dialog" aria-labelledby="CreditAccountLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreditAccountLabel">Add Cash To Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('account.topup', $account->code) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 mb-3">
                                <label for="amount" class="required">Amount</label>
                                <input type="text" class="form-control" value="" name="amount">

                            </div>
                            <div class="col-md-6 col-sm-6 mb-3">
                                <label for="details" class="required">Details</label>
                                <input type="text" class="form-control" value="" name="details">
                            </div>

                            <div class="col-md-6 col-sm-6 mb-3">
                                <label for="city" class="required">Country</label>

                                <select class="form-control country_id" name="country" id="country_id" required>
                                    <option selected value="" disabled>Select Your Country </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">
                                            {{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-6 col-sm-6 mb-3">
                                <label for="community" class="required">Community</label>

                                <select class="form-control community" name="community" id="community" required>
                                    <option selected value="dsds">Select Your Community</option>
                                </select>
                            </div>


                            <div class="col-md-6 col-sm-6 mb-3">
                                <label for="community" class="required">province</label>

                                <select class="form-control province_id" name="province" id="province_id" required>
                                    <option selected value="">Select Your </option>

                                </select>
                            </div>


                            <div class="col-md-6 col-sm-6 mb-3">
                                <label for="city" class="required">City</label>

                                <select class="form-control city_id" name="city" id="city_id" required>
                                    <option selected value="">Select Your
                                        City
                                    </option>
                                </select>
                            </div>




                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="DebitAccount" tabindex="-1" role="dialog" aria-labelledby="DebitAccountLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DebitAccountLabel">Debit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('account.expense', $account->code) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 mb-3">
                            <label for="amount" class="required">Amount</label>
                            <input type="text" class="form-control" value="" name="amount">

                        </div>
                        <div class="col-md-6 col-sm-6 mb-3">
                            <label for="details" class="required">Details</label>
                            <input type="text" class="form-control" value="" name="details">
                        </div>

                        <div class="col-md-6 col-sm-6 mb-3">
                            <label for="city" class="required">Country</label>

                            <select class="form-control country_id" name="country" id="country_id" required>
                                <option selected value="" disabled>Select Your Country </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-6 col-sm-6 mb-3">
                            <label for="community" class="required">Community</label>

                            <select class="form-control community" name="community" id="community" required>
                                <option selected value="dsds">Select Your Community</option>
                            </select>
                        </div>


                        <div class="col-md-6 col-sm-6 mb-3">
                            <label for="community" class="required">province</label>

                            <select class="form-control province_id" name="province" id="province_id" required>
                                <option selected value="">Select Your </option>

                            </select>
                        </div>


                        <div class="col-md-6 col-sm-6 mb-3">
                            <label for="city" class="required">City</label>

                            <select class="form-control city_id" name="city" id="city_id" required>
                                <option selected value="">Select Your
                                    City
                                </option>

                            </select>
                        </div>




                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.country_id').on('change', function() {

                var country_id = this.value;
                $(".community").html('');
                $.ajax({
                    url: "{{ route('get.communities') }}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('.community').html(
                            '<option value="">-- Select community --</option>');
                        $.each(result.community, function(key, value) {
                            $(".community").append('<option value="' + value
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
            $('.community').on('change', function() {
                var community_id = this.value;
                $(".province_id").html('');
                $.ajax({
                    url: "{{ route('get.provinces') }}",
                    type: "POST",
                    data: {
                        community_id: community_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('.province_id').html(
                            '<option value="">-- Select Province --</option>');
                        $.each(result.provinces, function(key, value) {
                            $(".province_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });


            $('.province_id').on('change', function() {
                var province_id = this.value;
                $(".city_id").html('');
                $.ajax({
                    url: "{{ route('get.cities') }}",
                    type: "POST",
                    data: {
                        province_id: province_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('.city_id').html('<option value="">-- Select Province --</option>');
                        $.each(result.cities, function(key, value) {
                            $(".city_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });


        });
    </script>
@endpush
