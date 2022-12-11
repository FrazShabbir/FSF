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
<div id="content-page" class="content-page">
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
                        <div class="table-responsive">
                            <table id="FSF-table" class="table table-striped table-bordered mt-4" role="grid"
                                aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Application Name</th>
                                        <th>Voucher type</th>
                                        <th>Created by</th>
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
                                        <td>
                                            <a data-toggle="modal" href="#user_model">
                                                98458963
                                            </a>
                                        </td>
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
                                    <tr>
                                        <td>2</td>
                                        <td>Donation Application</td>
                                        <td>Donation</td>
                                        <td>
                                            <a data-toggle="modal" href="#user_model">
                                                98458963
                                            </a>
                                        </td>
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

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="user_model" tabindex="-1" role="dialog" aria-labelledby="user_model_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_model_label">User Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-12">
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
                            Father Name
                        </p>
                        <p>
                            Ali Ahmad
                        </p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="font-weight-bold text-dark">
                            Phone No.
                        </p>
                        <p>
                            +9823798237908
                        </p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="font-weight-bold text-dark">
                            Address
                        </p>
                        <p>
                            Dummy Address
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Show User</button>
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
