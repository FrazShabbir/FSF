@extends('backend.main')
@section('title', 'Generate Master Report')

@section('styles')
@endsection

@push('css')
@endpush



@section('content')
<form action="{{route('master.report.request')}}" method="POST">
@csrf
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Master Report Generator</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                             
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="from_date" class="required">From</label>
                                        <input type="date" required class="form-control required" id="from_date"
                                            name="from_date" value="{{ old('from_date') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">To</label>
                                        <input type="date" required class="form-control required" id="to_date"
                                            name="to_date" value="{{ old('to_date') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Document Date</label>
                                        <input type="date" required class="form-control required" id="document_date"
                                            name="document_date" value="{{ old('document_date') }}">
                                    </div>
                                </div>
                              


                                {{-- <button type="submit" class="btn btn-primary mr-3">Submit</button>
                                <a href="{{ route('dashboard') }}" class="btn iq-bg-danger">Home</a> --}}
                           
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Layout Maker</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                         
                                <div class="row">
                                    
                                    <table class="table table-striped">
                                        <thead>
                                            {{-- <tr>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Email</th>
                                            </tr> --}}
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="voucher_no"
                                                            value="voucher_no">
                                                        <label class="custom-control-label" for="voucher_no">
                                                            Voucher No</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="name"
                                                            value="name">
                                                        <label class="custom-control-label" for="name">
                                                            Name</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="phone"
                                                            value="phone">
                                                        <label class="custom-control-label" for="phone">
                                                            Phone</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="Responsibility"
                                                            value="Responsibility">
                                                        <label class="custom-control-label" for="Responsibility">
                                                            Responsibility</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="ess_code"
                                                            value="ess_code">
                                                        <label class="custom-control-label" for="ess_code">
                                                            ESS Code</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="account_title"
                                                            value="account_title" name="account_title">
                                                        <label class="custom-control-label" for="account_title">
                                                            Account Title</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="amount"
                                                            value="amount" name="amount">
                                                        <label class="custom-control-label" for="amount">
                                                            Amount</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="account_type"
                                                            value="account_type" name="account_type">
                                                        <label class="custom-control-label" for="account_type">
                                                            Account Type</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="account"
                                                            value="account" name="account" >
                                                        <label class="custom-control-label" for="account">
                                                            Account</label>
                                                    </div>
                                                </td>
                                              
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="department"
                                                            value="department" name="department">
                                                        <label class="custom-control-label" for="department">
                                                            Department</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="donation_head"
                                                            value="donation_head" value="donation_head">
                                                        <label class="custom-control-label" for="donation_head">
                                                            Donation Head</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="donation_purpose"
                                                            value="donation_purpose" value="donation_purpose">
                                                        <label class="custom-control-label" for="donation_purpose">
                                                            Donation Purpose</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="expense"
                                                            value="expense" value="expense">
                                                        <label class="custom-control-label" for="expense">
                                                            Expense</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="unit"
                                                            value="unit" value="unit">
                                                        <label class="custom-control-label" for="unit">
                                                            Unit</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="subunit"
                                                            value="subunit" value="subunit">
                                                        <label class="custom-control-label" for="subunit">
                                                            Subunit</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="location"
                                                            value="location" name="location">
                                                        <label class="custom-control-label" for="location">
                                                            Location</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="center"
                                                            value="center"  name="center">
                                                        <label class="custom-control-label" for="center">
                                                            Center</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="project"
                                                            value="project" name="project">
                                                        <label class="custom-control-label" for="project">
                                                            Project</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="voucher_time"
                                                            value="voucher_time" name="voucher_time">
                                                        <label class="custom-control-label" for="voucher_time">
                                                            Voucher Time</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="approved_by"
                                                            value="approved_by" name="approved_by">
                                                        <label class="custom-control-label" for="approved_by">
                                                            Approved By</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="approved_at"
                                                            value="approved_at" name="approved_at">
                                                        <label class="custom-control-label" for="approved_at">
                                                            Approved Time/Date</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="document_date"
                                                            value="document_date" name="document_date">
                                                        <label class="custom-control-label" for="document_date">
                                                            Document Date</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="details"
                                                            value="details"name="details">
                                                        <label class="custom-control-label" for="details">
                                                            Details</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="status"
                                                            value="status"name="status">
                                                        <label class="custom-control-label" for="status">
                                                            Status</label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="from_project"
                                                            value="from_project">
                                                        <label class="custom-control-label" for="from_project">
                                                            From Project</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="from_purpose"
                                                            value="from_purpose">
                                                        <label class="custom-control-label" for="from_purpose">
                                                            From Purpose</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="voucher_made_by"
                                                            value="voucher_made_by">
                                                        <label class="custom-control-label" for="voucher_made_by">
                                                            Voucher Made By</label>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <button type="submit" class="btn btn-primary mr-3">Submit</button>
                                <a href="{{ route('dashboard') }}" class="btn iq-bg-danger">Home</a>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection


@section('scripts')
@endsection

@push('js')
@endpush
