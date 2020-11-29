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
        <div class="content flex-column-fluid" id="kt_content">
            <div class="card card-custom">
                <div class="card-header">
                    <!--begin::Title-->
                    <div class="card-title">
                        <div class="flex-grow-1">                            
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="mr-3">
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                        {{$test->Title}}<br>
                                        Nombre del estudiante: {{$student->Names}} {{$student->LastNames}}<br>
                                        Curso: {{$course->Name}}<br>
                                        Profesor: {{$teacher->Names}} {{$teacher->LastNames}}<br>
                                        Valor: {{$test->Score}}<br>
                                        <!--begin::Progress-->
                                        <div class="d-flex mt-4 mt-sm-0">
                                            <span class="font-weight-bold mr-4">Nota Final</span>
                                            <div class="progress progress-xs mt-2 mb-2 flex-shrink-0 w-150px w-xl-500px">
                                                <div class="progress-bar bg-success" role="progressbar" style="width:78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-weight-bolder ml-4">78%</span>
                                        </div>
                                        <!--end::Progress-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Title-->
                    <div class="card-toolbar">
                        <div class="card-toolbar">
                            <a href="{{url('administration/student/list/test/'.$course->id)}}" class="btn btn-danger font-weight-bolder mr-2">
                            <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                        </div>
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i>Exportar</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav flex-column nav-hover">
                                    <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Elija una opción:</li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-print"></i>
                                            <span class="nav-text">Imprimir</span>
                                        </a>
                                    </li>a
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-copy"></i>
                                            <span class="nav-text">Copiar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-excel-o"></i>
                                            <span class="nav-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-text-o"></i>
                                            <span class="nav-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-pdf-o"></i>
                                            <span class="nav-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->
                    </div>
                </div>
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-head-bg table-vertical-center table-borderless">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    @foreach($titles as $title)
                                    <th class="pl-7">
                                        <center>
                                            <span class="text-dark-75">{{$title}}</span>
                                        </center>
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($models as $model)
                                <tr>
                                    <td>
                                        <center>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$model['question']}}</span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$model['type']}}</span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$model['answer']}}</span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$model['correct']}}</span>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <span class="label label-lg label-light-primary label-inline">{{$model['score']}}</span>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
    @stop
