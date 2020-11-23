@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Nuevo
    @stop
    @section('breadcrumb2')
    Estudiante
    @stop
    {{-- Page content --}}
    @section('content')
    	<link href="{{ asset('assets/css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" />
        <div class="content flex-column-fluid" id="kt_content">
			<div class="card-header">
                <div class="card-toolbar">
                    <a href="{{url('administration/student/list')}}" class="btn btn-danger font-weight-bolder mr-2">Cancelar</a>
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
										<h3 class="wizard-title">Información personal</h3>
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
										<h3 class="wizard-title">Información de usuario</h3>
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
										<h3 class="wizard-title">Asignación de grado</h3>
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
										<h1>Ingrese los datos personales del estudiante</h1>
										<div class="my-5">
											<div class="form-group row">
												<label class="col-3">Nombres</label>
												<div class="col-9">
													<div class="input-group input-group-solid">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="la la-user"></i>
															</span>
														</div>
														<input type="text"name="Nombres" id="Nombres" class="form-control form-control-solid" placeholder="Nombre"/>
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
														<input type="text" name="Apellidos" id="Apellidos" class="form-control form-control-solid" placeholder="Apellido"/>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-3">No. Teléfono</label>
												<div class="col-9">
													<div class="input-group input-group-solid">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="la la-phone"></i>
															</span>
														</div>
														<input type="text" name="Telefono" id="Telefono" class="form-control form-control-solid" placeholder="Phone"/>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-3">Género</label>
												<div class="col-9 col-form-label">
													<div class="radio-inline">
														<label class="radio radio-primary">
														<input type="radio" id="Genero" name="radios5"/>
														<span></span>Femenino</label>
														<label class="radio radio-primary">
														<input type="radio" id="Sexo" name="radios5"/>
														<span></span>Masculino</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--end::Wizard Step 1-->
									<!--begin::Wizard Step 2-->
									<div class="pb-5" data-wizard-type="step-content">
										<h1>Ingrese los datos del usuario</h1>
										<div class="my-5">
											<div class="form-group row">
												<label class="col-3">Nombre de usuario</label>
												<div class="col-9">
													<div class="input-group input-group-solid">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="la la-user"></i>
															</span>
														</div>
														<input type="text" name="Usuario" id="Usuario" class="form-control form-control-solid" placeholder="Usuario"/>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-3">Correo electrónico</label>
												<div class="col-9">
													<div class="input-group input-group-solid">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="la la-at"></i>
															</span>
														</div>
														<input type="email" name="Email" id="Email" class="form-control form-control-solid" placeholder="Correo electronico"/>
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
														<input type="password" name="Contraseña" id="Contraseña" class="form-control form-control-solid" placeholder="Contraseña"/>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--end::Wizard Step 2-->
									<!--begin::Wizard Step 3-->
									<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
										<h1>Ingrese los datos de asignación</h1>
										<div class="my-5">
											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12">Circulo de estudio</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<select class="form-control selectpicker" data-size="10" title="--Seleccione una opción" data-live-search="true" id="Jornada">
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12">Nivel</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<select class="form-control" id="Nivel" name="Nivel">
													</select>
												</div>
											</div>	
											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12">Grado</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<select class="form-control" id="Grado" name="Grado">
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
											<button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Guardar Registro</button>
											<button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Siguiente</button>
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
		<!--begin::Page Scripts(used by this page)-->
		<script type="text/javascript">
			"use strict";
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
									Nombre: {
										validators: {
											notEmpty: {
												message: 'Es un campo obligatorio'
											}
										}
									},
									Apellido: {
										validators: {
											notEmpty: {
												message: 'Es un campo obligatorio'
											}
										}
									},
									Telefono: {
										validators: {
											notEmpty: {
												message: 'Es un campo obligatorio'
											}
										}
									},
									Genero: {
										validators: {
											notEmpty: {
												message: 'Es un campo obligatorio'
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
												message: 'Es un campo obligatorio'
											}
										}
									},						
									Contraseña: {
										validators: {
											notEmpty: {
												message: 'Es un campo obligatorio'
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
								text: "Por favor complete el registro!",
								icon: "success",
								showCancelButton: true,
								buttonsStyling: false,
								confirmButtonText: "Guardar",
								cancelButtonText: "Cancelar",
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
				jQuery(document).ready(function (){
					KTWizard1.init();
				});
		</script>
        <script type="text/javascript">
        	$( document ).ready(function(){
          		$.ajaxSetup({
                	headers: {
                    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                	}
            	}); 
         	});
	         function crearDatos(){
	            var NombrePersona = $('#Nombres').val();
	            var ApellidosPersona = $('#Apellidos').val();
	            var TelefonoPersona = $('#Telefono').val();
	            var GeneroPersona = $('#Genero').is(":checked");
	            var UsuarioPersona = $('#Usuario').val();
	            var EmailPersona = $('#Email').val();
	            var ContraseñaPersona = $('#Contraseña').val();
				var AsignarGrado = $('#Grado').val();
	            var data = [{
	                Nombre: NombrePersona,
	                Apellido: ApellidosPersona,
	                Telefono: TelefonoPersona,
	                Genero: GeneroPersona,
	                Usuario: UsuarioPersona,
	                Correo: EmailPersona,
	                Contraseña: ContraseñaPersona,
	                Grado: AsignarGrado,
	            }];
	            $.ajax({
	                url:'/administration/student/save',
	                type:'POST',
	                data: {"_token":"{{ csrf_token() }}","data":data},
	                dataType: "JSON",
	                success: function(e){
	                swal.fire({ title: "Accion completada", 
	                  text: "Se ha guardado con exito los datos del estudiante!", 
	                  type: "success"
	                        }).then(function () {
	                          var $url_path = '{!! url('/') !!}';
	                          window.location.href = $url_path+"/administration/student/list";
	                        });
	                },
	                error: function(e){
						console.log(e);
						swal.fire({
							title: 'Ocurrio un error!',
							text:  'Los datos no han sido registrados!, verifique los campos',
							icon: 'error',
							confirmButtonText: 'Aceptar',
	                    })
	                }
	            });
			 }
			 $.ajax ({
				url: '{{route('LoadPeriods')}}',
				type: 'GET',
				success: (e) => {
					$('#Jornada').empty();
					$.each(e['Periods'], function(fetch, data){
					  $('#Jornada').append('<option value="'+data.Id+'" >'+data.Name+'</option>');
					});
					$('#Jornada').selectpicker('refresh');
				}
			});
			function ListLevel(Period){
				$.ajax ({
					url: '{{route('LoadLevels')}}',
					type: 'POST',
					data: {
						"_token": "{{ csrf_token() }}",
						"PeriodId"      : Period,
					},
					success: (e) => {
						$('#Nivel').empty();
						$('#Nivel').append('<option value="" >--Seleccione una opción</option>');
						$.each(e['Levels'], function(fetch, data){
							$('#Nivel').append('<option value="'+data.Id+'" >'+data.Name+'</option>');
						});
						$('#Nivel').selectpicker('refresh');
					}
				});	
			}
			function ListGrades(Level){
				$.ajax ({
					url: '{{route('LoadGrades')}}',
					type: 'POST',
					data: {
						"_token": "{{ csrf_token() }}",
						"LvlId"      : Level,
					},
					success: (e) => {
						$('#Grado').empty();
						$('#Grado').append('<option value="" >--Seleccione una opción</option>');
						$.each(e['Grades'], function(fetch, data){
						$('#Grado').append('<option value="'+data.Id+'" >'+data.Name+'</option>');
						});
						$('#Grado').selectpicker('refresh');
					}
				});
			}
			$('#Jornada').on('change', function() {
				ListLevel($('#Jornada').val());
			});
			$('#Nivel').on('change', function() {
				ListGrades($('#Nivel').val());
			});
	    </script>
	@stop
