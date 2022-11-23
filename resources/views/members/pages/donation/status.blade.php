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
          <h5 class="title">Uploaded Donations's Status</h5>
        </div>
        <div class="card-body">
          <div>
              <div class="row py-3">
                  <div class="offset-lg-2 col-lg-4 col-md-6 col-sm-12">
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
                          <span class="badge badge-danger rounded-pill mt-2">Rejected</span>
                          <p class="mb-0 font-weight-bold">€ 100</p>
                      </div>
                  </div>
                  <div class="offset-lg-2 col-lg-8 col-md-6 col-sm-12">
                      <hr class="mb-3"/>
                  </div>
              </div>
              <div class="row py-3">
                <div class="offset-lg-2 col-lg-4 col-md-6 col-sm-12">
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
                        <span class="badge badge-success rounded-pill mt-2">Accepted</span>
                        <p class="mb-0 font-weight-bold">€ 100</p>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-8 col-md-6 col-sm-12">
                    <hr class="mb-3"/>
                </div>
            </div>
            <div class="row py-3">
              <div class="offset-lg-2 col-lg-4 col-md-6 col-sm-12">
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
                      <span class="badge badge-warning rounded-pill mt-2">Pending</span>
                      <p class="mb-0 font-weight-bold">€ 100</p>
                  </div>
              </div>
              <div class="offset-lg-2 col-lg-8 col-md-6 col-sm-12">
                  <hr class="mb-3"/>
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
