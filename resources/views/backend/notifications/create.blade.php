@extends('backend.main')
@section('title', 'Add New Notification | FSF')

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
                                <h4 class="card-title">Notification</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('notification.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="title" class="required">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="e.g. Spain"
                                            value="{{ old('title') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="short_description" class="required">Short Description</label>
                                        <input type="text" class="form-control" name="short_description" placeholder="e.g. Spain"
                                            value="{{ old('short_description') }}">
                                    </div>

                                    <div class="col-md-12 col-sm-12 mb-3">
                                        <label for="description" class="required">Details</label>
                                        <textarea type="text" class="form-control" name="description" placeholder="e.g. Spain"
                                            value="{{ old('description') }}"></textarea>
                                    </div>
                                </div>
                          



                                <button type="submit" class="btn btn-primary mr-3">Send Notification</button>
                                <a href="{{ route('city.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

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
