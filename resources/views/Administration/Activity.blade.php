@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Voluntarios
    @stop
    @section('breadcrumb1')
    Listado/Logs
    @stop
    @section('breadcrumb2')
    Voluntario
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
                        <h3 class="card-label">Registro de actividades </h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="card-toolbar">
                            <a href="{{url('administration/home/dashboard')}}" class="btn btn-danger font-weight-bolder mr-2"><i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                        </div>
                       
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top:13px !important">
                        <thead>
                            <tr>
                                @foreach($titles as $title)
                                <th>{{$title}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $key => $model)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$model['responsible']}}</td>
                                <td>{{$model['activity']}}</td>
                                <td>
                                    <span class="label label-{{$model['color']}} label-pill label-inline mr-2" style="height: 100%;width: 100%" >{{$model['type']}}</span>
                                </td>
                                <td>{{$model['datatime']}}</td>
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
        <!--begin::Page Scripts(used by this page)-->
        <!--end::Page Scripts-->
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
                        
                    });
                };
                return {
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
