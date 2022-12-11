<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">User Applications</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="table-responsive">

                <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                    aria-describedby="user-list-page-info">
                    <thead>
                        <tr>

                          
                            <th>Application ID</th>
                            <th>Applicant Name</th>
                            <th>Applicant Status</th>
                  
                            <th>Action</th>
                            <th>Close Application</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($user->application as $application)
                            <tr>
                                <td>{{ $application->application_id }}</td>
                                <td>{{ $application->full_name }} </td>
                                <td><span class="badge badge-{{ $application->status }}">{{ $application->status }}</span></td>

                             

                                <td>
                                    <form action=""
                                        method="post">
                                        <div class="flex align-items-center list-donation-action">
                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                data-placement="top" title=""
                                                data-original-title="Show"
                                                href="{{route('application.show',$application->application_id)}}"><i
                                                    class="lar la-eye"></i></a>
                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                data-placement="top" title=""
                                                data-original-title="Edit"
                                                href=""><i
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
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#CloseAccount">
                                    Close Account
                                </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>