<!-- partial:partials/_navbar.html -->
<?php
// Getting the 'enabled' sections ONLY and their child categories (using the 'categories' relationship method) which, in turn, include their 'subcategories`
$notifications = \App\Models\notifications::all();
$notificationsunRead = \App\Models\notifications::where("is_read",0)->get();

?>


<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="justify-content: space-evenly;background: white">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        {{-- <b>Multi-vendor E-commerce Application Admin Panel</b> --}}
        <img src="{{ asset('front/images/main-logo/logo-icon.png') }}" style="width: 6vw" alt="Multi-vendor E-commerce Application" class="app-brand-logo">
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
        </button>
        {{-- <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                        <span class="input-group-text" id="search">
                        <i class="icon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                </div>
            </li>
        </ul> --}}
        <ul class="navbar-nav navbar-nav-right" style="gap: 20px;display: flex !important;align-items: center !important">
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
            @if (Auth::guard('admin')->user()->type == 'superadmin' || Auth::guard('admin')->user()->type == 'admin'  )
            <li class="nav-item nav-settings d-none d-lg-flex" style="position: relative">
                <a class="nav-link" href="#">
                   
                <i class="icon-bell" id="bell_btn" style="position: relative">

                    @if (count($notificationsunRead) > 0)
                    <div style="
                    position: absolute;
                    top: 1%;
                    left: 65%;
                    background: red;
                    width: 15px;
                    height: 15px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    color: white;
                    border-radius: 50%;
                    font-size: 10px;
                ">{{ count($notificationsunRead) }}</div>
                    @endif
                 
                </i>
                </a>

                <div class="notifications" id="notifications" style="
                position: absolute; top: 100%; width: 13vw !important; right: -66px; background: white; padding: 10px; border-radius: 6px; display: none;flex-direction: column;
            ">

                    @foreach ($notifications as $notification)
                    @if ($notification["type"] == "1" && $notification["is_read"] != "1")
                    <div> <a href="/admin/admins/vendor">{{ __("translation.New vendor registered")}}</a></div>
                    @endif
                  
                        
                    @endforeach

                </div>


            </li>



            <script>

                const bell_btn = document.getElementById("bell_btn")
                const notifications = document.getElementById("notifications")

                var is_clicked = false


                bell_btn.addEventListener("click",()=>{

                    if(is_clicked == true){
                        notifications.style.display = "none"
                        is_clicked = false
                    }else{
                        notifications.style.display = "flex"


                        fetch("/markread")
                        is_clicked = true
                    }

                  


                })


            </script>

            @endif
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="{{ url('admin/update-admin-details') }}" data-toggle="dropdown" id="profileDropdown">


                    {{-- Show the admin image if exists --}}
                    @if (!empty(Auth::guard('admin')->user()->image)) {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                        <img src="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}" alt="profile"> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                    @else
                        <img src="{{ url('admin/images/photos/no-image.gif') }}" alt="profile">
                    @endif


                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a href="{{ url('admin/update-admin-details') }}" class="dropdown-item">
                    <i class="ti-settings text-primary"></i>
                    {{ __("translation.Settings")}}
                    </a>
                    <a href="{{ url('admin/logout') }}" class="dropdown-item">
                    <i class="ti-power-off text-primary"></i>
                      {{ __("translation.Logout")}}
                    </a>
                </div>
            </li>

         
           
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
        </button>
    </div>
</nav>