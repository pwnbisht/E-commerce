@extends('admin/layout');
@section('page_title','Manage Tax')
@section('container')
<h1 class="m-b-10" >Manage tax</h1>
<a href="{{ url('admin/tax') }}" class="m-b-10"  >
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
                        <form action="{{ route('tax.insert') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="tax_value" class="control-label mb-1">Tax Value</label>
                                        <input id="tax_value" name="tax_value" type="text" value="{{$tax_value}}" class="form-control" aria-required="true" aria-invalid="false" required>
                                        @error('tax_value')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="tax_desc" class="control-label mb-1">Tax desc</label>
                                        <input id="tax_desc" name="tax_desc" type="text" value="{{$tax_desc}}" class="form-control" aria-required="true" aria-invalid="false" required>
                                        @error('tax_desc')
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