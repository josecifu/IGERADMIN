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
                  
                    <!--begin::Button-->
                    <a href="{{url('administration/student/create')}}" class="btn btn-success font-weight-bolder">
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
            var d = new Date();
            var strDate =  d.getDate()+ "-" + (d.getMonth()+1) + "-" + d.getFullYear();
            var init = function() {
                var table = $('#kt_datatable');
                // begin first table
                table.DataTable({
                    dom: 'Bfrtip',
                        buttons: [
                            {
                                text: 'Exportar a excel',
                                extend: 'excelHtml5',
                                fieldSeparator: '\t',
                                messageTop: 'Listado de alumnos inscritos.',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3],
                                },
                                title: 'Listado de alumnos inscritos -'+strDate
                            },
                            {
                                text: 'Exportar a csv',
                                extend: 'csvHtml5',
                                extension: '.csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3 ],
                                },
                                title: 'Listado de alumnos inscritos -'+strDate
                            },
                            {
                                text: 'Exportar a PDF',
                                extend: 'pdfHtml5',
                                extension: '.pdf',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3 ],
                                },
                                title: 'Listado de alumnos inscritos -'+strDate,
                                customize: function(doc) {
                                    doc['styles'] = {
                                        userTable: {
                                            margin: [0, 15, 0, 15]
                                        },
                                        tableHeader: {
                                            bold:!0,
                                            fontSize:11,
                                            color:'white',
                                            fillColor:'#85AED1',
                                            alignment:'center'
                                        }
                                    },
                                    doc.styles.tableBodyOdd = {
                                        alignment: 'center'
                                      },
                                    doc.styles.title = {
                                      color: 'white',
                                      fontSize: '40',
                                      background: '#ec7e35',
                                      alignment: 'center'
                                    }   
                                  } ,
                            }
                            
                        ],
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
                            targets: [0, 2],
                            visible: false,
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