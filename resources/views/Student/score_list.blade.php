@extends('Administration.Base/BaseStudent')
{{-- Page title --}}
    @section('title')
    Notas
    @stop
    @section('breadcrumb1')
    Listado
    @stop
    @section('breadcrumb2')
    Cursos
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
                        <h3 class="card-label">Listado de cursos y notas</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{url('student/home/dashboard')}}" class="btn btn-danger font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th rowspan="2"><center>Cursos</center></th>
                                @foreach($titles as $title)
                                    <th colspan="{{$title['no']}}"><center>{{$title['activity']}}</center></th>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach($titles as $title)
                                    @if($title['no']==0)
                                    <th><center>No existen examenes asignados</center></th>
                                    @endif
                                    @foreach($title['test'] as $t)
                                    <th><center>{{$t->Title}}</center></th>
                                    @endforeach
                                @endforeach
                              </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                            <tr>
                                <td>{{$model['course']}}</td>
                                @foreach($model['scores'] as $score)
                                <td>
                                    <center>{{$score['note']}}</center>
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
       </script>
    @stop
