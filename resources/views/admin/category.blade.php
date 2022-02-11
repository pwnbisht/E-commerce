@extends('admin/layout');
@section('page_title','Category')
@section('category_select','active')
@section('container')
<h1 class="m-b-10" >Category</h1>
<a href="{{url('admin/category/manage_category')}}">
<button type="button" class="btn btn-success btn-sm">
<i class="fa fa-plus"></i>&nbsp; Add Category
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
                  <th>Category</th>
                  <th>Category Slug</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($data as $list)
               <tr>
                  <td>{{$list['id']}}</td>
                  <td>{{$list['category_name']}}</td>
                  <td>{{$list['category_slug']}}</td>
                  <td>
                     <a href="{{url('admin/category/manage_category')}}/{{$list['id']}}">
                     <button type="button" class="btn btn-success btn-sm">
                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Update
                     </button>
                     </a>
                     @if($list['status']==1)
                     <a href="{{url('admin/category/status/0')}}/{{$list['id']}}">
                     <button type="button" class="btn btn-primary btn-sm">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Active
                     </button>
                     </a>
                     @elseif($list['status']==0)
                     <a href="{{url('admin/category/status/1')}}/{{$list['id']}}">
                     <button type="button" class="btn btn-warning btn-sm">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Deactive
                     </button>
                     </a>
                     @endif
                     <a href="{{ url('admin/category/delete_category') }}/{{$list['id']}}">
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