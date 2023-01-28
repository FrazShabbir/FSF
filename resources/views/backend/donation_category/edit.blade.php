@extends('backend.main')
@section('title', 'Edit Category | FSF')

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
                                <h4 class="card-title">Update Category</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('category.update',$category->code) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="name">Category Name:</label>
                                        <input type="text" name="name" id="" class="form-control"
                                            placeholder="Funeral 2023" value="{{$category->name}}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="code">Category Code:</label>
                                        <input type="text" name="code" id="" class="form-control"
                                            placeholder="Funeral-2023" value="{{$category->code}}">
                                    </div>
                       
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label class="required" for="code">Category Status:</label>
                                       <select name="status" class="form-control" id="">
                                        <option value="1" {{$category->status==1?'selected':''}}>Active</option>
                                        <option value="0" {{$category->status==0?'selected':''}}>inactive</option>
                                       </select>
                                    </div>
                         

                                    





                                </div>



                                <button type="submit" class="btn btn-primary mr-3">Update Data</button>
                                <a href="{{ route('category.index') }}" class="btn iq-bg-danger mr-3">Cancel</a>

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
