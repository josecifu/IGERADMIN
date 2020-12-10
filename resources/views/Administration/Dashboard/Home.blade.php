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
												<div class="scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
												<!--begin::Container-->
												
													@foreach ($Logs['Test'] as $test)
													<!--begin::Item-->
													<div class="d-flex align-items-center mb-8">
														<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light mr-4">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
																					<circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
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
										<div class="scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
												
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
											<div class="card-body pt-4">
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
										</div>
										<!--end: List Widget 9-->
									</div>
								</div>
								<!--end::Dashboard-->
							</div>
							  @stop
   							 @section('scripts')
   							  @stop