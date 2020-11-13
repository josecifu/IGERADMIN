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
    <link href="{{ asset('assets/css/pages/wizard/wizard-2.css')}}" rel="stylesheet" type="text/css" />
    <div class="content flex-column-fluid" id="kt_content">
        <div class="card card-custom">
            <div class="card-body p-0">
                <!--begin: Wizard-->
                <div class="wizard wizard-2" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav border-right py-8 px-8 py-lg-20 px-lg-10">

                        <div class="wizard-steps">
                            @for ($i = 0; $i < 15; $i++)
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-wrapper">
                                    <div class="wizard-icon">
                                        <span class="svg-icon svg-icon-2x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <a href="#"><div class="wizard-label" >
                                        <h3 class="wizard-title">Pregunta No.{{$i+1}}</h3>
                                        <div class="wizard-desc">Sin clasificar!</div>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <!--end::Wizard Step 1 Nav-->
                            @endfor
                        </div>
                    </div>
                    <!--end: Wizard Nav-->
                    <!--begin: Wizard Body-->
                    <div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
                        <!--begin: Wizard Form-->
                        <div class="row">
                            <div class="offset-xxl-2 col-xxl-8">
                                <form class="form" id="kt_form">
                                    @for ($i = 0; $i < 15; $i++)
                                    <!--begin: Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
										<h1>Detalle preguntas:</h1>
										<div class="my-5">
											<div class="form-group row">
												<label class="col-3">Titulo de la pregunta</label>
												<div class="col-9">
													<div class="input-group input-group-solid">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="flaticon-questions-circular-button"></i>
															</span>
														</div>
														<input type="text" name="Pregunta" id="Pregunta" class="form-control form-control-solid" placeholder="Pregunta" />
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-3">Contenido</label>
												<div class="col-9">
												<div class="card card-custom gutter-b example example-compact">
											<div class="card-header">
												<h3 class="card-title">Classic Demo with Videos</h3>
												<div class="card-toolbar">
													<div class="example-tools justify-content-center">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
													</div>
												</div>
											</div>
											<div class="card-body">
												<textarea name="kt-ckeditor-4" id="kt-ckeditor-4">
													<h1>Easy Media Embeds</h1>
													<figure class="symbol">
														<oembed url="https://www.youtube.com/watch?v=gMUbZMdDRCo"></oembed>
													</figure>
													<p>Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad minim veniam,quis nostrud exerci tation ullamcorper. Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad minim veniam,quis nostrud exerci tation ullamcorper.</p>
												</textarea>
											</div>
										</div>
												</div>	
											</div>
											<div class="form-group row">
												<label class="col-3">Punteo</label>
												<div class="col-9">
													<div class="input-group input-group-solid">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="flaticon-coins"></i>
															</span>
														</div>
														<input type="number" name="Pregunta" id="Pregunta" class="form-control form-control-solid" placeholder="Punteo"/>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-3">Tipo de pregunta</label>
												<div class="col-9">
													<div class="input-group input-group-solid">
														<select class="form-control select2" id="TipoPregunta" name="param">
															<option value="Multiple">Selección Múltiple</option>
															<option value="Respuesta Abierta">Respuesta abierta</option>
															<option value="V/F">Verdadero y Falso</option>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-3">Respuesta Correcta</label>
												<div class="col-9">
													<div class="input-group input-group-solid">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="flaticon2-check-mark"></i>
															</span>
														</div>
														<input type="text" name="Respuesta" class="form-control form-control-solid" placeholder="Escriba la respuesta correcta" />
													</div>
												</div>
											</div>
											<div class="form-group row" id="Varios" style="visibility: hidden;">
												<label class="col-3">Respuestas</label>
												<div class="col-9">
													<div class="input-group input-group-solid">
														<div class="input-group-prepend">
															<span class="input-group-text">
																<i class="flaticon2-chat-2"></i>
															</span>
														</div>
														<input type="text" name="P-respuestas" id="P-respuestas" class="form-control form-control-solid" placeholder="Escriba la posibles respuestas"/>
														<!-- <select class="form-control select2" id="Curso" multiple name="param">
															<option label="Label"></option>
														</select> -->
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                    <!--end: Wizard Step 1-->
                                    @endfor
                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev" style="color: white">Anterior</button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Guardar examen</button>
                                            <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Siguiente</button>
                                        </div>
                                    </div>
                                    <!--end: Wizard Actions-->
                                </form>
                            </div>
                            <!--end: Wizard-->
                        </div>
                        <!--end: Wizard Form-->
                    </div>
                    <!--end: Wizard Body-->
                </div>
                <!--end: Wizard-->
            </div>
        </div>
    </div>
    <!--end::Content-->
	@stop
	@section('scripts')

	<script type="text/javascript">
	var KTCkeditor = function () {
			// Private functions
			var demos = function () {
				ClassicEditor
					.create( document.querySelector( '#kt-ckeditor-4' ) )
					.then( editor => {
						console.log( editor );
					} )
					.catch( error => {
						console.error( error );
					} );
			}

			return {
				// public functions
				init: function() {
					demos();
				}
			};
		}();

		// Initialization
		jQuery(document).ready(function() {
			KTCkeditor.init();
		});
        "use strict";
			$('#TipoPregunta').select2({
				placeholder: "Seleccione los cursos a asignar"
			});
		// Class definition
		var KTWizard2 = function () {
			// Base elements
		var _wizardEl;
		var _formEl;
		var _wizardObj;
		var _validations = [];

		// Private functions
		var _initWizard = function () {
			// Initialize form wizard
			_wizardObj = new KTWizard(_wizardEl, {
				startStep: 1, // initial active step number
				clickableSteps: true // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
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
								text: "Sorry, looks like there are some errors detected, please try again.",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
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
					text: "All is good! Please confirm the form submission.",
					icon: "success",
					showCancelButton: true,
					buttonsStyling: false,
					confirmButtonText: "Yes, submit!",
					cancelButtonText: "No, cancel",
					customClass: {
						confirmButton: "btn font-weight-bold btn-primary",
						cancelButton: "btn font-weight-bold btn-default"
					}
				}).then(function (result) {
					if (result.value) {
						_formEl.submit(); // Submit form
					} else if (result.dismiss === 'cancel') {
						Swal.fire({
							text: "Your form has not been submitted!.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-primary",
							}
						});
					}
				});
			});
		}

		var _initValidation = function () {
			// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
			// Step 1
			_validations.push(FormValidation.formValidation(
				_formEl,
				{
					
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
						address1: {
							validators: {
								notEmpty: {
									message: 'Address is required'
								}
							}
						},
						postcode: {
							validators: {
								notEmpty: {
									message: 'Postcode is required'
								}
							}
						},
						city: {
							validators: {
								notEmpty: {
									message: 'City is required'
								}
							}
						},
						state: {
							validators: {
								notEmpty: {
									message: 'State is required'
								}
							}
						},
						country: {
							validators: {
								notEmpty: {
									message: 'Country is required'
								}
							}
						}
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

			// Step 3
			_validations.push(FormValidation.formValidation(
				_formEl,
				{
					fields: {
						delivery: {
							validators: {
								notEmpty: {
									message: 'Delivery type is required'
								}
							}
						},
						packaging: {
							validators: {
								notEmpty: {
									message: 'Packaging type is required'
								}
							}
						},
						preferreddelivery: {
							validators: {
								notEmpty: {
									message: 'Preferred delivery window is required'
								}
							}
						}
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

			// Step 4
			_validations.push(FormValidation.formValidation(
				_formEl,
				{
					fields: {
						locaddress1: {
							validators: {
								notEmpty: {
									message: 'Address is required'
								}
							}
						},
						locpostcode: {
							validators: {
								notEmpty: {
									message: 'Postcode is required'
								}
							}
						},
						loccity: {
							validators: {
								notEmpty: {
									message: 'City is required'
								}
							}
						},
						locstate: {
							validators: {
								notEmpty: {
									message: 'State is required'
								}
							}
						},
						loccountry: {
							validators: {
								notEmpty: {
									message: 'Country is required'
								}
							}
						}
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

			// Step 5
			_validations.push(FormValidation.formValidation(
				_formEl,
				{
					fields: {
						ccname: {
							validators: {
								notEmpty: {
									message: 'Credit card name is required'
								}
							}
						},
						ccnumber: {
							validators: {
								notEmpty: {
									message: 'Credit card number is required'
								},
								creditCard: {
									message: 'The credit card number is not valid'
								}
							}
						},
						ccmonth: {
							validators: {
								notEmpty: {
									message: 'Credit card month is required'
								}
							}
						},
						ccyear: {
							validators: {
								notEmpty: {
									message: 'Credit card year is required'
								}
							}
						},
						cccvv: {
							validators: {
								notEmpty: {
									message: 'Credit card CVV is required'
								},
								digits: {
									message: 'The CVV value is not valid. Only numbers is allowed'
								}
							}
						}
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

			return {
				// public functions
				init: function () {
					_wizardEl = KTUtil.getById('kt_wizard');
					_formEl = KTUtil.getById('kt_form');

					_initWizard();
					_initValidation();
				}
			};
		}();

		jQuery(document).ready(function () {
			KTWizard2.init();
		});
		$('#TipoPregunta').on('change', function() {
			if($('#TipoPregunta').val() == 'Multiple' ){
				$('#Varios').css("visibility", "visible");
			}
			else{
				$('#Varios').css("visibility", "hidden");
			}
		});
    </script>
      
    @stop