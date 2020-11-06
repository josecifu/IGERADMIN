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
    <link href="{{ asset('assets/css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" />
				<div class="content flex-column-fluid" id="kt_content">
						<div class="card-header">
							<div class="card-toolbar">
								<a href="{{url('administration/teacher/list')}}" class="btn btn-danger font-weight-bolder mr-2">
								<i class="ki ki-long-arrow-back icon-sm"></i>Cancelar</a>
							</div>
						</div>
					<div class="card card-custom">
						<div class="card-body p-0">
							<!--begin::Wizard-->
							<div class="wizard wizard-1" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
								<!--begin::Wizard Nav-->
								<div class="wizard-nav border-bottom">
									<div class="wizard-steps p-8 p-lg-10">
										<!--begin::Wizard Step 1 Nav-->
										<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
											<div class="wizard-label">
												<i class="wizard-icon flaticon-list"></i>
												<h3 class="wizard-title">1. Información de la persona</h3>
											</div>
											<span class="svg-icon svg-icon-xl wizard-arrow">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<!--end::Wizard Step 1 Nav-->
										<!--begin::Wizard Step 2 Nav-->
										<div class="wizard-step" data-wizard-type="step">
											<div class="wizard-label">
												<i class="wizard-icon flaticon-user"></i>
												<h3 class="wizard-title">2. Información Usuario</h3>
											</div>
											<span class="svg-icon svg-icon-xl wizard-arrow">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
														<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<!--end::Wizard Step 2 Nav-->
										<!--begin::Wizard Step 3 Nav-->
										<div class="wizard-step" data-wizard-type="step">
											<div class="wizard-label">
												<i class="wizard-icon flaticon-list"></i>
												<h3 class="wizard-title">3. Asginación de curso</h3>
											</div>
										</div>
										<!--end::Wizard Step 3 Nav-->
									</div>
								</div>
								<!--end::Wizard Nav-->
								<!--begin::Wizard Body-->
								<div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
									<div class="col-xl-12 col-xxl-7">
										<!--begin::Wizard Form-->
										<form class="form" id="kt_form">
											<!--begin::Wizard Step 1-->
											<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
												<h1>Detalle Persona:</h1>
												<div class="my-5">
													<div class="form-group row">
														<label class="col-3">Nombre</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-user"></i>
																	</span>
																</div>
																<input type="text"name="Nombres" id="Nombres" class="form-control form-control-solid" placeholder="Nombre" />
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
																<input type="text" name="Apellidos" id="Apellidos" class="form-control form-control-solid" placeholder="Apellido" />
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
																<input type="text" name="Direccion" id="Direccion" class="form-control form-control-solid" placeholder="Dirección" />
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
																<input type="text" name="Telefono" id="Telefono" class="form-control form-control-solid" placeholder="Phone" />
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
																<input type="date" name="FechaNacimiento" id="FechaNacimiento" class="form-control form-control-solid" placeholder="Phone" />
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--end::Wizard Step 1-->
											<!--begin::Wizard Step 2-->
											<div class="pb-5" data-wizard-type="step-content">
												<h1>Detalle Usuario:</h1>
												<div class="my-5">
													<div class="form-group row">
														<label class="col-3">Usuario</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-user"></i>
																	</span>
																</div>
																<input type="text" name="Usuario" id="Usuario" class="form-control form-control-solid" placeholder="Usuario" />
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
																<input type="email" name="Email" id="Email" class="form-control form-control-solid" placeholder="Correo electronico" />
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
																<input type="password" name="Contraseña" id="Contraseña" class="form-control form-control-solid" placeholder="Contraseña" />
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--end::Wizard Step 2-->
											<!--begin::Wizard Step 3-->
											<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
												<h1>Detalle Asignación:</h1>
												<div class="my-5">
													<div class="form-group row">
														<label class="col-form-label text-right col-lg-3 col-sm-12">Jornada</label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<select class="form-control" id="Jornada" name="Jornada">
																	<option value="" >--Seleccione una opcion</option>
																	@foreach($Jornadas as $jornada)
																		<option value="{{$jornada->id}}" >{{$jornada->Name}}</option>
																	@endforeach
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label text-right col-lg-3 col-sm-12">Nivel</label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<select class="form-control" id="Nivel" name="Nivel">
																	<option value="" >--Seleccione una opcion</option>
																	@foreach($Niveles as $nivel)
																		<option value="{{$nivel->id}}" >{{$nivel->Name}}</option>
																	@endforeach
															</select>
														</div>
													</div>	
													<div class="form-group row">
														<label class="col-form-label text-right col-lg-3 col-sm-12">Grado</label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<select class="form-control" id="Grado" name="Grado">
																	<option value="" >--Seleccione una opcion</option>
																	@foreach($Grados as $grado)
																		<option value="{{$grado->id}}" >{{$grado->Name}}</option>
																	@endforeach
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label text-right col-lg-3 col-sm-12">Curso</label>
														<div class="col-lg-9 col-md-9 col-sm-12">
															<select class="form-control" id="Curso" name="Curso" multiple="multiple">
																<optgroup Label="Cursos">
																@foreach($Cursos as $curso)
																	<option value="{{$curso->id}}" >{{$curso->Name}}</option>
																@endforeach
																</optgroup>
															</select>
														</div>
													</div>															
												</div>
											</div>
											<!--end::Wizard Step 3-->
											<!--begin::Wizard Actions-->
											<div class="d-flex justify-content-between border-top mt-5 pt-10">
												<div class="mr-2">
													<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Anterior</button>
												</div>
												<div>
													<button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Registrar</button>
													<button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Siguiente</button>*
												</div>
											</div>
											<!--end::Wizard Actions-->
										</form>
										<!--end::Wizard Form-->
									</div>
								</div>
								<!--end::Wizard Body-->
							</div>
							<!--end::Wizard-->
						</div>
						<!--end::Wizard-->
					</div>
				</div>
	@stop
    @section('scripts')
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#8950FC", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#EEE5FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script type="text/javascript">
			"use strict";
		// multi select
		$('#Curso').select2({
         placeholder: "Select a state"
        });

// Class definition
var KTWizard1 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initValidation = function () {
			// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
			// Step 1
			_validations.push(FormValidation.formValidation(
				_formEl,
				{
					fields: {
						Nombres: {
							validators: {
								notEmpty: {
									message: 'Los nombres son requeridos'
								}
							}
						},
						Apellidos: {
							validators: {
								notEmpty: {
									message: 'Los apellidos son requeridos'
								}
							}
						},
						Direccion: {
							validators: {
								notEmpty: {
									message: 'La direccion es requerida'
								}
							}
						},
						Telefono: {
							validators: {
								notEmpty: {
									message: 'El telefono es requerido'
								}
							}
						},
						FechaNacimiento: {
							validators: {
								notEmpty: {
									message: 'La fecha es requerida'
								}
							}
						},
					},
					plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						// Bootstrap Framework Integration
						bootstrap: new FormValidation.plugins.Bootstrap({
							//eleInvalidClass: '',
							eleValidClass: '',
						})
					}
				}
			));
			// Step 2
			_validations.push(FormValidation.formValidation(
				_formEl,
				{
					fields: {
						Usuario: {
							validators: {
								notEmpty: {
									message: 'El usuario es requerido'
								}
							}
						},
						Contraseña: {
							validators: {
								notEmpty: {
									message: 'La contraseña es requerida'
								}
							}
						},
						Email: {
							validators: {
								notEmpty: {
									message: 'El correo es requerido'
								}
							}
						},
					},
					plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						// Bootstrap Framework Integration
						bootstrap: new FormValidation.plugins.Bootstrap({
							//eleInvalidClass: '',
							eleValidClass: '',
						})
					}
				}
			));
		}

		var _initWizard = function () {
			// Initialize form wizard
			_wizardObj = new KTWizard(_wizardEl, {
				startStep: 1, // initial active step number
				clickableSteps: false  // allow step clicking
			});

			// Validation before going to next page
			_wizardObj.on('change', function (wizard) {
				if (wizard.getStep() > wizard.getNewStep()) {
					return; // Skip if stepped back
				}

				// Validate form before change wizard step
				var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

				if (validator) {
					validator.validate().then(function (status) {
						if (status == 'Valid') {
							wizard.goTo(wizard.getNewStep());

							KTUtil.scrollTop();
						} else {
							Swal.fire({
								text: "Porfavor completar los campos requeridos",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, lo tengo!",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light"
								}
							}).then(function () {
								KTUtil.scrollTop();
							});
						}
					});
				}

				return false;  // Do not change wizard step, further action will be handled by he validator
			});

			// Change event
			_wizardObj.on('changed', function (wizard) {
				KTUtil.scrollTop();
			});

			// Submit event
			_wizardObj.on('submit', function (wizard) {
				Swal.fire({
					text: "Todo esta bien! por favor confirme el registro.",
					icon: "success",
					showCancelButton: true,
					buttonsStyling: false,
					confirmButtonText: "Si, Enviar!",
					cancelButtonText: "No, Cancelar",
					customClass: {
						confirmButton: "btn font-weight-bold btn-primary",
						cancelButton: "btn font-weight-bold btn-default"
					}
				}).then(function (result) {
					if (result.value) {
						crearDatos(); // Submit form
					} else if (result.dismiss === 'cancel') {
						Swal.fire({
							text: "Los datos no fueron registrados!.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, lo tengo!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-primary",
							}
						});
					}
				});
			});
		}

		return {
			// public functions
			init: function () {
				_wizardEl = KTUtil.getById('kt_wizard');
				_formEl = KTUtil.getById('kt_form');
				_initValidation();
				_initWizard();
			}
		};
	}();

	jQuery(document).ready(function () {
		KTWizard1.init();
	});


		</script>

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
            var NombrePersona = $('#Nombres').val(); 
            var ApellidosPersona = $('#Apellidos').val();
            var DireccionPersona = $('#Direccion').val();
            var TelefonoPersona = $('#Telefono').val();
            var FechaNacimientoPersona = $('#FechaNacimiento').val();
            var UsuarioPersona = $('#Usuario').val(); 
            var ContraseñaPersona = $('#Contraseña').val();
            var EmailPersona = $('#Email').val();
			var Curso = $('#Curso').val();
			var Grado = $('#Grado').val();
			var Nivel = $('#Nivel').val();
			var Jornada = $('#Jornada').val();
            var data = [{
                //Persona
				Curso: Curso,
				Grado: Grado,
				Nivel: Nivel,
				Jornada: Jornada,
                Nombre: NombrePersona,
                Apellido: ApellidosPersona,
                Direccion: DireccionPersona,
                Telefono: TelefonoPersona,
                FechaNacimiento: FechaNacimientoPersona,
                //Usuario
                Usuario: UsuarioPersona,
                Email: EmailPersona,
                Contraseña: ContraseñaPersona,
            }];

            $.ajax({
                url:'/administration/teacher/save',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":data},
                dataType: "JSON",
                success: function(e){
                swal.fire({ title: "Accion completada", 
                  text: "Se ha guardado con exito el Voluntario!", 
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