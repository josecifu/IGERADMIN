@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Voluntarios
    @stop
    @section('breadcrumb2')
    Principal
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
                        <h3 class="card-label">Registro de actividades del módulo estudiante</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i>Exportar</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav flex-column nav-hover">
                                    <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Elija una opcion:</li>
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
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                @foreach($titles as $t)
                                <th>{{$t}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $m)
                            <tr>
                                <td>{{$m['id']}}</td>
                                <td>{{$m['user']}}</td>
                                <td>{{$m['activity']}}</td>
                                <td>{{$m['type']}}</td>
                                <td>{{$m['datatime']}}</td>
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
        <!--begin::Page Scripts(used by this page)-->
        
        <!--end::Page Scripts-->
        <script type="text/javascript">
           
            "use strict";
            var KTDatatablesDataSourceHtml = function() {

                var initTable1 = function() {
                    var table = $('#kt_datatable');

                    // begin first table
                    table.DataTable({
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
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
                                                <i class="la la-cog"></i>\
                                            </a>\
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                                <ul class="nav nav-hoverable flex-column">\
                                                    <li class="nav-item"><a class="nav-link" href="/administration/teacher/edit/'+full[0]+'"><i class="nav-icon la la-edit"></i><span class="nav-text">Editar</span></a></li>\
                                                    <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-lock"></i><span class="nav-text">Restablecer contraseña</span></a></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Detalle de asignación">\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        <a href="javascript:;" onclick="deletePeriod(\''+full[0]+'\',\''+full[1]+'\')" class="btn btn-sm btn-clean btn-icon" title="Borrar">\
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
            function deletePeriod($id,$name)
            {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: '¿Está seguro de eliminar el voluntario?',
                    text: "El nombre del Voluntario: "+$name,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'No, cancelar!',
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
                            window.location.href = $url_path+"/administration/teacher/delete/"+$id;
                            });
                    } else if (
                    result.dismiss === Swal.DismissReason.cancel
                    ) {
                    swalWithBootstrapButtons.fire({
                        title: 'Cancelado!',
                        text:  'La Voluntario no ha sido eliminada!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    })
                    }
                })
            }

       </script>

      
	@stop