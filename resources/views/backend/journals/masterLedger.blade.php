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
                                        <label for="name" class="">Document Date</label>
                                        <input type="date"  class="form-control " id="document_date"
                                            name="document_date" value="{{ old('document_date') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="">Account</label>
                                        <select name="account_id" id="" class="form-control" >
                                            <option value="" selected>Select Account</option>
                                            @foreach($accounts as $acc)
                                            <option value="{{$acc->id}}">{{$acc->account_title}}</option>
                                            @endforeach
                                        </select>
                                   
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
                                                            value="1" name="voucher_no">
                                                        <label class="custom-control-label" for="voucher_no">
                                                            Voucher No</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="name"
                                                            value="1" name="name">
                                                        <label class="custom-control-label" for="name">
                                                            Name</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="phone"
                                                            value="1" name="phone">
                                                        <label class="custom-control-label" for="phone">
                                                            Phone</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="Responsibility"
                                                            value="1" name="Responsibility">
                                                        <label class="custom-control-label" for="Responsibility">
                                                            Responsibility</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="ess_code"
                                                            value="1" name="ess_code">
                                                        <label class="custom-control-label" for="ess_code">
                                                            ESS Code</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="account_title"
                                                            value="1" name="account_title">
                                                        <label class="custom-control-label" for="account_title">
                                                            Account Title</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="amount"
                                                            value="1" name="amount">
                                                        <label class="custom-control-label" for="amount">
                                                            Amount</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="account_type"
                                                            value="1" name="account_type">
                                                        <label class="custom-control-label" for="account_type">
                                                            Account Type</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="account"
                                                            value="1" name="account" >
                                                        <label class="custom-control-label" for="account">
                                                            Account</label>
                                                    </div>
                                                </td>
                                              
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="departments"
                                                            value="1" name="departments">
                                                        <label class="custom-control-label" for="departments">
                                                            departments</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="donation_head"
                                                            value="1" name="donation_head">
                                                        <label class="custom-control-label" for="donation_head">
                                                            Donation Head</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="donation_purpose"
                                                            value="1" name="donation_purpose">
                                                        <label class="custom-control-label" for="donation_purpose">
                                                            Donation Purpose</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="expense"
                                                            value="1" name="expense">
                                                        <label class="custom-control-label" for="expense">
                                                            Expense</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="unit"
                                                            value="1" name="unit">
                                                        <label class="custom-control-label" for="unit">
                                                            Unit</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="subunit"
                                                            value="1" name="subunit">
                                                        <label class="custom-control-label" for="subunit">
                                                            Subunit</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="location"
                                                            value="1" name="location">
                                                        <label class="custom-control-label" for="location">
                                                            Location</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="center"
                                                            value="1"  name="center">
                                                        <label class="custom-control-label" for="center">
                                                            Center</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="projects"
                                                            value="1" name="projects">
                                                        <label class="custom-control-label" for="projects">
                                                            Project</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="voucher_time"
                                                            value="1" name="voucher_time">
                                                        <label class="custom-control-label" for="voucher_time">
                                                            Voucher Time</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="approved_by"
                                                            value="1" name="approved_by">
                                                        <label class="custom-control-label" for="approved_by">
                                                            Approved By</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="approved_at"
                                                            value="1" name="approved_at">
                                                        <label class="custom-control-label" for="approved_at">
                                                            Approved Time/Date</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="document_dates"
                                                            value="1" name="document_dates">
                                                        <label class="custom-control-label" for="document_dates">
                                                            Document Date</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="details"
                                                            value="1"name="details">
                                                        <label class="custom-control-label" for="details">
                                                            Details</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="status"
                                                            value="1"name="status">
                                                        <label class="custom-control-label" for="status">
                                                            Status</label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="from_project"
                                                            value="1" name="from_project">
                                                        <label class="custom-control-label" for="from_project">
                                                            From Project</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="from_purpose"
                                                            value="1"  name="from_purpose">
                                                        <label class="custom-control-label" for="from_purpose">
                                                            From Purpose</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="voucher_made_by"
                                                            value="1"  name="voucher_made_by">
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
