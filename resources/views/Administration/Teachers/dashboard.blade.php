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
								<!--begin::Teachers-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->
									<div class="flex-md-row-auto w-md-275px w-xl-325px">
									<div class="card card-custom gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Wrapper-->
												<div class="d-flex justify-content-between flex-column h-100">
													<!--begin::Container-->
													<div class="h-100">
														<!--begin::Header-->
														<div class="d-flex flex-column flex-center">
															<!--begin::Image-->
															<!--end::Image-->
															<!--begin::Title-->
															<a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">Curso Matematicas</a>
															<!--end::Title-->
															<!--begin::Text-->
															<div class="font-weight-bold text-dark-50 font-size-sm pb-7">Viernes, Pedro Lopez</div>
															<!--end::Text-->
														</div>
														<!--end::Header-->
														<!--begin::Body-->
														<div class="pt-1">
															<!--begin::Item-->
															<div class="d-flex align-items-center pb-9">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light mr-4">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
																					<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
																					<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
																					<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
																<!--end::Symbol-->
																<!--begin::Text-->
																<div class="d-flex flex-column flex-grow-1">
																	<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Tareas</a>
																	<span class="text-muted font-weight-bold">Good Fellas</span>
																</div>
																<!--end::Text-->
																<!--begin::label-->
																<span class="font-weight-bolder label label-xl label-light-success label-inline px-3 py-5 min-w-45px">14</span>
																<!--end::label-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center pb-9">
																<!--begin::Symbol-->
																<div class="symbol symbol-45 symbol-light mr-4">
																	<span class="symbol-label">
																		<span class="svg-icon svg-icon-2x svg-icon-dark-50">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																					<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</span>
																</div>
																<!--end::Symbol-->
																<!--begin::Text-->
																<div class="d-flex flex-column flex-grow-1">
																	<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Estudiantes</a>
																	<span class="text-muted font-weight-bold">Successful Fellas</span>
																</div>
																<!--end::Text-->
																<!--begin::label-->
																<span class="font-weight-bolder label label-xl label-light-danger label-inline px-3 py-5 min-w-45px">37</span>
																<!--end::label-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="d-flex align-items-center pb-9">
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
																<!--begin::Text-->
																<div class="d-flex flex-column flex-grow-1">
																	<a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Periodos</a>
																	<span class="text-muted font-weight-bold">Successful Fellas</span>
																</div>
																<!--end::Text-->
																<!--begin::label-->
																<span class="font-weight-bolder label label-xl label-light-primary label-inline py-5 min-w-45px">7-4</span>
																<!--end::label-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Body-->
													</div>
													<!--eng::Container-->
													<!--begin::Footer-->
													<div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler_3" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">
														<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">Datos Voluntario</button>
													</div>
													<!--end::Footer-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Body-->
										</div>
									</div>
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid ml-lg-8">
										<div class="card card-custom gutter-b">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-4">
												<h3 class="card-title align-items-start flex-column">
													<span class="font-weight-bolder text-dark">Lista Actividades</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
												</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline">
														<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="ki ki-bold-more-hor"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
															<!--begin::Navigation-->
															<ul class="navi navi-hover">
																<li class="navi-header font-weight-bold py-4">
																	<span class="font-size-lg">Choose Label:</span>
																	<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
																</li>
																<li class="navi-separator mb-3 opacity-70"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-success">Customer</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-danger">Partner</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-warning">Suplier</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-primary">Member</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">
																			<span class="label label-xl label-inline label-light-dark">Staff</span>
																		</span>
																	</a>
																</li>
																<li class="navi-separator mt-3 opacity-70"></li>
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm" href="#">
																	<i class="ki ki-plus icon-sm"></i>Add new</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4">
												<!--begin::Timeline-->
												<div class="timeline timeline-6 mt-3">
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">1</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-warning icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">Primer examen</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">2</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-success icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Content-->
														<div class="timeline-content d-flex">
															<span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">Segundo Examen</span>
														</div>
														<!--end::Content-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">3</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-danger icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Desc-->
														<div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">Lectura paginas
														<a href="#" class="text-primary"> 7 y 9</a></div>
														<!--end::Desc-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-primary icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Indulging in poorly driving and keep structure keep great</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-danger icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Desc-->
														<div class="timeline-content font-weight-bolder text-dark-75 pl-3 font-size-lg">New order placed
														<a href="#" class="text-primary">#XF-2356</a>.</div>
														<!--end::Desc-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">23:07</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-info icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">Outlines keep and you honest. Indulging in poorly driving</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
												</div>
												<!--end::Timeline-->
											</div>
											<!--end: Card Body-->
										</div>
									</div>
									<!--end::Content-->
								</div>
								<!--end::Teachers-->
								
							</div>
							

	@stop
	@section('scripts')
<!--end::Demo Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#8950FC", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#EEE5FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/features/calendar/basic.js">

