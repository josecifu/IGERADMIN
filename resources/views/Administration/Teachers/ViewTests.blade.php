@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Tablero
    @stop
    @section('breadcrumb2')
    Examenes
    @stop
    {{-- Page content --}}
    @section('content')
    <div class="content flex-column-fluid" id="kt_content">
                                <!--begin::Notice-->
                                <!--<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-xl">
                                         
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                         
                                        </span>
                                    </div>
                                    <div class="alert-text">The foundation for DataTables is progressive enhancement, so it is very adept at reading table information directly from the DOM. This example shows how easy it is to add searching, ordering and paging to your HTML table by simply running DataTables on it. See official documentation
                                    <a class="font-weight-bold" href="https://datatables.net/examples/data_sources/dom.html" target="_blank">here</a>.</div>
                                </div>-->
                                <!--end::Notice-->
                                <!--begin::Card-->
                                <div class="card card-custom">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <span class="card-icon">
                                                <i class="flaticon2-favourite text-primary"></i>
                                            </span>
                                            @isset($course)
                                                <h3 class="card-label">Listado de Examenes de {{$course->Name ?? ''}} de {{$grado ?? ''}} / Voluntario encargado: {{$Nombre}}</h3>
                                            @endisset
                                        </div>
                                        <div class="card-toolbar">
                                          
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="scroll scroll-pull" data-scroll="true" data-suppress-scroll-x="false" data-swipe-easing="false" style="height: 600px">
                                        
                                        <!--begin: Datatable-->
                                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                                            <thead>
                                                <tr>
                                                    @foreach($Titles as $Title)
                                                    <th colspan="{{$Title['No']}}" >{{ $Title['Name'] }}</th>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    @foreach($Titles as $Title)
                                                        @if($Title['No']==0)
                                                        <th><center>No existen examenes asignados</center></th>
                                                        @endif
                                                        @foreach($Title['Test'] as $title)
                                                        <th><center>{{$title->Title}}</center></th>
                                                        @endforeach
                                                    @endforeach
                                                  </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach( $Models as $model)
                                                        @if($model['Tipo']=="Fisico")                                                       
                                                            <td><center><button type="button" disabled class="btn btn-outline-info"  data-toggle="modal">Examen Fisico</button></center></td>   
                                                        @elseif($model['Tipo']=="No")                                                       
                                                            <td style="background-color: #E2E4ED"></td>   
                                                        @else
                                                            <td><center><button type="button"  class="btn btn-outline-info"  data-toggle="modal" onclick="verNotas( {{$model['Id']}},{{$course->id}});">Detalle de preguntas: {{$model['NoQuestions']}}</button></center></td>
                                                        @endif
                                                   @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end: Datatable-->
                                        </div>
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
                var d = new Date();
                var strDate =  d.getDate()+ "-" + (d.getMonth()+1) + "-" + d.getFullYear();
                var initTable1 = function() {
                    var table = $('#kt_datatable');

                    // begin first table
                    table.DataTable({
                        dom: 'Brtip',
                        buttons: [
                            {
                                text: 'Exportar a excel',
                                extend: 'excelHtml5',
                                fieldSeparator: '\t',
                               
                                exportOptions: {
                                    columns: [ @for($i=0;$i<=count($Titles);$i++) {{$i}}, @endfor],
                                },
                                customize: function(xlsx) {
                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];

                                    $('c[r=A1] t', sheet).text( 'Listado de examenes / {{$grado}}' );
                                    $('row c[r^="C"]', sheet).attr( 's', '32' );
                                    $('row c', sheet).attr('s', '25');
                                    $('row:first c', sheet).attr( 's', '51' );
                                    $('c[r=A2] t', sheet).attr( 's', '25' );
                                    $('c[r=A2] t', sheet).css('background-color', 'Red');
                                    $('row c[r*="2"]', sheet).attr('s', '32');
                                    
                                },
                                title: 'Listado de examenes/{{$grado}}-'+strDate,
                            },
                            {
                                text: 'Exportar a csv',
                                extend: 'csvHtml5',
                                extension: '.csv',
                                exportOptions: {
                                    columns: [@for($i=0;$i<=count($Titles);$i++) {{$i}}, @endfor],
                                },
                                title: 'Listado de examenes / {{$grado}} -'+strDate
                            },
                            {
                                text: 'Exportar a PDF',
                                extend: 'pdfHtml5',
                                extension: '.pdf',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                exportOptions: {
                                    columns: [ @for($i=0;$i<=count($Titles);$i++) {{$i}}, @endfor],
                                },
                                title: 'Listado de examenes / {{$grado}} -'+strDate,
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
            function verNotas($id,$curso) {
                var $url_path = '{!! url('/') !!}';
                window.location.href = $url_path+"/administration/teacher/question/"+$id+"/"+$curso;
            }

       </script>

      
	@stop