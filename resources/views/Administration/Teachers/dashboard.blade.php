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
										<!--begin::List Widget 17-->
										<div class="card card-custom gutter-b">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-4">
												<h3 class="card-title align-items-start flex-column">
													<span class="font-weight-bolder text-dark">My Activity</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">890,344 Sales</span>
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
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">08:42</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-warning icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">Outlines keep you honest. And keep structure</div>
														<!--end::Text-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">10:00</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-success icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Content-->
														<div class="timeline-content d-flex">
															<span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">AEOL meeting</span>
														</div>
														<!--end::Content-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">14:37</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-danger icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Desc-->
														<div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">Make deposit
														<a href="#" class="text-primary">USD 700</a>. to ESL</div>
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
										<div class="card card-custom">
									<div class="card-header">
										<div class="card-title">
											<h3 class="card-label">Basic Calendar</h3>
										</div>
										<div class="card-toolbar">
											<a href="#" class="btn btn-light-primary font-weight-bold">
											<i class="ki ki-plus icon-md mr-2"></i>Add Event</a>
										</div>
									</div>
									<div class="card-body">
										<div id="kt_calendar"></div>
									</div>
								</div>
									</div>
									<!--end::Aside-->
									<!--begin::Content-->
									<div class="flex-row-fluid ml-lg-8">
										<!--begin::Card-->
										<div class="card card-custom">
											<!--begin::Header-->
											<div class="card-header flex-wrap border-0 pt-6 pb-0">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Cursos <br> Estudiantes    </span>
													<span class="text-muted mt-1 font-weight-bold font-size-sm">Manage over 2400 teachers</span>
												</h3>
												<div class="card-toolbar">
													<div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
														<!--begin::Trigger Modal-->
														<a href="#" class="btn btn-success font-weight-bolder font-size-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#exampleModalCustomScrollable">New Teacher</a>
														<!--end::Trigger Modal-->
														<!--begin::Modal Content-->
														<div class="modal fade" id="exampleModalCustomScrollable" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
															<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLabel">Add New Teacher</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<i aria-hidden="true" class="ki ki-close"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<div data-scroll="true" data-height="600">
																			<form class="form pt-9">
																				<div class="form-group row">
																					<label class="col-xl-3 col-lg-3 text-right col-form-label">Name</label>
																					<div class="col-lg-9 col-xl-6">
																						<input class="form-control form-control-lg form-control-solid" type="text" value="Nick" />
																					</div>
																				</div>
																				<div class="form-group row">
																					<label class="col-xl-3 col-lg-3 text-right col-form-label">Nickname</label>
																					<div class="col-lg-9 col-xl-6">
																						<input class="form-control form-control-lg form-control-solid" type="text" value="Bold" />
																					</div>
																				</div>
																				<div class="form-group row">
																					<label class="col-xl-3 col-lg-3 text-right col-form-label">Organization</label>
																					<div class="col-lg-9 col-xl-6">
																						<input class="form-control form-control-lg form-control-solid" type="text" value="Loop Inc." />
																						<span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
																					</div>
																				</div>
																				<div class="separator separator-dashed my-10"></div>
																				<!--begin::Heading-->
																				<div class="row">
																					<div class="col-lg-9 col-xl-6 offset-xl-3">
																						<h3 class="font-size-h6 mb-5">Contact Info:</h3>
																					</div>
																				</div>
																				<!--end::Heading-->
																				<div class="form-group row">
																					<label class="col-xl-3 col-lg-3 text-right col-form-label">Phone</label>
																					<div class="col-lg-9 col-xl-6">
																						<div class="input-group input-group-lg input-group-solid">
																							<div class="input-group-prepend">
																								<span class="input-group-text">
																									<i class="la la-phone"></i>
																								</span>
																							</div>
																							<input type="text" class="form-control form-control-lg form-control-solid" value="+35278953712" placeholder="Phone" />
																						</div>
																						<span class="form-text text-muted">We'll never share your email with anyone else.</span>
																					</div>
																				</div>
																				<div class="form-group row">
																					<label class="col-xl-3 col-lg-3 text-right col-form-label">Email Address</label>
																					<div class="col-lg-9 col-xl-6">
																						<div class="input-group input-group-lg input-group-solid">
																							<div class="input-group-prepend">
																								<span class="input-group-text">
																									<i class="la la-at"></i>
																								</span>
																							</div>
																							<input type="text" class="form-control form-control-lg form-control-solid" value="nick.bold@loop.com" placeholder="Email" />
																						</div>
																					</div>
																				</div>
																				<div class="form-group row">
																					<label class="col-xl-3 col-lg-3 text-right col-form-label">Site</label>
																					<div class="col-lg-9 col-xl-6">
																						<div class="input-group input-group-lg input-group-solid">
																							<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Username" value="loop" />
																							<div class="input-group-append">
																								<span class="input-group-text">.com</span>
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="separator separator-dashed my-10"></div>
																				<!--begin::Heading-->
																				<div class="row">
																					<div class="col-lg-9 col-xl-6 offset-xl-3">
																						<h3 class="font-size-h6 mb-5">Contact Info:</h3>
																					</div>
																				</div>
																				<!--end::Heading-->
																				<div class="form-group row">
																					<label class="col-xl-3 col-lg-3 text-right col-form-label">Email Notification</label>
																					<div class="col-lg-9 col-xl-6">
																						<span class="switch">
																							<label>
																								<input type="checkbox" checked="checked" name="email_notification_1" />
																								<span></span>
																							</label>
																						</span>
																					</div>
																				</div>
																				<div class="form-group row">
																					<label class="col-xl-3 col-lg-3 text-right col-form-label">Send Copy</label>
																					<div class="col-lg-9 col-xl-6">
																						<span class="switch">
																							<label>
																								<input type="checkbox" name="email_notification_2" />
																								<span></span>
																							</label>
																						</span>
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
																		<button type="button" class="btn btn-primary font-weight-bold">Submit</button>
																	</div>
																</div>
															</div>
														</div>
														<!--end::Modal Content-->
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Search Form-->
												<!--begin::Search Form-->
												<div class="mb-10">
													<div class="row align-items-center">
														<div class="col-lg-9 col-xl-8">
															<div class="row align-items-center">
																<div class="col-md-4 my-2 my-md-0">
																	<div class="input-icon">
																		<input type="text" class="form-control form-control-solid" placeholder="Search..." id="kt_datatable_search_query" />
																		<span>
																			<i class="flaticon2-search-1 text-muted"></i>
																		</span>
																	</div>
																</div>
																<div class="col-md-4 my-2 my-md-0">
																	<select class="form-control form-control-solid" id="kt_datatable_search_status">
																		<option value="">Status</option>
																		<option value="1">Pending</option>
																		<option value="2">Delivered</option>
																		<option value="3">Canceled</option>
																	</select>
																</div>
																<div class="col-md-4 my-2 my-md-0">
																	<select class="form-control form-control-solid" id="kt_datatable_search_type">
																		<option value="">Type</option>
																		<option value="4">Success</option>
																		<option value="5">Info</option>
																		<option value="6">Danger</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
															<a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
														</div>
													</div>
												</div>
												<!--end::Search Form-->
												<!--end: Search Form-->
												<!--begin::Datatable-->
												<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
												<!--end::Datatable-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Card-->
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