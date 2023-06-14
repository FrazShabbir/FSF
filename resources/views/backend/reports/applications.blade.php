@extends('backend.main')
@section('title', 'Applications Counts')

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
                            <h4 class="card-title">Applications Report</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                        
                            <table id="FSF-Table" class="table table-striped table-bordered mt-4" role="grid"
                                aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Application</th>
                                        <th>Count</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                   
                                    <tr>
                                        <td>1</td>
                                        <td>All Application</td>
                                        <td>{{allApplicationsCount()}}</td>
                                    </tr>
                               
                                    <tr>
                                        <td>2</td>
                                        <td>Approved Application</td>
                                        <td>{{allApprovedApplicationsCount()}}</td>
                                    </tr>
                                  
                                    <tr>
                                        <td>3</td>
                                        <td>Pending Application</td>
                                        <td>{{allPendingApplicationsCount()}}</td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>Rejected Application</td>
                                        <td>{{allRejectedApplicationsCount()}}</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>All Renewable Application</td>
                                        <td>{{allRenewablepplicationsCount()}}</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>All Pending Approval Application</td>
                                        <td>{{pendingApproval()}}</td>
                                    </tr>
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
<script>
    $(document).ready(function() {
        $('#FSF-Table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3,4,5,6,7]
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
                        columns: [0, 1, 2]
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
@endpush
