@extends('backend.main')
@section('title', 'Add New Community | FSF')

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
                                <h4 class="card-title">Add Community</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('send.notification') }}" method="POST">
                                @csrf
                                <center>
                                    <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()"
                                        class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>
                                </center>

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="title" class="required">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="e.g. Spain"
                                            value="{{ old('title') }}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="details" class="required">Details</label>
                                        <input type="text" class="form-control" name="details" placeholder="e.g. Spain"
                                            value="{{ old('details') }}">
                                    </div>

                                </div>




                                <button type="submit" class="btn btn-primary mr-3">Send Notification</button>
                                <a href="{{ route('dashboard') }}" class="btn iq-bg-danger mr-3">Cancel</a>

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
    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyDcEGUO3mXCzfrLlEzQxBbAwuLFMyr_aJg",
            authDomain: "funeral-services-funds.firebaseapp.com",
            projectId: "funeral-services-funds",
            storageBucket: "funeral-services-funds.appspot.com",
            messagingSenderId: "57676434068",
            appId: "1:57676434068:web:ced9f4f39e37b45fe08281",
            measurementId: "G-H5XZVX3TDV"
        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function initFirebaseMessagingRegistration() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(token) {
                    console.log(token);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{ route('save-token') }}',
                        type: 'POST',
                        data: {
                            token: token
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            alert('Token saved successfully.');
                        },
                        error: function(err) {
                            console.log('User Chat Token Error' + err);
                        },
                    });

                }).catch(function(err) {
                    console.log('User Chat Token Error' + err);
                });
        }

        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(noteTitle, noteOptions);
        });
    </script>
@endpush
