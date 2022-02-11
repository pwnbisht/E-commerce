@extends('admin/layout');
@section('page_title','Manage Category')
@section('container')


<h1 class="m-b-10" >Manage Category</h1>

<a href="{{ url('admin/category') }}" class="m-b-10"  >
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
                        <form action="{{ route('category.insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="category_name" class="control-label mb-1">Category Name</label>
                                        <input id="category_name" name="category_name" type="text" value="{{$category_name}}" class="form-control" aria-required="true" aria-invalid="false" required>
                                        @error('category_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="category_slug" class="control-label mb-1">Category Slug </label>
                                        <input id="category_slug" name="category_slug" type="text" value="{{$category_slug}}" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the slug" autocomplete="category_slug" aria-required="true" aria-invalid="false" required>
                                        @error('category_slug')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="paarent_category_id" class="control-label mb-1">Parent Category</label>
                                        <select id="paarent_category_id" name="paarent_category_id" class="form-control">
                                            <option value="0">Select Categories</option>
                                            @foreach($category as $list)
                                            @if($paarent_category_id==$list->id)
                                            <option selected value="{{$list->id}}">
                                                @else
                                            <option value="{{$list->id}}">
                                                @endif
                                                {{$list->category_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="category_image" class="control-label mb-1"> Category Image</label>
                                        <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                        @if($category_image!="")
                                        <img width="100px" src="{{asset('storage/media/category/'.$category_image)}}"/>
                                        @endif
                                        @error('category_image')
                                            <div class="alert alert-danger" role="alert">
                                        {{$message}}		
                                            </div>
                                        @enderror
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