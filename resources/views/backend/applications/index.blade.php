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
                                <h4 class="card-title">{{$type}} Applications</h4>
                            </div>
                        </div>
                        @if($applications->count()>0)
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
                                            <th>Registeration Date</th>
                                            <th>Renewal Date</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($applications as $application)
                                            <tr>
                                                <td>{{ $application->application_id }}</td>
                                                <td>{{ $application->full_name }}</td>
                                                <td>{{ $application->father_name }}</td>
                                                <td>{{ $application->passport_number }}</td>
                                                <td><span
                                                        class="badge badge-{{ $application->status }}">{{ $application->status }}</span>
                                                </td>
                                                <td>{{ date('d-m-Y',strtotime($application->created_at ))}}</td>
                                                <td>{{ $application->renewal_date?date('d-m-Y',strtotime($application->renewal_date )):'NULL'}}</td>

                                                <td>

                                                    {{-- <form action="" method="post"> --}}
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

                                                            {{-- {{ method_field('Delete') }}
                                                            <button
                                                                onclick="return confirm('Are you sure you want to delete?')"
                                                                type="submit" class="iq-bg-primary border-0 rounded"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Delete">
                                                                <i class="las la-trash"></i>
                                                            </button> --}}


                                                        </div>
                                                    {{-- </form> --}}
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
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('#FSF-Table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3,4,5,6]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3,4,5,6]
                    }
                },
                'colvis'
            ],
            // "searching": false,
            // "paging": false,
            "info": false,
            "lengthChange": false,

        });
        $('#FSF-Table_paginate ul').addClass("pagination-sm");

    });
</script>
@endsection

@push('js')
@endpush
