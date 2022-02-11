@extends('admin/layout');
@section('page_title','Manage Size')
@section('container')
<h1 class="m-b-10" >Manage Size</h1>
<a href="{{ url('admin/size') }}" class="m-b-10"  >
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
                        <form action="{{ route('size.insert') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="size" class="control-label mb-1">Size</label>
                                <input id="size" name="size" type="text" value="{{$size}}" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('size')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
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