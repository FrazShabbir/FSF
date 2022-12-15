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
                                <h4 class="card-title text-light">Permanent Application closing form</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('user.close.application.save', $application->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Full Name</label>
                                        <input type="text" class="form-control" disabled placeholder="e.g. Ali"
                                            value="{{ $application->full_name }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">NIE</label>
                                        <input type="text" class="form-control" disabled placeholder="e.g. Ali"
                                            value="{{ $application->nie }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Passport Number</label>
                                        <input type="text" class="form-control" disabled placeholder="e.g. Ali"
                                            value="{{ $application->passport_number }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Application ID</label>
                                        <input type="text" class="form-control" disabled placeholder="e.g. Ali"
                                            value="{{ $application->application_id }}">
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="deceased_at" class="required">Application Closing Date/Date of
                                            Death</label>
                                        <input type="date" name="deceased_at" class="form-control" placeholder="e.g. Ali"
                                            value="" required>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="process_start_at" class="required">Process Started at</label>

                                        <input type="date" name="process_start_at" class="form-control"
                                            placeholder="e.g. Ali" value="" required>
                                    </div>
                                </div>


                                <div class="row">


                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="process_ends_at" class="required">Process Ended at</label>

                                        <input type="date" name="process_ends_at" class="form-control"
                                            placeholder="e.g. Ali" value="" required>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <label for="process_ends_at" class="required">Reason of Application Closure</label>
                                        <textarea name="reason" class="form-control" id="" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Total Donations</label>
                                        <input type="text" id="totalDonations" class="form-control" disabled
                                            placeholder="100" value="{{ $application->totaldonations->sum('amount') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Amount Used For Process</label>
                                        <input type="number" step="0.01" name="amount_used" id="amountUsed"
                                            class="form-control" placeholder="100" value="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">

                                            <table id="user-list-table" class="table table-striped table-bordered mt-4"
                                                role="grid" aria-describedby="user-list-page-info">
                                                <thead>
                                                    <tr>

                                                        <th>Key</th>
                                                        <th>Value</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>

                                                        <td>User Donations</td>
                                                        <td>{{ $application->totaldonations->sum('amount') }}</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Amount Used in Process</td>
                                                        <td id="processAmount">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>FSF payable amount</td>
                                                        <td id="expense">0</td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>


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
                                                    <option  disabled value="">Select Status</option>
                                                    <option value="PERMANENT-CLOSED" {{ $application->status == 'PERMANENT-CLOSED' ? 'selected' : '' }}>
                                                        PERMANENT CLOSE ACCOUNT</option>
                                                        
                                                    <option value="APPROVED" {{ $application->status == 'APPROVED' ? 'selected' : '' }}>
                                                        Approved</option>
                                                    <option value="PENDING"
                                                        {{ $application->status == 'PENDING' ? 'selected' : '' }}>
                                                        Pending</option>

                                                    <option value="INACTIVE"
                                                        {{ $application->status == 'INACTIVE' ? 'selected' : '' }}>
                                                        INACTIVE</option>
                                                    <option value="CLOSING-PROCESS"
                                                        {{ $application->status == 'CLOSING-PROCESS' ? 'selected' : '' }}>
                                                        In
                                                        Closing process</option>
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

                                <button type="submit" class="btn btn-danger mr-3">CLOSE Application</button>
                                <a href="{{ route('user.close.application.cancel', $application->application_id) }}"
                                    class="btn iq-bg-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
                @include('backend.applications.closing.rep_info')

                @include('backend.partials.common._donation_stats', ['data' => $application])


            </div>
        </div>
    </div>


    <div class="modal fade" id="CloseAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">Attention</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">Application CLOSING Process started</h4>
                    <hr>
                    <h4 class="text-primary">
                        As per your action the Application closing of this Member is started and you will not be able to
                        edit.
                    </h4>
                    <hr>
                    <h6 class="text-danger">
                        if you have clicked by mistake please click on cancel button only.
                    </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger closebtn">OK.</button>
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
            $('#amountUsed').keyup(function() {
                var totalDonations = $('#totalDonations').val();
                var amountUsed = $('#amountUsed').val();
                var calculations = totalDonations - amountUsed;
                $('#processAmount').text(amountUsed);
                $('#expense').text(calculations);
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $("#CloseAccount").modal('show');
        });
        $(document).ready(function() {
            $('.closebtn').click(function() {
                $("#CloseAccount").modal('hide');
            });

        });
    </script>
@endpush
