@extends('admin/layout')
@section('page_title','Customer Details')
@section('customer_select','active')
@section('container')
                               
<h1 class="m-b-10">Customer Details</h1>

<div class="row m-t-30 m-l-100">
    <div class="col-md-10">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>Name</td>
                        <td><strong>{{$customer_list->name}}</strong></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><strong>{{$customer_list->email}}</strong></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td><strong>{{$customer_list->mobile}}</strong></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><strong>{{$customer_list->address}}</strong></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><strong>{{$customer_list->city}}</strong></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td><strong>{{$customer_list->state}}</strong></td>
                    </tr>
                    <tr>
                        <td>Zip</td>
                        <td><strong>{{$customer_list->zip}}</strong></td>
                    </tr>
                    <tr>
                        <td>Company</td>
                        <td><strong>{{$customer_list->company}}</strong></td>
                    </tr>
                    <tr>
                        <td>GSTIN</td>
                        <td><strong>{{$customer_list->gstin}}</strong></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
                        
@endsection