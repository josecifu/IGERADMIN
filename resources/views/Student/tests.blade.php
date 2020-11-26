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
                @foreach($models as $model)
                <!--begin::Course-->
                <div class="col-xl-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <!--begin::Info-->
                                <div class="d-flex flex-column mr-auto">
                                    <!--begin: Title-->
                                    <div class="d-flex flex-column mr-auto">
                                        <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{$model['course']}}</a>
                                        <span class="text-muted font-weight-bold">Profesor: {{$model['teacher']}}</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Description-->
                            <div class="mb-10 mt-5 font-weight-bold">
                                {{$model['test']}}<br>
                                {{$model['activity']}}<br>
                                Valor: {{$model['score']}}
                            </div>
                            <!--end::Description-->
                            <!--begin::Data-->
                            <div class="d-flex mb-5">
                                <div class="d-flex align-items-center mr-7">
                                    <span class="font-weight-bold mr-4">Inicio</span>
                                    <span class="btn btn-light-success btn-sm font-weight-bold btn-upper btn-text">{{$model['start']}}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="font-weight-bold mr-4">Final</span>
                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{$model['end']}}</span>
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
                            <a href="" class="btn btn-block btn-sm btn-light-info font-weight-bolder text-uppercase py-4">Realizar</a>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end:: Card-->
                </div>
                <!--end::Course-->
                @endforeach
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
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">4</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">5</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">6</a>
                    <a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">7</a>
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
