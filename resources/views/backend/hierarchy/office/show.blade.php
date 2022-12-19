@extends('backend.main')
@section('title', 'Office Details | FSF')

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
                                <h4 class="card-title">Details of  Office</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                          

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="office_code" class="required">Office Code</label>
                                        <input type="text" class="form-control removeSpace" placeholder="e.g. Office-01"
                                            value="{{$office->office_code ?? old('office_code') }}" disabled>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Office Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="e.g. Spain"
                                            value="{{$office->name ??  old('name') }}" disabled>
                                    </div>
                                   

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Office Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="e.g. 011-34-91234-5678"
                                            value="{{$office->phone ??  old('phone') }}" disabled>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="street" class="required">Street</label>
                                        <input type="text" class="form-control" name="street" placeholder="e.g. Street No"
                                            value="{{$office->street ??  old('street') }}" disabled>
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="area" class="required">Area</label>
                                        <input type="text" class="form-control" name="area" placeholder="e.g. Area where Located"
                                            value="{{$office->area ??  old('area') }}" disabled>
                                    </div>

                                  

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="city_id" class="required">City</label>
                                        <input type="text" class="form-control" name="area" placeholder="e.g. Area where Located"
                                        value="{{$office->city->name}}" disabled>

                                       

                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="officehead" class="required">Head of Department</label>

                                        <input type="text" class="form-control" name="area" placeholder="e.g. Area where Located"
                                        value="{{$office->head->full_name}}" disabled>

                                    </div>


                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="status">status:</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1"  {{$office->status =='1'?'selected':''}}>Active</option>
                                            <option value="0"  {{$office->status =='0'?'selected':''}}>in Active</option>
                                        </select>

                                    </div>

                                </div>



                                <a href="{{ route('office.edit',$office->office_code) }}" class="btn btn-primary mr-3">Edit Office</a>
                                <a href="{{ route('office.index') }}" class="btn iq-bg-danger mr-3">All Offices</a>

                     
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
    $(document).ready(function() {
        $('.removeSpace').keyup('change', function() {
            var value = $(this).val();
            $(this).val(value.replace(/\s/g, '-'));
        });
        $('.removeSpace').on('change', function() {
            var value = $(this).val();
            $(this).val(value.replace(/\s/g, '-'));
        });
    });
</script>
@endpush
