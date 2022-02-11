@extends('front/layout')
@section('page_title', 'Order Placed')
@section('container')

    <!-- catg header banner section -->
    <section id="aa-product-category">
        <div class="container">
            <div class="row" style="text-align:center;">
                <br><br>
                <h2>Your Order Has been placed</h2>
                <h2> Order Id:- {{session()->get('ORDER_ID')}} </h2>
            </div>
        </div>
    </section>


@endsection
 