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
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-favourite text-primary"></i>
                </span>
                <h3 class="card-label">
                    Evaluaciones
                </h3>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 draggable-zone">
              <!--begin::Card-->
              @foreach($models as $m)
              <div class="card card-custom gutter-b draggable">
                <div class="card-header">
                  <div class="card-title">
                    <h3 class="card-label">
                        {{$m['course']}}
                    </h3>
                  </div>
                  <div class="card-toolbar">
                    <a href="">
                      <button type="button" class="btn btn-outline-info" data-toggle="" data-target="">Empezar</button>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  Disponible:
                  Finaliza:
                </div>
              </div>
              @endforeach
              <!--end::Card-->
            </div>
          </div>
        </div>
        <!--end::Card-->
    </div>
  </div>
@stop