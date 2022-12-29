@extends('backend.main')
@section('title', ' Notification | FSF')

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
                            <div>
                                <a class="btn btn-primary" href="{{route('notification.index')}}">Previous Notifications</a>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                           

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="title" class="required">Title (MAX 50 CHARACTERS)</label>
                                        <input type="text" class="form-control" name="title" placeholder="e.g. Spain"
                                            value="{{$notification->title }}" disabled>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="short_description" class="required">Short Description (MAX 100 CHARACTERS)</label>
                                        <input type="text" class="form-control" name="short_description" placeholder="e.g. Spain"
                                            value="{{ $notification->short_description }}" disabled>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="short_description" class="required">Sent By</label>
                                        <input type="text" class="form-control" name="short_description" placeholder="e.g. Spain"
                                            value="{{ $notification->user->full_name }}" disabled>
                                    </div>

                                    <div class="col-md-12 col-sm-12 mb-3">
                                        <label for="description" class="required">Details</label>
                                        <textarea type="text" class="form-control" rows="10" name="description" placeholder="e.g. Spain" disabled
                                            >{{ $notification->description }}</textarea>
                                    </div>
                                </div>
                          



                                <a href="{{route('notification.index')}}" class="btn iq-bg-danger mr-3">Cancel</a>

                      
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
