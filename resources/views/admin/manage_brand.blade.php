@extends('admin/layout');
@section('page_title','Manage Brand')
@section('container')



<h1 class="m-b-10">Manage Brand</h1>
<a href="{{ url('admin/brand') }}" class="m-b-10">
    <button type="button" class="btn btn-primary btn-sm ">
        <i class="fa fa-arrow-left"></i>&nbsp; back
    </button>
</a>

@error('image')
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
   {{$message}}  
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
   </button>
</div> 
@enderror

<div class="row mt-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('brand.insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brand_name" class="control-label mb-1">Brand</label>
                                <input id="name" name="name" type="text" value="{{$name}}" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <label for="image" class="control-label mb-1"> Image</label>
                                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                                        @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        
                                        @if($image!="")
                                        <img src="{{ asset('storage/media/'.$image) }}" width="100px" >
                                        @else
                                    
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="is_home" class="control-label mb-1 m-t-35"> Show in Home Page</label>
                                        @if($is_home==1)
                                        <input type="checkbox" name="is_home" class="m-t-10 m-l-30"  checked>
                                        @else
                                        <input type="checkbox" name="is_home" class="m-t-10 m-l-30" >
                                        
                                        @endif
                                         
                                    </div>
                                </div>
                            </div>


                            <div>
                                <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
                                    Submit
                                </button>
                            </div>
                            <input type="hidden" name="id" value="{{$id}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection