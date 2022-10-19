@extends('backend.main')
@section('title', 'City - FSF')

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
                      <h4 class="card-title">City Details</h4>
                   </div>
                </div>
                <div class="iq-card-body px-4">
                   
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="">Name </label>
                            <input type="text" class="form-control"  disabled value="{{$city->name}}">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="">Province:</label>
                            <input type="text" class="form-control" disabled value="{{$city->province->name}}">
                        </div>
                     
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="">Community:</label>
                            <input type="text" class="form-control" disabled value="{{$city->province->community->name}}">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control" disabled value="{{$city->province->community->country->name}}">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="">Office</label>
                            <input type="text" class="form-control" disabled value="{{$city->office_id}}">
                        </div>
                     </div>
                   
                
                      <div class="mt-5 mb-4">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <div class="mt-2 mb-3">
                                    <h4>
                                        City Status
                                    </h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  disabled value="{{getStatus($city->status)}}">
                                 </div>
                            </div>
                        </div>
                      </div>
                      <a href="{{route('city.edit',$city->id)}}" class="btn btn-primary mr-3">Edit City</a>
                      <a href="{{route('city.index')}}" class="btn iq-bg-danger mr-3">Back</a>

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
