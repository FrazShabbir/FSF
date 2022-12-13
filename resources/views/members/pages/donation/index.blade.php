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
            <div class="row">
                <div class="col-6">
                    <h5 class="title">My Donations</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('member.donation.create')}}" class="btn btn-primary">Add Donation</a>
                </div>
            </div>
          
         
        </div>
        <div class="card-body">
          <div>
            @foreach ($donations as $donation)
            <div class="row py-3">
                <div class="offset-lg-2 col-lg-5 col-md-6 col-sm-12">
                    <div class="d-flex">
                        <div class="mr-3">
                            <div class="icon_gradient_background">
                                <p class="mb-0">€</p>
                            </div>
                        </div>
                        <div class="mt-2">
                            <h6 class="mb-0 mt-1">Type:{{$donation->type}} - Application: {{$donation->application->application_id}}</h6>
                            <p class="mb-0">{{date('d-M-y',strtotime($donation->created_at))}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="text-right">
                        <span class="badge badge-{{$donation->status}} rounded-pill mt-2">{{$donation->status}}</span>
                        <p class="mb-0 font-weight-bold">€ {{$donation->amount}}</p>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-8 col-md-6 col-sm-12">
                    <hr class="mb-3"/>
                </div>
            </div>    
            @endforeach
       

{{-- 
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
          </div> --}}

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
