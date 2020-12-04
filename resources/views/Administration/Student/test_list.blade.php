@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Evaluaciones
    @stop
    @section('breadcrumb2')
    Estudiante
    @stop
    {{-- Page content --}}
    @section('content')
        <div class="content flex-column-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-favourite text-primary"></i>
                        </span>
                        @isset($course)
                            <h3 class="card-label">Listado de evaluaciones de {{$course->Name ?? ''}} de {{$grade ?? ''}}</h3>
                        @endisset
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i>Exportar</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav flex-column nav-hover">
                                    <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Elija una opcion:</li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-print"></i>
                                            <span class="nav-text">Imprimir</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-copy"></i>
                                            <span class="nav-text">Copiar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-excel-o"></i>
                                            <span class="nav-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-text-o"></i>
                                            <span class="nav-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-pdf-o"></i>
                                            <span class="nav-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                        <thead>
                            <tr style="background:#cecece">
                                <th colspan="2">
                                    <center>Estudiantes</center>
                                </th>
                                @foreach($titles as $title)
                                <th colspan="{{$title['no']}}">
                                    <center>{{$title['name']}}</center>
                                </th>
                                @endforeach
                            </tr>
                            <tr style="background:#e5e5e5">
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                @foreach($titles as $title)
                                    @foreach($title['test'] as $t)
                                    <th>
                                        <center>{{$t->Title}}</center>
                                    </th>
                                    @endforeach
                                @endforeach
                              </tr>
                        </thead>
                        <tbody>
                                @foreach($models as $model)
                                <tr>
                                    <td>{{$model['name']}}</td>
                                    <td>{{$model['lastname']}}</td>
                                    @foreach($model['tests'] as $test)
                                    <td>
                                        @if($test['state']=="Fisico")
                                        <center>
                                            <button type="button" disabled class="btn btn-outline-info">{{$model['note']}}</button>
                                        </center>
                                        @else
                                        <center>
                                            <button type="button" class="btn btn-outline-info"  onclick="verExamen({{$test['Id']}},{{$model['assign']}});">{{$model['note']}}</button>
                                        </center>
                                        @endif
                                    </td>   
                                    @endforeach
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
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
                window.location.href = $url_path+"/administration/student/test/"+$id+"/"+$assign;
            }
       </script>
	@stop
