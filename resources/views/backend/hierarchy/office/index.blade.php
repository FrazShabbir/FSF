@extends('backend.main')
@section('title', 'All Offices')

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
                                <h4 class="card-title">Offices</h4>
                            </div>
                            <div class="">
                                <a href="{{route('office.create')}}" class="btn btn-primary"><i class="las la-plus"></i>Add New Office</a>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                              
                                <table id="FSF-Table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>City</th>
                                            <th>Head</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($offices as $office)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $office->name }}</td>
                                                <td>{{ $office->city->name}}</td>
                                                <td>{{ $office->head->full_name }}</td>
                                               
                                              
                                                <td>
                                                    <form action="{{ route('office.destroy', $office->office_code) }}" method="post">
                                                        <div class="flex align-items-center list-user-action">
                                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Show" href="{{route('office.show', $office->office_code)}}"><i
                                                                    class="lar la-eye"></i></a>
                                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Edit"
                                                                href="{{ route('office.edit', $office->office_code) }}"><i
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
        $(document).ready(function() {
            $('#FSF-Table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
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
                            columns: [0, 1, 2, 3, 4]
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
