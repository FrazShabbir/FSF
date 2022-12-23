@extends('backend.main')
@section('title', 'Ledger - FDD')

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
                                <h4 class="card-title">FDD Ledger</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
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
                                                        @php
                                                            $accounts = \App\Models\Account::all();
                                                        @endphp
                                                        @foreach ($accounts as $account)
                                                            <option value="{{ $account->id }}"
                                                                {{ app()->request->input('account') == $account->id ? 'selected' : '' }}>
                                                                {{ $account->account_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- Date With Date Range Picker --}}
                                            {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="date">Select Date</label>
                                                <input type="text" name="daterange" class="form-control" id="date" value="01/01/2018 - 01/15/2018">
                                             </div>
                                        </div> --}}
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
                            </div>
                            {{-- <tr>
                        <th colspan="2"></th>
                        <th>Opening Balance</th>
                        <th colspan="4"><span class="font-weight-bold mr-1">€</span> {{$opening_balance}}</th>
                     </tr> --}}
                            <table id="fdd-table" class="table table-striped ledger-border">


                                <thead>
                                    {{-- <tr>
                                        <th colspan="" class="text-center"></th>
                                        <th colspan="" class="text-center"></th>
                                        <th colspan="" class="text-center"></th>
                                        <th colspan="" class="text-center"></th>
                                        <th colspan="" class="text-center"></th>

                                        <th colspan="" class="text-center">Opening Balance</th>
                                        <th colspan="" class="text-right"><span class="font-weight-bold mr-1">€</span>
                                            {{ $opening_balance }}</th>
                                    </tr> --}}
                                    <tr>
                                        <th  rowspan="2">Date/Time</th>
                                        <th  rowspan="2">Account</th>
                                        <th  rowspan="2">Referance</th>
                                        <th  rowspan="2">Transaction By</th>
                                        <th  rowspan="2">Debit</th>
                                        <th  rowspan="2">Credit</th>
                                        <th  rowspan="2">Balance</th>

                                        {{-- <th scope="col" rowspan="2">Debit</th>
                                <th scope="col" rowspan="2">Credit</th> --}}

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        
                                        $debit = 0;
                                        $credit = 0;
                                    @endphp
                                    @foreach ($transactions as $i)
                                        <tr>
                                            <td >{{ date('d-m-y/h:m:s', strtotime($i->created_at)) }}</td>
                                            <td><a href="{{ route('account.show', $i->account->code) }}">{{ $i->account->account_number }}</a>
                                            </td>
                                            <td><a  href="{{ route('vouchers.show', $i->voucher->voucher_code) }}">{{ $i->voucher->details }}</a>
                                            </td>
                                            <td><a href="{{ route('users.show', $i->user->username) }}">{{ getFullNameById($i->user->id) }}</a>
                                            </td>
                                            <td><span class="font-weight-bold mr-1">€</span> {{ $i->debit }}</td>
                                            <td><span class="font-weight-bold mr-1">€</span> {{ $i->credit }}</td>
                                            <td><span class="font-weight-bold mr-1">€</span> {{ $i->balance }}</td>
                                        </tr>
                                        @php
                                            $debit = $debit + $i->debit;
                                            $credit = $credit + $i->credit;
                                            
                                        @endphp
                                    @endforeach


                                    {{-- <tr>
                                        <td colspan="9"></td>

                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan=""><b>Total Debit</b></td>
                                        <td> <span class="font-weight-bold">€</span> {{ $debit }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan=""><b>Total Credit</b></td>
                                        <td> <span class="font-weight-bold">€</span> {{ $credit }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan=""><b>Total UP/DOWN</b></td>
                                        <td> <span class="font-weight-bold">€</span> {{ $credit - $debit }}</td>
                                    </tr>

                                    <tr>
                                        <th colspan="6" class="text-center">Closing Balance</th>
                                        <th colspan="" class="text-right"><span
                                                class="font-weight-bold mr-1">€</span> {{ $account->balance }}</th>
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
    {{-- Date Range Picker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#fdd-table').DataTable({
                dom: 'Bfrtip',
                // "searching": false,
                // "paging": false,
                "info": false,
                "lengthChange": false,

            });
            $('#fdd-table_paginate ul').addClass("pagination-sm");

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
