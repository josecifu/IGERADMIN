@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Listado/Inactivos
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
                        <h3 class="card-label">Listado de estudiantes eliminados</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="card-toolbar">
                            <a href="{{url('administration/student/list')}}" class="btn btn-danger font-weight-bolder mr-2"><i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                        </div>
                      
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
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
                                <td>{{$model['conexion']}}</td>
                                <td nowrap="nowrap"></td>
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
            var d = new Date();
            var strDate =  d.getDate()+ "-" + (d.getMonth()+1) + "-" + d.getFullYear() + " " + d.getHours() + "-" + d.getMinutes();
            var KTDatatablesDataSourceHtml = function() {
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
                                    columns: [ 0, 1, 2, 3, 4 , 5 ,6 ],
                                },
                                title: 'ListadoAlumnos-'+strDate
                            },
                            {
                                text: 'Exportar a csv',
                                extend: 'csvHtml5',
                                extension: '.csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 , 5 ,6],
                                },
                                messageTop: 'Listado de alumnos'
                            },
                            {
                                text: 'Exportar a PDF',
                                extend: 'pdfHtml5',
                                extension: '.pdf',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 , 5 ,6],
                                },
                                messageTop: 'Listado de alumnos'
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
                                        <a href="javascript:;" data-toggle="tooltip" data-placement="top" onclick="ActivePeriod(\''+full[0]+'\',\''+full[1]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" title="Habilitar estudiante" data-placement="left">\
                                        <i class="la la-check-circle"></i>\
                                        </a>\
                                    ';
                                },
                            },
                        ],
                    });
                };
                return {
                    init: function() {
                        initTable1();
                    },
                };
            }();
            jQuery(document).ready(function() {
                KTDatatablesDataSourceHtml.init();
            });
            function ActivePeriod($id,$name)
            {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: '¿Está seguro de habilitar el estudiante?',
                    text: "El nombre del estudiante: "+$name,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Habilitar',
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
                            title: 'Habilitado!',
                            text: 'Se ha habilitado con exito!',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        }).then(function () {
                            var $url_path = '{!! url('/') !!}';
                            window.location.href = $url_path+"/administration/student/activate/"+$id;
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
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
              })
       </script>  
    @stop