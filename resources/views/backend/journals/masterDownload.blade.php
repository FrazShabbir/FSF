@extends('backend.main')
@section('title', 'Master Ledger - FSF')

@section('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@push('css')
@endpush

@section('content')
    <div class="content-page" id="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">FDD Master Ledger</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            {{-- <div class="row">
                                <div class="col-12">
                                    <div class="mb-4 mt-3">
                                        <h4>Filter By:</h4>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <form action="" method="">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="account_title">Account Title</label>
                                                    <select class="form-control" id="account_id">
                                                        <option selected value="" disabled="">Select Account
                                                            Title</option>
                                                        @foreach ($accounts as $account)
                                                            <option value="{{ $account->id }}"
                                                                {{ app()->request->input('account') == $account->id ? 'selected' : '' }}>
                                                                {{ $account->account_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="date">Select Date</label>
                                                <input type="text" name="daterange" class="form-control" id="date" value="01/01/2018 - 01/15/2018">
                                             </div>
                                        </div>
                                            @php
                                                use Carbon\Carbon;
                                            @endphp
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="date_form">Date From</label>
                                                    <input type="date" name="date_form" class="form-control"
                                                        id="date_from"
                                                        value="{{ date('Y-m-d', strtotime(app()->request->input('date_from') ?? Carbon::parse('Now -7 days'))) }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label for="date_to">Date To</label>
                                                    <input type="date" name="date_to" class="form-control" id="date_to"
                                                        value="{{ date('Y-m-d', strtotime(app()->request->input('date_to') ?? date('Y-m-d'))) }}">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="mb-5">
                                                    <button type="button" onclick="filter()"
                                                        class="btn btn-primary btn-sm mr-2">Apply</button>
                                                    <button type="button" onclick="clearFilters()"
                                                        class="btn btn-outline-secondary btn-sm">Clear Filters</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}


                            <div style="overflow-x:auto;">
                                <table id="fdd-table" class="table table-striped ledger-border">
                                    <thead>
                                        <tr>
                                            @if (in_array('voucher_no', $arr))
                                                <th>Voucher No</th>
                                            @endif
                                            @if (in_array('name', $arr))
                                                <th>name</th>
                                            @endif
                                            @if (in_array('phone', $arr))
                                                <th>phone</th>
                                            @endif
                                            @if (in_array('Responsibility', $arr))
                                                <th>Responsibility</th>
                                            @endif
                                            @if (in_array('ess_code', $arr))
                                                <th>ess_code</th>
                                            @endif
                                            @if (in_array('account_title', $arr))
                                                <th>account_title</th>
                                            @endif
                                            @if (in_array('amount', $arr))
                                                <th>amount</th>
                                            @endif
                                            @if (in_array('account_type', $arr))
                                                <th>account_type</th>
                                            @endif
                                            @if (in_array('account', $arr))
                                                <th>account</th>
                                            @endif
                                            @if (in_array('departments', $arr))
                                                <th>departments</th>
                                            @endif
                                            @if (in_array('unit', $arr))
                                                <th>unit</th>
                                            @endif
                                            @if (in_array('subunit', $arr))
                                                <th>subunit</th>
                                            @endif
                                            @if (in_array('location', $arr))
                                                <th>location</th>
                                            @endif
                                            @if (in_array('center', $arr))
                                                <th>center</th>
                                            @endif
                                            @if (in_array('project', $arr))
                                                <th>project</th>
                                            @endif
                                            @if (in_array('voucher_time', $arr))
                                                <th>voucher_time</th>
                                            @endif
                                            @if (in_array('approved_by', $arr))
                                                <th>approved_by</th>
                                            @endif
                                            @if (in_array('approved_at', $arr))
                                                <th>approved_at</th>
                                            @endif
                                            @if (in_array('status', $arr))
                                                <th>status</th>
                                            @endif
                                            @if (in_array('donation_head', $arr))
                                                <th>donation_head</th>
                                            @endif
                                            @if (in_array('donation_purpose', $arr))
                                                <th>donation_purpose</th>
                                            @endif
                                            @if (in_array('expense', $arr))
                                                <th>expense</th>
                                            @endif
                                            @if (in_array('from_project', $arr))
                                                <th>from_project</th>
                                            @endif
                                            @if (in_array('from_purpose', $arr))
                                                <th>from_purpose</th>
                                            @endif
                                            @if (in_array('voucher_made_by', $arr))
                                                <th>voucher_made_by</th>
                                            @endif
                                            @if (in_array('document_dates', $arr))
                                            <th>Document Dates</th>
                                            @endif
                                            @if (in_array('details', $arr))
                                                <th>details</th>
                                            @endif

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($transactions as $i)
                                            <tr>
                                                @if (in_array('voucher_no', $arr))
                                                    <td>{{ $i->voucher->voucher_code }}</td>
                                                @endif
                                                @if (in_array('name', $arr))
                                                    <td>{{ $i->voucher->donor_name }}</td>
                                                @endif
                                                @if (in_array('phone', $arr))
                                                    <td>{{ $i->voucher->donor_phone }}</td>
                                                @endif
                                                @if (in_array('Responsibility', $arr))
                                                    <td>{{ $i->voucher->responsibility->name }}</td>
                                                @endif

                                                @if (in_array('ess_code', $arr))
                                                    <td>{{ $i->voucher->voucher_code }}</td>
                                                @endif
                                                @if (in_array('account_title', $arr))
                                                    <td>{{ $i->voucher->ess_code }}</td>
                                                @endif
                                                @if (in_array('amount', $arr))
                                                    <td>{{ $i->voucher->amount }}</td>
                                                @endif
                                                @if (in_array('account_type', $arr))
                                                    <td>{{ $i->voucher->account_type }}</td>
                                                @endif
                                                @if (in_array('account', $arr))
                                                    <td>{{ $i->account->account_title }}</td>
                                                @endif
                                                @if (in_array('departments', $arr))
                                                    <td>{{ $i->voucher->department->name }}</td>
                                                @endif
                                                @if (in_array('unit', $arr))
                                                    <td>{{ $i->voucher->location->subunit->unit->name }}</td>
                                                @endif
                                                @if (in_array('subunit', $arr))
                                                    <td>{{ $i->voucher->location->subunit->name }}</td>
                                                @endif
                                                @if (in_array('location', $arr))
                                                    <td>{{ $i->voucher->location->name }}</td>
                                                @endif
                                                @if (in_array('center', $arr))
                                                    <td>{{ $i->voucher->center->name }}</td>
                                                @endif
                                                @if (in_array('project', $arr))
                                                    <td>{{ $i->voucher->project->name }}</td>
                                                @endif
                                                @if (in_array('voucher_time', $arr))
                                                    <td>{{ $i->voucher->voucher_time }}</td>
                                                @endif
                                                @if (in_array('approved_by', $arr))
                                                    <td>{{ getFullNameById($i->voucher->approvedby->id) }}</td>
                                                @endif
                                                @if (in_array('approved_at', $arr))
                                                    <td>{{ $i->voucher->approved_at }}</td>
                                                @endif
                                                @if (in_array('status', $arr))
                                                    <td>{{ $i->voucher->status }}</td>
                                                @endif
                                                @if (in_array('donation_head', $arr))
                                                    <td>{{ $i->voucher->donation_head->name }}</td>
                                                @endif
                                                @if (in_array('donation_purpose', $arr))
                                                    <td>{{ $i->voucher->fund_purpose->name }}</td>
                                                @endif
                                                @if (in_array('expense', $arr))
                                                    <td>{{ $i->voucher->expensehead->name ?? '' }}</td>
                                                @endif
                                                @if (in_array('from_project', $arr))
                                                    <td>{{ $i->voucher->project_id_from }}</td>
                                                @endif
                                                @if (in_array('from_purpose', $arr))
                                                    <td>{{ $i->voucher->fund_purpose_from }}</td>
                                                @endif
                                                @if (in_array('voucher_made_by', $arr))
                                                    <td>{{ getFullNameById($i->voucher->user->id) }}</td>
                                                @endif
                                                @if (in_array('document_dates', $arr))
                                                <td>{{ $i->voucher->document_date }}</td>
                                                @endif
                                                @if (in_array('details', $arr))
                                                    <td>{{ $i->voucher->details }}</td>
                                                @endif

                                            </tr>
                                            {{-- <tr>
                    <td><a href="{{ route('vouchers.show', $i->voucher->voucher_code) }}">{{ $i->voucher->voucher_code }}</a>
                    <td>{{ $i->voucher->donor_name }}</td>


                    <th scope="row">{{ date('d-m-y/h:m:s', strtotime($i->created_at)) }}</th>
                    </td>
                    <td>{{ $i->account->account_number }}</td>
                    <td>{{ $i->summary }}</td>
                    <td><span class="font-weight-bold mr-1">€</span> {{ $i->debit }}</td>
                    <td><span class="font-weight-bold mr-1">€</span> {{ $i->credit }}</td>
                </tr> --}}
                                        @endforeach


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
    </div>
@endsection


@section('scripts')
    {{-- Date Range Picker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@endsection

@push('js')
    {{-- <script>
    $(document).ready( function () {
        $('#fdd-table').DataTable();
    });
</script> --}}

    <script>
        $(document).ready(function() {
            $('#fdd-table').DataTable({
                dom: 'Bfrtip',
                order: [
                    [0, 'asc']
                ],
                pageLength: 200,
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {}
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {}
                    },

                    {
                        extend: 'csvHtml5',
                        exportOptions: {}
                    },
                    'colvis'
                ],
                "info": false,
                "lengthChange": false,

            });
            $('#fdd-table_paginate ul').addClass("pagination-sm");

        });
    </script>

    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>


    <script>
        function filter() {
            const account_id = $("#account_id").val() ? $("#account_id").val() : "";
            const date_from = $("#date_from").val() ? $("#date_from").val() : "";
            const date_to = $("#date_to").val() ? $("#date_to").val() : "";


            const url = "{{ route('report.ledger') }}" + "?account=" + account_id + "&date_from=" + date_from +
                "&date_to=" + date_to

            //    alert(date_from);
            // console.log(completed_at);
            window.location.replace(url);
        }
    </script>
    <script>
        // alert('Final')
        function clearFilters() {
            const newurl = window.location.href.split("?");
            window.location.replace(newurl[0]);

        }
    </script>
@endpush
