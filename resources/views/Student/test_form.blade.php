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
                <div class="alert-text"><center><h1>{{$test->Title}} - {{$course}}</h1><h2>Fecha de finalización: {{$test->EndDate}}</h2></center></div>
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
                                	<center>
	                                    <div class="wizard-label">
	                                        <h3 class="wizard-title" style="color:#6299ca;">
	                                        	<span>{{$key+1}}</span>
	                                    	</h3>
	                                        <div class="wizard-bar"></div>
	                                    </div>
                                    </center>
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
                                        <h3 class="mb-10 font-weight-bold text-dark">
                                        	{{$key+1}}. {!! $Question->Title !!}<br>
                                        	Valor: {!! $Question->Score !!} Pts.
                                        </h3>
                                        <div class="form-group">
                                            <div class="card-body" style="border-style: solid;border-color: #E26207;">
                                                {!! $Question->Content !!}
                                            </div>
                                        </div>
                                        <!--begin::Answer-->
                                        	@if($Question->Type=="V/F")
											<div class="radio-inline">
												<label class="radio radio-primary">
												<input type="radio" id="AnswerVF{{$key}}1" value="Verdadero" name="AnswerRadio{{$key}}"/>
												<span></span>Verdadero</label>
												<label class="radio radio-primary">
												<input type="radio" id="AnswerVF{{$key}}2" value="Falso" name="AnswerRadio{{$key}}"/>
												<span></span>Falso</label>
											</div>
                                        	@elseif($Question->Type=="Respuesta Abierta")
                                        	<div class="form-group">
												<label>Respuesta:</label>
												<input type="text" class="form-control" name="Respuesta" id="AnswerText{{$key}}" placeholder="" value="" />
												<span class="form-text text-muted">Por favor, escriba la respuesta correcta.</span>
											</div>
											@elseif($Question->Type=="Multiple")
											<div class="form-group row">
												<label class="col-3">Opciones:</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<select class="form-control" id="AnswerSelect{{$key}}" style="width:100%" name="param">
														<option value="">--Seleccione una opción</option>
														@php 
														$Answers = explode(',',$Question['Answers']);
														@endphp
														@foreach($Answers as $Answer)
															<option value="{{$Answer}}">{{$Answer}}</option>
														@endforeach
													</select>
												</div>
											</div>
                                        	@endif
                                        <!--end::Answer-->
                                    </div>
                                    <!--end: Wizard Step 1-->
                                    @endforeach
                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
											@if($test->Order=="true")
                                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev" style="color:white;">Pregunta anterior</button>
											@endif
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
			$( document ).ready(function() {
				$.ajaxSetup({
					  headers: {
						  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					  }
				  }); 
			   });
            "use strict";
			// Class definition
			var KTWizard3 = function () {
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
				// Private functions
				var _initWizard = function () {
					// Initialize form wizard
					_wizardObj = new KTWizard(_wizardEl, {
						startStep: 1, // initial active step number
						@if($test->Order =="true")
						clickableSteps: true  // allow step clicking
						@else
						clickableSteps: false
						@endif
					});
					// Validation before going to next page
					_wizardObj.on('change', function (wizard) {
						if (wizard.getStep() > wizard.getNewStep()) {
							return; // Skip if stepped back
						}
					});
					// Change event
					_wizardObj.on('changed', function (wizard) {
						KTUtil.scrollTop();
					});
					// Submit event
					_wizardObj.on('submit', function (wizard) {
						Swal.fire({
							text: "¿Desea completar el examen? no se podra editar las respuestas al finalizar.",
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
									text: "Las respuestas no fueron guardados!.",
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
						_wizardEl = KTUtil.getById('kt_wizard_v3');
						_formEl = KTUtil.getById('kt_form');
						_initValidation();
						_initWizard();
					}
				};
			}();
			function crearDatos()
			{
				var Answers = [];
				var question;
				@foreach($test->Questions() as $key => $Question)
				@if($Question->Type=="V/F")
					question =$("input[name='AnswerRadio{{$key}}']:checked").val();  
				@elseif($Question->Type=="Respuesta Abierta")
					question = $('#AnswerText{{$key}}').val();
				@elseif($Question->Type=="Multiple")
					question = $('#AnswerSelect{{$key}}').val();
				@endif
				var data = {
					"QuestionId" :{{$Question->id}},
					"Answer" : question,
				};
				Answers.push(data);
				@endforeach
				$.ajax({
					url:"{{url('student/test/view/answers/save')}}",
					type:'POST',
					data: {"_token":"{{ csrf_token() }}","data":Answers,"IdTest":{{$test->id}}},
					dataType: "JSON",
					success: function(e){
						if (e.Error) {
							swal.fire({
							title: 'Ocurrio un error!',
							text:  e.Error,
							icon: 'error',
							confirmButtonText: 'Aceptar',
							})
						} else {
							swal.fire({ title: "Accion completada",
							text: "Se han guardados las respuestas!",
							confirmButtonText: 'Aceptar',
							}).then(function () {
								var $url_path = '{!! url('/') !!}';
								if(e.id){
									window.location.href = $url_path+"/administration/teacher/assign/question/test/"+e.id+"/"+Preguntas;
								}else{
									window.location.href = $url_path+"/student/home/dashboard/";
								}
							});
						}//fin else
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
			jQuery(document).ready(function () {
				@foreach($test->Questions() as $key => $Question)
					@if($Question->Type=="Multiple")
						$('#AnswerSelect{{$key}}').select2({
							minimumResultsForSearch: -1,
							placeholder: "Seleccione una respuesta"
						});
					@endif
				@endforeach
				@if($test->Order =="false")
				Swal.fire({
					title: "¡Advertencia!",
					text: "Al iniciar el exámen, no podra regresar ninguna pregunta",
					icon: "info",
					confirmButtonText: "Aceptar",
				});
				@endif
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
