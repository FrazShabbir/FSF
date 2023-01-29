@extends('backend.main')
@section('title', 'Add New Donation | FSF')

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
                                <h4 class="card-title">Serach and Paste Application id Or Passport Number</h4>
                            </div>
                       
                        </div>
                        <div class="iq-card-body">
                           
                            <div class="table-responsive">
                              
                                <table id="FSF-Table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Passport Number</th>
                                            <th>Application ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        @foreach ($applications as $app)
                                            <tr>
                                                <td>{{ $app->full_name }}</td>
                                                <td>{{ $app->passport_number }}</td>
                                               

                                                <td>{{ $app->application_id }}</td>

                                             
                                            </tr>

                                       
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                          
                       
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Add Donation</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                           

                            <form action="{{ route('donation.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="passport_number">Passport Number:</label>
                                        <input type="text" name="passport_number" id="" class="form-control"
                                            placeholder="Passport Number" value="{{old('passport_number')}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="" for="application_id">Application ID:</label>
                                        <input type="text" name="application_id" id="" class="form-control"
                                            placeholder="W-App-778767"  value="{{old('application_id')}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="donor_bank_name">Donor Bank Name:</label>
                                        <input type="text" name="donor_bank_name" id="" class="form-control"
                                            placeholder="Bank ABC" required  value="{{old('donor_bank_name')}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="donor_bank_no">Account Number/IBAN:</label>
                                        <input type="text" name="donor_bank_no" id="" class="form-control"
                                            placeholder="Bank-90979" required  value="{{old('donor_bank_no')}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="iso2" class="required">FSF Bank Name</label>

                                        <select name="fsf_bank_id" id="" class="form-control" required>
                                            @foreach ($accounts as $key)
                                                <option value="{{ $key->id }}" {{old('fsf_bank_id')==$key->id?'selected':''}}>{{ $key->name }} -
                                                    {{ $key->account_number }} - {{ $key->bank }} - {{ $key->city }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="amount">Amount:</label>
                                        <input type="number" step="0.01" name="amount" id=""
                                            class="form-control positiveNumber" placeholder="90" required min="1"  value="{{old('amount')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="donation_date">Donation Date:</label>
                                        <input type="date" name="donation_date" id="" class="form-control"  value="{{old('donation_date')}}"
                                            required>
                                    </div>




                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <p class="required">Receipt</p>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="receipt"
                                                    id="receipt" accept=".png, .jpg, .jpeg">
                                                <label class="custom-file-label" for="image">Choose Logo
                                                    (.png,.jpeg,jpg)</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary mr-3">Save Donation</button>
                                <a href="{{ route('donation.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

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
        $(document).ready(function() {
            $('.positiveNumber').keyup(function() {
                // this.value = this.value.replace(/[^0-9\.]/g, '');
                if (this.value < 0) {
                    this.value = 0;
                    alert('Please enter Amount greater than 0');
                }
            });
        });
    </script>

<script>
    $(document).ready(function() {
        $('#FSF-Table').DataTable({
         
            "info": false,
            "lengthChange": false,

        });

    });
</script>
@endpush
