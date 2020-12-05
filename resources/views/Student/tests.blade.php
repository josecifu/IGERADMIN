@extends('Administration.Base/BaseStudent')
{{-- Page title --}}
    @section('title')
    Examanes
    @stop
    @section('breadcrumb1')
    Contestados
    @stop
    @section('breadcrumb2')
    Listado
    @stop
    {{-- Page content --}}
    @section('content')
        <div class="content flex-column-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon"><i class="flaticon2-favourite text-primary"></i></span>
                        <h3 class="card-label">Todas las evaluaciones realizadas</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{url('student/home/dashboard')}}" class="btn btn-danger font-weight-bolder mr-2"><i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Row-->
                    <div class="row">
                        @foreach($models as $model)
                        <!--begin::Course-->
                        <div class="col-xl-5">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b card-stretch">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column mr-auto">
                                            <!--begin: Title-->
                                            <div class="d-flex flex-column mr-auto">
                                                <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{$model['course']}}</a>
                                                <span class="text-muted font-weight-bold">Profesor: {{$model['teacher']}}</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Description-->
                                    <div class="mb-10 mt-5 font-weight-bold">
                                        {{$model['test']}}<br>
                                        {{$model['activity']}}<br>
                                    </div>
                                    <!--end::Description-->
                                    <!--begin::Data-->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold mr-4">Valor:</span>
                                        <span class="btn btn-light-warning btn-sm font-weight-bold btn-upper btn-text">{{$model['score']}}</span>
                                    </div>
                                    @if($answer == "null")
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold mr-4">Fecha de disponibilidad:</span>
                                        <span class="btn btn-light-success btn-sm font-weight-bold btn-upper btn-text">{{$model['start']}}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold mr-4">Fecha de finalización:</span>
                                        <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{$model['end']}}</span>
                                    </div>
                                    @else
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold mr-4">Fecha:</span>
                                        <span class="btn btn-light-success btn-sm font-weight-bold btn-upper btn-text">{{$model['date']}}</span>
                                    </div>
                                    @endif
                                    <!--end::Data-->
                                    <!--begin::Progress-->
                                    @if($answer == "null")
                                    <div class="d-flex mb-5 align-items-cente">
                                        <span class="d-block font-weight-bold mr-5">Punteo Obtenido</span>
                                        <div class="d-flex flex-row-fluid align-items-center">
                                            <div class="progress progress-xs mt-2 mb-2 w-100">
                                                <div class="progress-bar bg-success" role="progressbar" style="width:{{$model['percentage']}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="ml-3 font-weight-bolder">{{$model['final']}}</span>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                    @endif
                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer d-flex align-items-center">
                                    @if($answer == "null")
                                    <button type="button" onclick="" class="btn btn-block btn-sm btn-light-info font-weight-bolder text-uppercase py-4">Empezar</button>
                                    @else
                                    <button type="button" onclick="verExamen({{$model['id']}},{{$assign->id}});" class="btn btn-block btn-sm btn-light-info font-weight-bolder text-uppercase py-4">Ver examen</button>
                                    @endif
                                </div>
                                <!--end::Footer-->
                            </div>
                            <!--end:: Card-->
                        </div>
                        <!--end::Course-->
                        @endforeach
                    </div>
                    <!--end::Row-->
                    <!--begin::Pagination-->
                    <!--end::Pagination-->
                </div>
            </div>
        </div>
    @stop
    @section('scripts')
        <!--begin::Page Vendors(used by this page)-->
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
        <!--end::Page Vendors-->
        <script type="text/javascript">
            "use strict";
            var KTDatatablesDataSourceHtml = function() {
                var initTable1 = function() {
                    var table = $('#kt_datatable');
                    // begin first table
                    table.DataTable({
                        responsive: true,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        },
                        columnDefs: [
                            {
                            },
                        ],
                    });
                };
                return {
                    //main function to initiate the module
                    init: function() {
                        initTable1();
                    },
                };
            }();
            jQuery(document).ready(function() {
                KTDatatablesDataSourceHtml.init();
            });
            function verExamen($id,$assign) {
                var $url_path = '{!! url('/') !!}';
                window.location.href = $url_path+"/student/test/review/"+$id+"/"+$assign;
            }
       </script>
    @stop
