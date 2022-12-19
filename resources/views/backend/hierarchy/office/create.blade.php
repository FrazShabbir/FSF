@extends('backend.main')
@section('title', 'Add New Office | FSF')

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
                                <h4 class="card-title">Add new Office</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('office.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="office_code" class="required">Office Code</label>
                                        <input type="text" class="form-control removeSpace" name="office_code" placeholder="e.g. Office-01"
                                            value="{{ old('office_code') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Office Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="e.g. Spain"
                                            value="{{ old('name') }}">
                                    </div>
                                   

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Office Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="e.g. 011-34-91234-5678"
                                            value="{{ old('phone') }}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="street" class="required">Street</label>
                                        <input type="text" class="form-control" name="street" placeholder="e.g. Street No"
                                            value="{{ old('street') }}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="area" class="required">Area</label>
                                        <input type="text" class="form-control" name="area" placeholder="e.g. Area where Located"
                                            value="{{ old('area') }}">
                                    </div>

                                  

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="city_id" class="required">City</label>
                                        <select name="city_id" id="" class="form-control" required>
                                            @foreach (getCities() as $key)
                                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="officehead" class="required">Head of Department</label>

                                        <select name="officehead" id="" class="form-control" required>
                                            @foreach (officeUsers() as $user)
                                                <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="status">status:</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">in Active</option>
                                        </select>

                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary mr-3">Add New Office</button>
                                <a href="{{ route('city.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

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
        $('.removeSpace').keyup('change', function() {
            var value = $(this).val();
            $(this).val(value.replace(/\s/g, '-'));
        });
        $('.removeSpace').on('change', function() {
            var value = $(this).val();
            $(this).val(value.replace(/\s/g, '-'));
        });
    });
</script>
@endpush
