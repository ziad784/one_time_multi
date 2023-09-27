@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h4 class="card-title">{{ __("translation.Categories")}}</h4>
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
                

                            
                            <form class="forms-sample"   @if (empty($category['id'])) action="{{ url('admin/add-edit-category') }}" @else action="{{ url('admin/add-edit-category/' . $category['id']) }}" @endif   method="post" enctype="multipart/form-data"> @csrf  <!-- If the id is not passed in from the route, this measn 'Add a new Category', but if the id is passed in from the route, this means 'Edit the Category' --> <!-- Using the enctype="multipart/form-data" to allow uploading files (images) -->
                                <div class="form-group">
                                    <label for="category_name">{{ __("translation.Category Name")}}</label>
                                    <input required type="text" class="form-control" id="category_name" placeholder="{{ __("translation.Enter Category Name")}}" name="category_name" @if (!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value="{{ old('category_name') }}" @endif> 
                                </div>

                                
                                <div class="form-group">
                                    <label for="section_id">{{ __("translation.Select Section")}}</label>
                                    <select required name="section_id" id="section_id" class="form-control" style="color: #000">
                                        <option value="">{{ __("translation.Select Section")}}</option>
                                        @foreach ($getSections as $section)
                                            <option value="{{ $section['id'] }}"  @if (!empty($category['section_id']) && $category['section_id'] == $section['id']) selected @endif >{{ $section['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <div id="appendCategoriesLevel"> {{-- We create this <div> in a separate file in order for the appendCategoryLevel() method inside the CategoryController to be able to return the whole file as a response to the AJAX call in admin/js/custom.js to show the proper/relevant categories <select> box <option> depending on the choosed Section --}}
                                    @include('admin.categories.append_categories_level')
                                </div>

{{-- 

                                <div class="form-group">
                                    <label for="category_image">{{ __("translation.Category Image")}}</label>
                                    <input type="file" class="form-control" id="category_image" name="category_image">
                                 
                                        <a target="_blank" href="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}">
                                        <input type="hidden" name="current_category_image" value="{{ Auth::guard('admin')->user()->image }}">


                                  
                                    @if (!empty($category['category_image']))
                                        <a target="_blank" href="{{ url('front/images/category_images/' . $category['category_image']) }}">{{ __("translation.View Category Image")}}</a>&nbsp;|&nbsp;
                                        <a href="JavaScript:void(0)" class="confirmDelete" module="category-image" moduleid="{{ $category['id'] }}">{{ __("translation.Delete Category Image")}}</a>
                                    @endif
                                </div>  --}}
                                
                                {{-- <div class="form-group">
                                    <label for="category_discount">{{ __("translation.Category Discount")}}</label>
                                    <input type="text" class="form-control" id="category_discount" placeholder="{{ __("translation.Enter Category Discount")}}" name="category_discount"   @if (!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value="{{ old('category_discount') }}" @endif > 
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="description">{{ __("translation.Category Description")}}</label>
                                  
                                    <textarea name="description" id="description" class="form-control" rows="3">{{ $category['description'] }}</textarea>
                                </div> --}}
                                <div class="form-group">
                                    <label for="url">{{ __("translation.Category URL")}}</label>
                                    <input required type="text" class="form-control" id="url" placeholder="{{ __("translation.Enter Category URL")}}" name="url"   @if (!empty($category['url'])) value="{{ $category['url'] }}" @else value="{{ old('url') }}" @endif > 
                                </div>
                               
{{--                                
                                <div class="form-group">
                                    <label for="meta_title">{{ __("translation.Meta Title")}}</label>
                                    <input type="text" class="form-control" id="meta_title" placeholder="{{ __("translation.Enter Meta Title")}}" name="meta_title"   @if (!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif > 
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">{{ __("translation.Meta Description")}}</label>
                                    <input type="text" class="form-control" id="meta_description" placeholder="{{ __("translation.Enter Meta Description")}}" name="meta_description"   @if (!empty($category['meta_description'])) value="{{ $category['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif > 
                                </div>
                                <div class="form-group">
                                    <label for="meta_keywords">{{ __("translation.Meta Keywords")}}</label>
                                    <input type="text" class="form-control" id="meta_keywords" placeholder="{{ __("translation.Enter Meta Keywords")}}" name="meta_keywords"   @if (!empty($category['meta_keywords'])) value="{{ $category['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif > 
                                </div>
 --}}

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