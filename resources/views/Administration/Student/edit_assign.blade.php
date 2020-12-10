@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estudiante
    @stop
    @section('breadcrumb1')
    Actualización
    @stop
    @section('breadcrumb2')
    Asignación
    @stop
    {{-- Page content --}}
	@section('content')
<link href="{{ asset('assets/plugins/custom/kanban/kanban.bundle.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css"/>
		<div class="content flex-column-fluid" id="kt_content">
			<div class="card-header">
				<div class="card-toolbar">
                    <a href="{{url('administration/student/list')}}" class="btn btn-danger font-weight-bolder mr-2"><i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                </div>
			</div>
			<div class="card card-custom">
				<div class="card-body p-0">
					<!--begin::Wizard-->
					<div class="wizard wizard-1" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
						<!--begin::Wizard Nav-->
						<div class="wizard-nav border-bottom">
							<div class="wizard-steps p-8 p-lg-10">
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
									<!--begin::Wizard Step 3-->
									<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
										<h3>Seleccione los datos de asignación</h3><br>
										<div class="my-5">
											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12">Círculo de estudio</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<select class="form-control selectpicker" data-size="10" title="--Seleccione una opción" data-live-search="true" id="Jornada"></select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12">Nivel</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<select class="form-control" id="Nivel" name="Nivel"></select>
												</div>
											</div>	
											<div class="form-group row">
												<label class="col-form-label text-right col-lg-3 col-sm-12">Grado</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<select class="form-control" id="Grado" name="Grado"></select>
												</div>
											</div>
											<div class="form-group row">
                                                <input type="hidden" value="{{$user->id}}" id="Usuario">
                                            </div>
										</div>
									</div>
									<!--end::Wizard Step 3-->
									<!--begin::Wizard Actions-->
									<div class="d-flex justify-content-between border-top mt-5 pt-10">
										<div>
											<button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Guardar</button>
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
										text: "Por favor, complete los campos requeridos!",
										icon: "error",
										buttonsStyling: false,
										confirmButtonText: "Aceptar",
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
							text: "Por favor, complete el registro!",
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
									confirmButtonText: "Aceptar",
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
         function crearDatos()
         {
            var UsuarioId = $('#Usuario').val();
            var AsignarGrado = $('#Grado').val();
            var data = [{
                Usuario: UsuarioId,
                Grado: AsignarGrado,
            }];
            $.ajax({
                url:'/administration/student/update/assign/grade',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":data},
                dataType: "JSON",
                success: function(e){
					if (e.Error) {
						swal.fire({
							title: 'Error!',
							text: e.Error,
							icon: 'error',
							confirmButtonText: 'Aceptar',
						})
					} else {
						swal.fire({
							title: "Accion completada", 
							text: "La asignación se ha registrado con éxito!", 
							confirmButtonText: 'Aceptar',
							}).then(function () {
								var $url_path = '{!! url('/') !!}';
								window.location.href = $url_path+"/administration/student/list";
                        	});
					}
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
		$('#Jornada').on('change', function() {
			ListLevel($('#Jornada').val());
		});
		$('#Nivel').on('change', function() {
			ListGrades($('#Nivel').val());
		});
    </script>
	@stop