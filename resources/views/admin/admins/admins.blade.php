@extends('admin.layout.layout')


@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $title }}</h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __("translation.Admin ID")}}</th>
                                            <th>{{ __("translation.Name")}}</th>
                                            <th>{{ __("translation.Type")}}</th>
                                            <th>{{ __("translation.SubType")}}</th>
                                            <th>{{ __("translation.Mobile")}}</th>
                                            <th>{{ __("translation.Email")}}</th>
                                            <th>{{ __("translation.Image")}}</th>
                                            <th>{{ __("translation.Status")}}</th>
                                            <th>{{ __("translation.Actions")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin['id'] }}</td>
                                                <td>{{ $admin['name'] }}</td>
                                                @if (session()->get("lang") == "en")
                                                    @if ($admin['vendor']["vendor"] == "تجاره الالكتروني")
                                                    <td>E-Vendor</td>
                                                        @if ( $admin["vendor"]['vendor_type'] == "كن تاجر")
                                                            <td>Vendor</td>
                                                        @endif
                                                        @if ( $admin["vendor"]['vendor_type'] == "حرفي")
                                                            <td>Craftsman</td>
                                                        @endif
                                                        @if ( $admin["vendor"]['vendor_type'] == " منتجات اخري ")
                                                            <td>Other</td>
                                                        @endif
                                                   
                                                    @endif
                                                    @if ($admin['vendor']["vendor"] == "العلمي")
                                                        <td> Scientific Vendor </td>
                                                            @if ( $admin["vendor"]['vendor_type'] == "اكاديمي")
                                                            <td>Academic</td>
                                                            @endif
                                                            @if ( $admin["vendor"]['vendor_type'] == "مختبارات")
                                                                <td>Laboratories</td>
                                                            @endif
                                                    @endif
                                              
                                              
                                                @endif
                                                @if (session()->get("lang") == "ar")
                                                @if ($admin['vendor']["vendor"] == "تجاره الالكتروني")
                                                    <td>تجار الالكتروني</td>
                                                        @if ( $admin["vendor"]['vendor_type'] == "كن تاجر")
                                                            <td>تاجر</td>
                                                        @endif
                                                        @if ( $admin["vendor"]['vendor_type'] == "حرفي")
                                                            <td>حرفي</td>
                                                        @endif
                                                        @if ( $admin["vendor"]['vendor_type'] == " منتجات اخري ")
                                                            <td>اخري</td>
                                                        @endif
                                                   
                                                    @endif
                                                    @if ($admin['vendor']["vendor"] == "العلمي")
                                                        <td> العلمي  </td>
                                                            @if ( $admin["vendor"]['vendor_type'] == "اكاديمي")
                                                            <td>اكاديمي</td>
                                                            @endif
                                                            @if ( $admin["vendor"]['vendor_type'] == "مختبارات")
                                                                <td>مختبارات</td>
                                                            @endif
                                                    @endif
                                              
                                                @endif
                                                @if (session()->get("lang") == "cn")
                                                    @if ($admin['vendor']["vendor"] == "تجاره الالكتروني")
                                                        <td>E-电子供应商</td>
                                                            @if ( $admin["vendor"]['vendor_type'] == "كن تاجر")
                                                                <td>供应商</td>
                                                            @endif
                                                            @if ( $admin["vendor"]['vendor_type'] == "حرفي")
                                                                <td>工匠</td>
                                                            @endif
                                                            @if ( $admin["vendor"]['vendor_type'] == " منتجات اخري ")
                                                                <td>其他</td>
                                                            @endif
                                                    
                                                        @endif
                                                        @if ($admin['vendor']["vendor"] == "العلمي")
                                                            <td> 科学供应商 </td>
                                                                @if ( $admin["vendor"]['vendor_type'] == "اكاديمي")
                                                                <td>学术</td>
                                                                @endif
                                                                @if ( $admin["vendor"]['vendor_type'] == "مختبارات")
                                                                    <td>实验室</td>
                                                                @endif
                                                        @endif
                                                
                                                @endif
                                             
                                                @if (session()->get("lang") != "ar" && session()->get("lang") != "en" && session()->get("lang") != "cn" )
                                                <td>{{ $admin['vendor']["vendor"] }}</td>
                                                <td>{{ $admin["vendor"]['vendor_type'] }}</td>
                                                @endif
                                             
                                         
                                                <td>{{ $admin['mobile'] }}</td>
                                                <td>{{ $admin['email'] }}</td>
                                                <td>
                                                    @if ($admin['image'] != '')
                                                        <img src="{{ asset('admin/images/photos/' . $admin['image']) }}">
                                                    @else
                                                        <img src="{{ asset('admin/images/photos/no-image.gif') }}">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($admin['status'] == 1)
                                                        <a class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id="{{ $admin['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes. Check admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                        </a>
                                                    @else {{-- if the admin status is inactive --}}
                                                        <a class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id="{{ $admin['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes. Check admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($admin['type'] == 'vendor') {{-- if the admin `type` is vendor, show their further details --}}
                                                        <a href="{{ url('admin/view-vendor-details/' . $admin['id']) }}">
                                                            <i style="font-size: 25px" class="mdi mdi-file-document"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                        </a>
                                                    @endif
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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. All rights reserved.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection