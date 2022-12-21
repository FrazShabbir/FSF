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

          @if ($province->hod==auth()->user()->id)
          <div class="col-sm-12">
              <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                          <h4 class="card-title"> Applications</h4>
                      </div>
                  </div>
                  @if(provinceApplications($province->id)->count()>0)
                  <div class="iq-card-body">
                      <div class="table-responsive">

                          <table id="FSF-Table" class="table table-striped table-bordered mt-4" role="grid"
                              aria-describedby="user-list-page-info">
                              <thead>
                                  <tr>

                                      <th>Application ID</th>
                                      <th>Applicant (Full Name)</th>
                                      <th>Father's Name</th>
                                      <th>Passport Number</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>

                                  @foreach (provinceApplications($province->id) as $application)
                                      <tr>
                                          <td>{{ $application->application_id }}</td>
                                          <td>{{ $application->full_name }}</td>
                                          <td>{{ $application->father_name }}</td>
                                          <td>{{ $application->passport_number }}</td>
                                          <td><span
                                                  class="badge badge-{{ $application->status }}">{{ $application->status }}</span>
                                          </td>
                                          <td>

                                                  <div class="flex align-items-center list-user-action">
                                                      <a class="iq-bg-primary" data-toggle="tooltip"
                                                          data-placement="top" title=""
                                                          data-original-title="Show"
                                                          href="{{ route('application.show', $application->application_id) }}"><i
                                                              class="lar la-eye"></i></a>
                                                      <a class="iq-bg-primary" data-toggle="tooltip"
                                                          data-placement="top" title=""
                                                          data-original-title="Edit"
                                                          href="{{ route('application.edit', $application->application_id) }}"><i
                                                              class="ri-pencil-line"></i></a>

                                                      @if ($application->status == 'RENEWABLE' or $application->status == 'RENEWAL-REQUESTED')
                                                          <a class="iq-bg-primary" data-toggle="tooltip"
                                                              data-placement="top" title=""
                                                              data-original-title="Renew"
                                                              href="{{ route('renew.application.edit', $application->application_id) }}"><i
                                                                  class="las la-sync-alt"></i></a>
                                                      @endif

                                                      @csrf



                                                  </div>
                                              
                                          </td>
                                      </tr>
                                  @endforeach

                              </tbody>
                          </table>
                      </div>

                  </div>
                  @else
                  <div class="iq-card-body text-center">
                      <h5>No Applications Avaiable</h5>
                  </div>
                  @endif

              </div>
          </div>

          @endif
          
       </div>
    </div>
 </div>
@endsection


@section('scripts')
@endsection

@push('js')
@endpush
