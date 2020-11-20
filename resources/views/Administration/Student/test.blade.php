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
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <table class="table table-bordered table-hover table-checkable" id="" style="margin-top: 20px !important ">
                            <thead>
                                <tr>
                                    <th>
                                        <h4>
                                            Titulo de evaluacion<br>
                                            Nombre del estudiante: Javier Angulo<br>
                                            Curso: Matemáticas<br>
                                            Nombre del maestro: Rodrigo Castillo<br>
                                            Nota final: 25
                                        </h4>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="card-toolbar">
                        <div class="card-header">
                            <div class="card-toolbar">
                                <a href="{{url('administration/student/lists/test/1')}}" class="btn btn-danger font-weight-bolder mr-2">
                                <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                            </div>
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
                                    </li>
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
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                @foreach($titles as $t)
                                <th>{{ $t }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $m)
                            <tr>
                                <td>{{$m['Id']}}</td>
                                <td>{{$m['question']}}</td>
                                <td>
                                @if($m['type']=="V/F")
                                    Verdadero / Falso
                                @endif
                                </td>
                                <td>5</td>
                                <td>{{$m['correct']}}</td>
                                <td>0</td>
                                <td><center><button type="button" disabled class="btn btn-outline-info" data-toggle="tooltip" title="Ver pregunta" data-placement="left">Ver pregunta</button></center></td>
                                <td nowrap="nowrap"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
    @stop
