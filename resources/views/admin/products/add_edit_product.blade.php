@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h4 class="card-title">{{ __("translation.Products")}}</h4>
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
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $title }}</h4>


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



                            {{-- Displaying The Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
                            @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                

                            


                            
                            <form class="forms-sample"   @if (empty($product['id'])) action="{{ url('admin/add-edit-product') }}" @else action="{{ url('admin/add-edit-product/' . $product['id']) }}" @endif   method="post" enctype="multipart/form-data">  <!-- If the id is not passed in from the route, this measn 'Add a new Product', but if the id is passed in from the route, this means 'Edit the Product' --> <!-- Using the enctype="multipart/form-data" to allow uploading files (images) -->
                                @csrf


                                
                                <div class="form-group">
                                    <label for="category_id">{{ __("translation.Select Category")}}</label>
                                    {{-- <input type="text" class="form-control" id="category_id" placeholder="Enter Category Name" name="category_id" @if (!empty($product['name'])) value="{{ $product['category_id'] }}" @else value="{{ old('category_id') }}" @endif>  --}} {{-- Repopulating Forms (using old() method): https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                                    <select name="category_id" id="category_id" class="form-control text-dark">
                                        <option value="">{{ __("translation.Select Category")}}</option>
                                        @foreach ($categories as $section) {{-- $categories are ALL the `sections` with their related 'parent' categories (if any (if exist)) and their subcategories or `child` categories (if any (if exist)) --}} {{-- Check ProductsController.php --}}
                                            <optgroup label="{{ $section['name'] }}"> {{-- sections --}}
                                                @foreach ($section['categories'] as $category) {{-- parent categories --}} {{-- Check ProductsController.php --}}
                                                    <option value="{{ $category['id'] }}" @if (!empty($product['category_id'] == $category['id'])) selected @endif>{{ $category['category_name'] }}</option> {{-- parent categories --}}
                                                    @foreach ($category['sub_categories'] as $subcategory) {{-- subcategories or child categories --}} {{-- Check ProductsController.php --}}
                                                        <option value="{{ $subcategory['id'] }}" @if (!empty($product['category_id'] == $subcategory['id'])) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ $subcategory['category_name'] }}</option> {{-- subcategories or child categories --}}
                                                    @endforeach
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                        {{-- <option value="{{ $category['id'] }}" @if (!empty($product['category_id']) && $product['category_id'] == $category['id']) selected @endif >{{ $category['name'] }}</option> --}}
                                    </select>
                                </div>



                                {{-- Including the related filters <select> box of a product DEPENDING ON THE SELECTED CATEGORY of the product --}} 
                                <div class="loadFilters">
                                    @include('admin.filters.category_filters')
                                </div>



                                <div class="form-group">
                                    <label for="brand_id">{{ __("translation.Select Brand")}}</label>
                                    <select name="brand_id" id="brand_id" class="form-control text-dark">
                                        <option value="">{{ __("translation.Select Brand")}}</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand['id'] }}" @if (!empty($product['brand_id'] == $brand['id'])) selected @endif>{{ $brand['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product_name">{{ __("translation.Product Name")}}</label>
                                    <input type="text" class="form-control" id="product_name" placeholder="{{ __("translation.Enter Product Name")}}" name="product_name" @if (!empty($product['product_name'])) value="{{ $product['product_name'] }}" @else value="{{ old('product_name') }}" @endif>  {{-- Repopulating Forms (using old() method): https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                                </div>
                                <div class="form-group">
                                    <label for="product_code">{{ __("translation.Product Code")}}</label>
                                    <input type="text" class="form-control" id="product_code" placeholder="{{ __("translation.Enter Code")}}" name="product_code" @if (!empty($product['product_code'])) value="{{ $product['product_code'] }}" @else value="{{ old('product_code') }}" @endif>  {{-- Repopulating Forms (using old() method): https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                                </div>
                                <div class="form-group">
                                    <label for="product_color">{{ __("translation.Product Color")}}</label>
                                    <input type="text" class="form-control" id="product_color" placeholder="{{ __("translation.Enter Product Color")}}" name="product_color" @if (!empty($product['product_color'])) value="{{ $product['product_color'] }}" @else value="{{ old('product_color') }}" @endif>  {{-- Repopulating Forms (using old() method): https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                                </div>
                                <div class="form-group">
                                    <label for="product_price">{{ __("translation.Product Price")}}</label>
                                    <input type="number" class="form-control" id="product_price" placeholder="{{ __("translation.Enter Product Price")}}" name="product_price" @if (!empty($product['product_price'])) value="{{ $product['product_price'] }}" @else value="{{ old('product_price') }}" @endif> {{-- Repopulating Forms (using old() method): https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                                </div>
                                <div class="form-group">
                                    <label for="product_discount">{{ __("translation.Product Discount")}} </label>
                                    <input type="number"  class="form-control" id="product_discount" placeholder="{{ __("translation.Enter Product Discount")}}" name="product_discount" @if (!empty($product['product_discount'])) value="{{ $product['product_discount'] }}" @else value="{{ old('product_discount') }}" @endif> {{-- Repopulating Forms (using old() method): https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                                </div>
                                <div class="form-group">
                                    <label for="product_weight">{{ __("translation.Product Weight")}} </label>
                                    <input type="number" class="form-control" id="product_weight" placeholder="{{ __("translation.Enter Product Weight")}}" name="product_weight" @if (!empty($product['product_weight'])) value="{{ $product['product_weight'] }}" @else value="{{ old('product_weight') }}" @endif> {{-- Repopulating Forms (using old() method): https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                                </div>



                                {{-- Managing Product Colors (in front/products/detail.blade.php) --}} 
                                <div class="form-group">
                                    <label for="group_code">{{ __("translation.Group Code")}}</label>
                                    <input type="text" class="form-control" id="group_code" placeholder="{{ __("translation.Enter Group Code")}}" name="group_code"  @if (!empty($product['group_code'])) value="{{ $product['group_code'] }}" @else value="{{ old('group_code') }}" @endif> {{-- Repopulating Forms (using old() method): https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                                </div>



                                <div class="form-group">
                                    <label for="product_image">{{ __("translation.Product Image")}} ({{ __("translation.Recommended Size")}}: 1000x1000)</label> {{-- Important Note: There are going to be 3 three sizes for the product image: Admin will upload the image with the recommended size which 1000*1000 which is the 'large' size (will store it in 'large' folder), but then we're going to use 'Intervention' package to get another two sizes: 500*500 which is the 'medium' size (will store it in 'medium' folder) and 250*250 which is the 'small' size (will store it in 'small' folder) --}}
                                    <input type="file" accept="image/*" class="form-control" id="product_image" name="product_image">
                                    {{-- Show the admin image if exists --}}




                                    {{-- Show the product image, if any (if exits) --}}
                                    @if (!empty($product['product_image']))
                                        <a target="_blank" href="{{ url('front/images/product_images/large/' . $product['product_image']) }}">{{ __("translation.View Product Image")}}</a>&nbsp;|&nbsp; {{-- Showing the 'large' image inside the 'large' folder --}}
                                        <a href="JavaScript:void(0)" class="confirmDelete" module="product-image" moduleid="{{ $product['id'] }}">{{ __("translation.Delete Product Image")}}</a> {{-- Delete the product image from BOTH SERVER (FILESYSTEM) & DATABASE --}}    {{-- Check admin/js/custom.js and web.php (routes) --}}
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="product_video">{{ __("translation.Product Video")}} </label> {{-- Important Note: Default php.ini file upload Maximum file size is 2MB (If you upload a file with a larger size, it won't be uploaded!). Check upload_max_filesize using phpinfo() method --}}
                                    <input type="file" accept="video/*" class="form-control" id="product_video" name="product_video">
                                    {{-- Show the admin image if exists --}}




                                    {{-- Show the product video, if any (if exits) --}}
                                    @if (!empty($product['product_video']))
                                        <a target="_blank" href="{{ url('front/videos/product_videos/' . $product['product_video']) }}">{{ __("translation.View Product Video")}}</a>&nbsp;|&nbsp;
                                        <a href="JavaScript:void(0)" class="confirmDelete" module="product-video" moduleid="{{ $product['id'] }}">{{ __("translation.Delete Product Video")}}</a> {{-- Delete the product video from BOTH SERVER (FILESYSTEM) & DATABASE --}}    {{-- Check admin/js/custom.js and web.php (routes) --}}
                                    @endif
                                </div>
   
                                <div class="form-group">
                                    <label for="description">{{ __("translation.Product Description")}}</label>
                                    <textarea name="description" id="description" class="form-control" rows="3">{{ $product['description'] }}</textarea>
                                </div>


                                @if (Auth::guard('admin')->user()->type == 'superadmin')
                                <div class="form-group">
                                    <label for="is_featured">{{ __("translation.Featured Item ")}}({{ __("translation.Yes/No")}})</label>
                                    <input type="checkbox" name="is_featured" id="is_featured" value="Yes" @if (!empty($product['is_featured']) && $product['is_featured'] == 'Yes') checked @endif>
                                </div>
                                <div class="form-group">
                                    <label for="is_bestseller">{{ __("translation.Best Seller Item")}} ({{ __("translation.Yes/No")}})</label> {{-- Note: Only 'superadmin' can mark a product as 'bestseller', but 'vendor' can't --}}
                                    <input type="checkbox" name="is_bestseller" id="is_bestseller" value="Yes" @if (!empty($product['is_bestseller']) && $product['is_bestseller'] == 'Yes') checked @endif>
                                </div>
                                @endif
                              

                                <button type="submit" class="btn btn-primary mr-2">{{ __("translation.Submit")}}</button>
                                <button type="reset"  class="btn btn-light">{{ __("translation.Cancel")}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection