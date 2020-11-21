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
        <link href="{{ asset('assets/css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" />
        <div class="content flex-column-fluid" id="kt_content">
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
                                        <h3 class="wizard-title">Preguntas</h3>
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
                                    <button type="button" disabled class="btn btn-outline-info">1</button>
                                </div>
                                <!--end::Wizard Step 2 Nav-->
                                <!--begin::Wizard Step 3 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <button type="button" disabled class="btn btn-outline-info">2</button>
                                </div>
                                <!--end::Wizard Step 3 Nav-->
                                <!--begin::Wizard Step 4 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <button type="button" disabled class="btn btn-outline-info">3</button>
                                </div>
                                <!--end::Wizard Step 4 Nav-->
                                <!--begin::Wizard Step 5 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <button type="button" disabled class="btn btn-outline-info">4</button>
                                </div>
                                <!--end::Wizard Step 5 Nav-->
                            </div>
                        </div>
                        <!--end: Wizard Nav-->
                        <!--begin: Wizard Body-->
                        <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <!--begin: Wizard Form-->
                                <form class="form" id="kt_form">
                                    <!--begin: Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h4 class="mb-10 font-weight-bold text-dark">Primera Serie: Intrucciones</h4>
                                    </div>
                                    <!--end: Wizard Step 1-->
                                    <!--begin: Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Enunciado de la pregunta 1</h4>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 1</label>
                                            <input type="text" name="respuesta" id="respuesta" class="form-control form-control-solid" placeholder="Ingrese su respuesta"/>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 2</label>
                                            <div class="radio-inline">
                                                <label class="radio radio-lg">
                                                    <input type="radio" name="radios3_1"/>
                                                    <span></span>
                                                    Verdadero
                                                </label>
                                                <label class="radio radio-lg">
                                                    <input type="radio" name="radios3_1"/>
                                                    <span></span>
                                                    Falso
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Select-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Select-->
                                                <div class="form-group">
                                                    <label>Pregunta Tipo 4</label>
                                                    <select name="country" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="op1">Opcion 1</option>
                                                        <option value="op2">Opcion 2</option>
                                                        <option value="op3">Opcion 3</option>
                                                    </select>
                                                </div>
                                                <!--end::Select-->
                                            </div>
                                        </div>
                                        <!--end::Select-->
                                    </div>
                                    <!--end: Wizard Step 2-->
                                    <!--begin: Wizard Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Enunciado de la pregunta 2</h4>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 1</label>
                                            <input type="text" name="respuesta" id="respuesta" class="form-control form-control-solid" placeholder="Ingrese su respuesta"/>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 2</label>
                                            <div class="radio-inline">
                                                <label class="radio radio-lg">
                                                    <input type="radio" name="radios3_1"/>
                                                    <span></span>
                                                    Verdadero
                                                </label>
                                                <label class="radio radio-lg">
                                                    <input type="radio" name="radios3_1"/>
                                                    <span></span>
                                                    Falso
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Select-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Select-->
                                                <div class="form-group">
                                                    <label>Pregunta Tipo 4</label>
                                                    <select name="country" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="op1">Opcion 1</option>
                                                        <option value="op2">Opcion 2</option>
                                                        <option value="op3">Opcion 3</option>
                                                    </select>
                                                </div>
                                                <!--end::Select-->
                                            </div>
                                        </div>
                                        <!--end::Select-->
                                    </div>
                                    <!--end: Wizard Step 3-->
                                    <!--begin: Wizard Step 4-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Enunciado de la pregunta 3</h4>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 1</label>
                                            <input type="text" name="respuesta" id="respuesta" class="form-control form-control-solid" placeholder="Ingrese su respuesta"/>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 2</label>
                                            <div class="radio-inline">
                                                <label class="radio radio-lg">
                                                    <input type="radio" name="radios3_1"/>
                                                    <span></span>
                                                    Verdadero
                                                </label>
                                                <label class="radio radio-lg">
                                                    <input type="radio" name="radios3_1"/>
                                                    <span></span>
                                                    Falso
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Select-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Select-->
                                                <div class="form-group">
                                                    <label>Pregunta Tipo 4</label>
                                                    <select name="country" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="op1">Opcion 1</option>
                                                        <option value="op2">Opcion 2</option>
                                                        <option value="op3">Opcion 3</option>
                                                    </select>
                                                </div>
                                                <!--end::Select-->
                                            </div>
                                        </div>
                                        <!--end::Select-->
                                    </div>
                                    <!--end: Wizard Step 4-->
                                    <!--begin: Wizard Step 5-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Enunciado de la pregunta 4</h4>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 1</label>
                                            <input type="text" name="respuesta" id="respuesta" class="form-control form-control-solid" placeholder="Ingrese su respuesta"/>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 2</label>
                                            <div class="radio-inline">
                                                <label class="radio radio-lg">
                                                    <input type="radio" name="radios3_1"/>
                                                    <span></span>
                                                    Verdadero
                                                </label>
                                                <label class="radio radio-lg">
                                                    <input type="radio" name="radios3_1"/>
                                                    <span></span>
                                                    Falso
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Select-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Select-->
                                                <div class="form-group">
                                                    <label>Pregunta Tipo 4</label>
                                                    <select name="country" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="op1">Opcion 1</option>
                                                        <option value="op2">Opcion 2</option>
                                                        <option value="op3">Opcion 3</option>
                                                    </select>
                                                </div>
                                                <!--end::Select-->
                                            </div>
                                        </div>
                                        <!--end::Select-->
                                    </div>
                                    <!--end: Wizard Step 5-->
                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Anterior</button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Terminar y Enviar</button>
                                            <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Siguiente</button>
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
                var IdEstudiante = $('#Estudiante').val();
                var PreguntaExamen = $('#Pregunta').val();
                var PunteoObtenidoPregunta = $('#Punteo').val();
                var RespuestaEstudiante = $('#Respuesta').val();
                var data = [{
                    Estudiante: IdEstudiante,
                    Pregunta: PreguntaExamen,
                    Punteo: PunteoObtenidoPregunta,
                    Respuesta: RespuestaEstudiante,
                }];
                $.ajax({
                    url:'/student/save_answer',
                    type:'POST',
                    data: {"_token":"{{ csrf_token() }}","data":data},
                    dataType: "JSON",
                    success: function(e){
                    swal.fire({ title: "Accion completada", 
                      text: "Se ha enviado todos las respuesta del examen!", 
                      type: "success"
                            }).then(function () {
                              var $url_path = '{!! url('/') !!}';
                              window.location.href = $url_path+"/student/home/dashboard";
                            });
                    },
                    error: function(e){
                        console.log(e);
                        swal.fire({
                            title: 'Ocurrio un error!',
                            text:  'Espere!, por favor',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                    }
                });
             }
        </script>
    @stop
