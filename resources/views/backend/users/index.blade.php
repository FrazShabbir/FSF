@extends('backend.main')
@section('title', 'Title')

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
                                <h4 class="card-title">User List</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                        
                                <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                                    aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ getFullNameById($user->id) }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach ($user->getRoleNames() as $role)
                                                        <span class="badge badge-primary">{{ $role }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                        <div class="flex align-items-center list-user-action">
                                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Show" href="{{route('users.show', $user->id)}}"><i
                                                                    class="lar la-eye"></i></a>
                                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Edit"
                                                                href="{{ route('users.edit', $user->id) }}"><i
                                                                    class="ri-pencil-line"></i></a>
                                                            @if (Auth::user()->id != $user->id)
                                                                @csrf
                                                                {{ method_field('Delete') }}
                                                                <button
                                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                                    type="submit" class="iq-bg-primary border-0 rounded"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="" data-original-title="Delete">
                                                                    <i class="las la-trash"></i>
                                                                </button>
                                                            @endif

                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>

                                            @php
                                                $i++;
                                            @endphp
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
@endsection


@section('scripts')
@endsection

@push('js')
@endpush
