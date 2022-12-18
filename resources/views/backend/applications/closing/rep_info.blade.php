<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Representative Info</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="table-responsive">

                <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                    aria-describedby="user-list-page-info">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Key</th>
                            <th>Value</th>

                        </tr>
                    </thead>
                    <tbody>


                        <tr class="">
                            <td>1</td>
                            <td>Name</td>
                            <td>{{ $application->rep_name}}</td>
                        </tr>
                        <tr class="">
                            <td>2</td>
                            <td>Surname</td>
                            <td>{{ $application->rep_surname}}</td>
                        </tr>
                        <tr class="">
                            <td>3</td>
                            <td>Phone</td>
                            <td>{{ $application->rep_phone}}</td>
                        </tr>
                        <tr class="">
                            <td>4</td>
                            <td>Passport Number</td>
                            <td>{{ $application->rep_passport_no}}</td>
                        </tr>
                        <tr class="">
                            <td>5</td>
                            <td>Address</td>
                            <td>{{ $application->rep_address}}</td>
                        </tr>
                     


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>