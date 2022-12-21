@extends('backend.main')
@section('title', 'Office Details | FSF')

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
                                <h4 class="card-title">Details of  Office</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                          

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="office_code" class="required">Office Code</label>
                                        <input type="text" class="form-control removeSpace" placeholder="e.g. Office-01"
                                            value="{{$office->office_code ?? old('office_code') }}" disabled>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Office Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="e.g. Spain"
                                            value="{{$office->name ??  old('name') }}" disabled>
                                    </div>
                                   

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Office Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="e.g. 011-34-91234-5678"
                                            value="{{$office->phone ??  old('phone') }}" disabled>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="street" class="required">Street</label>
                                        <input type="text" class="form-control" name="street" placeholder="e.g. Street No"
                                            value="{{$office->street ??  old('street') }}" disabled>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="area" class="required">Area</label>
                                        <input type="text" class="form-control" name="area" placeholder="e.g. Area where Located"
                                            value="{{$office->area ??  old('area') }}" disabled>
                                    </div>

                                  

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="city_id" class="required">City</label>
                                        <input type="text" class="form-control" name="area" placeholder="e.g. Area where Located"
                                        value="{{$office->city->name}}" disabled>

                                       

                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="officehead" class="required">Head of Department</label>

                                        <input type="text" class="form-control" name="area" placeholder="e.g. Area where Located"
                                        value="{{$office->head->full_name}}" disabled>

                                    </div>


                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="status">status:</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1"  {{$office->status =='1'?'selected':''}}>Active</option>
                                            <option value="0"  {{$office->status =='0'?'selected':''}}>in Active</option>
                                        </select>

                                    </div>

                                </div>



                                <a href="{{ route('office.edit',$office->office_code) }}" class="btn btn-primary mr-3">Edit Office</a>
                                <a href="{{ route('office.index') }}" class="btn iq-bg-danger mr-3">All Offices</a>

                     
                        </div>
                    </div>
                </div>

                @if ($office->officehead==auth()->user()->id)
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title"> Applications</h4>
                            </div>
                        </div>
                        @if(officeApplications($office->id)->count()>0)
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
      
                                        @foreach (officeApplications($office->id) as $application)
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
