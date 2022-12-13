@extends('backend.main')
@section('title', 'Account :' . $account->account_title)

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
                                <h4 class="card-title">Account Details</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="">
                                        <p>
                                            <b>
                                                Account Title:
                                            </b>
                                            <span>
                                                {{ $account->account_title }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="text-left text-lg-right text-md-right">
                                        <p>
                                            <b>
                                                Account Number:
                                            </b>
                                            <span>
                                                {{ $account->account_number }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="text-danger">
                                        <p>
                                            <b>
                                                Account Balance:
                                            </b>
                                            <span>
                                                <span class="font-weight-bold">€</span> {{ $account->balance }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="text-left text-lg-right text-md-right">
                                        <p>
                                            <b>
                                                Bank Name:
                                            </b>
                                            <span>
                                                {{ $account->bank_name }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="text-danger">
                                        <p>
                                            <b>
                                                Initial Balance:
                                            </b>
                                            <span>
                                                <span class="font-weight-bold">€</span> {{ $account->initial_balance }}
                                            </span>
                                        </p>
                                    </div>
                                </div> --}}
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="text-left text-lg-left text-md-left">
                                        <p>
                                            <b>
                                                Account Type:
                                            </b>
                                            <span>
                                                {{ ucfirst($account->account_type) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Recent Transactions</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table id="fdd-table" class="table table-striped table-bordered mt-4" role="grid"
                                    aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Donation ID</th>
                                            <th>Person Name</th>

                                            <th>Created at</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Balance</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                            $debit = 0;
                                            $credit = 0;
                                        @endphp
                                        @foreach ($account->transactions as $trans)
                                            <tr>
                                                <td><a href="{{route('donation.show',$trans->id)}}">{{$trans->donation->id}}</a></td>
                                                <td><a href="{{route('donation.show',$trans->id)}}">{{ $trans->donation->user->full_name }}</a></td>
                                                <td><a href="{{route('donation.show',$trans->id)}}">dd</a></td>
                                                <td><a href="{{route('users.show',$trans->donation->user->username)}}">d</a></td>
                                                <td>{{ $trans->created_at }}</td>
                                                <td> <span class="font-weight-bold">€</span> {{ $trans->debit }}</td>
                                                <td> <span class="font-weight-bold">€</span> {{ $trans->credit }}</td>
                                                <td> <span class="font-weight-bold">€</span> {{ $trans->balance }}</td>

                                            </tr>
                                            @php
                                                $debit = $debit + $trans->debit;
                                                $credit = $credit + $trans->credit;
                                                
                                            @endphp
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                        @php
                                            $closing_balance = $credit - $debit;
                                        @endphp
                                        <tr>
                                            <td colspan="8"></td>

                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan=""><b>Total Debit</b></td>
                                            <td> <span class="font-weight-bold">€</span> {{ $debit }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan=""><b>Total Credit</b></td>
                                            <td> <span class="font-weight-bold">€</span> {{ $credit }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                            <td colspan=""><b>Closing Balance</b></td>
                                            <td> <span class="font-weight-bold">€</span> {{ $account->balance }}</td>
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

@endpush
