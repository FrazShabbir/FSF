<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Closing Remarks</h4>
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
                            <td>Total Donations</td>
                            <td>{{ $data->total_donations }}</td>


                        </tr>


                        <tr class="">
                            <td>2</td>
                            <td>Total Expense</td>
                            <td>{{ $data->total_expense }}</td>


                        </tr>


                        <tr class="">
                            <td>3</td>
                            <td>Person Deseased/Application Closure</td>
                            <td>{{ $data->deceased_at }}</td>
                        </tr>
                        <tr class="">
                            <td>4</td>
                            <td>Reason</td>
                            <td>{{ $data->reason }}</td>
                        </tr>
                        <tr class="">
                            <td>5</td>
                            <td>Process Start Date</td>
                            <td>{{ $data->process_start_at }}</td>
                        </tr>

                        <tr class="">
                            <td>6</td>
                            <td>Process Ended Date</td>
                            <td>{{ $data->process_ends_at }}</td>
                        </tr>
                        <tr class="">
                            <td>7</td>
                            <td>Application Closure Date</td>
                            <td>{{ $data->application_closed_at }}</td>
                        </tr>
                        
                        <tr class="">
                            <td>8</td>
                            <td>Application Closed By</td>
                            <td>{{ $data->applicationCloser->full_name }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>