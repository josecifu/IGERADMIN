@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Jornadas y niveles
    @stop
    @section('breadcrumb1')
    Niveles
    @stop
    @section('breadcrumb2')
    Listado
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
                                            <h3 class="card-label">Listado de Asignaciones de Jornadas y niveles</h3>
                                        </div>
                                        <div class="card-toolbar">
                                            <!--begin::Dropdown-->
                                            <div class="dropdown dropdown-inline mr-2" >
                                                <button type="button" style="color: white;" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-download" style="color: white;"></i>Exportar</button>
                                                <!--begin::Dropdown Menu-->
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right ">
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
                                            <!--begin::Button-->
                                            <a href="#" onclick="create();" class="btn btn-primary font-weight-bolder">
                                            <i class="la la-plus"></i>Crear una jornada</a>
                                            <!--end::Button-->
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
                                                @if($Models)
                                                    @foreach($Models as $Model)
                                                    <tr>
                                                        <td>{{$Model['Id']}}</td>
                                                        <td>{{$Model['Jornada']}}</td>
                                                        <td>{{$Model['Niveles']}}</td>
                                                        @if($Model['Grados']!=0)
                                                        <td><center><button type="button" class="btn btn-outline-info" data-toggle="tooltip" title="Ver grados asignados" data-placement="left">{{$Model['Grados']}}</button></center></td>
                                                        @else
                                                        <td><center><button type="button" disabled class="btn btn-outline-info" data-toggle="tooltip" title="Ver grados asignados" data-placement="left">{{$Model['Grados']}}</button></center></td>
                                                        @endif
                                                        <td nowrap="nowrap"></td>
                                                    </tr>
                                                    <!--begin::Modal-->
                                                    <div class="modal fade" id="kt_select_modal{{$Model['Id']}}" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Visualizar grados de la jornada {{$Model['Jornada']}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <form class="form">
                                                                    <div class="modal-body">
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Seleccione el nivel</label>
                                                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                <select class="form-control selectpicker" data-size="10" data-live-search="true" id="lvlselect{{$Model['Id']}}">
                                                                                    @php
                                                                                    $lvls = explode(',',$Model['Niveles']);
                                                                                    $idlvs = explode(',',$Model['idLvl']);  
                                                                                    @endphp
                                                                                    @foreach($lvls as $key => $lvl)
                                                                                    <option value="{{ $idlvs[$key]}} ">{{$lvl}} </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <span class="form-text text-muted">Visualice los grados del nivel seleccionado</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-primary mr-2" onclick="ViewGrades({{$Model['Id']}});">Visualizar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Modal-->
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

        <!--begin::Page Vendors(used by this page)-->
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
        <!--end::Page Vendors-->
        <!--begin::Page Scripts(used by this page)-->

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
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" >\
                                                <ul class="nav nav-hoverable flex-column" >\
                                                    <li class="nav-item"><a class="nav-link" href="#" ><i class="nav-icon la la-mail-reply-all"></i><span class="nav-text" style="padding-left:10px;"> Agregar un nivel a la jornada</span></a></li>\
                                                    <li class="nav-item"><a class="nav-link" href="#" ><i class="nav-icon la la-plus-square-o"></i><span class="nav-text" style="padding-left:10px;"> Agregar un grado a un nivel de la jornada</span></a></li>\
                                                    <li class="nav-item"><a class="nav-link" href="#" class="btn btn-light-success font-weight-bold" data-toggle="modal" data-target="#kt_select_modal'+full[0]+'"><i class="nav-icon la la-search"></i><span class="nav-text" style="padding-left:10px;"> Ver grados asignados</span></a></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                        <a href="javascript:;" onclick="edit(\''+full[0]+'\',\''+full[1]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" title="Editar jornada" data-placement="left">\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        @if($type=="Active")
                                        <a href="javascript:;" onclick="deletePeriod(\''+full[0]+'\',\''+full[1]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" title="Eliminar jornada" data-placement="left">\
                                        <i class="la la-trash"></i>\
                                        </a>\
                                        @else
                                        <a href="javascript:;" onclick="ActivePeriod(\''+full[0]+'\',\''+full[1]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" title="Activar jornada" data-placement="left">\
                                        <i class="la la-check-circle"></i>\
                                        </a>\
                                        @endif';
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
                title: '¿Está seguro de eliminar la jornada?',
                text: "El nombre de la jornada: "+$name,
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
                          window.location.href = $url_path+"/administration/configurations/level/list/change/"+$id+"/delete";
                        });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire({
                    title: 'Cancelado!',
                    text:  'La jornada no ha sido eliminada!',
                    icon: 'error',
                    confirmButtonText: 'Aceptar',
                })
                }
              })
        }
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
                title: '¿Está seguro de activar la jornada?',
                text: "El nombre de la jornada: "+$name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, activar!',
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
                        title: 'Activada!',
                        text: 'Se ha activado con exito!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    }).then(function () {
                           
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/administration/configurations/level/list/change/"+$id+"/active";
                        });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire({
                    title: 'Cancelado!',
                    text:  'La jornada no ha sido activada!',
                    icon: 'error',
                    confirmButtonText: 'Aceptar',
                })
                }
              })
        }
        function ViewGrades($lvl)
        {
            var lvl = $('#lvlselect'+$lvl).val();
            var $url_path = '{!! url('/') !!}';
            window.location.href = $url_path+"/administration/configurations/level/list/grades/level/"+lvl;
        }
        function edit($id,$Name)
        {
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Siguiente  &rarr;',
                showCancelButton: true,
                progressSteps: ['1',]
            }).queue([
                
                {
                        title: 'Ingrese el nuevo nombre de la jornada:',
                        text: 'Nombre anterior:' + $Name
                },
                ]).then((result) => {
                    if (result.value) {
                      const answers = JSON.stringify(result.value)
                      const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                          confirmButton: 'btn btn-success',
                          cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                      })
                      swalWithBootstrapButtons.fire({
                        title: '¿Está seguro de los datos?',
                        text: "El nombre de la jornada: "+result.value[0],
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Si, modificar!',
                        cancelButtonText: 'No, cancelar!',
                        reverseButtons: true
                      }).then((result2) => {
                        if (result2.isConfirmed) {
                            var Code = $id;
                            var data = [{
                                Code: Code,
                                Name: result.value[0],
                            }];
                
                            $.ajax({
                                url:'/administration/configurations/period/update',
                                type:'POST',
                                data: {"_token":"{{ csrf_token() }}","data":data},
                                dataType: "JSON",
                                success: function(e){
                                    swalWithBootstrapButtons.fire({
                                        title: 'Modificado!',
                                        text: 'Se ha modificado con exito!',
                                        icon: 'success',
                                        confirmButtonText: 'Aceptar',
                                    }).then(function () {
                                           
                                          var $url_path = '{!! url('/') !!}';
                                          window.location.href = $url_path+"/administration/configurations/level/list";
                                        });
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
                            text:  'La jornada no ha sido modificada!',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                        }
                      })
                    }
                  })
        }
        function create()
        {
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Siguiente  &rarr;',
                showCancelButton: true,
                progressSteps: ['1']
              }).queue([
                {
                  title: 'Ingrese el nombre de la jornada:',
                 
                }
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
                    text: "El nombre de la jornada: "+result.value[0],
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, crearlo!',
                    cancelButtonText: 'No, cancelar!',
                    reverseButtons: true
                  }).then((result2) => {
                    if (result2.isConfirmed) {
                        var data = [{
                            //Usuario
                            Name: result.value[0],
                        }];
            
                        $.ajax({
                            url:'/administration/configurations/period/save',
                            type:'POST',
                            data: {"_token":"{{ csrf_token() }}","data":data},
                            dataType: "JSON",
                            success: function(e){
                                swalWithBootstrapButtons.fire({
                                    title: 'Creado!',
                                    text: 'Se ha creado con exito!',
                                    icon: 'success',
                                    confirmButtonText: 'Aceptar',
                                }).then(function () {
                                       
                                      var $url_path = '{!! url('/') !!}';
                                      window.location.href = $url_path+"/administration/configurations/level/list";
                                    });
                                 
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
                        text:  'La jornada no ha sido creada!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    })
                    }
                  })
                }
              })
        }

       </script>
        <!--end::Page Scripts-->
	@stop