@extends('backend.main')
@section('title', 'All Donations')

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
                                <h4 class="card-title">Donations</h4>
                            </div>
                            <div class="">
                                <a href="{{route('donation.create')}}" class="btn btn-primary"><i class="las la-plus"></i>Add New Donation</a>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                              
                                <table id="FSF-Table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Donor</th>
                                            <th>Mode</th>
                                            <th>receipt</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($donations as $donation)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $donation->application->full_name??$donation->user->full_name ??'Manual' }}</td>
                                                <td>{{ $donation->mode }}</td>
                                                <th>
                                                    <img id="uploadedImage_data_{{ $donation->id }}"
                                                    class="img-preview img_modal" 
                                                    src="{{ $donation->receipt ?? asset(fromSettings('logo') ?? 'backend/images/fs_logo.png') }}"
                                                    alt="" accept="image/png, image/jpeg">
                                                </th>

                                                <td><span class="font-weight-bold mr-1">€</span>{{ $donation->amount }}</td>
                                                <td><span class="badge badge-{{ $donation->status }}">{{ $donation->status }}</span></td>
                                             <td>
                                                    <form action="{{ route('donation.destroy', $donation->donation_code) }}" method="post">
                                                        <div class="flex align-items-center list-user-action">
                                                            <a class="iq-bg-primary" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Show" href="{{route('donation.show', $donation->donation_code)}}"><i
                                                                    class="lar la-eye"></i></a>
                                                             @if ($donation->status == 'PENDING')
                                                             <a class="iq-bg-primary" data-toggle="tooltip"
                                                             data-placement="top" title=""
                                                             data-original-title="Edit"
                                                             href="{{ route('donation.edit', $donation->donation_code) }}"><i
                                                                 class="ri-pencil-line"></i></a>
                                                             @endif       
                                                       
                                                        
                                                                @csrf
                                                                {{ method_field('Delete') }}
                                                                <button
                                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                                    type="submit" class="iq-bg-primary border-0 rounded"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="" data-original-title="Delete">
                                                                    <i class="las la-trash"></i>
                                                                </button>
                                                           

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


    <div class="modal fade" id="ImageViewer" tabindex="-1" role="dialog" aria-labelledby="ImageViewerLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content text-center">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Image Viewer</h5>
           
            </div>
            <div class="modal-body">
             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close_modal">Close</button>
            </div>
          </div>
        </div>
      </div>

@endsection


@section('scripts')
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#FSF-Table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    'colvis'
                ],
                // "searching": false,
                // "paging": false,
                "info": false,
                "lengthChange": false,

            });
            $('#FSF-Table_paginate ul').addClass("pagination-sm");

        });
    </script>


<script>
    $('.img_modal').click(function() {
        $('#ImageViewer').modal('show');
        $('#ImageViewer .modal-body').html('<img src="'+$(this).attr('src')+'" class="img-fluid">');
    });
    $('.close_modal').click(function() {
        $('#ImageViewer').modal('hide');

    });
</script>


@endpush
