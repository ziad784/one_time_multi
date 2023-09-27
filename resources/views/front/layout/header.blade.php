<?php
// Getting the 'enabled' sections ONLY and their child categories (using the 'categories' relationship method) which, in turn, include their 'subcategories`
$sections = \App\Models\Section::sections();
// dd($sections);
?>



<!-- Header -->
<header>
    <!-- Top-Header -->
    {{-- <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:+201255845857">
                        <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                        Telephone: +201255845857</a>
                    </li>
                    <li>
                        <a href="mailto:info@multi-vendore-commerce.com">
                        <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                        E-mail: info@multi-vendore-commerce.com
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                
                    <li>
                        <a>EGP
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                            <li>
                                <a href="#" class="u-c-brand">LE EGP</a>
                            </li>
                            <li>
                                <a href="#">($) USD</a>
                            </li>
                        </ul>
                    </li>
                 
                </ul>
            </nav>
        </div>
    </div>  --}}
   
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container" style="width: 100%;max-width:unset;">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">


                        <a href="{{ url('/') }}">


                            <img src="{{ asset('front/images/main-logo/logo-icon.png') }}" style="width: 10vw" alt="Multi-vendor E-commerce Application" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">



                    {{-- Website Search Form (to search for all website products) --}} 
                    <form class="form-searchbox" action="{{ url('/search-products') }}" method="get">
                        <label class="sr-only" for="search-landscape">{{ __("translation.Search")}}</label>
                        <input id="search-landscape" type="text" style="border-radius: 5px" class="text-field" placeholder="{{ __("translation.Search everything")}}" name="search" @if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) value="{{ $_REQUEST['search'] }}" @endif> {{-- We use the "name" HTML attribute as a key/name for the "value" HTML attribute for submitting the Search Form. Check the "value" HTML attribute too inside the <option> HTML tag down below! --}} {{-- if the user uses the Search Form --}}
                        <div class="select-box-position">
                            {{-- <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">Choose category for search</label> --}}
                                {{-- <select class="select-box" id="select-category" name="section_id">

                                    <option selected="selected" value="">All</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section['id'] }}"  @if (isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id']) && $_REQUEST['section_id'] == $section['id']) selected @endif>{{ $section['name'] }}</option> --}} {{-- the search bar drop-down menu at the top --}} {{-- We use the "value" HTML attribute as a value for the "name" HTML attribute for submitting the Search Form. Check the "name" HTML attribute too inside the <input> HTML tag above there! --}}
                                    {{-- @endforeach

                                </select> --}}
                            {{-- </div> --}}
                        </div>
                        <button id="btn-search" type="submit" style="background-color: black;border-radius: 0 5px 5px 0" class="button button-primary fas fa-search"></button>
                    </form>

                    @php
                        // dd($_GET);
                    @endphp



                </div>
                <div class="col-lg-3 col-md-3 col-sm-6" style="padding: unset">
                    <nav>
                        <ul class="mid-nav g-nav" style="display: flex;align-items: center">
                            <li>
                                <form action="/langchanger" id="form_lang"  method="get">
                                    @csrf
                                    <select name="locale" id="select_lang">
                                        @if (session()->get("lang") == "en")
                                        <option selected value="en" >ENG</option>
                                        <option value="ar">عربي</option>
                                        <option  value="cn">CN</option>
                                        <option  value="fr">FR</option>
                                        @endif
                                        @if (session()->get("lang") == "ar")
                                        <option  value="en" >ENG</option>
                                        <option selected value="ar">عربي</option>
                                        <option  value="cn">CN</option>
                                        <option  value="fr">FR</option>
                                        @endif
                                        @if (session()->get("lang") == "cn")
                                        <option  value="en" >ENG</option>
                                        <option  value="ar">عربي</option>
                                        <option selected value="cn">CN</option>
                                        <option  value="fr">FR</option>
                                        @endif

                                        @if (session()->get("lang") == "fr")
                                        <option  value="en" >ENG</option>
                                        <option  value="ar">عربي</option>
                                        <option  value="cn">CN</option>
                                        <option selected value="fr">FR</option>
                                        @endif
                                     
                                        @if (session()->get("lang") != "ar" && session()->get("lang") != "en" && session()->get("lang") != "cn" && session()->get("lang") != "fr" )
                                        <option  value="en" >ENG</option>
                                        <option  value="ar">عربي</option>
                                        <option  value="cn">CN</option>
                                        <option  value="fr">FR</option>
                                        @endif
                                     
                                    </select>
                                    {{-- <a class="account_header">ENG
                                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                                        </a>
                                        <ul class="g-dropdown" style="width:70px">
                                            <li>
                                                <a href="#" class=" account_header">ENG</a>
                                            </li>
                                            <li>
                                                <a href="#" class="account_header">عربي</a>
                                            </li>
                                        </ul> --}}
                                </form>
                                <script>
                                    document.getElementById("select_lang").addEventListener("change",(e)=>{
                                        document.getElementById("form_lang").submit()
                                    })
                                </script>
                            </li>
                            {{-- <li class="u-d-none-lg">
                                <a href="{{ url('/') }}">
                                <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li> --}}
                             <li>
                                    <a class="account_header">
                                       
                                        @if (\Illuminate\Support\Facades\Auth::check()) 
                                             {{ __("translation.My Account")}}
                                        @else
                                        {{ __("translation.Login/Register")}}
                                        @endif
            
                                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                                    </a>
                                    <ul class="g-dropdown" style="width:200px">
                                        <li>
                                            <a href="{{ url('cart') }}">
                                            <i class="fas fa-cog u-s-m-r-9"></i>
                                            {{ __("translation.My Cart")}}</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('checkout') }}">
                                            <i class="far fa-check-circle u-s-m-r-9"></i>
                                            {{ __("translation.Checkout")}}</a>
                                        </li>
            
            
            
                                    
                                        @if (\Illuminate\Support\Facades\Auth::check()) 
                                            <li>
                                                <a href="{{ url('user/account') }}"> 
                                                    <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                                    {{ __("translation.My Account")}} 
                                                </a>
                                            </li>
            
                                            
                                            <li>
                                                <a href="{{ url('user/orders') }}"> 
                                                    <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                                    {{ __("translation.My Orders")}} 
                                                </a>
                                            </li>
            
                                            <li>
                                                <a href="{{ url('user/logout') }}"> 
                                                    <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                                    {{ __("translation.Logout")}}  
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ url('user/login-register') }}"> 
                                                    <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                                    {{ __("translation.Customer Login")}}  
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('admin/login') }}">
                                                    <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                                    {{ __("translation.Vendor Login")}}   
                                                </a>
                                            </li>
                                        @endif
            
            
            
                                    </ul>
                             </li>

                             <li>
                                <a id="mini-cart-trigger">
                                <i class="ion ion-md-basket" style="color: black"></i>
                                <span style="
                                left: 55%;
                                top: 10%;
                            " class="item-counter totalCartItems">{{ totalCartItems() }}</span> {{-- totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file --}} {{-- We created the CSS class 'totalCartItems' to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred --}}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
    </div>
    <div class="fixed-responsive-container "  style="right: 100px">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-filter" id="responsive-filter"></button>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->



    <!-- Mini Cart Widget -->
    <div id="appendHeaderCartItems"> {{-- We created the CSS class 'appendHeaderCartItems' to use it in front/js/custom.js to update the total cart items via AJAX in the Mini Cart Wedget, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred --}}
        @include('front.layout.header_cart_items')
    </div>
    <!-- Mini Cart Widget /- -->



    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container" style="width: 100%;max-width:unset">
            <div class="row align-items-center">
                <div class="col-lg-3" style="margin-bottom: -4px">
                    {{-- all catagory --}}
                    <div class="v-menu v-close">
                        <span class="v-title">
                        <i class="ion ion-md-menu"></i>
                        {{ __("translation.All Categories")}}
                        <i class="fas fa-angle-down"></i>
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">



                                    @foreach ($sections as $section)
                                        @if (count($section['categories']) > 0){{-- if the section has child categories, show the section name, but if it doesn't, don't show it --}}
                                            <li class="js-backdrop">
                                                <a href="javascript:;">
                                                <i class="ion-ios-add-circle"></i>


                                                {{ $section['name'] }} 
                                                {{-- Show section name --}}


                                                <i class="ion ion-ios-arrow-forward"></i>
                                                </a>
                                                <button class="v-button ion ion-md-add"></button>
                                                <div class="v-drop-right" style="width: 700px;">
                                                    <div class="row">



                                                        @foreach ($section['categories'] as $category) 
                                                            <div class="col-lg-4">
                                                                <ul class="v-level-2">
                                                                    <li>
                                                                        <a href="{{ url($category['url']) }}">{{ $category['category_name'] }}</a>
                                                                        <ul>


 
                                                                            @foreach ($category['sub_categories'] as $subcategory) 
                                                                            <li>
                                                                                <a href="{{ url($subcategory['url']) }}">{{ $subcategory['category_name'] }}</a>
                                                                            </li>
                                                                            @endforeach



                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach


                                </ul>
                            </div>
                        </nav>
                    </div> 
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg" style="display: flex;justify-content: space-around">
                        {{-- <li class="mega-position">
                            <a>All Categories
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                @foreach ($section['categories'] as $category)
                                   
                                    
                                        <ul>
                                            <li class="menu-title">{{ $category['name'] }} </li>
                                            @foreach ($category['sub_categories'] as $subcategory) 
                                            <li>
                                                <a href="{{ url('about-us') }}" class="u-c-brand">{{ $subcategory['category_name'] }} </a>
                                            </li>
                                            @endforeach
                                         
                                        </ul>
                                
                                
                              
                            </div>
                        </li> --}}
                        <li>
                            <a href="{{ url('search-products?search=new-arrivals') }}">{{ __("translation.New Arrivals")}}
                            {{-- <span class="superscript-label-new">NEW</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=best-sellers') }}">{{ __("translation.Best Seller")}} 
                            {{-- <span class="superscript-label-hot">HOT</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=featured') }}">{{ __("translation.Featured")}} 
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=discounted') }}">{{ __("translation.Discounted")}} 
                            {{-- <span class="superscript-label-discount">>10%</span> --}}
                            </a>
                        </li>
                        <li class="mega-position">
                            <a> {{ __("translation.More")}}
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                <ul>
                                    <li class="menu-title">{{ __("translation.COMPANY")}}</li>
                                    <li>
                                        <a href="{{ url('about-us') }}" class="u-c-brand">{{ __("translation.About Us")}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('contact') }}">{{ __("translation.Contact Us")}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('faq') }}">{{ __("translation.FAQ")}}</a>
                                    </li>
                                </ul>
                                {{-- <ul>
                                    <li class="menu-title">{{ __("translation.COLLECTION")}}</li>
                                    <li>
                                        <a href="{{ url('men') }}">{{ __("translation.Men Clothing")}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('women') }}">{{ __("translation.Women Clothing")}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('kids') }}">{{ __("translation.Kids Clothing")}}</a>
                                    </li>
                                </ul> --}}
                                <ul>
                                    <li class="menu-title">ACCOUNT</li>
                                    <li>
                                        <a href="{{ url('user/account') }}">{{ __("translation.My Account")}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('user/orders') }}">{{ __("translation.My Orders")}}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>
<!-- Header /- -->