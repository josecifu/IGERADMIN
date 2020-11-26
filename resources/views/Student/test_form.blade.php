@extends('Administration.Base/BaseStudent')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Evaluación
    @stop
    @section('breadcrumb2')
    Estudiante
    @stop
    {{-- Page content --}}
    @section('content')
        <link href="{{ asset('assets/css/pages/wizard/wizard-3.css')}}" rel="stylesheet" type="text/css" />
        <div class="content flex-column-fluid" id="kt_content">
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                <div class="alert-icon">
                   
                </div>
                <div class="alert-text"><center><h1>{{$test->Title}}</h1><h2>Fecha de finalización: {{$test->EndDate}}</h2></center></div>
            </div>
            <div class="card card-custom">
                <div class="card-body p-0">
                    <!--begin::Wizard-->
                    <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                        <!--begin: Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                               
                               @foreach($test->Questions() as $key => $Question)
                                <!--begin::Wizard Step 1 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title" style="color:#6299ca;">
                                        <span>{{$key+1}}.</span>{{$Question->Title}}</h3>
                                        <div class="wizard-bar" ></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 1 Nav-->
                              @endforeach
                             
                            
                            </div>
                        </div>
                        <!--end: Wizard Nav-->
                        <!--begin: Wizard Body-->
                        <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <!--begin: Wizard Form-->
                                <form class="form" id="kt_form">
                                    @foreach($test->Questions() as $key => $Question)
                                    <!--begin: Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h3 class="mb-10 font-weight-bold text-dark">Pregunta: {!! $Question->Title !!} <br> Tipo: @if($Question->Type=="V/F") Verdadero ó falso @else{{$Question->Type}}@endif <br>Punteo: {!! $Question->Score !!}</h3>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                                <div class="card-body" style="border-style: solid;border-color: #E26207;">
                                                    {!! $Question->Content !!}
                                                </div>
                                        </div>
                                        <!--end::Input-->
                                        	<div class="form-group">
													<label>Respuesta:</label>
													<input type="text" class="form-control" name="Respuesta" placeholder="" value="" />
													<span class="form-text text-muted">Por favor escriba la respuesta correcta.</span>
											</div>
                                    </div>
                                    <!--end: Wizard Step 1-->
                                    @endforeach
                                   
                                   
                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Pregunta anterior</button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Subir examen</button>
                                            <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Siguiente Pregunta</button>
                                        </div>
                                    </div>
                                    <!--end: Wizard Actions-->
                                </form>
                                <!--end: Wizard Form-->
                            </div>
                        </div>
                        <!--end: Wizard Body-->
                    </div>
                    <!--end: Wizard-->
                </div>
            </div>
        </div>
    @stop
    @section('scripts')
        <!--begin::Page Scripts(used by this page)-->
        <script type="text/javascript">
            "use strict";
			// Class definition
			var KTWizard3 = function () {
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
						clickableSteps: true  // allow step clicking
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
										text: "Por favor conteste",
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
					// Changed event
					_wizardObj.on('changed', function (wizard) {
						KTUtil.scrollTop();
					});
					// Submit event
					_wizardObj.on('submit', function (wizard) {
						// Validate form before submit
						var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
						if (validator) {
							validator.validate().then(function (status) {
								if (status == 'Valid') {
									_formEl.submit(); // submit form
								} else {
									Swal.fire({
										text: "Por favor conteste todas las preguntas",
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
					});
				}
				var _initValidation = function () {
					// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
					// Step 1
					_validations.push(FormValidation.formValidation(
						_formEl,
						{
							fields: {
								Respuesta: {
									validators: {
										notEmpty: {
											message: 'Su respuesta'
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
				return {
					// public functions
					init: function () {
						_wizardEl = KTUtil.getById('kt_wizard_v3');
						_formEl = KTUtil.getById('kt_form');
						_initWizard();
						_initValidation();
					}
				};
			}();
			jQuery(document).ready(function () {
			    KTWizard3.init();
			    document.querySelectorAll( 'oembed[url]' ).forEach( element => {     
			        var videoId = getId(element.getAttribute("url"));
			        var iframeMarkup = '<iframe width="560" height="315" src="//www.youtube.com/embed/' 
			            + videoId + '" frameborder="0" allowfullscreen></iframe>';
			            let div = document.createElement('div');
			            div.innerHTML = iframeMarkup;
			            element.parentNode.appendChild(div);
			            element.parentNode.removeChild(element);
			     } );
			});
			function getId(url) {
			    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
			    var match = url.match(regExp);
			    if (match && match[2].length == 11) {
			        return match[2];
			    } else {
			        return 'error';
			    }
			}
		</script>
	@stop
