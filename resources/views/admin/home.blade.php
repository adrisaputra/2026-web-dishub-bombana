@extends('admin.layout')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                {{--<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard</h1>--}}
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8">
                <div class="col-xxl-12">
                    <div class="card card-xxl-stretch" style="background-color: #ffffff00;">
                        <!--begin::Header-->
                        <div class="card-header border-0 bg-danger py-5" style="background-color: #3F51B5 !important;">
                            <h3 class="card-title fw-bolder text-white">Selamat Datang "{{ Auth::user()->name }}"</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <!--begin::Chart-->
                            <div class="card-rounded-bottom bg-danger" data-kt-color="danger" style="height: 50px;background-color: #3F51B5 !important;"></div>
                            <!--end::Chart-->
                            <!--begin::Stats-->
                            <div class="card-p mt-n20 position-relative">
                                <!--begin::Row-->
                                    <div class="row g-0">
                                        <div class="col bg-info px-4 py-8 rounded-2 me-3 mb-7" style="background-color: #2196f3 !important;">
                                            <a href="{{ url('subdistrict') }}" style="text-decoration:none; color:white;">    
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!--end::Svg Icon-->
                                                        <span class="fw-bold fs-6 mt-2 d-block">Berita</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size:50px;color:white;">{{ App\Helpers\Helpers::format_number($news) }} </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col bg-info px-6 py-8 rounded-2 me-3 mb-7" style="background-color: #f44336 !important;">
                                            <a href="{{ url('user') }}" style="text-decoration:none; color:white;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!--end::Svg Icon-->
                                                        <span class="fw-bold fs-6 mt-2 d-block">Pengguna</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p style="font-size:50px;color:white;">{{ App\Helpers\Helpers::format_number($user) }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <!--end::Row-->
                            </div>
                        </div>
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->

@endsection