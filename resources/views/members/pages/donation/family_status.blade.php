@extends('members.main')
@section('title', 'Dashboard')

@section('styles')
@endsection

@push('css')
@endpush

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Family Member Application Status</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row">
                                <div class="offset-lg-4 col-lg-4 col-md-12 col-sm-12">
                                    <div>
                                        <form class="" action="" method="">
                                            <div class="row">
                                                <div class="col-md-12 pr-1">
                                                    <div class="form-group">
                                                        <label>Select Family Memeber</label>
                                                        <select class="custom-select form-control">
                                                            <option selected disabled>Please Select</option>
                                                            <option value="Ali">Ali</option>
                                                            <option value="Umer">Umer</option>
                                                            <option value="Ahmad">Ahmad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 pl-1">
                                                    <div class="text-right">
                                                        <button type="submit"
                                                            class="btn btn-primary rounded-pill">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="offset-lg-4 col-lg-4 col-md-12 col-sm-12">
                                    <div class="mt-5 mb-5">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="font-weight-bold">
                                                            Name:
                                                        </td>
                                                        <td class="text-right">
                                                            Ali Ahmad
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">
                                                            Father Name:
                                                        </td>
                                                        <td class="text-right">
                                                            M. Junaid Ali
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-weight-bold">
                                                            Registration No.
                                                        </td>
                                                        <td class="text-right">
                                                            8490874738
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                                    <div class="">
                                        <ul class="nav nav-pills mb-3 d-flex justify-content-center" id="pills-tab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="btn btn-primary rounded-pill active"
                                                    id="pills-application-tab" data-toggle="pill"
                                                    data-target="#pills-application" type="button" role="tab"
                                                    aria-controls="pills-application" aria-selected="true">Forms</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="btn btn-primary rounded-pill" id="pills-donation-tab"
                                                    data-toggle="pill" data-target="#pills-donation" type="button"
                                                    role="tab" aria-controls="pills-donation"
                                                    aria-selected="false">Donation</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-application" role="tabpanel"
                                                aria-labelledby="pills-application-tab">
                                                <div class="row py-3">
                                                    <div class="col-lg-8 col-md-6 col-sm-12">
                                                        <div class="d-flex">
                                                            <div class="mr-3">
                                                                <div class="icon_gradient_background">
                                                                    <i class="now-ui-icons files_paper mt-2"></i>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <h6 class="mb-0 mt-1">Submit Enrolment Form</h6>
                                                                <p class="mb-0">25-January-2022</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="text-right">
                                                            <span
                                                                class="badge badge-warning rounded-pill mt-4">Pending</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <hr class="mb-3" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-donation" role="tabpanel"
                                                aria-labelledby="pills-donation-tab">
                                                <div class="row py-3">
                                                    <div class="col-lg-8 col-md-6 col-sm-12">
                                                        <div class="d-flex">
                                                            <div class="mr-3">
                                                                <div class="icon_gradient_background">
                                                                    <p class="mb-0">€</p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <h6 class="mb-0 mt-1">Regular Donation</h6>
                                                                <p class="mb-0">25-January-2022</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="text-right">
                                                            <span
                                                                class="badge badge-danger rounded-pill mt-2">Rejected</span>
                                                            <p class="mb-0 font-weight-bold">€ 100</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <hr class="mb-3" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
