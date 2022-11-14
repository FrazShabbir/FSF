@extends('backend.main')
@section('title', 'Edit '.$city->name.' City | FSF')

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
                                <h4 class="card-title">Edit</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('donation.update',$donation->id) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">City Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="e.g. Spain"
                                            value="{{$donation->name ?? old('name') }}">
                                    </div>
                     

                                </div>
                                <div class="row">
                 

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="status">status:</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1" {{$donation->status==1?'selected':''}}>Active</option>
                                            <option value="0" {{$donation->status==0?'selected':''}}>in Active</option>
                                        </select>

                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary mr-3">Update City</button>
                                <a href="{{ route('city.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

                            </form>
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
