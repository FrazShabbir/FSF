@extends('backend.main')
@section('title', 'Edit '.$province->name.' Province | FSF')

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
                                <h4 class="card-title">Edit {{$province->name}}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('province.update',$province->id) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Province Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="e.g. Spain"
                                            value="{{$province->name ?? old('name') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="iso2" class="required">Country</label>

                                        <select name="community_id" id="" class="form-control" required>
                                            @foreach ($communities as $key)
                                                <option value="{{ $key->id }}" {{$province->community_id==$key->id?'selected':''}}>{{ $key->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="status">status:</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1" {{$province->status==1?'selected':''}}>Active</option>
                                            <option value="0" {{$province->status==0?'selected':''}}>in Active</option>
                                        </select>

                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary mr-3">Update Province</button>
                                <a href="{{ route('province.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

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
