@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Listado/Notas
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
                            Listado de notas de {{$grade}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                       
                       {{--  <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline">
                            <button style="color:white;" type="button" class="btn btn-light-primary font-weight-bolder " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download" style="color: white;"></i>Exportar datos</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav flex-column nav-hover" >
                                    <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Elija una opción:</li>
                                   
                                    <li class="nav-item">
                                        <a href="#" onclick="exportdata(2)" class="nav-link">
                                            <i class="nav-icon la la-file-excel-o"></i>
                                            <span class="nav-text">Exportar datos a Excel</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->--}}
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 15px !important">
                        <thead style="background:#85AED1">
                            <tr >
                                <th style="color:white;">No</th>
                                <th style="color:white;">Alumno</th>
                                @foreach($titles as $title)
                                <th style="color:white;">{{$title}}</th>
                                @endforeach
                                <th style="color:white;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $key => $model)
                            <tr>
                                <td>{{($key+1)}}</td>
                                <td>{{$model['names']}}</td>
                                @foreach($model['notes'] as $note)
                                <td><center>{{$note}}</center></td>
                                @endforeach
                                <td>
                                    <center><a href="{{url('/administration/student/score/course/'.$model['assign'])}}">
                                        <button type="button" class="btn btn-outline-info" data-toggle="" data-target="">Ver Notas</button></a>
                                    </center>
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
                var d = new Date();
                var strDate =  d.getDate()+ "-" + (d.getMonth()+1) + "-" + d.getFullYear() + " " + d.getHours() + "-" + d.getMinutes();
               
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
                                    columns: [ 0, 1, @for($i= 2; $i<count($titles)+2;$i++) {{$i}}, @endfor]
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
                                title: 'NotasAlumnos{{$grade}}-'+strDate,
                            },
                            {
                                text: 'Exportar a csv',
                                extend: 'csvHtml5',
                                extension: '.csv',
                                exportOptions: {
                                    columns: [ 0, 1, @for($i= 2; $i<count($titles)+2;$i++){{$i}},@endfor]
                                },
                                
                            },
                            {
                                text: 'Exportar a PDF',
                                extend: 'pdfHtml5',
                                extension: '.pdf',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                title: 'Notas Alumnos {{$grade}} '+strDate,
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
                                exportOptions: {
                                    columns: [ 0, 1, @for($i= 2; $i<count($titles)+2;$i++){{$i}},@endfor ]
                                },
                                
                            }
                            
                        ],
                        responsive: true,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        },
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
