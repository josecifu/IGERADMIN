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
    <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Profile Personal Information-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                <!--begin::Profile Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Body-->
                    <div class="card-body pt-4">
                        <div class="row">
                            <div class="col-4">
                                <ul class="nav flex-column nav-pills">
                                    <li class="nav-item mb-2">
                                        <a class="nav-link active" id="home-tab-5" data-toggle="tab" href="#home-5">
                                            <span class="nav-icon">
                                                <i class="flaticon2-chat-1"></i>
                                            </span>
                                            <span class="nav-text">Inicio</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-2">
                                        <a class="nav-link" id="profile-tab-5" data-toggle="tab" href="#profile-5" aria-controls="profile">
                                            <span class="nav-icon">
                                                <i class="flaticon-presentation"></i>
                                            </span>
                                            <span class="nav-text">Voluntarios</span>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown mb-2">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                            <span class="nav-icon">
                                                <i class="flaticon2-user-outline-symbol"></i>
                                            </span>
                                            <span class="nav-text">Estudiantes</span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Notas</a>
                                            <a class="dropdown-item" href="#">Asistencias</a>
                                            <a class="dropdown-item" href="#">Examens</a>
                                           
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab-5" data-toggle="tab" href="#contact-5" aria-controls="contact">
                                            <span class="nav-icon">
                                                <i class="flaticon-network"></i>
                                            </span>
                                            <span class="nav-text">Circulos de estudio</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                     
                     
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Header-->
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Configuracion General</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Actualice las configuraciones generales del sistema</span>
                        </div>
                        <div class="card-toolbar">
                            <button type="reset" class="btn btn-success mr-2">Guardar Cambios</button>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                   
                        <!--begin::Body-->
                        <div class="card-body">
                           
                            <div class="form-group row">
                                <div class="col-8">
                                    <div class="tab-content" id="myTabContent5">
                                        <div class="tab-pane fade show active" id="home-5" role="tabpanel" aria-labelledby="home-tab-5">
                                            <div class="row">
                                                <label class="col-xl-6"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h5 class="font-weight-bold mb-6">Configuracion de tablero:</h5>
                                                </div>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-xl-6 col-lg-3 col-form-label font-weight-bold text-left text-lg-right">Mostrar registro de actividades</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <span class="switch switch-sm">
                                                        <label>
                                                            <input type="checkbox" checked="checked" name="email_notification_1" />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile-5" role="tabpanel" aria-labelledby="profile-tab-5">
                                            
                                        </div>
                                        <div class="tab-pane fade" id="contact-5" role="tabpanel" aria-labelledby="contact-tab-5">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                       
                            
                        </div>
                        <!--end::Body-->
                  
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile Personal Information-->
    </div>
	@stop
	@section('scripts')

      
	@stop