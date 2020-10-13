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
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary font-weight-bolder" onclick="crearDatos();">
                                                <i class="ki ki-check icon-sm"></i>Guardar Usuario</button>
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
                                                        <h3 class="text-dark font-weight-bold mb-10">Información del usuario:</h3>
                                                        <div class="form-group row">
                                                            <label class="col-3">Usuario</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-user"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" id="Usuario" class="form-control form-control-solid" placeholder="Usuario" />
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
                                                                    <input type="email" id="Email" class="form-control form-control-solid" placeholder="Correo electronico" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-3">Contraseña</label>
                                                            <div class="col-9">
                                                                <div class="input-group input-group-solid">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="la la-key"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="password" id="Contraseña" class="form-control form-control-solid" placeholder="Contraseña" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-3">Persona</label>
                                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                                <select class="form-control" id="Persona">
                                                                @if(count($personas)>0)
                                                                    @foreach($personas->all() as $person) 
                                                                        <option value="{{$person->id}}">{{$person->Names}} {{$person->LastNames}}</option>
                                                                    @endforeach
                                                                @endif
                                                                </select>
                                                                <span class="form-text text-muted">Profavor seleccione una opcion.</span>
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
            var UsuarioPersona = $('#Usuario').val(); 
            var ContraseñaPersona = $('#Contraseña').val();
            var PersonaID = $('#Persona').val();
            var EmailPersona = $('#Email').val();
            var data = [{
                Usuario: UsuarioPersona,
                Email: EmailPersona,
                Contraseña: ContraseñaPersona,
                Persona: PersonaID,
            }];

            $.ajax({
                url:'/guardar/usuario',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":data},
                dataType: "JSON",
                success: function(e){
                swal.fire({ title: "Accion completada", 
                  text: "Se ha guardado con exito el Usuario!", 
                  type: "success"
                        }).then(function () {
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/personas/listado";
                        });
                     
                },
                error: function(e){
                    console.log(e);
                }
            });
         }
    </script>
	@stop