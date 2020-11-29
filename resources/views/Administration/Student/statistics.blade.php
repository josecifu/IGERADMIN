@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Estadística
    @stop
    @section('breadcrumb2')
    Estudiante
    @stop
    {{-- Page content --}}
    @section('content')
        <div class="content flex-column-fluid" id="kt_content">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon"><i class="flaticon2-favourite text-primary"></i></span>
                        <h3 class="card-label">Estadisticas de estudiante</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{url('student/home/dashboard')}}" class="btn btn-danger font-weight-bolder mr-2"><i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <!--begin::Mixed Widget 4-->
                            <div class="card card-custom bg-radial-gradient-danger gutter-b card-stretch">
                                <!--begin::Header-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
                                    <div class="card-toolbar">
                                        <div class="dropdown dropdown-inline">
                                            <a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <!--begin::Navigation-->
                                                <ul class="navi navi-hover">
                                                    <li class="navi-header pb-1">
                                                        <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2-shopping-cart-1"></i>
                                                            </span>
                                                            <span class="navi-text">Order</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2-calendar-8"></i>
                                                            </span>
                                                            <span class="navi-text">Event</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2-graph-1"></i>
                                                            </span>
                                                            <span class="navi-text">Report</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2-rocket-1"></i>
                                                            </span>
                                                            <span class="navi-text">Post</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2-writing"></i>
                                                            </span>
                                                            <span class="navi-text">File</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column p-0">
                                    <!--begin::Chart-->
                                    <div id="kt_mixed_widget_4_chart" style="height: 200px"></div>
                                    <!--end::Chart-->
                                    <!--begin::Stats-->
                                    <div class="card-spacer bg-white card-rounded flex-grow-1">
                                        <!--begin::Row-->
                                        <div class="row m-0">
                                            <div class="col px-8 py-6 mr-8">
                                                <div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
                                                <div class="font-size-h4 font-weight-bolder">$650</div>
                                            </div>
                                            <div class="col px-8 py-6">
                                                <div class="font-size-sm text-muted font-weight-bold">Commission</div>
                                                <div class="font-size-h4 font-weight-bolder">$233,600</div>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row m-0">
                                            <div class="col px-8 py-6 mr-8">
                                                <div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
                                                <div class="font-size-h4 font-weight-bolder">$29,004</div>
                                            </div>
                                            <div class="col px-8 py-6">
                                                <div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
                                                <div class="font-size-h4 font-weight-bolder">$1,480,00</div>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 4-->
                        </div>
                        <div class="col-xl-12">
                            <!--begin::Mixed Widget 5-->
                            <div class="card card-custom bg-radial-gradient-primary gutter-b card-stretch">
                                <!--begin::Header-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title font-weight-bolder text-white">Sales Progress</h3>
                                    <div class="card-toolbar">
                                        <div class="dropdown dropdown-inline">
                                            <a href="#" class="btn btn-text-white btn-hover-white btn-sm btn-icon border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                <!--begin::Navigation-->
                                                <ul class="navi navi-hover">
                                                    <li class="navi-header font-weight-bold py-4">
                                                        <span class="font-size-lg">Choose Label:</span>
                                                        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                                    </li>
                                                    <li class="navi-separator mb-3 opacity-70"></li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-success">Customer</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-danger">Partner</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-primary">Member</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-dark">Staff</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-separator mt-3 opacity-70"></li>
                                                    <li class="navi-footer py-4">
                                                        <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                                        <i class="ki ki-plus icon-sm"></i>Add new</a>
                                                    </li>
                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column p-0">
                                    <!--begin::Chart-->
                                    <div id="kt_mixed_widget_5_chart" style="height: 200px"></div>
                                    <!--end::Chart-->
                                    <!--begin::Stats-->
                                    <div class="card-spacer bg-white card-rounded flex-grow-1">
                                        <!--begin::Row-->
                                        <div class="row m-0">
                                            <div class="col px-8 py-6 mr-8">
                                                <div class="font-size-sm text-muted font-weight-bold">Average Sale</div>
                                                <div class="font-size-h4 font-weight-bolder">$650</div>
                                            </div>
                                            <div class="col px-8 py-6">
                                                <div class="font-size-sm text-muted font-weight-bold">Commission</div>
                                                <div class="font-size-h4 font-weight-bolder">$233,600</div>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row m-0">
                                            <div class="col px-8 py-6 mr-8">
                                                <div class="font-size-sm text-muted font-weight-bold">Annual Taxes</div>
                                                <div class="font-size-h4 font-weight-bolder">$29,004</div>
                                            </div>
                                            <div class="col px-8 py-6">
                                                <div class="font-size-sm text-muted font-weight-bold">Annual Income</div>
                                                <div class="font-size-h4 font-weight-bolder">$1,480,00</div>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 5-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
	@stop
