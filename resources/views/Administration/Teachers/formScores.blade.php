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
                                            <a href="{{url('/')}}" class="btn btn-danger font-weight-bolder mr-2">
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
													<!--begin::Wizard Step 3 Nav-->
													<div class="wizard-step" data-wizard-type="step">
														<div class="wizard-label">
															<i class="wizard-icon flaticon2-magnifier-tool"></i>
															<h3 class="wizard-title">1. Busqueda de notas</h3>
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
															<h1>Detalle listado de notas:</h1>
															<div class="my-5">
																<div class="form-group row">
																	<label class="col-form-label text-right col-lg-3 col-sm-12">Curso</label>
																	<div class="col-lg-9 col-md-9 col-sm-12">
																		<select class="form-control" id="Curso" name="Curso">
																		<option value="" >--Seleccione una opcion</option>
																				@foreach($cursos as $curso)
																					<option value="{{$curso->id}}" >{{$curso->Name}}</option>	
																				@endforeach
																		</select>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-form-label text-right col-lg-3 col-sm-12">Grado</label>
																	<div class="col-lg-9 col-md-9 col-sm-12">
																		<select class="form-control" id="Grado" name="Grado">
																		<option value="" >--Seleccione una opcion</option>
																				@foreach($grados as $grado)
																					<option value="{{$grado->id}}" >{{$grado->Name}}</option>	
																				@endforeach
																		</select>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-form-label text-right col-lg-3 col-sm-12">Nivel</label>
																	<div class="col-lg-9 col-md-9 col-sm-12">
																		<select class="form-control" id="Nivel" name="Nivel">
																			<option value="" >--Seleccione una opcion</option>
																				@foreach($niveles as $nivel)
																					<option value="{{$nivel->id}}" >{{$nivel->Name}}</option>	
																				@endforeach
																		</select>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-form-label text-right col-lg-3 col-sm-12">Jornada</label>
																	<div class="col-lg-9 col-md-9 col-sm-12">
																		<select class="form-control" id="Jornada" name="Jornada">
																				<option value="" >--Seleccione una opcion</option>
																				@foreach($jornadas as $jornada)
																					<option value="{{$jornada->id}}" >{{$jornada->Name}}</option>	
																				@endforeach
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
																<button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Buscar</button>
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
            }];

            $.ajax({
                url:'/administration/teacher/score',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":data},
                dataType: "JSON",
                success: function(e){
                swal.fire({ title: "Accion completada", 
                  text: "Se ha guardado con exito el Voluntario!", 
                  type: "success"
                        }).then(function () {
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/administration/teacher/score";
                        });
                     
                },
                error: function(e){
                    console.log(e);
                }
            });
         }
    </script>
	@stop










									