@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Listado/Logs
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
                        <h3 class="card-label">Registro de actividades del módulo estudiante</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="card-header">
                            <div class="card-toolbar">
                                <a href="{{url('administration/student/list')}}" class="btn btn-danger font-weight-bolder mr-2">
                                <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                            </div>
                        </div>
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" style="color: white;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"  style="color: white;" ></i>Exportar</button>
                            @include("Administration.Base._exports")
                        </div>
                        <!--end::Dropdown-->
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
                                <td>{{$model['responsible']}}</td>
                                <td>{{$model['activity']}}</td>
                                <td>
                                    <span class="label label-{{$model['color']}} label-pill label-inline mr-2" style="height: 100%;width: 100%" >{{$model['type']}}</span>
                                </td>
                                <td>{{$model['datatime']}}</td>
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