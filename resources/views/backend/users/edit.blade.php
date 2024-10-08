@extends('backend.main')
@section('title', 'Edit User - FSF')

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
                                <h4 class="card-title">Edit User</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                {{ @method_field('PUT') }}
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Full Name </label>
                                        <input type="text" class="form-control" name="full_name" placeholder="e.g. Ali"
                                            value="{{ $user->full_name }}">
                                    </div>
                               
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="username">Username:</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="e.g. aliraza12" value="{{ $user->username }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="email">Email address:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="e.g. abc@email.com" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <div class="mt-2 mb-3">
                                                <h4 class="required">
                                                    Access Level:
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-gl-10 col-md-10 col-sm-12">
                                            <div class="row">
                                                <select class="form-control" id="exampleFormControlSelect1" required
                                                    name="roles">

                                                    <option selected="" disabled="">Select Role</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}"
                                                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                            {{ ucfirst($role->name) }}
                                                        </option>
                                                    @endforeach
                                                </select>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 mb-4">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12">
                                            <div class="mt-2 mb-3">
                                                <h4 class="required">
                                                    User Status
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                {{-- <label for="exampleFormControlSelect1">Select Input</label> --}}
                                                <select class="form-control" id="exampleFormControlSelect1" name="status"
                                                    required>
                                                    <option selected="" disabled="">Select Status</option>
                                                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>In Active
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-3">Update Data</button>
                                <a href="{{ route('users.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>
                                <a href="{{ route('users.reset_password', $user->id) }}" class="btn iq-bg-info">Reset
                                    Password</a>
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
