@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Voluntario
    @stop
    @section('breadcrumb1')
    Estadísticas
    @stop
    @section('breadcrumb2')
    
    @stop
    {{-- Page content --}}
    @section('content')
    <div class="content flex-column-fluid" id="kt_content">
    <div class="row">
									<div class="col-lg-6">
										<!--begin::Card-->
										<div class="card card-custom gutter-b">
											<div class="card-header">
												<div class="card-title">
													<h3 class="card-label">Actividad de voluntarios</h3>
												</div>
											</div>
											<div class="card-body">
												<!--begin::Chart-->
												<div id="chart_3"></div>
												<!--end::Chart-->
											</div>
										</div>
										<!--end::Card-->
									</div>
									<div class="col-lg-6">
										<!--begin::Card-->
                    <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Voluntarios por circulo de estudio</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin::Chart-->
                        <div id="chart_12" class="d-flex justify-content-center"></div>
                        <!--end::Chart-->
                    </div>
                </div>
                <!--end::Card-->
									</div>
								</div>
    </div>
       
        
	@stop
  @section('scripts')
    <script src="{{ asset ('assets/js/pages/features/charts/apexcharts.js')}}"></script>
	@stop