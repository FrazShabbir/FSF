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
                                <h4 class="card-title">Create Account</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('account.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="type" class="required">Account Type</label>
                                        <select class="form-control" name="type" id="type" required>
                                            <option value="Bank" {{ old('type') == 'Bank' ? 'selected' : '' }}>Bank
                                                Account</option>
                                            <option value="Cash" {{ old('type') == 'Cash' ? 'selected' : '' }}>Cash
                                                Account</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="bank" class="required">Bank Name</label>
                                        <input type="text" class="form-control" value="{{ old('bank') }}"
                                            name="bank" placeholder="e.g. HBL" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Account Title</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}"
                                            name="name" placeholder="e.g. Raza" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="account_number" class="required">Account Number</label>
                                        <input type="text" class="form-control" value="{{ old('account_number') }}"
                                            id="account_number" name="account_number" placeholder="e.g. 23456789" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="blalnce" class="required">Account Balance</label>
                                        <input type="number" step="0.01" value="0"
                                            class="form-control" id="balance" placeholder="e.g. 6000" required readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="cityr" class="required">Bank City</label>
                                        <input type="text" class="form-control" value="{{ old('city') }}"
                                            id="city" name="city" placeholder="e.g. Gujrat" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-3">Add New Account</button>
                                <a href="{{ route('account.index') }}" class="btn iq-bg-danger">Cancel</a>
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
