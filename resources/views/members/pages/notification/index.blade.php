@extends('members.main')
@section('title', 'Dashboard')

@section('styles')
@endsection

@push('css')
@endpush

@section('content')
<div class="panel-header">
  <div class="header text-center">
    <h2 class="title">Notifications</h2>
  </div>
</div>


<div class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Notifications Style</h4>
        </div>
        <div class="card-body">
     
      
          <div class="alert alert-info alert-with-icon" data-notify="container">
        
            <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
            <span data-notify="message">This is a notification with close button and icon and have many lines. You can see that the icon and the close button are always vertically aligned. This is a beautiful notification. So you don't have to worry about the style.</span>
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
