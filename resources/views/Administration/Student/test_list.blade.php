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
                       
                        <!--end::Dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top:13px !important">
                        <thead>
                            <tr >
                                <th colspan="2">
                                    <center>Estudiantes</center>
                                </th>
                                @foreach($titles as $title)
                                <th colspan="{{$title['no']}}">
                                    <center>{{$title['name']}}</center>
                                </th>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                @foreach($titles as $title)
                                    
                                        @foreach($title['test'] as $t)
                                        <th>
                                            <center>{{$t->Title}}</center>
                                        </th>
                                        @endforeach
                                    @if($title['no']==0)
                                    <th>
                                        <center>No existen examenes asignados</center>
                                    </th>
                                    @endif
                                @endforeach
                              </tr>
                        </thead>
                        <tbody>
                                @foreach($models as $model)
                                <tr>
                                    <td>{{$model['name']}}</td>
                                    <td>{{$model['lastname']}}</td>
                                    @foreach($model['tests'] as $test)
                                        @if($test['notes']=="0")
                                        <center>
                                            <td style="background-color: #E4E6EF">    
                                        </center>
                                        @else
                                            <td>
                                            @foreach($test['notes'] as $note)
                                                @if(($test['state']=="written")||($test['state']=="none"))

                                                <center>
                                                    <button type="button" disabled class="btn btn-info">{{$note['Score']}} pts</button>
                                                </center>
                                                @endif
                                                @if($test['state']=="approved")
                                                <center>
                                                    <button type="button" class="btn btn-outline-info"  onclick="verExamen({{$test['Id']}},{{$model['assign']}});">{{$note['Score']}} pts</button>
                                                </center>
                                                @endif
                                            @endforeach
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
                var d = new Date();
                var strDate =  d.getDate()+ "-" + (d.getMonth()+1) + "-" + d.getFullYear() ;
                var initTable1 = function() {
                    var table = $('#kt_datatable');
                    // begin first table
                    table.DataTable({
                        dom: 'Bfrltip',
                        pageLength : 10,
                        lengthMenu: [ 10, 25, 50, 75, 100 ],
                        buttons: [
                            {
                                text: 'Exportar a excel',
                                extend: 'excelHtml5',
                                fieldSeparator: '\t',
                               
                                exportOptions: {
                                    columns: [ 0, @for($i= 1; $i<=count($titles)+1;$i++) {{$i}}, @endfor]
                                },
                                customize: function(xlsx) {
                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];

                                    $('c[r=A1] t', sheet).text( 'Listado de notas / {{$grade}}' );
                                    $('row c[r^="C"]', sheet).attr( 's', '32' );
                                    $('row c', sheet).attr('s', '25');
                                    $('row:first c', sheet).attr( 's', '51' );
                                    $('c[r=A2] t', sheet).attr( 's', '25' );
                                    $('c[r=A2] t', sheet).css('background-color', 'Red');
                                    $('row c[r*="2"]', sheet).attr('s', '32');
                                    
                                },
                                title: 'Evaluaciones-{{$grade}} '+strDate,
                            },
                            {
                                text: 'Exportar a csv',
                                extend: 'csvHtml5',
                                extension: '.csv',
                                exportOptions: {
                                    columns: [ 0, @for($i= 1; $i<=count($titles)+1;$i++){{$i}},@endfor]
                                },
                                
                            },
                            {
                                text: 'Exportar a PDF',
                                extend: 'pdfHtml5',
                                extension: '.pdf',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                title: 'Evaluaciones {{$grade}} '+strDate,
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
                                exportOptions: {
                                    columns: [ 0, 1, @for($i= 2; $i<count($titles)+2;$i++){{$i}},@endfor ]
                                },
                                
                            }
                            
                        ],
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
