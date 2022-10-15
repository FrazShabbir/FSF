@extends('backend.main')
@section('title', 'Applications')

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
                            <h4 class="card-title">Applications</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                           
                            <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                                aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        
                                        <th>Application ID</th>
                                        <th>Applicant</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                    @foreach($applications as $application)
                                    <tr>
                                        <td>{{$application->application_id}}</td>
                                        <td>{{$application->full_name}}</td>
                                        <td>
                                           
                                            <form action="" method="post">
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="iq-bg-primary" data-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Show" href=""><i class="lar la-eye"></i></a>
                                                    <a class="iq-bg-primary" data-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Edit" href=""><i
                                                            class="ri-pencil-line"></i></a>
                                                  
                                                        @csrf
                                                        {{ method_field('Delete') }}
                                                        <button
                                                            onclick="return confirm('Are you sure you want to delete?')"
                                                            type="submit" class="iq-bg-primary border-0 rounded"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Delete">
                                                            <i class="las la-trash"></i>
                                                        </button>
                                                    

                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                          
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
               
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
