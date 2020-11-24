@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Curso/Notas
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
                        <h3 class="card-label">
                            Listado de cursos y notas de:
                            @foreach($student as $s)
                                {{$s['name']}}
                            @endforeach
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="card-toolbar">
                            <a href="{{url('administration/student/score/1')}}" class="btn btn-danger font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                        </div>
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i>Exportar</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav flex-column nav-hover">
                                    <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Elija una opción:</li>
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
                    <table class="table table-bordered table-hover table-checkable" id="" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                @foreach($titles as $title)
                                <th>{{$title}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model['course']}}</td>
                                    <td>
                                        <center>{{$model['first']}}</center>
                                    </td>
                                    <td>
                                        <center>{{$model['second']}}</center>
                                    </td>
                                    <td>
                                        <center>{{$model['third']}}</center>
                                    </td>
                                    <td>
                                        <center>{{$model['fourth']}}</center>
                                    </td>
                                    <td >
                                        <center>{{$model['final']}}</center>
                                    </td>
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
                                targets: -1,
                                title: 'Actividades',
                                orderable: false,
                                render: function(data, type, full, meta) {
                                    return '\
                                        <div class="dropdown dropdown-inline">\
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title ="Actividades" data-toggle="dropdown">\
                                                <i class="la la-cog"></i>\
                                            </a>\
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                                <ul class="nav nav-hoverable flex-column">\
                                                    <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Parcial 1</span></a></li>\
                                                    <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Parcial 2</span></a></li>\
                                                    <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Parcial 3</span></a></li>\
                                                    <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Parcial 4</span></a></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                    ';
                                },
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
       </script>
    @stop
