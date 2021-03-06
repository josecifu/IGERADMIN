@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Actividades
    @stop
    @section('breadcrumb2')
    Detalle
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
                                            @if($course)
                                                <h3 class="card-label">Detalle de la actividad: {{$actividad->Name}} del curso {{$course->Name}} {{$course->Grade()->GradeNamePeriod()}}</h3>
                                            @endif
                                            
                                        </div>
                                        <div class="card-toolbar">
                                            
                                                <a href="{{url('administration/teacher/score/'.$course->id)}}" class="btn btn-danger font-weight-bolder mr-2">
                                                <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                                            
                                          
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--begin: Datatable-->
                                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                                            <thead>
                                                <tr>
                                                    @foreach($Titles as $Title)
                                                    <th>{{ $Title }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$actividad->id}}</td>
                                                    <td>{{$actividad->Name}}</td>
                                                    <td>
                                                    @foreach($Models as $Model)
                                                        <ul>
                                                            <li>{{$Model['Test']}}</li> 
                                                        </ul>
                                                    @endforeach
                                                    </td>
                                                    <td>{{$actividad->Score}}</td>
                                                    <td nowrap="nowrap"></td>
                                                </tr>
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
                    var d = new Date();
                    var strDate =  d.getDate()+ "-" + (d.getMonth()+1) + "-" + d.getFullYear() ;
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
                                messageTop: 'Listado de actividades ',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3 ],
                                },
                                title: 'Listado de actividades-{{$course->Name}} {{$course->Grade()->GradeNamePeriod()}}-'+strDate
                            },
                            {
                                text: 'Exportar a csv',
                                extend: 'csvHtml5',
                                extension: '.csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3],
                                },
                                title: 'Listado de actividades-{{$course->Name}} {{$course->Grade()->GradeNamePeriod()}}-'+strDate
                            
                            },
                            {
                                text: 'Exportar a PDF',
                                extend: 'pdfHtml5',
                                extension: '.pdf',
                                pageSize: 'LEGAL',
                                title: 'Listado de actividades-{{$course->Name}} {{$course->Grade()->GradeNamePeriod()}}-'+strDate,
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
                                    columns: [ 0, 1, 2, 3],
                                },
                                
                            }
                            
                        ],
                        responsive: true,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        },
                        columnDefs: [
                            {
                                targets: -1,
                                title: 'Acciones',
                                orderable: false,
                                render: function(data, type, full, meta) {
                                    return '\
                                        <a href="javascript:;" onclick="edit(\''+full[0]+'\',\''+full[1]+'\',\''+full[3]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" data-placement="top" title="Detalle de asignación">\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        <a href="javascript:;" onclick="deleteActivity(\''+full[0]+'\',\''+full[1]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar">\
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
                        initTable1();
                    },

                };

            }();

            jQuery(document).ready(function() {
                KTDatatablesDataSourceHtml.init();
            });
            function edit($id,$Name,$Punteo)
            {
               Swal.mixin({
                    input: 'text',
                    confirmButtonText: 'Siguiente  &rarr;',
                    showCancelButton: true,
                    progressSteps: ['1','2',]
                }).queue([
                    {
                    title: 'Ingrese el nombre de la actividad:',
                    text: 'Nombre anterior:' + $Name
                    },
                    {
                    title: 'Ingrese el Punteo total de la actividad:',
                    text: 'Punteo anterior:' + $Punteo
                    },
                ]).then((result) => {
                    if (result.value) {
                    const answers = JSON.stringify(result.value)
                    console.log(result.value);
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })
                    
                    swalWithBootstrapButtons.fire({
                        title: '¿Está seguro de los datos?',
                        text: "El nombre de la actividad: "+result.value[0]+" y el punteo: "+result.value[1],
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Si, crearlo!',
                        cancelButtonText: 'No, cancelar!',
                        reverseButtons: true
                    }).then((result2) => {
                        if (result2.isConfirmed) {
                            var code = $id;
                            var data = [{
                                code: code,
                                Actividad: result.value[0],
                                Punteo: result.value[1],
                                curso: {{$course->id}},
                            }];
                            $.ajax({
                                url: '/administration/teacher/update/activity',
                                type:'POST',
                                data: {"_token":"{{ csrf_token() }}","data":data},
                                dataType: "JSON",
                                success: function(e){
                                    if(e.id){
                                        swalWithBootstrapButtons.fire({
                                        title: 'Error!',
                                        text: e.id,
                                        icon: 'error',
                                        confirmButtonText: 'Aceptar',
                                        })
                                    }else{
                                        swalWithBootstrapButtons.fire({
                                        title: 'Actualizado!',
                                        text: 'La actividad se ha actualizado con exito!',
                                        icon: 'success',
                                        confirmButtonText: 'Aceptar',
                                        }).then(function () {                                        
                                            var $url_path = '{!! url('/') !!}';
                                            window.location.href = $url_path+"/administration/teacher/detail/activity/"+{{$course->id}}+"/"+$id;
                                        });
                                    }//fin else
                                },
                                error: function(e){
                                    swalWithBootstrapButtons.fire({
                                        title: 'Cancelado!',
                                        text:   e.responseJSON['error'],
                                        icon: 'error',
                                        confirmButtonText: 'Aceptar',
                                    })
                                
                                }
                            });
                        
                        } else if (
                        result.dismiss === Swal.DismissReason.cancel
                        ) {
                        swalWithBootstrapButtons.fire({
                            title: 'Cancelado!',
                            text:  'El dia no ha sido creada!',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                        }
                    })
                    }
                })
            }
            
            function deleteActivity($id,$name)
            {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: '¿Está seguro de eliminar la actividad?',
                    text: "El nombre de la actividad: "+$name,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'No, cancelar!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire({
                            title: 'Eliminado!',
                            text: 'Se ha eliminado con exito!',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        }).then(function () {
                                var $url_path = '{!! url('/') !!}';
                                window.location.href = $url_path+"/administration/teacher/delete/activity/"+{{$course->id}}+"/"+$id;
                            });
                    } else if (
                    result.dismiss === Swal.DismissReason.cancel
                    ) {
                    swalWithBootstrapButtons.fire({
                        title: 'Cancelado!',
                        text:  'La actividad no ha sido eliminada!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    })
                    }
                })
            }
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
              })
       </script>

      
	@stop