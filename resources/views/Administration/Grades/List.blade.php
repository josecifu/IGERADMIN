@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Tablero
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
                    <h3 class="card-label">Listado de grados y cursos del nivel {{$level}} del dia {{$period}}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i>Exportar</button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav flex-column nav-hover">
                                <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Elija una opción:</li>
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
                    <a href="{{url('administration/student/create')}}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Añadir un grado</a>
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
                                                        <td>{{$Model['Grade']}}</td>
                                                        <td>{{$Model['Section']}}</td>
                                                        <td>{{$Model['Lvl']}}</td>
                                                        <td >
                                                            @if($Model['Curses'])
                                                                @php
                                                                    $Courses=explode(";",$Model['Curses']);    
                                                                @endphp
                                                                <ul>
                                                                    @foreach($Courses as $Course)
                                                                        <li>{{$Course}}</li>    
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                            <p style="text-align: center;">  Ningun curso asignado a este grado</p>
                                                               
                                                            @endif

                                                        </td>
                                                        @if($Model['NoTeachers']!=0)
                                                            <td><center><button type="button" class="btn btn-outline-info"  data-toggle="modal" data-target="#kt_select_modal{{$Model['Id']}}">{{$Model['NoTeachers']}}</button></center></td>
                                                        @else
                                                            <td><center><button type="button" disabled class="btn btn-outline-info"   data-toggle="tooltip" title="Ver voluntarios asignados" data-placement="left">{{$Model['NoTeachers']}}</button></center></td>
                                                        @endif
                                                        <td nowrap="nowrap"></td>
                                                    </tr>
                                                    <!--begin::Modal-->
                                                    <div class="modal fade" id="CoursesModal{{$Model['Id']}}" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Añadir cursos a {{$Model['Grade']}}  {{$Model['Lvl']}} {{$Model['Section']}}</h5>
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
                                                                                  
                                                                                </select>
                                                                                <span class="form-text text-muted">Visualice los grados del nivel seleccionado</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Seleccione el nivel</label>
                                                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                <select class="form-control selectpicker" data-size="10" data-live-search="true" id="lvlselect{{$Model['Id']}}">
                                                                                  
                                                                                </select>
                                                                                <span class="form-text text-muted">Visualice los grados del nivel seleccionado</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-primary mr-2" onclick="ViewGrades({{$Model['Id']}});">Editar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Modal-->
                                                    <!--begin::Modal-->
                                                    <div class="modal fade" id="EditModal{{$Model['Id']}}" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Editar  {{$Model['Grade']}}  {{$Model['Lvl']}} {{$Model['Section']}}</h5>
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
                                                                                  
                                                                                </select>
                                                                                <span class="form-text text-muted">Visualice los grados del nivel seleccionado</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Seleccione el nivel</label>
                                                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                <select class="form-control selectpicker" data-size="10" data-live-search="true" id="lvlselect{{$Model['Id']}}">
                                                                                  
                                                                                </select>
                                                                                <span class="form-text text-muted">Visualice los grados del nivel seleccionado</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-primary mr-2" onclick="ViewGrades({{$Model['Id']}});">Editar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Modal-->
                                                    <!--begin::Modal-->
                                                    <div class="modal fade" id="kt_select_modal{{$Model['Id']}}" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Visualizar grados del dia {{$Model['Id']}}</h5>
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
                                                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#CoursesModal'+full[0]+'"><i class="nav-icon la la-mail-reply-all"></i><span class="nav-text" style="padding-left:10px;"> Agregar cursos a el grado</span></a></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                        <a href="javascript:;" data-toggle="modal" data-target="#EditModal'+full[0]+'"  class="btn btn-sm btn-clean btn-icon" >\
                                            <i class="la la-edit"></i>\
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

      
       
        function ViewTeachers($lvl)
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
                        title: 'Ingrese el nuevo nombre del grado:',
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