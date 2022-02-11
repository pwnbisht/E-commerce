@extends('admin/layout');
@section('page_title','Product')
@section('product_select','active')
@section('container')
<h1 class="m-b-10" >Product</h1>
<a href="{{url('admin/product/manage_product')}}">
<button type="button" class="btn btn-success btn-sm">
<i class="fa fa-plus"></i>&nbsp; Add product
</button>
</a>
<!-- Session message -->
@if(Session::has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
   <span class="badge badge-pill badge-success">Success</span>
   {{session('message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span>
   </button>
</div>
@endif
<div class="row m-t-30">
   <!-- <div class="col-lg-6"> -->
   <div class="col-md-12">
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
         <table class="table table-borderless table-data3">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Image</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($data as $list)
               <tr>
                  <td>{{$list['id']}}</td>
                  <td>{{$list['name']}}</td>
                  <td>{{$list['slug']}}</td>
                  <td>
                     @if($list->image=="")
                     Image not available
                     @else
                     <img src="{{ asset('storage/media/'.$list->image) }}" alt="" width="100px">
                     @endif
                  </td>
                  <td>
                     <a href="{{url('admin/product/manage_product')}}/{{$list['id']}}">
                     <button type="button" class="btn btn-success btn-sm">
                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Update
                     </button>
                     </a>
                     @if($list['status']==1)
                     <a href="{{url('admin/product/status/0')}}/{{$list['id']}}">
                     <button type="button" class="btn btn-primary btn-sm">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Active
                     </button>
                     </a>
                     @elseif($list['status']==0)
                     <a href="{{url('admin/product/status/1')}}/{{$list['id']}}">
                     <button type="button" class="btn btn-warning btn-sm">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Deactive
                     </button>
                     </a>
                     @endif
                     <a href="{{ url('admin/product/delete_product') }}/{{$list['id']}}">
                     <button type="button" class="btn btn-danger btn-sm">
                     <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete
                     </button>
                     </a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
      <!-- END DATA TABLE-->
   </div>
</div>
@endsection