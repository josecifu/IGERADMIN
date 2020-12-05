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
								<!--begin::Dashboard-->
							
								<div class="row">
									<div class="col-lg-3 col-md-12 col-sm-12">
									<!--begin::List Widget 17-->

										<div class="card card-custom gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Ultimos examenes realizados</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">{{count($Logs['Test'])}} examenes realizados por voluntarios</span>
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4">
												<!--begin::Container-->
												<div>
													@foreach ($Logs['Test'] as $test)
													<!--begin::Item-->
													<div class="d-flex align-items-center mb-8">
														<!--begin::Symbol-->
														<!--end::Symbol-->
														<!--begin::Info-->
														<div class="d-flex flex-column">
															<!--begin::Title-->
															<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$test['Title']}}</a>
															<!--end::Title-->
															<!--begin::Text-->
															<span class="text-muted font-weight-bold font-size-sm pb-4">{{$test['User']}}
															<br />{{$test['Date']}}</span>
															<!--end::Text-->
															<!--begin::Action-->
															<div>
																<a  href="{{$test['url']}}" class="btn btn-light font-weight-bolder font-size-sm py-2">Ver examen</a>
															</div>
															<!--end::Action-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Item-->
													@endforeach
													
												</div>
												<!--end::Container-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 17-->
								
									</div>
									<div class="col-lg-9 col-md-12 col-sm-12">
										<!--begin::List Widget 9-->
										<div class="card card-custom gutter-b">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-4">
												<h3 class="card-title align-items-start flex-column">
													<span class="font-weight-bolder text-dark">Actividad de encargados de ciruclo</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">Actividades realizadas por los encargados de circulo</span>
												</h3>
											
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4" style="height: 440px;">
												<!--begin::Timeline-->
												<div class="timeline timeline-6 mt-3">
													@if(count($Logs['Timeline'])==0)
													<center><h1> No existe actividad reciente</h1></center>
													@endif
													@foreach($Logs['Timeline'] as $time)
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{$time['Time']}}</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-warning icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">{{$time['Description']}}</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													@endforeach
												</div>
												<!--end::Timeline-->
											</div>
											<!--end: Card Body-->
										</div>
										<!--end: List Widget 9-->
									</div>
								</div>
								<!--end::Dashboard-->
							</div>
							  @stop
   							 @section('scripts')
   							  @stop