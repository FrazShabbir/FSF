@extends('backend.main')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                                <i class="ri-focus-2-line"></i>
                            </div>
                            <p class="text-secondary">Total Applications</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ allApplicationsCount() }}</b></h4>
                                <div id="iq-chart-box1"></div>
                                <span class="text-primary"><b> +14% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-danger">
                                <i class="ri-pantone-line"></i>
                            </div>
                            <p class="text-secondary">Approved Applications</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ allApprovedApplicationsCount() }}</b></h4>
                                <div id="iq-chart-box2"></div>
                                <span class="text-danger"><b> -6% <i class="ri-arrow-down-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-success">
                                <i class="ri-database-2-line"></i>
                            </div>
                            <p class="text-secondary">Pending Applications</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ allPendingApplicationsCount() }}</b></h4>
                                <div id="iq-chart-box3"></div>
                                <span class="text-success"><b> +0.36% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                                <i class="ri-pie-chart-2-line"></i>
                            </div>
                            <p class="text-secondary">Rejected Applications</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ allRejectedApplicationsCount() }}</b></h4>
                                <div id="iq-chart-box4"></div>
                                <span class="text-warning"><b> +0.45% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                                <i class="ri-pie-chart-2-line"></i>
                            </div>
                            <p class="text-secondary">Renewable Applications</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><b>{{ allRenewablepplicationsCount() }}</b></h4>
                                <div id="iq-chart-box4"></div>
                                <span class="text-warning"><b> +0.45% <i class="ri-arrow-up-fill"></i></b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">New Applications</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                    <span class="dropdown-toggle text-primary" id="dropdownMenuButton5"
                                        data-toggle="dropdown">
                                        <i class="ri-more-fill"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                        <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Application ID</th>
                                            <th>Applicant (Full Name)</th>
                                            <th>Father's Name</th>
                                            <th>Passport Number</th>
                                            <th>Status</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (getPendingApplications() as $application)
                                        <tr>
                                            <td>{{ $application->application_id }}</td>
                                                <td>{{ $application->full_name }}</td>
                                                <td>{{ $application->father_name }}</td>
                                                <td>{{ $application->passport_number }}</td>
                                                <td><span
                                                        class="badge badge-{{ $application->status }}">{{ $application->status }}</span>
                                                </td>
                                                <td>

                                                    {{-- <form action="" method="post"> --}}
                                                        <div class="flex align-items-center list-user-action">
                                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Show"
                                                                href="{{ route('application.show', $application->application_id) }}"><i
                                                                    class="lar la-eye"></i></a>
                                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Edit"
                                                                href="{{ route('application.edit', $application->application_id) }}"><i
                                                                    class="ri-pencil-line"></i></a>

                                                            @if ($application->status == 'RENEWABLE' or $application->status == 'RENEWAL-REQUESTED')
                                                                <a class="iq-bg-primary" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="Renew"
                                                                    href="{{ route('renew.application.edit', $application->application_id) }}"><i
                                                                        class="las la-sync-alt"></i></a>
                                                            @endif

                                                            @csrf

                                                            {{-- {{ method_field('Delete') }}
                                                            <button
                                                                onclick="return confirm('Are you sure you want to delete?')"
                                                                type="submit" class="iq-bg-primary border-0 rounded"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Delete">
                                                                <i class="las la-trash"></i>
                                                            </button> --}}


                                                        </div>
                                                    {{-- </form> --}}
                                                </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <div class="d-flex align-items-center mt-3">
                                <div class="icon iq-icon-box rounded iq-bg-danger mr-3">
                                    <i class="ri-shopping-bag-line"></i>
                                </div>
                                <div class="iq-details col-sm-9 p-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="title text-dark">Dailly expenses</span>
                                        <div class="percentage"><b><span>$</span> 620 </b></div>
                                    </div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                        <div class="iq-progress-bar">
                                            <span class="bg-danger" data-percent="67"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="">45 Transaction</span>
                                        <div class="percentage">67<span>%</span></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-4 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="icon iq-icon-box rounded iq-bg-warning mr-3">
                                    <i class="ri-home-8-line"></i>
                                </div>
                                <div class="iq-details col-sm-9 p-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="title text-dark">House, bills</span>
                                        <div class="percentage"><b><span>$</span> 230 </b></div>
                                    </div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                        <div class="iq-progress-bar">
                                            <span class="bg-warning" data-percent="32"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="">38 Transaction</span>
                                        <div class="percentage">32<span>%</span></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-4 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="icon iq-icon-box rounded iq-bg-success mr-3">
                                    <i class="ri-camera-lens-line"></i>
                                </div>
                                <div class="iq-details col-sm-9 p-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="title text-dark">Children</span>
                                        <div class="percentage float-right"><b><span>$</span> 120 </b></div>
                                    </div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                        <div class="iq-progress-bar">
                                            <span class="bg-success" data-percent="20"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="">9 Transaction</span>
                                        <div class="percentage float-right">20<span>%</span></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-4 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="icon iq-icon-box rounded iq-bg-primary mr-3">
                                    <i class="ri-hospital-line"></i>
                                </div>
                                <div class="iq-details col-sm-9 p-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="title text-dark">Health</span>
                                        <div class="percentage float-right"><b><span>$</span> 80 </b></div>
                                    </div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                        <div class="iq-progress-bar">
                                            <span class="bg-primary" data-percent="30"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="">18 Transaction</span>
                                        <div class="percentage">30<span>%</span></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-4 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="icon iq-icon-box rounded iq-bg-info mr-3">
                                    <i class="ri-bank-line"></i>
                                </div>
                                <div class="iq-details col-sm-9 p-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="title text-dark">Banking</span>
                                        <div class="percentage float-right"><b><span>$</span> 110 </b></div>
                                    </div>
                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                        <div class="iq-progress-bar">
                                            <span class="bg-info" data-percent="60"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="">50 Transaction</span>
                                        <div class="percentage">60<span>%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection
