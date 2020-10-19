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
    <!--begin::Card-->

                                <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="card-label">Sticky Form Actions
                                            <i class="mr-2"></i>
                                            <small class="">try to scroll the page</small></h3>
                                        </div>
                                        <div class="card-toolbar">
                                            <a href="#" class="btn btn-light-primary font-weight-bolder mr-2">
                                            <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary font-weight-bolder" onclick="crearDatos();">
                                                <i class="ki ki-check icon-sm"></i>Guardar Formulario</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="nav nav-hover flex-column">
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon flaticon2-reload"></i>
                                                                <span class="nav-text">Guardar &amp; Continuar</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon flaticon2-add-1"></i>
                                                                <span class="nav-text">Guardar &amp; Añadir Nuevo</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon flaticon2-power"></i>
                                                                <span class="nav-text">Guardar &amp; Salir</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--begin::Form-->
                                        <form class="form" id="kt_form" >
                                            <div class="row">
                                                <div class="col-xl-2"></div>
                                                <div class="col-xl-8">
                                                    <div class="my-5">
                                                        <h3 class="text-dark font-weight-bold mb-10">Información Requerida:</h3>
                                                        <div class="form-group row">
                                                            <label class="col-3">Rol</label>
                                                            <div class="col-9">
                                                                <select class="form-control form-control-solid">
                                                                    <option value="Admin">Administrador</option>
                                                                    <option value="Enc">Encargado de Circulo</option>
                                                                    <option value="Alum">Estudiante</option>
                                                                    <option value="Prof">Voluntarios</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="separator separator-dashed my-10"></div>
                                                </div>
                                                <div class="col-xl-2"></div>
                                            </div>
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                </div>
                                <!--end::Card-->
	@stop
	@section('scripts')

    <script type="text/javascript">
         $( document ).ready(function() {
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 
         });
         function crearDatos()
         {
            var NombreRol = $('#Nombres').val(); 
            var data = [{
                Nombre: NombreRol,
            }];
            $.ajax({
                url:'/Rol/insertar',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":data},
                dataType: "JSON",
                success: function(e){
                swal.fire({ title: "Accion completada", 
                  text: "Se ha guardado con exito el Rol!", 
                  type: "success"
                        }).then(function () {
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/Rol/listado";
                        });   
                },
                error: function(e){
                    console.log(e);
                }
            });
         }
    </script>
      
	@stop