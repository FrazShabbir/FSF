@extends('backend.main')
@section('title', $category->name.' | FSF')

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
                                <h4 class="card-title">{{$category->name}}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="" for="name">Category Name:</label>
                                        <input type="text" id="" class="form-control"
                                            placeholder="Funeral 2023" value="{{$category->name}}" disabled>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="" for="code">Category Code:</label>
                                        <input type="text" id="" class="form-control"
                                            placeholder="Funeral-2023" value="{{$category->code}}" disabled>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="" for="code">Donations Available:</label>
                                        <input type="text"  id="" class="form-control"
                                            placeholder="" value="{{$category->donation}}" disabled>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="" for="code">Category Status:</label>
                                        <input type="text"  id="" class="form-control"
                                            placeholder="Funeral-2023" value="{{$category->status==1?'Active':'Inactive'}}" disabled>
                                    </div>

                                </div>




                                <a href="{{ route('category.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>
                                <a href="{{ route('category.edit',$category->code) }}" class="btn iq-bg-primary mr-3">Edit</a>

                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Category Report</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                          
                            <table id="fdd-table" class="table table-striped ledger-border">
                                <thead>
                  
                                    <tr>

                                        <th>#</th>
                                        <th>Date/Time</th>
                                        <th>App/Donation</th>
                                        <th>Account</th>
                                        <th>Referance</th>
                                        <th>Debit.</th>
                                        <th>Credit.</th>

                                        {{-- <th scope="col" rowspan="2">Debit</th>
                                <th scope="col" rowspan="2">Credit</th> --}}
                                        {{-- <th scope="col" colspan="2">Balance
                                    <tr>
                                        <td>
                                            Debit
                                        </td>
                                        <td>
                                            Credit
                                        </td>
                                    </tr>
                                </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $j = 1;
                                        $debit = 0;
                                        $credit = 0;
                                    @endphp
                                    @foreach ($transactions as $i)
                                        <tr>
                                            <td>{{ $j }}</td>

                                            <th scope="row">{{ date('d-m-y/h:m:s', strtotime($i->created_at)) }}</th>
                                            @if ($i->application or $i->donation )
                                            <td>@if ($i->application) <span class="badge badge-primary-app"><a href="{{route('application.show',$i->application->application_id)}}">{{ $i->application->application_id ?? 'Null' }}</a></span> @else <span class="badge badge-null-app">Null</span> @endif /  @if ($i->donation) <span class="badge badge-secondary-app"><a href="{{route('donation.show',$i->donation->donation_code)}}">{{ $i->donation->donation_code ?? 'Null' }}</a> </span>@else <span class="badge badge-null-app">Null</span> @endif</td>
                                            @else
                                            <td ><span class="badge badge-info">SYSTEM ENTRY</span></td>
                                            @endif

                                            <td>{{ $i->account->account_number }}</td>
                                            <td>{{ $i->summary }}</td>
                                            <td>€ {{ $i->debit }}</td>
                                            <td>€ {{ $i->credit }}</td>
                                        </tr>
                                        @php
                                            $debit = $debit + $i->debit;
                                            $credit = $credit + $i->credit;
                                            $j++;
                                        @endphp
                                    @endforeach


                                    <tr>
                                        <td colspan=""><span class="d-none" style="display:none;">999</span></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>

                                    </tr>
                                    <tr>
                                        <td colspan=""><span class="d-none" style="display:none;">999</span></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>

                                        <td colspan="-"><b>Total Debit</b></td>
                                        <td> € {{ $debit }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan=""><span class="d-none" style="display:none;">999</span></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""><b>Total Credit</b></td>
                                        <td> € {{ $credit }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan=""><span class="d-none" style="display:none;">999</span></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""></td>
                                        <td colspan=""><b>Total UP/DOWN</b></td>
                                        <td> € {{ $credit - $debit }}</td>
                                    </tr>

                                 

                                    {{--
                             <tr>
                                <th colspan="2"></th>
                                <th>Total</th>
                                <th colspan="4"><span class="font-weight-bold mr-1">€</span> 600</th>
                             </tr> --}}
                                </tbody>
                            </table>
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
        $('#fdd-table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5, 6, ]
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
                            columns: [ 1, 2, 3, 4, 5, 6, ]
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

    });
</script>
@endpush
