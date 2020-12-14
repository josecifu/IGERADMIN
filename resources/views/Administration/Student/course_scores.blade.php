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
                            Listado de cursos y notas de {{$student->Names}} {{$student->LastNames}} del grado  {{$grade->GradeNamePeriod()}}
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
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top:13px !important">
                        <thead>
                            <tr style="background:#85AED1" >
                                <th rowspan="1" style="background:#fff" ></th>
                                @foreach($titles as $t)
                                    <th style="color:white;" colspan="{{$t['No']}}"><center>{{$t['Activity']}}</center></th>
                                @endforeach
                            </tr>
                            <tr >
                                <th style="background:#85AED1;color:white;">
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
                                    columns: [ 0, @for($i= 1; $i<=count($title['Test'])+1;$i++) {{$i}}, @endfor]
                                },
                                customize: function(xlsx) {
                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];

                                    $('c[r=A1] t', sheet).text( 'Listado de notas / {{$grade->GradeNamePeriod()}}' );
                                    $('row c[r^="C"]', sheet).attr( 's', '32' );
                                    $('row c', sheet).attr('s', '25');
                                    $('row:first c', sheet).attr( 's', '51' );
                                    $('c[r=A2] t', sheet).attr( 's', '25' );
                                    $('c[r=A2] t', sheet).css('background-color', 'Red');
                                    $('row c[r*="2"]', sheet).attr('s', '32');
                                    
                                },
                                title: 'NotasAlumnos-{{$grade->GradeNamePeriod()}} '+strDate,
                            },
                            {
                                text: 'Exportar a csv',
                                extend: 'csvHtml5',
                                extension: '.csv',
                                exportOptions: {
                                    columns: [ 0, @for($i= 1; $i<=count($title['Test'])+1;$i++){{$i}},@endfor]
                                },
                                
                            },
                            {
                                text: 'Exportar a PDF',
                                extend: 'pdfHtml5',
                                extension: '.pdf',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                title: 'Notas Alumnos {{$grade->GradeNamePeriod()}} '+strDate,
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
       </script>
    @stop
