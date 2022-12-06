@extends('backend.main')
@section('title', 'Account Closing Form')

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
                        <div class="iq-card-header d-flex justify-content-between bg-danger">
                            <div class="iq-header-title">
                                <h4 class="card-title text-light">Permanent Account closing form</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('user.close.account.save',$user->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Full Name</label>
                                        <input type="text" class="form-control" disabled placeholder="e.g. Ali"
                                            value="{{ $user->full_name }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">NIE</label>
                                        <input type="text" class="form-control" disabled placeholder="e.g. Ali"
                                            value="{{ $user->application->nie }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Passport Number</label>
                                        <input type="text" class="form-control" disabled placeholder="e.g. Ali"
                                            value="{{ $user->application->passport_number }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Application ID</label>
                                        <input type="text" class="form-control" disabled placeholder="e.g. Ali"
                                            value="{{ $user->application->application_id }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="deceased_at" class="required">Date of Death</label>
                                        <input type="date" name="deceased_at" class="form-control"  placeholder="e.g. Ali"
                                            value="" required>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="process_start_at" class="required">Process Started at</label>

                                        <input type="date" name="process_start_at" class="form-control"  placeholder="e.g. Ali"
                                            value="" required>
                                    </div>
                                </div>


                                <div class="row">


                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="process_ends_at" class="required">Process Ended at</label>

                                        <input type="date" name="process_ends_at" class="form-control"  placeholder="e.g. Ali"
                                            value="" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Total Donations</label>
                                        <input type="text" id="totalDonations" class="form-control" disabled
                                            placeholder="100" value="{{ $user->totaldonations->sum('amount') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Amount Used For Process</label>
                                        <input type="number" step="0.01" name="amount_used" id="amountUsed" class="form-control" placeholder="100"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h3>FSF payable amount: <span id="expense">0</span></h3>
                                    </div>
                                </div>

                                <div class="mt-5 mb-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-2 col-sm-12">
                                            <div class="mt-2 mb-3">
                                                <h4 class="required">
                                                    Application Status
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {{-- <label for="exampleFormControlSelect1">Select Input</label> --}}
                                                <select class="form-control" id="exampleFormControlSelect1" required
                                                    name="status">
                                                    <option selected="" disabled="">Select Status</option>
                                                    <option value="4" {{$user->status==4?'selected':''}}>PERMANENT CLOSE ACCOUNT</option>
                                                    <option value="1" {{$user->status==1?'selected':''}}>Active</option>
                                                    <option value="0" {{$user->status==0?'selected':''}}>In-Active</option>
                                                    <option value="3" {{$user->status==3?'selected':''}}>In Closing process</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 mb-4">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-2 col-sm-12">
                                            <div class="mt-2 mb-3">
                                                <h4 class="required">
                                                    Remaining Amount Payed to Representative (if any):
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                {{-- <label for="exampleFormControlSelect1">Select Input</label> --}}
                                                <select class="form-control" id="exampleFormControlSelect1" required
                                                    name="rep_received_amount">
                                                    <option value="YES">YES</option>
                                                    <option value="NO">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-danger mr-3">CLOSE ACCOUNT</button>
                                <a href="{{ route('users.index') }}" class="btn iq-bg-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>

                @include('backend.users.partials._donation_stats')

                @include('backend.users.partials._rep_info')

            </div>
        </div>
    </div>




@endsection


@section('scripts')

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#amountUsed').change(function() {
                var totalDonations = $('#totalDonations').val();
                var amountUsed = $('#amountUsed').val();
                var calculations = totalDonations - amountUsed;
                $('#expense').text(calculations);
            });

        });
    </script>
@endpush
