@extends('backend.main')
@section('title', 'Add New Country | FSF')

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
                                <h4 class="card-title">Add Country</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('country.store') }}" method="POST">
                                @csrf
                               
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Country Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="e.g. Spain"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="iso2" class="required">Country ISO2</label>
                                        <input type="text" class="form-control" name="iso2" placeholder="UK"
                                            value="{{ old('iso2') }}">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="iso3" class="required">Country ISO3</label>
                                        <input type="text" class="form-control" name="iso3" placeholder="UK"
                                            value="{{ old('iso3')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="region">Region:</label>
                                        <select name="region" id="" class="form-control" >
                                           @foreach (config('essentials.Regions') as $key=>$value)
                                               <option value="{{ $key }}">{{ $value }}</option> )
                                         
                                           @endforeach
                                        </select>
                                        
                                     
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="hod" class="required">Head of Department</label>

                                        <select name="hod" id="" class="form-control" required>
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



                                <button type="submit" class="btn btn-primary mr-3">Add Country</button>
                                <a href="{{ route('country.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

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
