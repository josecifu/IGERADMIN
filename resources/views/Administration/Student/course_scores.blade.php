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
                            Listado de cursos y notas de: {{$student->Names}} {{$student->LastNames}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="card-toolbar">
                            <a href="{{url('administration/student/score/'.$grade->id)}}" class="btn btn-danger font-weight-bolder mr-2"><i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" style="margin-top:13px !important">
                        <thead>
                            <tr style="background:#cecece">
                                <th rowspan="1"></th>
                                @foreach($titles as $t)
                                    <th colspan="{{$t['No']}}"><center>{{$t['Activity']}}</center></th>
                                @endforeach
                            </tr>
                            <tr style="background:#e5e5e5">
                                <th>
                                    <center>Cursos</center>
                                </th>
                                @foreach($titles as $title)
                                    @if($title['No']=='0')
                                    <th>
                                        <center>No existen examenes asignados</center>
                                    </th>
                                    @endif
                                    @if($title['Test'])
                                        @foreach($title['Test'] as $t)
                                        <th>
                                            <center>{{$t}}</center>
                                        </th>
                                        @endforeach
                                    @endif
                                @endforeach
                              </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                            <tr>
                                <td>{{$model['Course']}}</td>
                                @foreach($model['Notes'] as $score)
                                    @if($score[0]=='N')
                                    <td style="background-color: #E4E6EF"> </td>
                                    @elseif(isset($score[0]['Porcentage']))
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{$score[0]['Porcentage']}}%" aria-valuenow="{{$score[0]['Note']}}" aria-valuemin="0" aria-valuemax="{{$score[0]['Max']}}">{{$score[0]['Note']}} Pts</div>
                                        </div>
                                    </td>
                                    @else
                                    <td>
                                        <center>
                                            <span class="label label-warning label-pill label-inline mr-2">{{$score[0]}}</span>
                                        </center>
                                    </td>
                                    @endif
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
