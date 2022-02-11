@extends('admin/layout');
@section('page_title','Manage Coupon')
@section('container')
<h1 class="m-b-10" >Manage Coupon</h1>
<a href="{{ url('admin/coupon') }}" class="m-b-10"  >
<button type="button" class="btn btn-primary btn-sm ">
<i class="fa fa-arrow-left"></i>&nbsp; back
</button>
</a>
<div class="row mt-30">
    <div class="col-md-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('coupon.insert') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title" class="control-label mb-1">Coupon Title</label>
                                        <input id="title" name="title" type="text" value="{{$title}}" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <!-- <div class="form-group"> -->
                                    <div class="col-md-6">
                                        <label for="code" class="control-label mb-1">Coupon Code </label>
                                        <input id="code" name="code" type="text" value="{{$code}}" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the code" autocomplete="coupon_code" aria-required="true" aria-invalid="false" required>
                                        @error('code')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- <div class="form-group"> -->
                                    <div class="col-md-6">
                                        <label for="value" class="control-label mb-1 m-t-20">Coupon Code Value </label>
                                        <input id="value" name="value" type="text" value="{{$value}}" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the value" autocomplete="value" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="type" class="control-label mb-1 m-t-20">Coupon Code Type </label>
                                        <select id="type" name="type" class="form-control" required>
                                            @if($type=='value')
                                                <option value="value" selected>Value</option>
                                                <option value="per">Percent</option>
                                            @elseif($type == 'per')
                                                <option value="value" >Value</option>
                                                <option value="per" selected>Percent</option>
                                            @else
                                                <option value="value" >Value</option>
                                                <option value="per">Percent</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="min_order_amt" class="control-label mb-1 m-t-20">Min Order ammount </label>
                                        <input id="min_order_amt" name="min_order_amt" type="text" value="{{$min_order_amt}}" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the value" autocomplete="value" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="is_one_time" class="control-label mb-1 m-t-20">Only For One Time ? </label><br>
                                        @if($is_one_time=='1')
                                            <input type="radio" value="1" name="is_one_time" id="is_one_time" class="" checked> Yes
                                            <input type="radio" value="0" name="is_one_time" id="is_one_time" class="m-l-20"> No
                                        @else
                                            <input type="radio" value="1" name="is_one_time" id="is_one_time" class="" > Yes
                                            <input type="radio" value="0" name="is_one_time" id="is_one_time" class="m-l-20" checked> No
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