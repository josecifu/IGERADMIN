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
        <div class="card-header">
            <div class="card-toolbar">
                <a href="{{url('administration/configurations/level/list')}}" class="btn btn-danger font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
            </div>
        </div>
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-favourite text-primary"></i>
                    </span>
                    <h3 class="card-label">Listado de grados y cursos del nivel {{$level}} del dia {{$period}} </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2" >
                        <button type="button" style="color:white;" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download" style="color:white;"></i>Exportar</button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" >
                            <ul class="nav flex-column nav-hover" >
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
                    <a href="#" onclick="create();"class="btn btn-primary font-weight-bolder">
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
                                                                    <h5 class="modal-title">Añadir cursos a {{$Model['Grade']}}  {{$Model['Lvl']}} </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <form class="form">
                                                                    <div class="modal-body">
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Ingrese el nombre de los cursos</label>
                                                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                                             <select class="form-control select2" id="CoursesList{{$Model['Id']}}" multiple name="param">
                                                                              <option label="Label"></option>
                                                                           
                                                                           
                                                                             </select>
                                                                            </div>
                                                                           </div>
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-primary mr-2" onclick="AddCourses({{$Model['Id']}});">Agregar cursos</button>
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
                                                                    <h5 class="modal-title">Editar  {{$Model['Grade']}}  {{$Model['Lvl']}} </h5>
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
                                                    <!--begin::Modal-->
                                                    <div class="modal fade" id="kt_delete_course_modal{{$Model['Id']}}" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Seleccione el curso que desea eliminar del grado: {{$Model['Grade']}} {{$Model['Lvl']}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <form class="form">
                                                                    <div class="modal-body">
                                                                        <div class="form-group row">
                                                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Seleccione la curso:</label>
                                                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                                                <select class="form-control selectpicker" title="Seleccione un curso" data-size="10" data-live-search="true" id="courseselectdelete{{$Model['Id']}}">
                                                                                    
                                                                                </select>
                                                                                <span class="form-text text-muted">Seleccione el curso que desea eliminar</span>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-danger mr-2" onclick="DeleteCourse({{$Model['Id']}},'{{$Model['Grade']}}');">Eliminar curso</button>
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
                                                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#CoursesModal'+full[0]+'"><i class="nav-icon la la-mail-reply-all"></i><span class="nav-text" style="padding-left:10px;"> Agregar cursos al grado</span></a></li>\
                                                    <li class="nav-item"><a class="nav-link" href="javascript:;"data-toggle="modal" data-target="#kt_delete_course_modal'+full[0]+'" onclick="ListCourse(\''+full[0]+'\')"><i class="nav-icon la la-trash"></i><span class="nav-text" style="padding-left:10px;"> Eliminar un curso</span></a></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                        <a href="javascript:;" onclick="EditGrade(\''+full[0]+'\',\''+full[1]+'\')"  class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" title="Modificar Grado" data-placement="left">\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        @if($type=="Active")
                                        <a href="javascript:;" onclick="deleteGrade(\''+full[0]+'\',\''+full[1]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" title="Eliminar Grado" data-placement="left">\
                                        <i class="la la-trash"></i>\
                                        </a>\
                                        @else
                                        <a href="javascript:;" onclick="ActiveGrade(\''+full[0]+'\',\''+full[1]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" title="Activar Grado" data-placement="left">\
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

      
            function DeleteCourse($id,$name)
            {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                      confirmButton: 'btn btn-success',
                      cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                  })
                  var level = $("#courseselectdelete"+$id+ " option:selected").text();
                  var levelid = $("#courseselectdelete"+$id).val();
                  console.log(levelid);
                swalWithBootstrapButtons.fire({
                    title: '¿Está seguro de eliminar el curso?',
                    text: "El nombre del curso : "+level+" del grado :"+$name+", ¡se eliminaran todas las notas anexadas a este curso!.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, ¡eliminar!',
                    cancelButtonText: 'No, ¡cancelar!',
                    reverseButtons: true
                  }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire({
                            title: '¡Eliminado!',
                            text: '¡Se ha eliminado con exito!',
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                        }).then(function () {
                              var $url_path = '{!! url('/') !!}';
                              
                              window.location.href = $url_path+"/administration/configurations/level/list/change/"+levelid+"/deletecourse";
                            });
                    } else if (
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                      swalWithBootstrapButtons.fire({
                        title: 'Cancelado!',
                        text:  'El curso no ha sido eliminado!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    })
                    }
                  })
            }
        function ViewTeachers($lvl)
        {
            var lvl = $('#lvlselect'+$lvl).val();
            var $url_path = '{!! url('/') !!}';
            window.location.href = $url_path+"/administration/configurations/level/list/grades/level/"+lvl;
        }
        function EditGrade($id,$Name)
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
                        text: "El nombre del grado: "+result.value[0],
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
                                url:'/administration/configurations/grade/update',
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
                                          window.location.href = $url_path+"/administration/configurations/level/list/grades/level/{{$id}}";
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
                            text:  'El grado no ha sido modificado!',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                        }
                      })
                    }
                  })
        }
        function Addgrade($id)
        {
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Siguiente  &rarr;',
                showCancelButton: true,
                progressSteps: ['1']
              }).queue([
                {
                  title: 'Ingrese el nombre del nuevo grado:',
                 
                }
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
                    text: "El nombre del nivel : "+result.value[0],
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
                            id: $id,
                        }];
            
                        $.ajax({
                            url:'/administration/configurations/level/save',
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
                        text:  'El dia no ha sido creada!',
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
                  title: 'Ingrese el nombre del grado:',
                 
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
                    text: "El nombre del grado: "+result.value[0],
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
                            id:{{$id}}
                        }];
            
                        $.ajax({
                            url:'/administration/configurations/grade/save',
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
                                      window.location.href = $url_path+"/administration/configurations/level/list/grades/level/{{$id}}";
                                        
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
       
@foreach ($Models as $Model)
$('#CoursesModal{{$Model['Id']}}').on('shown.bs.modal', function () {
    $('#CoursesList{{$Model['Id']}}').select2({
        placeholder: "Añada los cursos para el grado",
        tags: true,
        "language": {
            "noResults": function(){
                return "Agrege cursos precionando la tecla enter";
            }
        },
    });  
});
@endforeach
function ListCourse(Grade) {
    $.ajax ({
        url: '{{route('LoadCourses')}}',
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            "GradeId"      : Grade,
        },
        success: (e) => {
            
            $('#courseselectdelete'+Grade).empty();
            $.each(e['Courses'], function(fetch, data) {
                $('#courseselectdelete'+Grade).append('<option value="'+data.Id+'" >'+data.Name+'</option>');
            });
            $('#courseselectdelete'+Grade).selectpicker('refresh');
        }
    });
}
         function AddCourses(id)
         {
            var courses = $('#CoursesList'+id).val();
            $.ajax({
                url:'/administration/configurations/level/list/grades/courses/save',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":courses,'Id':id},
                dataType: "JSON",
                success: function(e){
                    swal.fire({
                        title: 'Creado!',
                        text: 'Se ha creado con exito!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    }).then(function () {
                           
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/administration/configurations/level/list/grades/level/"+{{$id}};
                        });
                     
                },
                error: function(e){
                    swal.fire({
                        title: 'Cancelado!',
                        text:   e.responseJSON['error'],
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    })
                   
                }
            });
         }
         function deleteGrade($id,$name)
        {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })
            swalWithBootstrapButtons.fire({
                title: '¿Está seguro de eliminar el grado?',
                text: "El nombre del grado: "+$name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, ¡eliminar!',
                cancelButtonText: 'No, ¡cancelar!',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                    var Code = $id;
                    var data = [{
                        Code: Code,
                        Name: result.value[0],
                    }];
                    swalWithBootstrapButtons.fire({
                        title: '¡Eliminado!',
                        text: '¡Se ha eliminado con exito!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    }).then(function () {
                           
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/administration/configurations/level/list/change/"+$id+"/deletegrade";
                        });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire({
                    title: 'Cancelado!',
                    text:  'El grado no ha sido eliminado!',
                    icon: 'error',
                    confirmButtonText: 'Aceptar',
                })
                }
              })
        }
        function ActiveGrade($id,$name)
        {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })
            swalWithBootstrapButtons.fire({
                title: '¿Está seguro de activar el circulo de estudio?',
                text: "El nombre del dia: "+$name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, ¡activar!',
                cancelButtonText: 'No, ¡cancelar!',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                    var Code = $id;
                    var data = [{
                        Code: Code,
                        Name: result.value[0],
                    }];
                    swalWithBootstrapButtons.fire({
                        title: '¡Activada!',
                        text: '¡Se ha activado con exito!',
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
                    title: '¡Cancelado!',
                    text:  '¡El circulo de estudio no ha sido activado!',
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
        <!--end::Page Scripts-->
      
	@stop