@extends('backend.main')
@section('title', 'Edit '. $country->name.' | FSF')

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
                                <h4 class="card-title">Edit {{ $country->name }}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('country.update', $country->id) }}" method="POST">
                                @csrf
                                {{ @method_field('PUT') }}
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Country Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="e.g. Spain"
                                            value="{{ $country->name }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="iso" class="required">Country ISO2</label>
                                        <input type="text" class="form-control" name="iso2" placeholder="UK"
                                            value="{{ $country->iso2 }}">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="iso3" class="required">Country ISO3</label>
                                        <input type="text" class="form-control" name="iso3" placeholder="UK"
                                            value="{{ $country->iso3 }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="region">Region:</label>
                                        <select name="region" id="" class="form-control" >
                                           @foreach (config('essentials.Regions') as $key=>$value)
                                               <option value="{{ $key }}" {{ $country->region == $key ? 'selected' : '' }}>{{ $value }}</option> )
                                           @endforeach
                                        </select>
                                        
                                     
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="status">status:</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1"  {{ $country->status == 1 ? 'selected' : '' }} >Active</option>
                                            <option value="0"  {{ $country->status == 0 ? 'selected' : '' }}>in Active</option>
                                        </select>
                              
                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary mr-3">Update Data</button>
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
