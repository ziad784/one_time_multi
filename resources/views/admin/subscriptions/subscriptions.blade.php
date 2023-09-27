{{-- This page (view) is rendered from subscriptions() method in Admin/NewsletterController.php Controller --}}
@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __("translation.subscriptions")}}</h4>
                            

                            {{-- Export subscriptions (the `newsletter_subscriptions` database table) as an Excel file Button --}} 
                            {{-- <a href="{{ url('admin/export-subscriptions') }}" style="max-width: 100px; float: right" class="btn btn-block btn-primary">{{ __("translation.Export")}}</a> --}}



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


                            <div class="table-responsive pt-3">
                                {{-- DataTable --}}
                                <table id="subscribers" class="table table-bordered"> {{-- using the id here for the DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>{{ __("translation.Plan name")}}</th>
                                            <th>{{ __("translation.Price")}}</th>
                                            <th>{{ __("translation.Duration")}}</th>
                                            <th>{{ __("translation.Description")}}</th>
                                            {{-- <th>{{ __("translation.Status")}}</th> --}}
                                            <th>{{ __("translation.Actions")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($subscriptions as $subscription)
                                            <tr>
                                                <td>{{ $subscription['plan_name'] }}</td>
                                                <td>{{ $subscription['price'] }}</td>
                                                <td>{{ $subscription['duration'] }}</td>
                                                <td>{{ substr($subscription['description'],0,130) }}...</td>
                                               
                                                {{-- Using HTML Custom Attributes. Check admin/js/custom.js --}}
                                                {{-- <td>
                                                    @if ($subscription['status'] == 1)
                                                        <a class="updatesubscriptionStatus" id="subscription-{{ $subscription['id'] }}" subscription_id="{{ $subscription['id'] }}" href="javascript:void(0)"> 
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i> 
                                                        </a>
                                                    @else
                                                        <a class="updatesubscriptionStatus" id="subscription-{{ $subscription['id'] }}" subscription_id="{{ $subscription['id'] }}" href="javascript:void(0)"> 
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>
                                                        </a>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    <a href="{{ url('admin/add-edit-subscription/' . $subscription['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-pencil-box"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                    </a>

                                                    {{-- Confirm Deletion JS alert and Sweet Alert --}}
                                                    {{-- <a title="Brand" class="confirmDelete" href="{{ url('admin/delete-brand/' . $brand['id']) }}"> --}}
                                                        {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Icons from Skydash Admin Panel Template --}}
                                                    {{-- </a> --}}
                                                    <a href="JavaScript:void(0)" class="confirmDelete" module="subscription" moduleid="{{ $subscription['id'] }}">
                                                        <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. All rights reserved.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection