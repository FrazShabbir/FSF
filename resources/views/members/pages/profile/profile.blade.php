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
  <form action="{{route('member.profile.update',auth()->user()->username)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Edit Profile</h5>
        </div>
        <div class="card-body">
     
            <div class="row">
              <!-- <div class="col-md-5 pr-1">
                <div class="form-group">
                  <label>Company (disabled)</label>
                  <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                </div>
              </div> -->
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" placeholder="First Name" value="{{auth()->user()->full_name}}" name="full_name">
                </div>
              </div>
             <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" placeholder="+92300 12312312" value="{{auth()->user()->phone}}" name="phone">
                </div>
              </div> 

            </div>
            <div class="row">
              <div class="col-md-6 px-3">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Company" value="{{auth()->user()->email}}" name="email">
                </div>
              </div>
              <div class="col-md-6 px-3">
                <div class="form-group">
                  <label>Passport Number</label>
                  <input type="text" class="form-control" placeholder="PN233878" value="{{auth()->user()->passport_number}}" name="passport_number">
                </div>
              </div>
            </div>
     
            <div class="row">
              <div class="offset-6 col-md-6 px-3 text-right">
                <div class="form-group">
                <button class="btn btn-primary" type="submit">Update</button>
                </div>
              </div>
            </div>
        
        </div>
    
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="{{asset('members/assets/img/bg5.jpg')}}" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <a href="#">
              <img class="avatar border-gray" src="{{asset(auth()->user()->avatar??'members/assets/img/mike.jpg')}}" alt="...">
              <h5 class="title">{{auth()->user()->full_name}}</h5>
            </a>
            <p class="description font-weight-bold">
              <span class="badge badge-pill badge-{{auth()->user()->status}}">{{getStatus(auth()->user()->status)}}</span>
            </p>
          </div>
      
        </div>
        <hr>
        <div class="button-container">
          <input type="file" class="btn btn-primary rounded-pill" placeholder="Profile Pic" name="avatar">
          

        </div>
      </div>
    </div>
  </div>
</form>
</div>

@endsection


@section('scripts')
@endsection

@push('js')

@endpush
