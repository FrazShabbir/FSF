@extends('backend.main')
@section('title', 'Edit '.$community->name.' Community | FSF')

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
                                <h4 class="card-title">Edit {{$community->name}}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('community.update',$community->id) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Community Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="e.g. Spain"
                                            value="{{$community->name ?? old('name') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="iso2" class="required">Country</label>

                                        <select name="country_id" id="" class="form-control" required>
                                            @foreach ($countries as $key)
                                                <option value="{{ $key->id }}" {{$community->country_id==$key->id?'selected':''}}>{{ $key->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="hod" class="required">Head of Department</label>

                                        <select name="hod" id="" class="form-control" required>
                                            @foreach (officeUsers() as $user)
                                                <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="status">status:</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="1" {{$community->status==1?'selected':''}}>Active</option>
                                            <option value="0" {{$community->status==0?'selected':''}}>in Active</option>
                                        </select>

                                    </div>

                                </div>



                                <button type="submit" class="btn btn-primary mr-3">Add Community</button>
                                <a href="{{ route('community.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

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
