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
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Edit Profile</h5>
        </div>
        <div class="card-body">
          <form>
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
                  <input type="text" class="form-control" placeholder="First Name" value="Saad">
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" placeholder="Last Name" value="Ahmad">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 px-3">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Company" value="saad@email.com">
                </div>
              </div>
              <!-- <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                </div>
              </div> -->
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-4 pr-1">
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" placeholder="City" value="Mike">
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label>Country</label>
                  <input type="text" class="form-control" placeholder="Country" value="Andrew">
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="tel" class="form-control" placeholder="1234567890">
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>About Me</label>
                  <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                </div>
              </div>
            </div> -->
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="../assets/img/bg5.jpg" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <a href="#">
              <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
              <h5 class="title">Mike Andrew</h5>
            </a>
            <p class="description font-weight-bold">
              <span class="badge badge-pill badge-success">Active</span>
            </p>
          </div>
          <!-- <p class="description text-center">
            "Lamborghini Mercy <br>
            Your chick she so thirsty <br>
            I'm in that two seat Lambo"
          </p> -->
        </div>
        <hr>
        <div class="button-container">
          <button type="button" class="btn btn-primary rounded-pill">
            Logout
          </button>
          <!-- <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-facebook-f"></i>
          </button>
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-twitter"></i>
          </button>
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-google-plus-g"></i>
          </button> -->
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
