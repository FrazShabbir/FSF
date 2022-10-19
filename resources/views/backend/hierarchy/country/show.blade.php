@extends('backend.main')
@section('title', 'Country '.$country->name.' - FDD')

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
                      <h4 class="card-title">Country Detail</h4>
                   </div>
                </div>
                <div class="iq-card-body px-4">
                   
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="name">Name </label>
                            <input type="text" class="form-control"  disabled value="{{$country->name}}">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="region">Region </label>
                            <input type="text" class="form-control"  disabled value="{{$country->region}}">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="iso2">ISO2:</label>
                            <input type="text" class="form-control"  disabled value="{{$country->iso2}}">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="iso3">ISO3:</label>
                            <input type="text" class="form-control" id="iso3"  disabled value="{{$country->iso3}}">
                        </div>
                     </div>
                   
                
                      <div class="mt-5 mb-4">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <div class="mt-2 mb-3">
                                    <h4>
                                        Country Status
                                    </h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  disabled value="{{getStatus($country->status)}}">
                                 </div>
                            </div>
                        </div>
                      </div>
                      <a href="{{route('country.edit',$country->id)}}" class="btn btn-primary mr-3">Edit country</a>
                      <a href="{{route('country.index')}}" class="btn iq-bg-danger mr-3">Back</a>

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
