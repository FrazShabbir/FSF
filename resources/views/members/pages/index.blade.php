@extends('members.main')
@section('title', 'Dashboard')

@section('styles')
@endsection

@push('css')
@endpush

@section('content')
    <div class="panel-header panel-header">
    </div>
    <div class="content">

        <div class="row">
            @if ($applications->count() > 0)
                <div class="col-md-12">
                    <div class="card  card-tasks">
                        <div class="card-header ">

                            <h4 class="card-title">Applications</h4>
                        </div>
                        <div class="card-body ">
                            <div class="table-full-width table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach ($applications as $app)
                                            <tr>

                                                <td class="text-left">{{ $app->full_name }} - {{ $app->passport_number }}
                                                </td>
                                                <td class="text-left"><span class="badge badge-{{ $app->status }}">{{ $app->status }}</span>
                                                </td>
                                                <td class="td-actions text-right">
                                                    <a href="{{route('enrollment.show',$app->application_id)}}" rel="tooltip" title=""
                                                        class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                                        data-original-title="Edit Task">
                                                        <i class="now-ui-icons ui-2_settings-90"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            @else
                <div class="col-md-12 text-center">
                    <div class="card  card-tasks">
                        
                        <div class="card-body ">
                            <a href="{{route('enrollment.create')}}" class="btn btn-primary">Enroll Now</a>
                        </div>
                    </div>
                </div>

        @endif
        @if ($donations->count() > 0)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h4 class="card-title">Donations </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Applicant
                                    </th>
                                    <th>
                                        Doner Bank
                                    </th>
                                    <th>
                                        FSF Bank
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($donations as $donation)
                                        <tr>
                                            <td>
                                                {{ $donation->application->full_name }}
                                            </td>
                                            <td>
                                                {{ $donation->donor_bank_name }} - {{ $donation->donor_bank_no }}
                                            </td>
                                            <td>
                                                {{ $donation->account->name }} - {{ $donation->account->account_number }}
                                            </td>
                                            <td>
                                                {{ $donation->amount }}
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $donation->status }}">
                                                    {{ $donation->status }}</span>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>
@endsection


@section('scripts')
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
@endpush
