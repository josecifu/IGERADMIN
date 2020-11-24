@extends('Administration.Base/BaseStudent')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Evaluaciones
    @stop
    @section('breadcrumb2')
    Cursos
    @stop
    {{-- Page content --}}
    @section('content')
        <div class="content flex-column-fluid" id="kt_content">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Course-->
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-4 symbol symbol-60 symbol-circle">
                                    <img src="assets/media/project-logos/3.png" alt="image" />
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                    <div class="d-flex flex-column mr-auto">
                                        <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">Nombre del curso</a>
                                        <span class="text-muted font-weight-bold">Nombre del profesor</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar mb-7">
                                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Acciones" data-placement="left">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-writing"></i>
                                                        </span>
                                                        <span class="navi-text">Archivos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-calendar-8"></i>
                                                        </span>
                                                        <span class="navi-text">Eventos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-graph-1"></i>
                                                        </span>
                                                        <span class="navi-text">Notas</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-rocket-1"></i>
                                                        </span>
                                                        <span class="navi-text">Otros</span>
                                                    </a>
                                                </li>

                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Description-->
                            <div class="mb-10 mt-5 font-weight-bold">Descripcion/Informacion</div>
                            <!--end::Description-->
                            <!--begin::Data-->
                            <div class="d-flex mb-5">
                                <div class="d-flex align-items-center mr-7">
                                    <span class="font-weight-bold mr-4">Inicio</span>
                                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">14/03/21</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="font-weight-bold mr-4">Final</span>
                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">15/03/21</span>
                                </div>
                            </div>
                            <!--end::Data-->
                            <!--begin::Progress-->
                            <div class="d-flex mb-5 align-items-cente">
                                <span class="d-block font-weight-bold mr-5">Punteo Obtenido</span>
                                <div class="d-flex flex-row-fluid align-items-center">
                                    <div class="progress progress-xs mt-2 mb-2 w-100">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:59%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ml-3 font-weight-bolder">59</span>
                                </div>
                            </div>
                            <!--ebd::Progress-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer d-flex align-items-center">
                            <a href="" class="btn btn-block btn-sm btn-light-info font-weight-bolder text-uppercase py-4">Boton</a>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end:: Card-->
                </div>
                <!--end::Course-->
                <!--begin::Course-->
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-4 symbol symbol-60 symbol-circle">
                                    <img src="assets/media/project-logos/3.png" alt="image" />
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                    <div class="d-flex flex-column mr-auto">
                                        <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">Nombre del curso</a>
                                        <span class="text-muted font-weight-bold">Nombre del profesor</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar mb-7">
                                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Acciones" data-placement="left">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-writing"></i>
                                                        </span>
                                                        <span class="navi-text">Archivos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-calendar-8"></i>
                                                        </span>
                                                        <span class="navi-text">Eventos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-graph-1"></i>
                                                        </span>
                                                        <span class="navi-text">Notas</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-rocket-1"></i>
                                                        </span>
                                                        <span class="navi-text">Otros</span>
                                                    </a>
                                                </li>

                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Description-->
                            <div class="mb-10 mt-5 font-weight-bold">Descripcion/Informacion</div>
                            <!--end::Description-->
                            <!--begin::Data-->
                            <div class="d-flex mb-5">
                                <div class="d-flex align-items-center mr-7">
                                    <span class="font-weight-bold mr-4">Inicio</span>
                                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">14/03/21</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="font-weight-bold mr-4">Final</span>
                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">15/03/21</span>
                                </div>
                            </div>
                            <!--end::Data-->
                            <!--begin::Progress-->
                            <div class="d-flex mb-5 align-items-cente">
                                <span class="d-block font-weight-bold mr-5">Punteo Obtenido</span>
                                <div class="d-flex flex-row-fluid align-items-center">
                                    <div class="progress progress-xs mt-2 mb-2 w-100">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:75%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ml-3 font-weight-bolder">75</span>
                                </div>
                            </div>
                            <!--ebd::Progress-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer d-flex align-items-center">
                            <a href="" class="btn btn-block btn-sm btn-light-info font-weight-bolder text-uppercase py-4">Boton</a>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end:: Card-->
                </div>
                <!--end::Course-->
                <!--begin::Course-->
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-4 symbol symbol-60 symbol-circle">
                                    <img src="assets/media/project-logos/3.png" alt="image" />
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                    <div class="d-flex flex-column mr-auto">
                                        <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">Nombre del curso</a>
                                        <span class="text-muted font-weight-bold">Nombre del profesor</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar mb-7">
                                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Acciones" data-placement="left">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-writing"></i>
                                                        </span>
                                                        <span class="navi-text">Archivos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-calendar-8"></i>
                                                        </span>
                                                        <span class="navi-text">Eventos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-graph-1"></i>
                                                        </span>
                                                        <span class="navi-text">Notas</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-rocket-1"></i>
                                                        </span>
                                                        <span class="navi-text">Otros</span>
                                                    </a>
                                                </li>

                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Description-->
                            <div class="mb-10 mt-5 font-weight-bold">Descripcion/Informacion</div>
                            <!--end::Description-->
                            <!--begin::Data-->
                            <div class="d-flex mb-5">
                                <div class="d-flex align-items-center mr-7">
                                    <span class="font-weight-bold mr-4">Inicio</span>
                                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">14/03/21</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="font-weight-bold mr-4">Final</span>
                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">15/03/21</span>
                                </div>
                            </div>
                            <!--end::Data-->
                            <!--begin::Progress-->
                            <div class="d-flex mb-5 align-items-cente">
                                <span class="d-block font-weight-bold mr-5">Punteo Obtenido</span>
                                <div class="d-flex flex-row-fluid align-items-center">
                                    <div class="progress progress-xs mt-2 mb-2 w-100">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ml-3 font-weight-bolder">59</span>
                                </div>
                            </div>
                            <!--ebd::Progress-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer d-flex align-items-center">
                            <a href="" class="btn btn-block btn-sm btn-light-info font-weight-bolder text-uppercase py-4">Boton</a>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end:: Card-->
                </div>
                <!--end::Course-->
            </div>
            <!--end::Row-->
                        <!--begin::Row-->
            <div class="row">
                <!--begin::Course-->
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-4 symbol symbol-60 symbol-circle">
                                    <img src="assets/media/project-logos/3.png" alt="image" />
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                    <div class="d-flex flex-column mr-auto">
                                        <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">Nombre del curso</a>
                                        <span class="text-muted font-weight-bold">Nombre del profesor</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar mb-7">
                                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Acciones" data-placement="left">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-writing"></i>
                                                        </span>
                                                        <span class="navi-text">Archivos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-calendar-8"></i>
                                                        </span>
                                                        <span class="navi-text">Eventos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-graph-1"></i>
                                                        </span>
                                                        <span class="navi-text">Notas</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-rocket-1"></i>
                                                        </span>
                                                        <span class="navi-text">Otros</span>
                                                    </a>
                                                </li>

                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Description-->
                            <div class="mb-10 mt-5 font-weight-bold">Descripcion/Informacion</div>
                            <!--end::Description-->
                            <!--begin::Data-->
                            <div class="d-flex mb-5">
                                <div class="d-flex align-items-center mr-7">
                                    <span class="font-weight-bold mr-4">Inicio</span>
                                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">14/03/21</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="font-weight-bold mr-4">Final</span>
                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">15/03/21</span>
                                </div>
                            </div>
                            <!--end::Data-->
                            <!--begin::Progress-->
                            <div class="d-flex mb-5 align-items-cente">
                                <span class="d-block font-weight-bold mr-5">Punteo Obtenido</span>
                                <div class="d-flex flex-row-fluid align-items-center">
                                    <div class="progress progress-xs mt-2 mb-2 w-100">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ml-3 font-weight-bolder">65</span>
                                </div>
                            </div>
                            <!--ebd::Progress-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer d-flex align-items-center">
                            <a href="" class="btn btn-block btn-sm btn-light-info font-weight-bolder text-uppercase py-4">Boton</a>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end:: Card-->
                </div>
                <!--end::Course-->
                <!--begin::Course-->
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-4 symbol symbol-60 symbol-circle">
                                    <img src="assets/media/project-logos/3.png" alt="image" />
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                    <div class="d-flex flex-column mr-auto">
                                        <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">Nombre del curso</a>
                                        <span class="text-muted font-weight-bold">Nombre del profesor</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar mb-7">
                                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Acciones" data-placement="left">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-writing"></i>
                                                        </span>
                                                        <span class="navi-text">Archivos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-calendar-8"></i>
                                                        </span>
                                                        <span class="navi-text">Eventos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-graph-1"></i>
                                                        </span>
                                                        <span class="navi-text">Notas</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-rocket-1"></i>
                                                        </span>
                                                        <span class="navi-text">Otros</span>
                                                    </a>
                                                </li>

                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Description-->
                            <div class="mb-10 mt-5 font-weight-bold">Descripcion/Informacion</div>
                            <!--end::Description-->
                            <!--begin::Data-->
                            <div class="d-flex mb-5">
                                <div class="d-flex align-items-center mr-7">
                                    <span class="font-weight-bold mr-4">Inicio</span>
                                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">14/03/21</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="font-weight-bold mr-4">Final</span>
                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">15/03/21</span>
                                </div>
                            </div>
                            <!--end::Data-->
                            <!--begin::Progress-->
                            <div class="d-flex mb-5 align-items-cente">
                                <span class="d-block font-weight-bold mr-5">Punteo Obtenido</span>
                                <div class="d-flex flex-row-fluid align-items-center">
                                    <div class="progress progress-xs mt-2 mb-2 w-100">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ml-3 font-weight-bolder">50</span>
                                </div>
                            </div>
                            <!--ebd::Progress-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer d-flex align-items-center">
                            <a href="" class="btn btn-block btn-sm btn-light-info font-weight-bolder text-uppercase py-4">Boton</a>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end:: Card-->
                </div>
                <!--end::Course-->
                <!--begin::Course-->
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Pic-->
                                <div class="flex-shrink-0 mr-4 symbol symbol-60 symbol-circle">
                                    <img src="assets/media/project-logos/3.png" alt="image" />
                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                    <div class="d-flex flex-column mr-auto">
                                        <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">Nombre del curso</a>
                                        <span class="text-muted font-weight-bold">Nombre del profesor</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar mb-7">
                                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Acciones" data-placement="left">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-writing"></i>
                                                        </span>
                                                        <span class="navi-text">Archivos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-calendar-8"></i>
                                                        </span>
                                                        <span class="navi-text">Eventos</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-graph-1"></i>
                                                        </span>
                                                        <span class="navi-text">Notas</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-rocket-1"></i>
                                                        </span>
                                                        <span class="navi-text">Otros</span>
                                                    </a>
                                                </li>

                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Description-->
                            <div class="mb-10 mt-5 font-weight-bold">Descripcion/Informacion</div>
                            <!--end::Description-->
                            <!--begin::Data-->
                            <div class="d-flex mb-5">
                                <div class="d-flex align-items-center mr-7">
                                    <span class="font-weight-bold mr-4">Inicio</span>
                                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">14/03/21</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="font-weight-bold mr-4">Final</span>
                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">15/03/21</span>
                                </div>
                            </div>
                            <!--end::Data-->
                            <!--begin::Progress-->
                            <div class="d-flex mb-5 align-items-cente">
                                <span class="d-block font-weight-bold mr-5">Punteo Obtenido</span>
                                <div class="d-flex flex-row-fluid align-items-center">
                                    <div class="progress progress-xs mt-2 mb-2 w-100">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:89%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ml-3 font-weight-bolder">89</span>
                                </div>
                            </div>
                            <!--ebd::Progress-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer d-flex align-items-center">
                            <a href="" class="btn btn-block btn-sm btn-light-info font-weight-bolder text-uppercase py-4">Boton</a>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end:: Card-->
                </div>
                <!--end::Course-->
            </div>
            <!--end::Row-->
            <!--begin::Pagination-->
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap mr-3">
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-arrow-back icon-xs"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">3</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">4</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">5</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">6</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">7</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">8</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-arrow-next icon-xs"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width:75px;">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="text-muted">Mostrando 10 de 230 registros</span>
                </div>
            </div>
            <!--end::Pagination-->
        </div>
    @stop
