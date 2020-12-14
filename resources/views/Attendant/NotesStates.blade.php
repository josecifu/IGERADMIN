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
                                    <span class="label label-danger label-pill label-inline mr-2">Pendientes de aprobación</span>
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
            var d = new Date();
            var strDate =  d.getDate()+ "-" + (d.getMonth()+1) + "-" + d.getFullYear();
            var init = function() {
                var table = $('#kt_datatable');
                // begin first table
                table.DataTable({
                    dom: 'Brfltip',
                        buttons: [
                            {
                                text: 'Exportar a excel',
                                extend: 'excelHtml5',
                                fieldSeparator: '\t',
                               
                                exportOptions: {
                                    columns: [ 0,1,2 ],
                                },
                                customize: function(xlsx) {
                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];

                                    $('c[r=A1] t', sheet).text( 'Notas Circulo ' );
                                    $('row c[r^="C"]', sheet).attr( 's', '32' );
                                    $('row c', sheet).attr('s', '25');
                                    $('row:first c', sheet).attr( 's', '51' );
                                    $('c[r=A2] t', sheet).attr( 's', '25' );
                                    $('c[r=A2] t', sheet).css('background-color', 'Red');
                                    $('row c[r*="2"]', sheet).attr('s', '32');
                                    
                                },
                                title: 'NotasCirculo-'+strDate,
                            },
                            {
                                text: 'Exportar a csv',
                                extend: 'csvHtml5',
                                extension: '.csv',
                                exportOptions: {
                                    columns: [ 0,1,2,3 ],
                                },
                                title: 'Notas Circulo -'+strDate
                            },
                            {
                                text: 'Exportar a PDF',
                                extend: 'pdfHtml5',
                                extension: '.pdf',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                exportOptions: {
                                    columns: [ 0,1,2,3 ],
                                },
                                title: 'Notas Circulo -'+strDate,
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