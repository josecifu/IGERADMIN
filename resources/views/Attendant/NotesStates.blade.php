@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Notas
    @stop
    @section('breadcrumb1')
    Encargado de circulo
    @stop
    @section('breadcrumb2')
    Notas aprobadas y reprobadas
    @stop
    {{-- Page content --}}
    @section('content')
    <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-group text-primary"></i>
                    </span>
                    <h3 class="card-label">Notas por circulos de estudio</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" style="color:white;"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download" style="color:white;"></i>Exportar</button>
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
                    <!--begin::Button-->
                    <a href="{{url('administration/student/create')}}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Añadir un nuevo alumno</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            @foreach($Titles as $Title)
                            <th>{{ $Title }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @if($Models)
                            @foreach($Models as $Model)
                            <tr>
                                <td>{{$Model['Id']}}</td>
                                <td>{{$Model['Course']}}</td>
                                <td>{{$Model['Grade']}}</td>
                                <td><center>
                                    @if($Model['State']=="Approved")
                                    <span class="label label-success label-pill label-inline mr-2">Notas aprobada</span>
                                    @elseif($Model['State']=="Qualified")
                                    <span class="label label-info label-pill label-inline mr-2">Pendientes de aprobación</span>
                                    @elseif($Model['State']=="Pre-Qualified")
                                    <span class="label label-warning label-pill label-inline mr-2">Pendientes de calificación</span>
                                    @else
                                    <span class="label label-dark label-inline mr-2"> {{$Model['State']}}</span>
                                   
                                    @endif
                                    
                                
                                
                                </center></td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
	@stop
	@section('scripts')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
      <script type="text/javascript">
        "use strict";
        var KTDatatablesAdvancedRowGrouping = function() {
            var init = function() {
                var table = $('#kt_datatable');
                // begin first table
                table.DataTable({
                    responsive: true,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        },
                    pageLength: 25,
                    order: [[2, 'asc']],
                    drawCallback: function(settings) {
                        var api = this.api();
                        var rows = api.rows({page: 'current'}).nodes();
                        var last = null;

                        api.column(2, {page: 'current'}).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="10">' + group + '</td></tr>',
                                );
                                last = group;
                            }
                        });
                    },
                    columnDefs: [
                        {
                            // hide columns by index number
                            targets: [2],
                            visible: false,
                        },
                        {
                            targets: -1,
                            title: 'Actions',
                            orderable: false,
                            render: function(data, type, full, meta) {
                                return '\
                                <a href="javascript:;" onclick="view(\''+full[0]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip"  data-placement="top" title="Ver notas">\
                                    <i class="flaticon2-magnifier-tool"></i>\
                                </a>\
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip"  data-placement="top" title="Aprobar notas">\
                                        <i class="flaticon-list-3 flaticon-"></i>\
                                    </a>\
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip"  data-placement="top" title="No aprobar notas">\
                                        <i class="flaticon-exclamation-square"></i>\
                                    </a>\
                                ';
                            },
                        },
                       
                      
                    ],
                });
            };

            return {

                //main function to initiate the module
                init: function() {
                    init();
                },
            };
        }();
        jQuery(document).ready(function() {
            KTDatatablesAdvancedRowGrouping.init();
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          })
        function view($id)
        {
            var $url_path = '{!! url('/') !!}';
            window.location.href = $url_path+"/attendant/notes/view/"+$id;
        }
      </script>
	@stop