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
                    <h4>{{$model['course']}}</h4>
                  </div>
                  <div class="card-toolbar">
                    <a href="{{url('/student/test/view/questions/1')}}">
                      <button type="button" class="btn btn-outline-info">Empezar</button>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <h7>Disponible: 20/11/2020 2:00 PM<br><br>Finaliza: 20/11/2020 4:00 PM</h7>
                </div>
              </div>
              <!--end::Card-->
            </div>@endforeach
          </div>
        </div>
        <!--end::Card-->
      </div>
    </div>
  @stop
