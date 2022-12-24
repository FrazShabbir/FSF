@extends('members.main')
@section('title', 'Dashboard')

@section('styles')
@endsection

@push('css')
@endpush

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Notifications</h2>
        </div>
    </div>


    <div class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Notifications Style</h4>
                    </div>
                    <div class="card-body">

                        @if ($notifications->count() > 0)
                            @foreach ($notifications as $notification)
                                <div class="alert alert-info alert-with-icon" data-notify="container">

                                    <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                                    <span data-notify="message"><b>{{ $notification->title }}</b><br>{{ $notification->description }}</span>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h5>No Notification</h5>

                            </div>
                        @endif
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
