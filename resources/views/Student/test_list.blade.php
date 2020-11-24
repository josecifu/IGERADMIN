@extends('Administration.Base/BaseStudent')
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
      <!--begin::Card-->
      <div class="card card-custom">
        <div class="card-header">
          <div class="card-title">
              <span class="card-icon">
                  <i class="flaticon2-favourite text-primary"></i>
              </span>
              <h3 class="card-label">Evaluaciones programadas</h3>
          </div>
          <div class="card-toolbar">
              <a href="{{url('student/home/dashboard')}}" class="btn btn-danger font-weight-bolder mr-2">
              <i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            @foreach($models as $model)
            <div class="col-lg-6 draggable-zone float-left">
              <!--begin::Card-->
              <div class="card card-custom gutter-b draggable">
                <div class="card-header">
                  <div class="card-title">
                    <h5>
                      <div class="d-flex flex-column mr-auto">
                          <a class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{$model['course']}}</a>
                          <span class="text-muted font-weight-bold">Profesor: {{$model['teacher']}}</span>
                      </div>
                    </h5>
                  </div>
                  <div class="card-toolbar">
                    <a href="{{url('/student/test/view/questions/1')}}">
                      <button type="button" class="btn btn-outline-info">Empezar</button>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <!--begin::Info-->
                  <div class="mb-7">
                    <h6>
                      {{$model['activity']}}<br>
                      {{$model['test']}}
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="text-dark-75 font-weight-bolder mr-2">Valor:</span>
                      <span class="text-dark-75 font-weight-bolder">{{$model['score']}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="text-dark-75 font-weight-bolder mr-2">Fecha de disponibilidad:</span>
                      <span class="text-dark-75 font-weight-bolder">{{$model['start']}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="text-dark-75 font-weight-bolder mr-2">Fecha de finalización</span>
                      <span class="text-dark-75 font-weight-bolder">{{$model['end']}}</span>
                    </div>
                  </div>
                  <!--end::Info-->
                </div>
              </div>
              <!--end::Card-->
            </div>
            @endforeach
          </div>
        </div>
        <!--end::Card-->
      </div>
    </div>
  @stop
