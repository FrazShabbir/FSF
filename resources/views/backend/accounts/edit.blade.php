@extends('backend.main')
@section('title', 'Page')

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
                      <h4 class="card-title">Edit Bank Details</h4>
                   </div>
                </div>
                <div class="iq-card-body px-4">
                   <form action="{{route('account.update',$account->code)}}" method="POST">
                    @csrf
                    {{@method_field('PUT')}}
                    <div class="row">
                     <div class="col-md-6 col-sm-12 mb-3">
                        <label for="bank_name" class="required">Account Type</label>
                        <input type="text" class="form-control" value="{{ucfirst($account->account_type)}} Account" disabled>

                    </div>
                    
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="bank" class="required">Bank Name</label>
                            <input type="text" class="form-control" value="{{$account->bank}}" name="bank" placeholder="e.g. HBL">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="name" class="required">Account Title</label>
                            <input type="text" class="form-control" value="{{$account->name}}" name="name" placeholder="e.g. Raza">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="account_number" class="required">Account Number</label>
                            <input type="text" class="form-control" value="{{$account->account_number}}" id="account_number" name="account_number" placeholder="e.g. 23456789">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="blalnce" class="">Account Balance <small>(For Changing balance Please Create Vouchers)</small></label>
                            <input type="number" disabled value="{{$account->balance}}" class="form-control" id="balance" placeholder="e.g. 6000">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-6 mb-3">
                            <label for="cityr" class="required">Bank City</label>
                            <input type="text" class="form-control" value="{{$account->city}}" id="city" name="city" placeholder="e.g. Gujrat">
                        </div>
                        <div class="col-6 mb-3">
                           <label for="cityr" class="required">Status</label>
                           <select name="status" id="" class="form-control">
                              <option value="ACTIVE" {{$account->status=='ACTIVE'?'selected':''}}>Active</option>
                              <option value="INACTIVE" {{$account->status=='INACTIVE'?'selected':''}}>InActive</option>
                           </select>
                       </div>
                     </div>

                      <button type="submit" class="btn btn-primary mr-3">Submit</button>
                      <a href="{{route('account.index')}}" class="btn iq-bg-danger">Cancel</a>
                   </form>
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
