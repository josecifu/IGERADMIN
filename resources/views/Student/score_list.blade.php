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
                                <th rowspan="1"></th>
                                @foreach($titles as $t)
                                    <th colspan="{{$t['no']}}"><center>{{$t['activity']}}</center></th>
                                @endforeach
                            </tr>
                            <tr>
                                <th><center>Cursos</center></th>
                                @foreach($titles as $title)
                                    @if($title['no']=='0')
                                    <th><center>No existen examenes asignados </center></th>
                                    @endif
                                    @if($title['test'])
                                        @foreach($title['test'] as $t)
                                        <th><center>{{$t->Title}}</center></th>
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
                                    @if(isset($score['Note']))
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{$score['Porcentage']}}%" aria-valuenow="{{$score['Note']}}" aria-valuemin="0" aria-valuemax="{{$score['Max']}}">{{$score['Note']}} Pts</div>
                                        </div>  
                                    </td>
                                    @elseif($score=='N')
                                    <td style="background-color: #E4E6EF"> </td>
                                    @else
                                    <td>
                                        <center><span class="label label-warning label-pill label-inline mr-2"> {{$score}}</span></center>
                                       
                                    </td>
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
       </script>
    @stop
