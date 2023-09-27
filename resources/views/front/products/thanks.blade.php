{{-- This page is rendered by the thanks() method inside Front/ProductsController.php --}}
@extends('front.layout.layout')


@section('content')
    <!-- Page Introduction Wrapper -->
    {{-- <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Cart</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Thanks</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
    <ul class="bread-crumb">
        <li class="has-separator">
            <i class="ion ion-md-home"></i>
            <a href="index.html">{{ __("translation.Home")}}</a>
        </li>
        <li class="is-marked">
            <a href="#">{{ __("translation.Thanks")}}</a>
        </li>
    </ul>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>{{ __("translation.YOUR ORDER HAS BEEN PLACED SUCCESSFULLY")}}</h3>
                    <p>{{ __("translation.Your order number is ")}}{{ Session::get('order_id') }} {{ __("translation.and Grand Total is")}} <span class="real_currency">ريال</span> {{ Session::get('grand_total') }}</p> {{-- The Order Number is the order `id` in the `orders` database table. We stored the order id in Session in checkout() method in Front/ProductsController.php --}} {{-- Retrieving Data: https://laravel.com/docs/10.x/session#retrieving-data --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection



{{-- Forget/Remove some data in the Session after making/placing the order --}} 
@php
    use Illuminate\Support\Facades\Session;

    Session::forget('grand_total');  // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('order_id');     // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponCode');   // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponAmount'); // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
@endphp