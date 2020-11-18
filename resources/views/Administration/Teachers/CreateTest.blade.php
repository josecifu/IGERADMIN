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
								<a href="{{url('administration/teacher/test/'.$id)}}" class="btn btn-danger font-weight-bolder mr-2">
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
																<input type="text" name="Titulo" id="Titulo" class="form-control form-control-solid" placeholder="Titulo del Examen" />
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-3">Punteo</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<input type="number" name="Punteo" id="Punteo" class="form-control form-control-solid" placeholder="Punteo Total del examen" />
															</div>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-3">Actividad</label>
														<div class="col-lg-4 col-md-9 col-sm-12">
															<select class="form-control" id="actividad" name="param">
																<option value="">--Seleccione una opción</option>
																@foreach($actividades as $a)
																	<option value="{{$a['id']}}">{{$a['Nombre']}}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-3 col-form-label">Crear examen virtual</label>
														<div class="col-3">
															<span class="switch switch-info">
																<label>
																	<input type="checkbox" id="virtual" name="virtual" />
																	<span></span>
																</label>
															</span>
														</div>
													</div>
													<div class="form-group row" id="virtualFecha" style="visibility: hidden;">
														<label class="col-3">Fecha de inicio y final</label>
														<div class="col-9">
															<div class="">
																<input class="form-control" id="Fechas" name="Fechas" readonly="readonly" placeholder="Select time" type="text" />
															</div>
														</div>
													</div>
													<div class="form-group row" id="virtualHI" style="visibility: hidden;">
														<label class="col-3">Hora de inicio</label>
														<div class="col-9">
															<div class="">
																<input class="form-control" name="HoraInicio" id="HoraInicio" readonly="readonly" placeholder="Select time" type="text" />
															</div>
														</div>
													</div>
													<div class="form-group row" id="virtualHF" style="visibility: hidden;">
														<label class="col-3">Hora Final</label>
														<div class="col-9">
															<div class="">
																<input class="form-control" name="HoraFinal" id="HoraFinal" readonly="readonly" placeholder="Select time" type="text" />
															</div>
														</div>
													</div>
													<div class="form-group row" id="virtualPreguntas" style="visibility: hidden;">
														<label class="col-3">Numero de Preguntas</label>
														<div class="col-9">
															<div class="input-group input-group-solid">
																<input type="number" name="NoPreguntas" id="NoPreguntas" class="form-control form-control-solid" placeholder="Cantidad de preguntas" />
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
													<button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Crear Examen</button>
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
			$('#Fechas').daterangepicker({
				buttonClasses: ' btn',
				applyClass: 'btn-primary',
				cancelClass: 'btn-secondary'
			});
			// minimum setup
			$('#HoraInicio, #HoraFinal').timepicker();

			// minimum setup
			$('#HoraInicio, #HoraFinal').timepicker({
				minuteStep: 1,
				defaultTime: '',
				showSeconds: true,
				showMeridian: false,
				snapToStep: true
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
						console.log("hola");
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
			console.log("asdf");
			var Titulo = $('#Titulo').val(); 
            var Punteo = $('#Punteo').val();
            var Fechas = $('#Fechas').val();
            var HoraI = $('#HoraInicio').val(); 
            var HoraF = $('#HoraFinal').val();
            var actividad = $('#actividad').val();
			var Preguntas = $('#NoPreguntas').val();
			var tipoexamen = $('#virtual').is(":checked")
            var data = [{
				Titulo: Titulo,
				Punteo: Punteo,
                Fechas: Fechas,
                HoraI: HoraI,
                HoraF: HoraF,
                actividad: actividad,
                Preguntas: Preguntas,
				tipoexamen: tipoexamen,
				curso: {{$id}},
            }];
            $.ajax({
                url:'/administration/teacher/save/test',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":data},
                dataType: "JSON",
                success: function(e){
                swal.fire({ title: "Accion completada", 
                  text: "Se ha creado el examen!", 
                  type: "success"
                        }).then(function () {
                          var $url_path = '{!! url('/') !!}';
						  if(e.id){
							window.location.href = $url_path+"/administration/teacher/assign/question/test/"+e.id+"/"+Preguntas;
						  }else{
							window.location.href = $url_path+"/administration/teacher/test/"+{{$id}};
						  }
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
		$('#actividad').on('change', function() {
			console.log($('#actividad').val());
			console.log($('#virtual').is(":checked"));
		});
		$('#virtual').on('change', function() {
			if ($('#virtual').is(":checked")) {
				$('#virtualFecha').css("visibility", "visible");
				$('#virtualHI').css("visibility", "visible");
				$('#virtualHF').css("visibility", "visible");
				$('#virtualPreguntas').css("visibility", "visible");
			}else{
				$('#virtualFecha').css("visibility", "hidden");
				$('#virtualHI').css("visibility", "hidden");
				$('#virtualHF').css("visibility", "hidden");
				$('#virtualPreguntas').css("visibility", "hidden");
			}
		});
		
    </script>
	@stop
