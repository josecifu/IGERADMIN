@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Voluntario
    @stop
    @section('breadcrumb1')
    Examenes
    @stop
    @section('breadcrumb2')
    Crear
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
												<h3 class="wizard-title">1. Datos generales del examen</h3>
											</div>
										</div>
										<!--end::Wizard Step 1 Nav-->
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
												<h1>Detalle Examen:</h1>
												<div class="my-5">
													<div class="form-group row">
														<label class="col-3">Titulo del Examen</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="fas fa-align-left"></i>
																	</span>
																</div>
																<input type="text" name="Titulo" id="Titulo" class="form-control form-control-solid" placeholder="Nombre" />
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-3">Punteo</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class=""></i>
																	</span>
																</div>
																<input type="number" name="Punteo" id="Punteo" class="form-control form-control-solid" placeholder="Apellido" />
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-3">Hora</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-phone"></i>
																	</span>
																</div>
																<input type="text" name="FI" id="FI" class="form-control form-control-solid" placeholder="Phone" />
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-3">Fecha de inicio</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="fas fa-clock"></i>
																	</span>
																</div>
																<input type="text" name="FI" id="FI" class="form-control form-control-solid" placeholder="Phone" />
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-3">Fecha de Final</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-phone"></i>
																	</span>
																</div>
																<input type="text" name="FF" id="FF" class="form-control form-control-solid" placeholder="Phone" />
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-3">Unidad</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-phone"></i>
																	</span>
																</div>
																<input type="text" name="Unidad" id="Unidad" class="form-control form-control-solid" placeholder="Phone" />
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-3">Numero de Preguntas</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<div class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="la la-phone"></i>
																	</span>
																</div>
																<input type="text" name="Unidad" id="Unidad" class="form-control form-control-solid" placeholder="Phone" />
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--end::Wizard Step 1-->
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
						Titulo: {
							validators: {
								notEmpty: {
									message: 'El Titulo es requerido'
								}
							}
						},
						Punteo: {
							validators: {
								notEmpty: {
									message: 'El punteo es requerido'
								}
							}
						},
						FechaInicio: {
							validators: {
								notEmpty: {
									message: 'La Fecha es requerida'
								}
							}
						},
						FechaFinal: {
							validators: {
								notEmpty: {
									message: 'La Fecha es requerida'
								}
							}
						},
						HoraInicio: {
							validators: {
								notEmpty: {
									message: 'La hora es requerida'
								}
							}
						},
						HoraFinal: {
							validators: {
								notEmpty: {
									message: 'La hora es requerida'
								}
							}
						},
						Unidad: {
							validators: {
								notEmpty: {
									message: 'La Unidad es requerida'
								}
							}
						},
						NoPreguntas: {
							validators: {
								notEmpty: {
									message: 'La cantidad de preguntas es requerida'
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
            var TelefonoPersona = $('#Telefono').val();
            var UsuarioPersona = $('#Usuario').val(); 
            var ContraseñaPersona = $('#Contraseña').val();
            var EmailPersona = $('#Email').val();
			var Curso = $('#Curso').val();
			var Grado = $('#Grado').val();
            var data = [{
                //Persona
				Curso: Curso,
				Grado: Grado,
                Nombre: NombrePersona,
                Apellido: ApellidosPersona,
                Telefono: TelefonoPersona,
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
		function ListLevel(Period)
		{
			$.ajax ({
				url: '{{route('LoadLevels')}}',
				type: 'POST',
				data: {
					"_token": "{{ csrf_token() }}",
					"PeriodId"      : Period,
				},
				success: (e) => {
					$('#Nivel').empty();
					$('#Nivel').append('<option value="" >--Seleccione una opcion</option>');
					$.each(e['Levels'], function(fetch, data){
						$('#Nivel').append('<option value="'+data.Id+'" >'+data.Name+'</option>');
					});
					$('#Nivel').selectpicker('refresh');
				}
			});	
		}
		function ListGrades(Level)
		{
			$.ajax ({
				url: '{{route('LoadGrades')}}',
				type: 'POST',
				data: {
					"_token": "{{ csrf_token() }}",
					"LvlId"      : Level,
				},
				success: (e) => {
					$('#Grado').empty();
					$('#Grado').append('<option value="" >--Seleccione una opcion</option>');
					$.each(e['Grades'], function(fetch, data){
					$('#Grado').append('<option value="'+data.Id+'" >'+data.Name+'</option>');
					});
					$('#Grado').selectpicker('refresh');
				}
			});
		}
		function ListCourses(Grade)
		{
			$.ajax ({
				url: '{{route('LoadCoursesTeacher')}}',
				type: 'POST',
				data: {
					"_token": "{{ csrf_token() }}",
					"GradeId"      : Grade,
				},
				success: (e) => {
					$('#Curso').empty();
					$('#Curso').append('<option value="" >--Seleccione una opcion</option>');
					$.each(e['Courses'], function(fetch, data){
					$('#Curso').append('<option value="'+data.Id+'" >'+data.Name+'</option>');
					});
					$('#Curso').selectpicker('refresh');
				}
			});
		}
		$('#Nivel').on('change', function() {
			ListGrades($('#Nivel').val());
		});
		$('#Grado').on('change', function() {
			ListCourses($('#Grado').val());
		});
    </script>
	@stop