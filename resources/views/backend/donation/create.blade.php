@extends('backend.main')
@section('title', 'Add New City | FSF')

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
                                <h4 class="card-title">Add City</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('city.store') }}" method="POST">
                                @csrf

                             
                                <div class="row">

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="" for="application_id">Application ID:</label>
                                        <input type="text" name="application_id" id="" class="form-control" placeholder="W-App-778767">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="" for="donor_bank_name">Donor Bank Name:</label>
                                        <input type="text" name="donor_bank_name" id="" class="form-control" placeholder="Bank ABC">
                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary mr-3">Add Province</button>
                                <a href="{{ route('province.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

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
@endpush
