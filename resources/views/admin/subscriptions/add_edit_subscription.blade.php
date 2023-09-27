@extends('admin.layout.layout')


@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                        <h4 class="card-title">{{ __("translation.subscriptions")}}</h4>
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
                            {{-- <strong>Error:</strong> {{ Session::get('error_message') }} --}}

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
              

                        <form class="forms-sample"   @if (empty($section['id'])) action="{{ url('admin/add-edit-subscription') }}" @else action="{{ url('admin/add-edit-subscription/' . $section['id']) }}" @endif   method="post" enctype="multipart/form-data"> @csrf  <!-- If the id is not passed in from the route, this measn 'Add a new Section', but if the id is passed in from the route, this means 'Edit the Section' --> <!-- Using the enctype="multipart/form-data" to allow uploading files (images) -->
                            <div class="form-group">
                                <label for="section_name">{{ __("translation.Plan name")}}</label>
                                <input type="text" class="form-control" id="section_name"  name="plan_name" @if (!empty($section['plan_name'])) value="{{ $section['plan_name'] }}" @else value="{{ old('section_name') }}" @endif> 
                            </div>
                            <div class="form-group">
                                <label for="section_name">{{ __("translation.Price")}}</label>
                                <input type="text" class="form-control" id="section_name"  name="price" @if (!empty($section['price'])) value="{{ $section['price'] }}" @else value="{{ old('section_name') }}" @endif> 
                            </div>
                            {{-- <div class="form-group">
                                <label for="section_id">{{ __("translation.Duration")}}</label>
                                <select required name="section_id" id="section_id" class="form-control" style="color: #000">
                                    <option value="">{{ __("translation.Select Duration")}}</option>
                                    <option value="1">شهر</option>
                                    <option value="3">3 اشهر</option>
                                    <option value="3"> </option>
                                    <option value="3"> </option>
                                    @foreach ($getSections as $section)
                                        <option value="{{ $section['id'] }}"  @if (!empty($category['section_id']) && $category['section_id'] == $section['id']) selected @endif >{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="section_name">{{ __("translation.Description")}}</label>
                                <textarea rows="5" type="text" class="form-control" id="section_name" name="description" >
                                    @if (!empty($section['description']))  {{$section['description'] }} @else {{ old('section_name') }} @endif
                                </textarea>
                            </div>
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