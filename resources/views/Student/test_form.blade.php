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
