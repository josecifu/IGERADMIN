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
                                            <h3 class="card-label">
                                            <i class="mr-2"></i>
                                            <small class=""></small></h3>
                                        </div>
                                        <div class="card-toolbar">
                                            <a href="#" class="btn btn-light-primary font-weight-bolder mr-2">
                                            <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary font-weight-bolder" onclick="crearDatos();">
                                                <i class="ki ki-check icon-sm"></i>Guardar Permiso</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="nav nav-hover flex-column">
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon flaticon2-reload"></i>
                                                                <span class="nav-text">Save &amp; continue</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon flaticon2-add-1"></i>
                                                                <span class="nav-text">Save &amp; add new</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon flaticon2-power"></i>
                                                                <span class="nav-text">Save &amp; exit</span>
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
                                                        <h3 class="text-dark font-weight-bold mb-10">Información del Permiso:</h3>
                                                        <div class="form-group row">
                                                            <label class="col-3">Nombre del permiso</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <input type="text" id="Permiso" class="form-control form-control-solid" placeholder="Nombre" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-3">Slug</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <input type="text" id="Slug" class="form-control form-control-solid" placeholder="Slug" />
                                                                </div>
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
            var NombrePermiso = $('#Permiso').val(); 
            var Slug = $('#Slug').val();
            var data = [{
                Nombre: NombrePermiso,
                Slug: Slug,
            }];

            $.ajax({
                url:'/guardar/permiso',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":data},
                dataType: "JSON",
                success: function(e){
                swal.fire({ title: "Accion completada", 
                  text: "Se ha guardado con exito el Permiso!", 
                  type: "success"
                        }).then(function () {
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/permisos/listado";
                        });
                     
                },
                error: function(e){
                    console.log(e);
                }
            });
         }
    </script>
	@stop