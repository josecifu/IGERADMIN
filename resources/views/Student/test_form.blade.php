@extends('Administration.Base/Base')
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
        <link href="assets/css/pages/wizard/wizard-3.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />



        <div class="content flex-column-fluid" id="kt_content">
            <div class="card card-custom">
                <div class="card-body p-0">
                    <!--begin: Wizard-->
                    <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                        <!--begin: Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                                <!--begin::Wizard Step 1 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                        <span></span>Primera Serie: Intrucciones</h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 1 Nav-->
                                <!--begin::Wizard Step 2 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                        <span>1.</span>Pregunta</h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 2 Nav-->
                                <!--begin::Wizard Step 3 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                        <span>2.</span>Pregunta</h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 3 Nav-->
                                <!--begin::Wizard Step 4 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                        <span>3.</span>Pregunta</h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 4 Nav-->
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
                                        <h4 class="mb-10 font-weight-bold text-dark">Intrucciones</h4>


                                    </div>
                                    <!--end: Wizard Step 1-->
                                    <!--begin: Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Enunciado de la pregunta</h4>
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
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 3</label>
                                            <div class="radio-inline">
                                                <label class="radio radio-square">
                                                    <input type="radio" name="radios13_1"/>
                                                    <span></span>
                                                    Opcion 1
                                                </label>
                                                <label class="radio radio-square">
                                                    <input type="radio" name="radios13_1"/>
                                                    <span></span>
                                                    Opcion 2
                                                </label>
                                                <label class="radio radio-square">
                                                    <input type="radio" name="radios13_1"/>
                                                    <span></span>
                                                    Opcion 3
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Input-->
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
                                    </div>
                                    <!--end: Wizard Step 2-->
                                    <!--begin: Wizard Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Enunciado de la pregunta</h4>
                                        <!--begin::Select-->
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
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 3</label>
                                            <div class="radio-inline">
                                                <label class="radio radio-square">
                                                    <input type="radio" name="radios13_1"/>
                                                    <span></span>
                                                    Opcion 1
                                                </label>
                                                <label class="radio radio-square">
                                                    <input type="radio" name="radios13_1"/>
                                                    <span></span>
                                                    Opcion 2
                                                </label>
                                                <label class="radio radio-square">
                                                    <input type="radio" name="radios13_1"/>
                                                    <span></span>
                                                    Opcion 3
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Input-->
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
                                    </div>
                                    <!--end: Wizard Step 3-->
                                    <!--begin: Wizard Step 4-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Enunciado de la pregunta</h4>
                                        <!--begin::Select-->
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
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Pregunta Tipo 3</label>
                                            <div class="radio-inline">
                                                <label class="radio radio-square">
                                                    <input type="radio" name="radios13_1"/>
                                                    <span></span>
                                                    Opcion 1
                                                </label>
                                                <label class="radio radio-square">
                                                    <input type="radio" name="radios13_1"/>
                                                    <span></span>
                                                    Opcion 2
                                                </label>
                                                <label class="radio radio-square">
                                                    <input type="radio" name="radios13_1"/>
                                                    <span></span>
                                                    Opcion 3
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Input-->
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
                                    </div>
                                    <!--end: Wizard Step 4-->
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
                var GeneroPersona = $('#Genero').val();
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
