@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Listado
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
                        <h3 class="card-label">Listado general de estudiantes activos</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{url('administration/student/create')}}" class="btn btn-success font-weight-bolder mr-2"><i class="la la-plus"></i>Añadir nuevo estudiante</a>
                        <!--end::Button-->
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline">
                            <button style="color:white;" type="button" class="btn btn-light-primary font-weight-bolder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la la-download" style="color: white;"></i>Exportar datos</button>
                            @include("Administration.Base._exports")
                        </div>
                        <!--end::Dropdown-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="scroll scroll-pull" data-scroll="true" data-suppress-scroll-x="false" data-swipe-easing="false" style="height: 600px">
                                        
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
                            @foreach($models as $model)
                                <tr>
                                    <td>{{$model['id']}}</td>
                                    <td>{{$model['name']}}</td>
                                    <td>{{$model['lastname']}}</td>
                                    <td>{{$model['phone']}}</td>
                                    <td>{{$model['user']}}</td>
                                    <td>{{$model['email']}}</td>
                                    <td>{{$model['grade']}}</td>
                                    <td>{{$model['conexion']}}</td>
                                    <td nowrap="nowrap"></td>
                                </tr>
                            @endforeach
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
                                messageTop: 'Listado de alumnos.',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 , 5 ,6,7 ],
                                },
                                title: 'ListadoAlumnos-'+strDate
                            },
                            {
                                text: 'Exportar a csv',
                                extend: 'csvHtml5',
                                extension: '.csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 , 5 ,6,7 ],
                                },
                                messageTop: 'Listado de alumnos'+strDate
                            },
                         
                            {
                                text: 'Exportar a PDF',
                                extend: 'pdfHtml5',
                                extension: '.pdf',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                title: 'Listado de alumnos'+strDate,
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
                                targets: -1,
                                title: 'Acciones',
                                orderable: false,
                                render: function(data, type, full, meta) {
                                    return '\
                                        <div class="dropdown dropdown-inline">\
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title ="Mas opciones" data-toggle="dropdown">\
                                                <i class="la la-cog"></i>\
                                            </a>\
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                                <ul class="nav nav-hoverable flex-column">\
                                                    <li class="nav-item"><a class="nav-link" href="/administration/student/list/assists/'+full[0]+'"><i class="nav-icon la la-list"></i><span class="nav-text">Ver asistencias</span></a></li>\
                                                    <li class="nav-item"><a class="btn nav-link" onclick="create('+full[0]+');"><i class="nav-icon la la-lock"></i><span class="nav-text">Restablecer contraseña</span></a></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                        <div class="dropdown dropdown-inline">\
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title ="Actualizaciones" data-toggle="dropdown">\
                                                <i class="la la-edit"></i>\
                                            </a>\
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                                <ul class="nav nav-hoverable flex-column">\
                                                    <li class="nav-item"><a class="nav-link" href="/administration/student/edit/'+full[0]+'"><i class="nav-icon la la-user"></i><span class="nav-text">Actualizar datos del estudiante</span></a></li>\
                                                    <li class="nav-item"><a class="nav-link" href="/administration/student/assign/grade/'+full[0]+'"><i class="nav-icon la la-users"></i><span class="nav-text">Cambiar de grado</span></a></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                        <a href="javascript:;" onclick="deletePeriod(\''+full[0]+'\',\''+full[1]+'\',\''+full[2]+'\')" data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-clean btn-icon" title="Eliminar estudiante">\
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
            function exportdata(Type)
            {
                var $url_path = '{!! url('/') !!}';
			    window.location.href = $url_path+"/reports/pdf/"+Type+"/listadoalumnos";
            }
            function deletePeriod($id,$name,$lastname)
            {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: '¿Está seguro de elimnar al estudiante?',
                    text: $name+" "+$lastname,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        var Code = $id;
                        var data = [{
                            Code: Code,
                            Name: result.value[0],
                        }];
                        swalWithBootstrapButtons.fire({
                            title: 'Eliminado!',
                            text: 'Se ha eliminado con exito!',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        }).then(function () {
                            var $url_path = '{!! url('/') !!}';
                            window.location.href = $url_path+"/administration/student/delete/"+$id;
                            });
                    } else if (
                    result.dismiss === Swal.DismissReason.cancel
                    ) {
                    swalWithBootstrapButtons.fire({
                        title: 'Cancelado!',
                        text:  'El estudiante no ha sido eliminada!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    })
                    }
                })
            }
            function create($id)
            {
                Swal.mixin({
                    input: 'text',
                    confirmButtonText: 'Continuar',
                    cancelButtonText: 'Cancelar',
                    showCancelButton: true,
                }).queue([
                    {
                    title: 'Ingrese la nueva contraseña',
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
                        text: "Nueva Contraseña: "+result.value[0],
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Restablecer',
                        cancelButtonText: 'Cancelar',
                        reverseButtons: true
                    }).then((result2) => {
                        if (result2.isConfirmed) {
                            var data = [{
                                Contraseña: result.value[0],
                            }];
                            $.ajax({
                                url:"/administration/student/restore/password/"+$id,
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
                                    }
                                    else {
                                        swalWithBootstrapButtons.fire({
                                        title: 'Creado!',
                                        text: 'Contraseña asignada con exito!',
                                        icon: 'success',
                                        confirmButtonText: 'Aceptar',
                                        }).then(function () {    
                                            var $url_path = '{!! url('/') !!}';
                                            window.location.href = $url_path+"/administration/student/list";
                                        });
                                    }
                                },
                                error: function(e){
                                    swalWithBootstrapButtons.fire({
                                        title: 'Error!',
                                        text:   e.responseJSON['error'],
                                        icon: 'error',
                                        confirmButtonText: 'Aceptar',
                                    })
                                }
                            });
                        }
                        else {
                        swalWithBootstrapButtons.fire({
                            title: 'Cancelado!',
                            text:  'Se ha cancelado la acción!',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                        }
                    })
                    }
                })
            }
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
              })
       </script>  
    @stop
