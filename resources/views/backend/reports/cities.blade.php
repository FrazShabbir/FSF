@extends('backend.main')
@section('title', 'Create User - FSF')

@section('styles')
@endsection

@push('css')
{{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> --}}
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
                                 <h4 class="card-title">Cities Report of Credit</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <div id="home-perfomer-chart"></div>
                           </div>
                           
                        </div>
                     </div>
                 </div>


               

                </div>
             </div>
          </div>
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
                                     <h4 class="card-title">Cities Report of Debit</h4>
                                  </div>
                               </div>
                               <div class="iq-card-body">
                                  <div id="home-perfomer-chart_2"></div>
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
    if(jQuery('#home-perfomer-chart').length){
        var donut = new Morris.Donut({
          element: 'home-perfomer-chart',
          resize: true,
          colors: ["#1e3d73", "#fe517e", "#99f6ca"],
         
          data: [
            @foreach($credit as $key => $value)
            {label: "{{$key}}", value: {{$value}}},
            @endforeach
          ],
        
          hideHover: 'auto'
        });
    }

    if(jQuery('#home-perfomer-chart_2').length){
        var donut = new Morris.Donut({
          element: 'home-perfomer-chart_2',
          resize: true,
          colors: ["#1e3d73", "#fe517e", "#99f6ca"],
         
          data: [
            @foreach($debit as $key => $value)
            {label: "{{$key}}", value: {{$value}}},
            @endforeach
          ],
        
          hideHover: 'auto'
        });
    }
</script>
@endpush
