<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Donation Statistics</h4>
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


                        <tr class="bg-secondary text-light">
                            <td>1</td>
                            <td>Total Donations</td>
                            <td><span class="euro"></span> {{ $data->donations->sum('amount') }}</td>


                        </tr>

                        <tr class="bg-success text-dark">
                            <td>2</td>
                            <td>Approved Donations</td>
                            <td><span class="euro"></span> {{ $data->totaldonations->sum('amount') }}</td>
                        </tr>

                        <tr class="bg-primary text-light">
                            <td>3</td>
                            <td>Pending Donations</td>
                            <td><span class="euro"></span> {{ $data->pendingdonations->sum('amount') }}</td>
                        </tr>
                        <tr class="bg-danger text-light">
                            <td>4</td>
                            <td>Rejected Donations</td>
                            <td><span class="euro"></span> {{ $data->rejecteddonations->sum('amount') }}</td>
                        </tr>


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>