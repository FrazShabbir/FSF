@extends('backend.main')
@section('title', 'Page')

@section('styles')
@endsection

@push('css')
<style>
.border-success{
    border-color: #198754!important;
}
.text-success{
    color: #198754!important;
}
</style>
@endpush



@section('content')
<div id="content-page" class="content-page" style="min-height: unset;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">All Applications</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0" for="passport_no">Passport No.</label>
                                            <div class="col-sm-12">
                                               <input type="text" class="form-control" id="passport_no" required name="passport_no" placeholder="Enter Doner's Passport No.">
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mb-5">
                                        <div class="mt-4">
                                            <button type="button" class="btn btn-primary mt-2">Submit</button>
                                        </div>
                                    </div>
                                    <div class="offset-lg-2 col-lg-8 offset-md-1 col-md-10 col-sm-12">
                                        <div class="">
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold text-dark">
                                                    Name
                                                </p>
                                                <p>
                                                    Muhammad Akabr
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold text-dark">
                                                    Registration No.
                                                </p>
                                                <p>
                                                    8490874738
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold text-dark">
                                                    Donation Type
                                                </p>
                                                <p>
                                                    FSF members Fund
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold text-dark">
                                                    Donation Category
                                                </p>
                                                <p>
                                                    FSF-22 (Auto as per signed Terms Policy)
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold text-dark">
                                                    Beneficiary Bank Name
                                                </p>
                                                <p>
                                                    Dummy Bank
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold text-dark">
                                                    Beneficiary Bank AC No.
                                                </p>
                                                <p>
                                                    8490874738
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content-page" class="content-page pt-0" style="min-height: unset;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">From Applications</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table id="FSF-table" class="table table-striped table-bordered mt-4" role="grid"
                                aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Application Name</th>
                                        <th>Voucher type</th>
                                        <th>Created at</th>
                                        <th>Application Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Enrolment Application</td>
                                        <td>Form</td>
                                        <td>12 - Jan - 2022</td>
                                        <td>
                                            <span class="badge border border-success text-success"> <i class="las la-check-circle mr-2"></i>Approved</span>
                                        </td>
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

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content-page" class="content-page mt-0 pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Donation Applications</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table id="FSF-table" class="table table-striped table-bordered mt-4" role="grid"
                                aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Application Name</th>
                                        <th>Voucher type</th>
                                        <th>Created at</th>
                                        <th>Application Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Yearly Donation</td>
                                        <td>Donation</td>
                                        <td>12 - Jan - 2022</td>
                                        <td>
                                            <span class="badge border border-primary text-primary"><i class="las la-circle-notch mr-2"></i>Pending</span>
                                        </td>
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
                                    <tr>
                                        <td>1</td>
                                        <td>Yearly Donation</td>
                                        <td>Donation</td>
                                        <td>12 - Jan - 2022</td>
                                        <td>
                                            <span class="badge border border-danger text-danger"><i class="las la-times-circle mr-2"></i>Rejected</span>
                                        </td>
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
    $(document).ready( function () {
        $('#FSF-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
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
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            'colvis'
        ],
            // "searching": false,
            // "paging": false,
            "info": false,
            "lengthChange": false,

        });
        $('#FSF-table_paginate ul').addClass("pagination-sm");

    } );
</script>
@endpush
