@extends('admin/layout');
@section('page_title','Manage Banner')
@section('container')


<h1 class="m-b-10" >Manage Banner</h1>

<a href="{{ url('admin/home_banner') }}" class="m-b-10"  >
    <button type="button" class="btn btn-primary btn-sm ">
        <i class="fa fa-arrow-left"></i>&nbsp; back
    </button>
    
</a>


<div class="row mt-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('home_banner.insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="banner_name" class="control-label mb-1">Banner Name</label>
                                        <input id="banner_name" name="banner_name" type="text" value="{{$banner_name}}" class="form-control" aria-required="true" aria-invalid="false" >
                                        @error('banner_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Banner_image" class="control-label mb-1"> Banner Image</label>
                                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                        @if($image!="")
                                        <img width="100px" src="{{asset('storage/media/banners/'.$image)}}"/>
                                        @endif
                                        @error('image')
                                            <div class="alert alert-danger" role="alert">
                                        {{$message}}		
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <label for="banner_about" class="control-label mb-1">Banner About</label>
                                            <input id="banner_about" name="banner_about" type="text" value="{{$banner_about}}" class="form-control" aria-required="true" aria-invalid="false" >
                                            @error('banner_about')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="off" class="control-label mb-1">if off on products %</label>
                                        <input id="off" name="off" type="text" value="{{$off}}" class="form-control" aria-required="true" aria-invalid="false" >
                                        @error('off')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                            <label for="btn_link" class="control-label mb-1">Button Link</label>
                                            <input id="btn_link" name="btn_link" type="text" value="{{$btn_link}}" class="form-control" aria-required="true" aria-invalid="false" >
                                            @error('btn_link')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="btn_text" class="control-label mb-1">Button Text</label>
                                        <input id="btn_text" name="btn_text" type="text" value="{{$btn_text}}" class="form-control" aria-required="true" aria-invalid="false" >
                                        @error('btn_text')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
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