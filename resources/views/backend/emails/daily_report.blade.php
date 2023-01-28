<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title', 'FSF') | {{ fromSettings('site_title') }}</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset(fromSettings('favicon') ?? 'backend/images/favicon.ico') }}" />
        <!-- Bootstrap CSS -->
        {{-- DateTables --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Typography CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/typography.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    
    </head>

<body>

    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                @php
                    $accounts = App\Models\Account::all();
                @endphp
                @foreach ($accounts as $ac)
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title"> {{ $ac->name }}</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="row" style="margin-bottom: 50px">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="">
                                            <p>
                                                <b>
                                                    Account Title:
                                                </b>
                                                <span>
                                                    {{ $ac->name }}
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
                                                    {{ $ac->account_number }}
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
                                                    <span class="font-weight-bold">€</span> {{ $ac->balance }}
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
                                                    {{ $ac->bank }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="table-responsive">
                                    <table id="" class="fdd-table table table-striped table-bordered mt-4" role="grid"
                                        aria-describedby="user-list-page-info">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Source</th>
                                                <th>Done By</th>
    
    
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
                                            @foreach ($ac->transactions as $trans)
                                            @if(date('Y-m-d',strtotime($trans->created_at))==date('Y-m-d'))  
                                            <tr>
                                                <td>{{$i}}</td>
                                                @if ($trans->donation_id)
                                                    <td><a
                                                            href="{{ route('donation.show', $trans->donation->donation_code) }}">{{ $trans->donation->donation_code }}</a>
                                                    </td>
                                                @else
                                                    <td><a
                                                            href="#">Account Topup</a>
                                                    </td>
                                                @endif

                                                <td><a
                                                        href="{{ route('users.show', $trans->user->id) }}">{{ $trans->user->full_name }}</a>
                                                </td>


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
                                                @endif
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
                                                <td> <span class="font-weight-bold">€</span> {{ $ac->balance }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>







    <script>
        $(document).ready(function() {
            $('.fdd-table').DataTable();
        });
    </script>

</body>

</html>