<code class="language-js">
                var KTCalendarBasic = function() {

                    return {
                        //main function to initiate the module
                        init: function() {
                            var todayDate = moment().startOf('day');
                            var YM = todayDate.format('YYYY-MM');
                            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                            var TODAY = todayDate.format('YYYY-MM-DD');
                            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

                            var calendarEl = document.getElementById('kt_calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                                themeSystem: 'bootstrap',

                                isRTL: KTUtil.isRTL(),

                                header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                                },

                                height: 800,
                                contentHeight: 780,
                                aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

                                nowIndicator: true,
                                now: TODAY + 'T09:25:00', // just for demo

                                views: {
                                    dayGridMonth: { buttonText: 'month' },
                                    timeGridWeek: { buttonText: 'week' },
                                    timeGridDay: { buttonText: 'day' }
                                },

                                defaultView: 'dayGridMonth',
                                defaultDate: TODAY,

                                editable: true,
                                eventLimit: true, // allow "more" link when too many events
                                navLinks: true,
                                events: [
                                    {
                                        title: 'All Day Event',
                                        start: YM + '-01',
                                        description: 'Toto lorem ipsum dolor sit incid idunt ut',
                                        className: "fc-event-danger fc-event-solid-warning"
                                    },
                                    {
                                        title: 'Reporting',
                                        start: YM + '-14T13:30:00',
                                        description: 'Lorem ipsum dolor incid idunt ut labore',
                                        end: YM + '-14',
                                        className: "fc-event-success"
                                    },
                                    {
                                        title: 'Company Trip',
                                        start: YM + '-02',
                                        description: 'Lorem ipsum dolor sit tempor incid',
                                        end: YM + '-03',
                                        className: "fc-event-primary"
                                    },
                                    {
                                        title: 'ICT Expo 2017 - Product Release',
                                        start: YM + '-03',
                                        description: 'Lorem ipsum dolor sit tempor inci',
                                        end: YM + '-05',
                                        className: "fc-event-light fc-event-solid-primary"
                                    },
                                    {
                                        title: 'Dinner',
                                        start: YM + '-12',
                                        description: 'Lorem ipsum dolor sit amet, conse ctetur',
                                        end: YM + '-10'
                                    },
                                    {
                                        id: 999,
                                        title: 'Repeating Event',
                                        start: YM + '-09T16:00:00',
                                        description: 'Lorem ipsum dolor sit ncididunt ut labore',
                                        className: "fc-event-danger"
                                    },
                                    {
                                        id: 1000,
                                        title: 'Repeating Event',
                                        description: 'Lorem ipsum dolor sit amet, labore',
                                        start: YM + '-16T16:00:00'
                                    },
                                    {
                                        title: 'Conference',
                                        start: YESTERDAY,
                                        end: TOMORROW,
                                        description: 'Lorem ipsum dolor eius mod tempor labore',
                                        className: "fc-event-primary"
                                    },
                                    {
                                        title: 'Meeting',
                                        start: TODAY + 'T10:30:00',
                                        end: TODAY + 'T12:30:00',
                                        description: 'Lorem ipsum dolor eiu idunt ut labore'
                                    },
                                    {
                                        title: 'Lunch',
                                        start: TODAY + 'T12:00:00',
                                        className: "fc-event-info",
                                        description: 'Lorem ipsum dolor sit amet, ut labore'
                                    },
                                    {
                                        title: 'Meeting',
                                        start: TODAY + 'T14:30:00',
                                        className: "fc-event-warning",
                                        description: 'Lorem ipsum conse ctetur adipi scing'
                                    },
                                    {
                                        title: 'Happy Hour',
                                        start: TODAY + 'T17:30:00',
                                        className: "fc-event-info",
                                        description: 'Lorem ipsum dolor sit amet, conse ctetur'
                                    },
                                    {
                                        title: 'Dinner',
                                        start: TOMORROW + 'T05:00:00',
                                        className: "fc-event-solid-danger fc-event-light",
                                        description: 'Lorem ipsum dolor sit ctetur adipi scing'
                                    },
                                    {
                                        title: 'Birthday Party',
                                        start: TOMORROW + 'T07:00:00',
                                        className: "fc-event-primary",
                                        description: 'Lorem ipsum dolor sit amet, scing'
                                    },
                                    {
                                        title: 'Click for Google',
                                        url: 'http://google.com/',
                                        start: YM + '-28',
                                        className: "fc-event-solid-info fc-event-light",
                                        description: 'Lorem ipsum dolor sit amet, labore'
                                    }
                                ],

                                eventRender: function(info) {
                                    var element = $(info.el);

                                    if (info.event.extendedProps &amp;&amp; info.event.extendedProps.description) {
                                        if (element.hasClass('fc-day-grid-event')) {
                                            element.data('content', info.event.extendedProps.description);
                                            element.data('placement', 'top');
                                            KTApp.initPopover(element);
                                        } else if (element.hasClass('fc-time-grid-event')) {
                                            element.find('.fc-title').append('&lt;div class="fc-description"&gt;' + info.event.extendedProps.description + '&lt;/div&gt;');
                                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                                            element.find('.fc-list-item-title').append('&lt;div class="fc-description"&gt;' + info.event.extendedProps.description + '&lt;/div&gt;');
                                        }
                                    }
                                }
                            });

                            calendar.render();
                        }
                    };
                }();

                jQuery(document).ready(function() {
                    KTCalendarBasic.init();
                });
    </code>
</script>
	@stop