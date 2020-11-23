@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Inscripciones
    @stop
    @section('breadcrumb1')
    Administracion
    @stop
    @section('breadcrumb2')
    Inscripciones
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
                    <h3 class="card-label">Inscripciones por circulos de estudio</h3>
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
                                <td>{{$Model['Name']}}</td>
                                <td>{{$Model['Grade']}}</td>
                                <td><center>{{$Model['Date']}}</center></td>
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
                            targets: [0, 2],
                            visible: false,
                        },
                        {
                            targets: -1,
                            title: 'Actions',
                            orderable: false,
                            render: function(data, type, full, meta) {
                                return '\
                                    <div class="dropdown dropdown-inline">\
                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
                                            <i class="la la-cog"></i>\
                                        </a>\
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                            <ul class="nav nav-hoverable flex-column">\
                                                <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
                                                <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
                                                <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\
                                            </ul>\
                                        </div>\
                                    </div>\
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                                        <i class="la la-edit"></i>\
                                    </a>\
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                                        <i class="la la-trash"></i>\
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
      </script>
	@stop