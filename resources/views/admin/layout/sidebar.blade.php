{{-- Correcting issues in the Skydash Admin Panel Sidebar using Session --}}


<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
     
        <li class="nav-item">
            <a @if (Session::get('page') == 'dashboard') style="background: #f5f7ff ; color: #3c3cc9 !important" @endif class="nav-link"  href="{{ url('admin/dashboard') }}">
       
                <i class="bi bi-grid icons_class"></i>
                <span class="menu-title">{{ __("translation.Dashboard")}} </span>
                {{-- <i class="menu-arrow"></i> --}}
            </a>
            {{-- <div class="collapse" id="ui-orders">
                <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                    <li class="nav-item"> <a @if (Session::get('page') == 'orders')   style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/orders') }}">Orders</a></li>
                </ul>
            </div> --}}
        </li>
        {{-- <li class="nav-item">
            <a @if (Session::get('page') == 'dashboard') style="background: #F5F7FF  ; color: #3c3cc9 !important " @endif class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="bi bi-grid icons_class"></i>
                <span class="menu-title">        {{ __("translation.Dashboard")}}</span>
            </a>
        </li> --}}



        {{-- In case the authenticated user (the logged-in user) (using the 'admin' Authentication Guard in auth.php) type is 'vendor' --}}
        @if (Auth::guard('admin')->user()->type == 'vendor') {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
            <li class="nav-item">
                <a @if (Session::get('page') == 'update_personal_details' || Session::get('page') == 'update_business_details' || Session::get('page') == 'update_bank_details') style="background: #f5f7ff  ; color: #3c3cc9 !important  " @endif class="nav-link" data-toggle="collapse" href="#ui-vendors" aria-expanded="false" aria-controls="ui-vendors">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title"> {{ __("translation.Vendor Details")}}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-vendors">
                    <ul class="nav flex-column sub-menu" style="background: #fff  ; color: #F5F7FF  ">
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_personal_details') style="background: #F5F7FF  ; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/update-vendor-details/personal') }}">{{ __("translation.Personal Details")}}</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_business_details') style="background: #F5F7FF ; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/update-vendor-details/business') }}">{{ __("translation.Business Details")}}</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_bank_details')     style="background: #F5F7FF ; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/update-vendor-details/bank') }}">{{ __("translation.Bank Details")}}</a></li>
                    </ul>
                </div>
            </li>

            
            <li class="nav-item">
                <a @if (Session::get('page') == 'sections' || Session::get('page') == 'categories' || Session::get('page') == 'products' || Session::get('page') == 'brands' || Session::get('page') == 'filters' || Session::get('page') == 'coupons') style="background: #f5f7ff ; color: #3c3cc9 !important " @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title"> {{ __("translation.Catalogue")}} </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-catalogue">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                        <li class="nav-item"> <a @if (Session::get('page') == 'products')   style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link collapsed" href="{{ url('admin/products') }}"> {{ __("translation.Products")}}</a></li>
                        {{-- <li class="nav-item"> <a @if (Session::get('page') == 'coupons')    style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link collapsed" href="{{ url('admin/coupons') }}"> {{ __("translation.Coupons")}}</a></li>  --}}
                    </ul>
                </div>
            </li>

            {{-- If the authenticated/logged-in user is 'vendor', show ONLY the orders of the products added by that specific 'vendor' (In constrast to the case where the authenticated/logged-in user is 'admin', we show ALL orders) --}} 
            <li class="nav-item">
                <a @if (Session::get('page') == 'orders') style="background: #f5f7ff ; color: #3c3cc9 !important " @endif class="nav-link collapsed" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title"> {{ __("translation.Orders")}} </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-orders">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                        <li class="nav-item"> <a @if (Session::get('page') == 'orders')   style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link collapsed" href="{{ url('admin/orders') }}"> {{ __("translation.Orders")}}</a></li>
                    </ul>
                </div>
            </li>

        @else {{-- In case the authenticated user (the logged-in user) (using the 'admin' Authentication Guard in auth.php) type is 'superadmin', or 'admin', or 'subadmin' --}}
            <li class="nav-item">
                <a @if (Session::get('page') == 'update_admin_password' || Session::get('page') == 'update_admin_details') style="background: #f5f7ff  ; color: #3c3cc9 " @endif class="nav-link collapsed" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
                    <i class='bx bx-cog icons_class' ></i>
                    <span class="menu-title"> {{ __("translation.Settings")}}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-settings">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_admin_password') style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link collapsed" href="{{ url('admin/update-admin-password') }}"> {{ __("translation.Admin Password")}}</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_admin_details')  style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link collapsed" href="{{ url('admin/update-admin-details') }}"> {{ __("translation.Admin Details")}}</a></li>
                    </ul>
                </div>
            </li>

            
            <li class="nav-item">
                <a @if (Session::get('page') == 'view_admins' || Session::get('page') == 'view_subadmins' || Session::get('page') == 'view_vendors' || Session::get('page') == 'view_all')  style="background: #f5f7ff ; color: #3c3cc9 !important" @endif class="nav-link"  href="{{ url('admin/admins/vendor') }}">
           
                    <i class='bx bx-user icons_class'></i>
                    <span class="menu-title">{{ __("translation.Vendors")}} </span>
                    {{-- <i class="menu-arrow"></i> --}}
                </a>
                {{-- <div class="collapse" id="ui-orders">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                        <li class="nav-item"> <a @if (Session::get('page') == 'orders')   style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/orders') }}">Orders</a></li>
                    </ul>
                </div> --}}
            </li>
            <li class="nav-item">
               
                <a @if (Session::get('page') == 'subscriptions')  style="background: #f5f7ff ; color: #3c3cc9 !important" @endif class="nav-link"  href="{{ url('admin/subscriptions') }}">
           
                    <i class='bx bx-calendar icons_class'></i>
                    <span class="menu-title">{{ __("translation.subscriptions")}} </span>
                    {{-- <i class="menu-arrow"></i> --}}
                </a>
                {{-- <div class="collapse" id="ui-orders">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                        <li class="nav-item"> <a @if (Session::get('page') == 'orders')   style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/orders') }}">Orders</a></li>
                    </ul>
                </div> --}}
            </li>
            
            {{-- <li class="nav-item">
                <a @if (Session::get('page') == 'view_admins' || Session::get('page') == 'view_subadmins' || Session::get('page') == 'view_vendors' || Session::get('page') == 'view_all') style="background: #f5f7ff ; color: #3c3cc9 !important " @endif class="nav-link" data-toggle="collapse" href="#ui-admins" aria-expanded="false" aria-controls="ui-admins">
                    <i class='bx bx-user icons_class'></i>
                    <span class="menu-title">{{ __("translation.Vendors")}} </span>
                   
                </a>
             
            </li> --}}

            <li class="nav-item">
                <a @if (Session::get('page') == 'sections' || Session::get('page') == 'categories' || Session::get('page') == 'products' || Session::get('page') == 'brands' || Session::get('page') == 'filters' || Session::get('page') == 'coupons') style="background: #f5f7ff ; color: #3c3cc9 !important " @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
                    <i class='bx bx-list-ul icons_class'></i>
                    <span class="menu-title">{{ __("translation.Catalogue")}} </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-catalogue">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                        <li class="nav-item"> <a @if (Session::get('page') == 'sections')   style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/sections') }}">{{ __("translation.Sections")}}</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'categories') style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/categories') }}">{{ __("translation.Categories")}}</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'brands')     style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/brands') }}">{{ __("translation.Brands")}}</a></li> 
                        <li class="nav-item"> <a @if (Session::get('page') == 'products')   style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/products') }}">{{ __("translation.Products")}}</a></li>
                        {{-- <li class="nav-item"> <a @if (Session::get('page') == 'coupons')    style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/coupons') }}">{{ __("translation.Coupons")}}</a></li> --}}
                        <li class="nav-item"> <a @if (Session::get('page') == 'filters')    style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/filters') }}">{{ __("translation.Filters")}}</a></li>
                    </ul>
                </div>
            </li>

            
            <li class="nav-item">
                <a @if (Session::get('page') == 'orders') style="background: #f5f7ff ; color: #3c3cc9 !important" @endif class="nav-link"  href="{{ url('admin/orders') }}">
           
                    <i class="bi bi-truck icons_class"></i>
                    <span class="menu-title">{{ __("translation.Orders")}} </span>
                    {{-- <i class="menu-arrow"></i> --}}
                </a>
                {{-- <div class="collapse" id="ui-orders">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                        <li class="nav-item"> <a @if (Session::get('page') == 'orders')   style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/orders') }}">Orders</a></li>
                    </ul>
                </div> --}}
            </li>

            
            <li class="nav-item">
                <a @if (Session::get('page') == 'ratings') style="background: #f5f7ff ; color: #3c3cc9 !important  " @endif class="nav-link" data-toggle="collapse" href="#ui-ratings" aria-expanded="false" aria-controls="ui-ratings">
                    {{-- <i class='bx bxs-star-half ' ></i> --}}
                    <i class="bi bi-star icons_class"></i>
                    <span class="menu-title">{{ __("translation.Ratings")}} </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-ratings">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                        <li class="nav-item"> <a @if (Session::get('page') == 'ratings')   style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/ratings') }}"> {{ __("translation.Product Ratings & Reviews")}}</a></li>
                    </ul>
                </div>
            </li>

            
            
            <li class="nav-item">
                <a @if (Session::get('page') == 'users' || Session::get('page') == 'subscribers') style="background: #f5f7ff ; color: #3c3cc9 !important " @endif class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
                    <i class="bi bi-people icons_class"></i>
                    <span class="menu-title">{{ __("translation.Users")}} </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-users">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #3c3cc9">
                        <li class="nav-item"> <a @if (Session::get('page') == 'users')       style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/users') }}">{{ __("translation.Users")}}</a></li>
                        {{-- <li class="nav-item"> <a @if (Session::get('page') == 'subscribers') style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/subscribers') }}">{{ __("translation.Subscribers")}}</a></li> --}}
                    </ul>
                </div>
            </li>


            
            <li class="nav-item">
                <a @if (Session::get('page') == 'banners') style="background: #f5f7ff ; color: #3c3cc9 !important " @endif class="nav-link" data-toggle="collapse" href="#ui-banners" aria-expanded="false" aria-controls="ui-banners">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">{{ __("translation.Banners")}} </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-banners">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                        <li class="nav-item"> <a @if (Session::get('page') == 'banners') style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/banners') }}">{{ __("translation.Home Page Banners")}}</a></li>
                    </ul>
                </div>
            </li>

            
            {{-- <li class="nav-item">
                <a @if (Session::get('page') == 'shipping') style="background: #f5f7ff ; color: #3c3cc9 !important " @endif class="nav-link" data-toggle="collapse" href="#ui-shipping" aria-expanded="false" aria-controls="ui-shipping">
                    <i class="bi bi-bag-check icons_class"></i>
                    <span class="menu-title">Shipping </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-shipping">
                    <ul class="nav flex-column sub-menu" style="background: #fff ; color: #F5F7FF">
                        <li class="nav-item"> <a @if (Session::get('page') == 'shipping') style="background: #F5F7FF; color: #FFF " @else style="background: #fff ; color: #F5F7FF" @endif class="nav-link" href="{{ url('admin/shipping-charges') }}">Shipping Charges</a></li>
                    </ul>
                </div>
            </li> --}}

        @endif

    </ul>
</nav>