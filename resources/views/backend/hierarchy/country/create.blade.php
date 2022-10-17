@extends('backend.main')
@section('title', 'Create User - FDD')

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
                                <h4 class="card-title">Create User</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                {{ @method_field('POST') }}
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" placeholder="e.g. Ali">
                                    </div>
                                 
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="username" class="required">Username:</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="e.g. aliraza12">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="email" class="required">Email address:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="e.g. abc@email.com">
                                    </div>
                                </div>

                           
                                <button type="submit" class="btn btn-primary mr-3">Submit</button>
                                <a href="{{ route('users.index') }}" class="btn iq-bg-danger">Cancel</a>
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
