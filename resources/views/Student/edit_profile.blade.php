@extends('Administration.Base/BaseStudent')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Actulización
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
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <i class="wizard-icon flaticon-user"></i>
                                        <h3 class="wizard-title">Actualización de información</h3>
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
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <div class="my-5">
                                            <div class="form-group row">
                                                <label class="col-3">Nombre de usuario</label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-user"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="Usuario" id="Usuario" value="{{$models['Usuario']}}" class="form-control form-control-solid" placeholder="Usuario" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3">Correo electrónico</label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-at"></i>
                                                            </span>
                                                        </div>
                                                        <input type="email" name="Email" id="Email" value="{{$models['Email']}}" class="form-control form-control-solid" placeholder="Correo electronico" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3">No. Teléfono</label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-phone"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="Telefono" id="Telefono" value="{{$student->Phone}}" class="form-control form-control-solid" placeholder="Phone" />
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <input type="hidden" value="{{$student->id}}" id="Persona">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 1-->
                                    <!--begin::Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div>
                                            <a href="{{url('student/home/dashboard')}}">
                                                <button type="button" class="btn btn-danger font-weight-bolder text-uppercase px-9 py-4">Cancelar</button>
                                            </a>
                                        </div>
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
                        Usuario: {
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
                        },/*
                        Contraseña: {
                            validators: {
                                notEmpty: {
                                    message: 'Es un campo obligatorio'
                                }
                            }
                        }*/
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
                            text: "Los datos no fueron actualizados!.",
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
            var NombreUsuario = $('#Usuario').val(); 
            var EmailUsuario = $('#Email').val();
            //var ContraseñaUsuario = $('#Contraseña').val(); 
            var PersonaId = $('#Persona').val();
            var TelefonoPersona = $('#Telefono').val();
            var data = [{
                Usuario: NombreUsuario,
                Email: EmailUsuario,
                //Contraseña: ContraseñaUsuario,
                Persona: PersonaId,
                Telefono: TelefonoPersona,
            }];
            $.ajax({
                url:'/student/profile/update',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":data},
                dataType: "JSON",
                success: function(e){
                swal.fire({ title: "Accion completada!", 
                  text: "Los datos han sido actualizados correctamente!", 
                  type: "success"
                        }).then(function () {
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/student/home/dashboard";
                        });
                },
                error: function(e){
                    console.log(e);
                }
            });
         }
    </script>
    @stop
