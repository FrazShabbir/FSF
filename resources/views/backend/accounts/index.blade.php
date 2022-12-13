@extends('backend.main')
@section('title', 'Page')

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
                            <h4 class="card-title">All Banks Accounts</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table id="fdd-table" class="table table-striped table-bordered mt-4" role="grid"
                                aria-describedby="user-list-page-info">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Account Number</th>
                                        <th>Account Title</th>
                                        <th>Account Type</th>
                                        <th>Bank Name</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($accounts as $acc)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$acc->account_number}}</td>
                                        <td>{{$acc->name}}</td>
                                        <td>{{$acc->type}}</td>
                                        <td>{{$acc->bank}}</td>
                                        <td><span class="font-weight-bold">€</span> {{$acc->balance}}</td>
                                        <td class="width_100px">

                                            <form action="{{route('account.destroy',$acc->code)}}" method="post">
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="iq-bg-primary" data-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Show" href="{{route('account.show',$acc->code)}}"><i class="lar la-eye"></i></a>
                                                    <a class="iq-bg-primary" data-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Edit" href="{{route('account.edit',$acc->code)}}"><i
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
                                    @php
                                        $i++;
                                    @endphp
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
<script>
    $(document).ready( function () {
        $('#fdd-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5 ]
                }
            },
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3,4,5 ]
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
                    columns: [ 0, 1, 2, 3,4,5 ]
                }
            },
            'colvis'
        ],
            // "searching": false,
            // "paging": false,
            "info": false,
            "lengthChange": false,

        });
        $('#fdd-table_paginate ul').addClass("pagination-sm");

    } );
</script>
@endpush
