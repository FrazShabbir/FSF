@extends('backend.main')
@section('title', 'Add New Province | FSF')

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
                                <h4 class="card-title">Add Province</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('province.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Province Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="e.g. Spain"
                                            value="{{ old('name') }}" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="iso2" class="required">Community</label>

                                        <select name="community_id" id="" class="form-control" required>
                                            <option value="" selected>Select Option</option>

                                            @foreach ($communities as $key)
                                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="hod" class="required">Head of Department</label>

                                        <select name="hod" id="" class="form-control" required>
                                            @foreach (officeUsers() as $user)
                                                <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="status">status:</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">in Active</option>
                                        </select>

                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary mr-3">Add Province</button>
                                <a href="{{ route('province.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

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
