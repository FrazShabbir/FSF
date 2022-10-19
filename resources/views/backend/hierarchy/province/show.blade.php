@extends('backend.main')
@section('title', 'Province - FSF')

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
                      <h4 class="card-title">Province Details</h4>
                   </div>
                </div>
                <div class="iq-card-body px-4">
                   
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="">Name </label>
                            <input type="text" class="form-control"  disabled value="{{$province->name}}">
                        </div>
                       
                     
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="">Community:</label>
                            <input type="text" class="form-control" disabled value="{{$province->community->name}}">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control" disabled value="{{$province->community->country->name}}">
                        </div>
                     </div>
                   
                
                      <div class="mt-5 mb-4">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <div class="mt-2 mb-3">
                                    <h4>
                                        Province Status
                                    </h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  disabled value="{{getStatus($province->status)}}">
                                 </div>
                            </div>
                        </div>
                      </div>
                      <a href="{{route('province.edit',$province->id)}}" class="btn btn-primary mr-3">Edit Province</a>
                      <a href="{{route('province.index')}}" class="btn iq-bg-danger mr-3">Back</a>

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
