@extends('backend.main')
@section('title', $user->full_name . ' - FSF')

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
                                <h4 class="card-title">User Detail</h4>
                            </div>
                            <div class="iq-header-title">
                                <span class="badge badge-{{ $user->status }}">{{ getStatus($user->status) }}</span>
                                @if ($user->application)
                                    {{-- <a href="{{ route('application.show', $user->application->application_id) }}"
                                    class="btn btn-primary">User Application</a> --}}
                                  
                                @endif
                            </div>
                        </div>
                        <div class="iq-card-body px-4">

                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="first_name">Full Name </label>
                                    <input type="text" class="form-control" name="full_name" disabled
                                        value="{{ $user->full_name }}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" disabled
                                        value="{{ $user->username }}">
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" id="email" name="email" disabled
                                        value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12 mb-3">
                                    <label for="username">Address:</label>
                                    <textarea type="text" class="form-control" id="username" name="username" disabled>{{ getAddress($user->id) ?? '' }}</textarea>
                                </div>

                            </div>

                            <div class="mt-5">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="mt-2 mb-3">
                                            <h4>
                                                Access Level:
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-gl-10 col-md-10 col-sm-12">
                                        <div class="row">
                                            @foreach ($user->getRoleNames() as $role)
                                                <div class="col-md-3 col-sm-12">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" disabled checked class="custom-control-input"
                                                            id="{{ $role }}" value="{{ $role }}">
                                                        <label class="custom-control-label" for="{{ $role }}">
                                                            {{ ucfirst($role) }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 mb-4">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="mt-2 mb-3">
                                            <h4>
                                                User Status
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" disabled
                                                value="{{ getUserStatus($user->id) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 mb-4">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="mt-2 mb-3">
                                            <h4>
                                                User Avatar
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <img src="{{ asset($user->avatar) }}" alt="" class="'img-fluid w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($user->status == 1 or $user->status == 2 or $user->status == 0)
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mr-3">Edit User</a>
                            @endif
                            <a href="{{ route('users.index') }}" class="btn iq-bg-danger mr-3">Back</a>
                            <a href="{{ route('users.reset_password', $user->id) }}" class="btn iq-bg-info">Reset
                                Password</a>

                        </div>
                    </div>
                </div>

                @if ($user->application)
                    @include('backend.users.partials._applications')
                    @include('backend.partials.common._donation_stats',['data'=>$user])
                    {{-- @include('backend.users.partials._rep_info') --}}
                @endif
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">User Donations</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">

                                <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                                    aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr>

                                            <th>Donation ID</th>
                                            <th>Application ID</th>
                                            <th>Applicant Bank</th>
                                            <th>FSF BANK</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($user->donations as $donation)
                                            <tr>
                                                <td>{{ $donation->donation_code }}</td>
                                                <td>{{ $donation->application->application_id }}</td>
                                                <td>{{ $donation->donor_bank_name }} -{{ $donation->donor_bank_no }} </td>
                                                <td>{{ $donation->fsf_bank_name }}-{{ $donation->fsf_bank_no }}</td>
                                                <td class="font-weight-bold"><span
                                                        class="font-weight-bold mr-1">€</span>{{ $donation->amount }}</td>
                                                <td><span
                                                        class="badge badge-{{ $donation->status }}">{{ $donation->status }}</span>
                                                </td>

                                                <td>
                                                    <form action="{{ route('donation.destroy', $donation->id) }}"
                                                        method="post">
                                                        <div class="flex align-items-center list-donation-action">
                                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Show"
                                                                href="{{ route('donation.show', $donation->id) }}"><i
                                                                    class="lar la-eye"></i></a>
                                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Edit"
                                                                href="{{ route('donation.edit', $donation->id) }}"><i
                                                                    class="ri-pencil-line"></i></a>
                                                            @csrf
                                                            {{ method_field('Delete') }}
                                                            <button
                                                                onclick="return confirm('Are you sure you want to delete?')"
                                                                type="submit" class="iq-bg-primary border-0 rounded"
                                                                data-toggle="tooltip" data-placement="top" title=""
                                                                data-original-title="Delete">
                                                                <i class="las la-trash"></i>
                                                            </button>

                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="CloseAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">WARNING</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">Application CLOSING WARNING</h4>
                    <hr>
                    <h4 class="text-primary">
                        Are Your Sure you want to close application from this user ({{ $user->full_name }})?
                    </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, It was a Mistake</button>
                    <a href=""class="btn btn-danger changeLINK">Yes, I am sure.</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    $(document).ready(function () {
        const application_id = {{$user->id}};
        $('.openModal').click(function(){
            var link = $(this).data('link');
            $('.changeLINK').attr('href', link);
           
            $('#CloseAccount').modal('show');
        });
    });
</script>
@endsection

@push('js')
@endpush
