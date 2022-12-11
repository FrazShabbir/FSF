@extends('backend.main')
@section('title', 'Create User - FSF')

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
                      <h4 class="card-title">Reports</h4>
                   </div>
                </div>
                <div class="iq-card-body px-4">
                    <div class="row">
                        <div class="col-lg-8">
                        </div>
                        <div class="col-lg-4">
                            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                               <div class="iq-card-header d-flex justify-content-between">
                                  <div class="iq-header-title">
                                     <h4 class="card-title">Cities Reports</h4>
                                  </div>
                               </div>
                               <div class="iq-card-body">
                                  <div id="cities_report"></div>
                               </div>
                            </div>
                         </div>
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
<script>
    if(jQuery('#cities_report').length){
        var donut = new Morris.Donut({
          element: 'cities_report',
          resize: true,
          colors: ["#1e3d73", "#fe517e", "#99f6ca"],
          data: [
            {label: "Download Sales", value: 12},
            {label: "In-Store Sales", value: 30},
            {label: "Mail-Order Sales", value: 20}
          ],
          hideHover: 'auto'
        });
    }

</script>
@endpush
