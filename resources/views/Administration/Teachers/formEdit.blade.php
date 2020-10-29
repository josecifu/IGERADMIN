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
                                            <a href="{{url('administration/teacher/list')}}" class="btn btn-light-primary font-weight-bolder mr-2">
                                            <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary font-weight-bolder" onclick="crearDatos();">
                                                <i class="ki ki-check icon-sm"></i>Guardar Cambios</button>
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
                                                        <h3 class="text-dark font-weight-bold mb-10">Detalle Persona:</h3>
                                                        <div class="form-group row">
                                                            <label class="col-3">Nombre</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-user"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" id="Nombres" value="{{$ModelsP->Names}}" class="form-control form-control-solid" placeholder="Nombre" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-3">Apellidos</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-user"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" id="Apellidos" value="{{$ModelsP->LastNames}}" class="form-control form-control-solid" placeholder="Apellido" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-3">Direccion</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-address-book"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" id="Direccion" value="{{$ModelsP->Address}}" class="form-control form-control-solid" placeholder="Dirección" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-3">Teléfono</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-phone"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" id="Telefono" value="{{$ModelsP->Phone}}" class="form-control form-control-solid" placeholder="Phone" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-3">Fecha de nacimiento</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-calendar"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="date" id="FechaNacimiento" value="{{$ModelsP->BirthDate}}" class="form-control form-control-solid" placeholder="Phone" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="separator separator-dashed my-10"></div>
                                                    <div class="my-5">
                                                        <h3 class="text-dark font-weight-bold mb-10">Detalle Usuario:</h3>
                                                        <div class="form-group row">
                                                            <label class="col-3">Usuario</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-user"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" id="Usuario" value="{{$ModelsU['Usuario']}}" class="form-control form-control-solid" placeholder="Usuario" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-3">Correo Electronico</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-at"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="email" id="Email" value="{{$ModelsU['Email']}}" class="form-control form-control-solid" placeholder="Correo electronico" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <input type="hidden" value="{{$ModelsP->id}}" id="Persona">
                                                        </div>
                                                    </div>
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
         {var NombrePersona = $('#Nombres').val(); 
            var ApellidosPersona = $('#Apellidos').val();
            var DireccionPersona = $('#Direccion').val();
            var TelefonoPersona = $('#Telefono').val();
            var FechaNacimientoPersona = $('#FechaNacimiento').val();
            var UsuarioPersona = $('#Usuario').val(); 
            var ContraseñaPersona = $('#Contraseña').val();
            var PersonaID = $('#Persona').val();
            var EmailPersona = $('#Email').val();
            var data = [{
                //Usuario
                Usuario: UsuarioPersona,
                Email: EmailPersona,
                Contraseña: ContraseñaPersona,
                Persona: PersonaID,
                //PERSONA
                Nombre: NombrePersona,
                Apellido: ApellidosPersona,
                Direccion: DireccionPersona,
                Telefono: TelefonoPersona,
                FechaNacimiento: FechaNacimientoPersona,
            }];

            $.ajax({
                url:'/administration/teacher/update/{{$ModelsP->id}}',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":data},
                dataType: "JSON",
                success: function(e){
                swal.fire({ title: "Accion completada", 
                  text: "Datos Actualizados Exitosamente!", 
                  type: "success"
                        }).then(function () {
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/administration/teacher/list";
                        });
                     
                },
                error: function(e){
                    console.log(e);
                }
            });
         }
    </script>
      
	@stop