@extends('front.layout.layout')

@section('content')
    <div class="vendor_profile_body">
        <div class="vendor_info_header">
            <img class="ven_img" src="{{ $vendor_image["image"] != null ? url('admin/images/photos/' . $vendor_image["image"]) : url('admin/images/photos/no-image.gif')  }}"  alt="">
            <div style="display: flex;flex-direction: column">
               <div> {{$vendor_image["name"] }}</div>
               <div class="vendor_details" style="align-items: center">
                <div style="font-size: 13px">{{ __("translation.Shop Email")}}:</div>
                <div style="font-size: 13px" style="font-weight: 500;font-size: 18px;color: black">{{$vendor_details["shop_address"] != null ? $vendor_details["shop_address"] : "-"}}</div>
            </div>
            </div>
        </div>
        <div class="grid_body_ven"> 
            <div class="vendor_info_grid">
                <h1 style="margin: 0 auto">{{$vendor_details["shop_name"] != null ? $vendor_details["shop_name"] : "-"}}</h1>
                <div style="display: flex;gap:20px;align-items: center">
               

                    {{-- <div class="vendor_details">
                        <h5>{{ __("translation.Shop Mobile")}}:</h5>
                        <div style="font-weight: 500;font-size: 18px;color: black">{{$vendor_details["shop_mobile"] != null ? $vendor_details["shop_mobile"] : "-"}}</div>
                    </div>

                    <div class="vendor_details">
                        <h5>{{ __("translation.Shop Address")}}:</h5>
                        <div style="font-weight: 500;font-size: 18px;color: black">{{$vendor_details["shop_email"] != null ? $vendor_details["shop_email"] : "-"}}</div>
                    </div> --}}
               </div>
             
            </div>
        </div>

       <div style="width: 100%;display: flex;justify-content: center">
            <img class="vendor_banner" src={{ $vendor_details["banner"] != null ? '/admin/images/photos/' .$vendor_details["banner"] : "https://alkuwaiti.com/wp-content/uploads/2020/05/Hero-Banner-Placeholder-Dark-1024x480.png" }} alt="">
       </div>

       <div style="width: 100%;display: flex;justify-content: center">
            <video  class="vendor_video_player" autoplay="autoplay" src={{ $vendor_details["video"] != null ? '/front/videos/product_videos/' .$vendor_details["video"] :  '/front/videos/product_videos/228968488.mp4' }} playsinline="playsinline" muted="muted" class="plyr__video" controls>
             
                </video>
       </div>

       @if(count($products)> 0)
       <div class="tab-pane active show fade" id="men-latest-products" style="width: 84%;margin:0 auto;">
            <label for="" class="product_label">{{ __("translation.Vendor's Products")}}</label>
            <div class="slider-fouc">
                <div class="products-slider owl-carousel exclusive_slider" data-item="4">
           
                {{-- Show the 'Best Seller' products. Check the index() method in IndexController.php --}} 
                    @foreach ($products as $product)
                            @php
                                $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                            @endphp

                            <div class="item">
                                <div class="image-container">
                                    <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">
                                        @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- if the product image exists in BOTH database table AND filesystem (on server) --}}
                                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                        @else {{-- show the dummy image --}}
                                            <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Product">
                                        @endif
                                    </a>
                                </div>
                                <div class="item-content">
                                    <div class="what-product-is">
                                        <ul class="bread-crumb">
                                            <li>
                                                <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_code'] }}</a>
                                            </li>
                                        </ul>
                                        <h6 class="item-title">
                                            <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                        </h6>
                                        <div class="item-stars">
                                            <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                <span style='width:0'></span>
                                            </div>
                                            <span>(0)</span>
                                        </div>
                                    </div>

                                    {{-- Call the static getDiscountPrice() method in the Product.php Model to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout     --}}
                                    @php
                                        $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                    @endphp
                                    @if ($getDiscountPrice > 0) {{-- If there's a discount on the price, show the price before (the original price) and after (the new price) the discount --}}
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                <span class="real_currency">ريال</span> {{ $getDiscountPrice }}
                                            </div>
                                            <div class="item-old-price">
                                                <span class="real_currency">ريال</span> {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                    @else {{-- if there's no discount on the price, show the original price --}}
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                <span class="real_currency">ريال</span> {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
       </div>
       @endif

       @if(count($products)== 0)
        <div style="margin: 0 auto;font-size: 22px;font-weight: 600;color:black;">{{ __("translation.Vendor has no products")}}</div>
        @endif
    </div>
@endsection