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
                                        <div class="table-responsive">
                        
                                            <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                                                aria-describedby="user-list-page-info">
                                                <thead>
                                                    <tr>
                                                      
                                                        <th>Key</th>
                                                        <th>Value</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  
                                                        <tr>
                                                           
                                                            <td>User Donations</td>
                                                            <td>{{ $user->totaldonations->sum('amount') }}</td>
                                                
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
                    <h4 class="text-danger">ACCOUNT CLOSING Process started</h4>
                    <hr>
                    <h4 class="text-primary">
                        As per your action the account closing of this Member is started and you will not be able to edit.
                    </h4>
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
        $(document).ready(function(){
            $("#CloseAccount").modal('show');
        });
        $(document).ready(function(){
            $('.closebtn').click(function(){
                $("#CloseAccount").modal('hide');
            });
          
        });
    </script>

@endpush
