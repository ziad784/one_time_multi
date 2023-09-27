@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">{{ __("translation.Update Vendor Details")}}</h3>

                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                {{-- <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">January - March</a>
                                        <a class="dropdown-item" href="#">March - June</a>
                                        <a class="dropdown-item" href="#">June - August</a>
                                        <a class="dropdown-item" href="#">August - November</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            
            @if ($slug == 'personal') {{-- $slug was passed from AdminController to view (using compact() method) --}}
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __("translation.Update Personal Information")}}</h4>


                                {{-- Our Bootstrap error code in case of wrong current password or the new password and confirm password are not matching: --}}
                                {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                                @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif



                                {{-- Displaying Laravel Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif



                                {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
                                {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                                @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success:</strong> {{ Session::get('success_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                    

                                
                                <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}" method="post" enctype="multipart/form-data"> @csrf <!-- Using the enctype="multipart/form-data" to allow uploading files (images) -->
                                    <div class="form-group">
                                        <label>{{ __("translation.Vendor Username/Email")}}</label>
                                        <input required  class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly> <!-- Check updateAdminPassword() method in AdminController.php --> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __("translation.Type")}}</label>
                                        <input required  class="form-control" value="{{ $vendor }}" readonly> <!-- Check updateAdminPassword() method in AdminController.php --> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __("translation.SubType")}}</label>
                                        <input required  class="form-control" value="{{$vendor_type }}" readonly> <!-- Check updateAdminPassword() method in AdminController.php --> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_name">{{ __("translation.Name")}}</label>
                                        <input required  type="text" class="form-control" id="vendor_name" placeholder="{{ __("translation.Enter Name")}}" name="vendor_name" value="{{ Auth::guard('admin')->user()->name }}"> {{-- $vendorDetails was passed from AdminController --}} {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_address">{{ __("translation.Address")}}</label>
                                        <input required  type="text" class="form-control" id="vendor_address" placeholder="{{ __("translation.Enter Address")}}" name="vendor_address" value="{{ $vendorDetails['address'] }}"> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_city">{{ __("translation.City")}}</label>
                                        <input required  type="text" class="form-control" id="vendor_city" placeholder="{{ __("translation.Enter City")}}" name="vendor_city" value="{{ $vendorDetails['city'] }}"> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_state">{{ __("translation.State")}}</label>
                                        <input required  type="text" class="form-control" id="vendor_state" placeholder="{{ __("translation.Enter State")}}" name="vendor_state" value="{{ $vendorDetails['state'] }}"> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- Show all world countries from the database `countries` table --}}
                                        <label for="shop_country">{{ __("translation.Country")}}</label>
                                    
                                        <select class="form-control" id="vendor_country" name="vendor_country"  style="color: #495057">
                                            <option value="">{{ __("translation.Select Country")}}</option>

                                            @foreach ($countries as $country) {{-- $countries was passed from AdminController to view using compact() method --}}
                                                <option value="{{ $country['country_name'] }}" @if ($country['country_name'] == $vendorDetails['country']) selected @endif>{{ $country['country_name'] }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_pincode">{{ __("translation.Pincode")}}</label>
                                        <input required  type="text" class="form-control" id="vendor_pincode" placeholder="{{ __("translation.Enter Pincode")}}" name="vendor_pincode" value="{{ $vendorDetails['pincode'] }}"> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_mobile">{{ __("translation.Mobile")}}</label>
                                        <input required  type="text" class="form-control" id="vendor_mobile" placeholder="{{ __("translation.Enter 10 Digit Mobile Number")}}" name="vendor_mobile" value="{{ Auth::guard('admin')->user()->mobile }}" maxlength="10" minlength="10"> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_image">{{ __("translation.Vendor Photo")}}</label>
                                        <input required  type="file" class="form-control" id="vendor_image" name="vendor_image">
                                        {{-- Show the admin image if exists --}}
                                        @if (!empty(Auth::guard('admin')->user()->image)) {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                            <a target="_blank" href="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}">{{ __("translation.View Image")}}</a> <!-- We used    target="_blank"    to open the image in another separate page --> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                            <input required  type="hidden" name="current_vendor_image" value="{{ Auth::guard('admin')->user()->image }}"> <!-- to send the current admin image url all the time with all the requests --> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">{{ __("translation.Submit")}}</button>
                                    <button type="reset"  class="btn btn-light">{{ __("translation.Cancel")}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($slug == 'business') 
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __("translation.Update Vendor Business Information")}}</h4>


                                {{-- Our Bootstrap error code in case of wrong current password or the new password and confirm password are not matching: --}}
                                {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                                @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif



                                {{-- Displaying Laravel Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif



                                {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
                                
                                {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                                @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success:</strong> {{ Session::get('success_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                    

                                
                                <form class="forms-sample" action="{{ url('admin/update-vendor-details/business') }}" method="post" enctype="multipart/form-data"> @csrf <!-- Using the enctype="multipart/form-data" to allow uploading files (images) -->
                                    <div class="form-group">
                                        <label>{{ __("translation.Vendor Username/Email")}}</label>
                                        <input required  class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly> <!-- Check updateAdminPassword() method in AdminController.php --> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_name">{{ __("translation.Shop Name")}}</label>
                                        <input required  type="text" class="form-control" id="shop_name" placeholder="{{ __("translation.Enter Shop Name")}}" name="shop_name"  @if (isset($vendorDetails['shop_name'])) value="{{ $vendorDetails['shop_name'] }}" @endif> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_address">{{ __("translation.Shop Address")}}</label>
                                        <input required  type="text" class="form-control" id="shop_address" placeholder="{{ __("translation.Enter Shop Address")}}" name="shop_address"  @if (isset($vendorDetails['shop_address'])) value="{{ $vendorDetails['shop_address'] }}" @endif> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_city">{{ __("translation.Shop City")}}</label>
                                        <input   type="text" class="form-control" id="shop_city" placeholder="{{ __("translation.Enter Shop City")}}" name="shop_city"  @if (isset($vendorDetails['shop_city'])) value="{{ $vendorDetails['shop_city'] }}" @endif> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_state">{{ __("translation.Shop State")}}</label>
                                        <input   type="text" class="form-control" id="shop_state" placeholder="{{ __("translation.Enter Shop State")}}" name="shop_state"  @if (isset($vendorDetails['shop_state'])) value="{{ $vendorDetails['shop_state'] }}" @endif> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- Show all world countries from the database `countries` table --}}
                                        <label for="shop_country">{{ __("translation.Shop Country")}}</label>
                                    
                                        <select class="form-control" id="shop_country" name="shop_country" style="color: #495057">
                                            <option value="">{{ __("translation.Select Country")}}</option>

                                            @foreach ($countries as $country) {{-- $countries was passed from AdminController to view using compact() method --}}
                                                <option value="{{ $country['country_name'] }}"  @if (isset($vendorDetails['shop_country']) && $country['country_name'] == $vendorDetails['shop_country']) selected @endif>{{ $country['country_name'] }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="shop_mobile">{{ __("translation.Shop Mobile")}}</label>
                                        <input required  type="text" class="form-control" id="shop_mobile" placeholder="{{ __("translation.Enter 10 Digit Shop Mobile Number")}}" name="shop_mobile"  @if (isset($vendorDetails['shop_mobile'])) value="{{ $vendorDetails['shop_mobile'] }}" @endif maxlength="10" minlength="10">
                                    </div>
                                    



                                    <div class="form-group">
                                        <label for="business_license_number">{{ __("translation.Business License Number")}}</label>
                                        <input   type="text" class="form-control" id="business_license_number" placeholder="{{ __("translation.Enter Business License Number")}}" name="business_license_number"  @if (isset($vendorDetails['business_license_number'])) value="{{ $vendorDetails['business_license_number'] }}" @endif> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                 

                                    <div class="form-group">
                                        <label for="vendor_image">{{ __("translation.Banner Photo")}}</label>
                                        <input   type="file" class="form-control" id="vendor_image" name="banner_image">
                                        {{-- Show the admin image if exists --}}
                                        @if (!empty($vendorDetails["banner"])) {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                            <a target="_blank" href="{{ url('admin/images/photos/' . $vendorDetails['banner']) }}">{{ __("translation.View Image")}}</a> <!-- We used    target="_blank"    to open the image in another separate page --> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                            <input   type="hidden" name="current_vendor_image" value="{{ $vendorDetails['banner'] }}"> <!-- to send the current admin image url all the time with all the requests --> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="product_video">{{ __("translation.Product Video")}} ({{ __("translation.Recommended Size")}}: {{ __("translation.Less than")}} 2 MB)</label> {{-- Important Note: Default php.ini file upload Maximum file size is 2MB (If you upload a file with a larger size, it won't be uploaded!). Check upload_max_filesize using phpinfo() method --}}
                                        <input type="file" class="form-control" id="product_video" name="banner_video">
                                        {{-- Show the admin image if exists --}}
    
    
    
    
                                        {{-- Show the product video, if any (if exits) --}}
                                        @if (!empty($vendorDetails['video']))
                                            <a target="_blank" href="{{ url('front/videos/product_videos/' . $vendorDetails['video']) }}">{{ __("translation.View Product Video")}}</a>&nbsp;
                                           {{-- Delete the product video from BOTH SERVER (FILESYSTEM) & DATABASE --}}    {{-- Check admin/js/custom.js and web.php (routes) --}}
                                            <input required  type="hidden" name="current_vendor_video" value="{{ $vendorDetails['video'] }}"> 
                                            @endif
                                    </div>
                                    
                               
                                  
                                 
                                    <button type="submit" class="btn btn-primary mr-2">{{ __("translation.Submit")}}</button>
                                    <button type="reset"  class="btn btn-light">{{ __("translation.Cancel")}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($slug == 'bank')
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __("translation.Update Vendor Bank Information")}}</h4>


                                {{-- Our Bootstrap error code in case of wrong current password or the new password and confirm password are not matching: --}}
                                {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                                @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error:</strong> {{ Session::get('error_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif



                                {{-- Displaying Laravel Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">


                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif



                                {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
                                {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                                @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success:</strong> {{ Session::get('success_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                    

                                
                                <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank') }}" method="post" enctype="multipart/form-data"> @csrf <!-- Using the enctype="multipart/form-data" to allow uploading files (images) -->
                                    <div class="form-group">
                                        <label>{{ __("translation.Vendor Username/Email")}}</label>
                                        <input required  class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly> <!-- Check updateAdminPassword() method in AdminController.php --> {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="account_holder_name">{{ __("translation.Account Holder Name")}}</label>
                                        <input required  type="text" class="form-control" id="account_holder_name" placeholder="{{ __("translation.Enter Account Holder Name")}}" name="account_holder_name"  @if (isset($vendorDetails['account_holder_name'])) value="{{ $vendorDetails['account_holder_name'] }}" @endif> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="bank_name">{{ __("translation.Bank Name")}}</label>
                                        <input required  type="text" class="form-control" id="bank_name" placeholder="{{ __("translation.Enter Bank Name")}}" name="bank_name"  @if (isset($vendorDetails['bank_name'])) value="{{ $vendorDetails['bank_name'] }}" @endif> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="account_number">{{ __("translation.Account Number")}}</label>
                                        <input required type="text" class="form-control" id="account_number" placeholder="{{ __("translation.Enter Account Number")}}" name="account_number"  @if (isset($vendorDetails['account_number'])) value="{{ $vendorDetails['account_number'] }}" @endif> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="bank_ifsc_code">{{ __("translation.Bank IFSC Code")}}</label>
                                        <input required type="text" class="form-control" id="bank_ifsc_code" placeholder="{{ __("translation.Enter Bank IFSC Code")}}" name="bank_ifsc_code"  @if (isset($vendorDetails['bank_ifsc_code'])) value="{{ $vendorDetails['bank_ifsc_code'] }}" @endif> {{-- $vendorDetails was passed from AdminController --}}
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">{{ __("translation.Submit")}}</button>
                                    <button type="reset"  class="btn btn-light">{{ __("translation.Cancel")}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif



        </div>
        <!-- content-wrapper ends -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection