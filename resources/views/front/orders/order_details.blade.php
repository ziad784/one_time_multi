{{-- This page is rendered by orders() method inside Front/OrderController.php (depending on if the order id Optional Parameter (slug) is passed in or not) --}}


@extends('front.layout.layout')



@section('content')
    <!-- Page Introduction Wrapper -->
    {{-- <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Order #{{ $orderDetails['id'] }} Details</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="{{ url('user/orders') }}">Orders</a>
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
            <a href="{{ url('user/orders') }}">{{ __("translation.Orders")}}</a>
        </li>
    </ul>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">

                {{-- Orders info table --}}
                <table class="table table-striped table-borderless">
                    <tr class="table-danger">
                        <td colspan="2">
                            <strong>{{ __("translation.Order Details")}}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.Order Date")}}</td>
                        <td>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.Order Status")}}</td>
                        <td>{{ $orderDetails['order_status'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.Order Total")}}</td>
                        <td><span class="real_currency">ريال</span>{{ $orderDetails['grand_total'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.Shipping Charges")}}</td>
                        <td><span class="real_currency">ريال</span>{{ $orderDetails['shipping_charges'] }}</td>
                    </tr>

                    @if ($orderDetails['coupon_code'] != '')
                        <tr>
                            <td>{{ __("translation.Coupon Code")}}</td>
                            <td>{{ $orderDetails['coupon_code'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __("translation.Coupon Amount")}}</td>
                            <td><span class="real_currency">ريال</span>{{ $orderDetails['coupon_amount'] }}</td>
                        </tr>
                    @endif

                    
                    @if ($orderDetails['courier_name'] != '')
                        <tr>
                            <td>{{ __("translation.Courier Name")}}</td>
                            <td>{{ $orderDetails['courier_name'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ __("translation.Tracking Number")}}</td>
                            <td>{{ $orderDetails['tracking_number'] }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td>{{ __("translation.Payment Method")}}</td>
                        <td>{{ $orderDetails['payment_method'] }}</td>
                    </tr>
                </table>

                {{-- Order products info table --}}
                <table class="table table-striped table-borderless">
                    <tr class="table-danger">
                        <th>{{ __("translation.Product Image")}} </th>
                        <th>{{ __("translation.Product Code")}} </th>
                        <th>{{ __("translation.Product Name")}} </th>
                        <th>{{ __("translation.Product Size")}} </th>
                        <th>{{ __("translation.Product Color")}} </th>
                        <th>{{ __("translation.Product Qty")}} </th>
                    </tr>

                    @foreach ($orderDetails['orders_products'] as $product)
                        <tr>
                            <td>
                                @php
                                    $getProductImage = \App\Models\Product::getProductImage($product['product_id']);
                                @endphp
                                <a target="_blank" href="{{ url('product/' . $product['product_id']) }}">
                                    <img style="width: 80px" src="{{ asset('front/images/product_images/small/' . $getProductImage) }}">
                                </a>
                            </td>
                            <td>{{ $product['product_code'] }}</td>
                            <td>{{ $product['product_name'] }}</td>
                            <td>{{ $product['product_size'] }}</td>
                            <td>{{ $product['product_color'] }}</td>
                            <td>{{ $product['product_qty'] }}</td>
                        </tr>

                        
                        @if ($product['courier_name'] != '')
                            <tr>
                                <td colspan="6">{{ __("translation.Courier Name")}}: {{ $product['courier_name'] }}, {{ __("translation.Tracking Number")}}: {{ $product['tracking_number'] }}</td>
                            </tr>
                        @endif

                    @endforeach
                </table>

                {{-- Delivery Address info table --}}
                <table class="table table-striped table-borderless">
                    <tr class="table-danger">
                        <td colspan="2">
                            <strong>{{ __("translation.Delivery Address")}}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.Name")}}</td>
                        <td>{{ $orderDetails['name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.Address")}}</td>
                        <td>{{ $orderDetails['address'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.City")}}</td>
                        <td>{{ $orderDetails['city'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.State")}}</td>
                        <td>{{ $orderDetails['state'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.Country")}}</td>
                        <td>{{ $orderDetails['country'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.Pincode")}}</td>
                        <td>{{ $orderDetails['pincode'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("translation.Mobile")}}</td>
                        <td>{{ $orderDetails['mobile'] }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection