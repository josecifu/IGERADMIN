
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>IGER | Administration</title>
		<meta name="description" content="Updates and statistics" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/faviconiger.ico')}}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header Mobile-->
					<div id="kt_header_mobile" class="header-mobile">
						<!--begin::Logo-->
						<a href="index.html">
							<img alt="Logo" src="{{ asset('assets/media/logos/Logo-Iger.png')}}" class="max-h-30px" />
						</a>
						<!--end::Logo-->
						<!--begin::Toolbar-->
						<div class="d-flex align-items-center">
							<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
								<span></span>
							</button>
							<button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
								<span class="svg-icon svg-icon-xl">
									<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</button>
						</div>
						<!--end::Toolbar-->
					</div>
					<!--end::Header Mobile-->
					<!--begin::Header-->
					@include('Administration.Base._header')
					<!--end::Header-->
					
					<!--begin::Container-->
					<div class="d-flex flex-row flex-column-fluid container">
						<!--begin::Content Wrapper-->
						<div class="main d-flex flex-column flex-row-fluid">
							<!--begin::Subheader-->
							<div class="subheader py-2 py-lg-6" id="kt_subheader">
								<div class="w-100 d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
									<!--begin::Info-->
									<div class="d-flex align-items-center flex-wrap mr-1">
										<!--begin::Page Heading-->
										<div class="d-flex align-items-baseline flex-wrap mr-5">
											<!--begin::Page Title-->
											<h5 class="text-dark font-weight-bold my-1 mr-5">
												@section('title')								          
												 @show
											  </h5>
											<!--end::Page Title-->
											<!--begin::Breadcrumb-->
											<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
												<li class="breadcrumb-item">
													<a href="@section('breadcrumb1link')@show" class="text-muted">
													@section('breadcrumb1')				          
													@show</a>
												</li>
												<li class="breadcrumb-item">
													<a href="@section('breadcrumb2link')@show" class="text-muted">
													@section('breadcrumb2')							          
													@show</a>
												</li>
											</ul>
											<!--end::Breadcrumb-->
										</div>
										<!--end::Page Heading-->
									</div>
									<!--end::Info-->
									<!--begin::Toolbar-->
									<div class="d-flex align-items-center">
										<!--begin::Daterange-->
										<!--<a href="#" class="btn btn-light-primary btn-sm font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Seleccione fecha para desplegar informacion" data-placement="left">
											<span class="opacity-60 font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title" style="color: white">Hoy</span>
											<span class="font-weight-bold" id="kt_dashboard_daterangepicker_date">-</span>
										</a>-->
										<!--end::Daterange-->
										@if($buttons ?? '')
										<!--begin::Dropdown-->
										<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Acciones" data-placement="left">
											<a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="svg-icon svg-icon-warning svg-icon-2x">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24" />
															<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</a>
											
											<div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
												<!--begin::Navigation-->
												<ul class="navi navi-hover">
													<li class="navi-header font-weight-bold py-4">
														<span class="font-size-lg">Acciones disponibles:</span>
														<i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Seleccione una de las opciones disponibles"></i>
													</li>
													
														@foreach($buttons ?? '' as $key => $button)
															@if($key!=0)
															<li class="navi-separator mt-3 opacity-70"></li>
															@endif
															@if($button['Type']=='add')
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm"  style="width: 100%" href="{{ url($button['Link'])}}">
																	<i class="ki ki-plus icon-sm"></i>{{$button['Name']}}</a>
																</li>
															@elseif($button['Type']=='addFunction')
																<li class="navi-footer py-4">
																	<a class="btn btn-clean font-weight-bold btn-sm"  style="width: 100%" href="#" onclick="{{$button['Link']}}">
																	<i class="ki ki-plus icon-sm"></i>{{$button['Name']}}</a>
																</li>
															@elseif ($button['Type']=='btn1')
															<li class="navi-item">
																<a href="{{ url($button['Link'])}}" class="navi-link">
																	<span class="navi-text">
																		<span class="label label-xl label-inline"  style="width: 100%">{{$button['Name']}}</span>
																	</span>
																</a>
															</li>
															@endif
														@endforeach
													
												</ul>
												<!--end::Navigation-->
											</div>
											
										</div>
										@endif
										<!--end::Dropdown-->
									</div>
									<!--end::Toolbar-->
								</div>
							</div>
							<!--end::Subheader-->
							 @yield('content')


							 <!--begin::Modal-->

							 <div class="modal fade" id="kt_select_modalSelect1" role="dialog" aria-hidden="true">
								 <div class="modal-dialog modal-lg" role="document">
									 <div class="modal-content">
										 <div class="modal-header">
											 <h5 class="modal-title" id="Title1">Listado de alumnos por grados </h5>
											 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												 <i aria-hidden="true" class="ki ki-close"></i>
											 </button>
										 </div>
										 <form class="form">
											 <div class="modal-body" id="bdModal">
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Seleccione el dia:</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control selectpicker" data-size="10" title="Ninguna jornada ha sido seleccionada" data-live-search="true" id="periodselect1">
														   
														</select>
														
													</div>
												</div>
												 <div class="form-group row" id="SelectLvl" style="visibility: hidden;">
													 <label class="col-form-label text-right col-lg-3 col-sm-12">Seleccione el nivel:</label>
													 <div class="col-lg-9 col-md-9 col-sm-12">
														 <select class="form-control selectpicker" title="Ningun nivel ha sido seleccionado" data-size="10" data-live-search="true" id="lvlmodalselect1">
															
														 </select>
														 
													 </div>
												 </div>
												 <div class="form-group row" id="SelectGrd" style="visibility: hidden;">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Seleccione el grado:</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control selectpicker" title="Ningun grado ha sido seleccionado" data-size="10" data-live-search="true" id="gradeselect1">
														   
														</select>
													</div>
												</div>
												<div class="form-group row" id="SelectCourse" style="visibility: hidden;">
													<label class="col-form-label text-right col-lg-3 col-sm-12">Seleccione el curso:</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
														<select class="form-control selectpicker" title="Ningun curso ha sido seleccionado" data-size="10" data-live-search="true" id="courseselect1">
														   
														</select>
														<span class="form-text text-muted" id="Title3">Visualice el listado de alumnos por grados del nivel y dia seleccionado</span>
													</div>
												</div>
											 </div>
											 <div class="modal-footer">
												 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												 <button type="button" class="btn btn-primary mr-2" onclick="save();" id="btnModal">Visualizar</button>
											 </div>
										 </form>
									 </div>
								 </div>
							 </div>
							 <!--end::Modal-->

							<!--end::Content-->
						</div>
						<!--begin::Content Wrapper-->
					</div>
					<!--end::Container-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
						
								<a href="#" target="_blank" class="text-white text-hover-primary">IGER 2021 donación de proyecto</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Nav-->
						
							<!--end::Nav-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!--begin::Quick Cart-->
		<div id="kt_quick_cart" class="offcanvas offcanvas-right p-10">
			<!--begin::Header-->
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
				<h4 class="font-weight-bold m-0">Shopping Cart</h4>
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>
			<!--end::Header-->
			<!--begin::Content-->
			<div class="offcanvas-content">
				<!--begin::Wrapper-->
				<div class="offcanvas-wrapper mb-5 scroll-pull">
					<!--begin::Item-->
					<div class="d-flex align-items-center justify-content-between py-8">
						<div class="d-flex flex-column mr-2">
							<a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">iBlender</a>
							<span class="text-muted">The best kitchen gadget in 2020</span>
							<div class="d-flex align-items-center mt-2">
								<span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 350</span>
								<span class="text-muted mr-1">for</span>
								<span class="font-weight-bold mr-2 text-dark-75 font-size-lg">5</span>
								<a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
									<i class="ki ki-minus icon-xs"></i>
								</a>
								<a href="#" class="btn btn-xs btn-light-success btn-icon">
									<i class="ki ki-plus icon-xs"></i>
								</a>
							</div>
						</div>
						
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-solid"></div>
					<!--end::Separator-->
					<!--begin::Item-->
					<div class="d-flex align-items-center justify-content-between py-8">
						<div class="d-flex flex-column mr-2">
							<a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">SmartCleaner</a>
							<span class="text-muted">Smart tool for cooking</span>
							<div class="d-flex align-items-center mt-2">
								<span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 650</span>
								<span class="text-muted mr-1">for</span>
								<span class="font-weight-bold mr-2 text-dark-75 font-size-lg">4</span>
								<a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
									<i class="ki ki-minus icon-xs"></i>
								</a>
								<a href="#" class="btn btn-xs btn-light-success btn-icon">
									<i class="ki ki-plus icon-xs"></i>
								</a>
							</div>
						</div>
						<a href="#" class="symbol symbol-70 flex-shrink-0">
							<img src="{{ asset('assets/media/stock-600x400/img-2.jpg')}}" title="" alt="" />
						</a>
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-solid"></div>
					<!--end::Separator-->
					<!--begin::Item-->
					<div class="d-flex align-items-center justify-content-between py-8">
						<div class="d-flex flex-column mr-2">
							<a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">CameraMax</a>
							<span class="text-muted">Professional camera for edge cutting shots</span>
							<div class="d-flex align-items-center mt-2">
								<span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 150</span>
								<span class="text-muted mr-1">for</span>
								<span class="font-weight-bold mr-2 text-dark-75 font-size-lg">3</span>
								<a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
									<i class="ki ki-minus icon-xs"></i>
								</a>
								<a href="#" class="btn btn-xs btn-light-success btn-icon">
									<i class="ki ki-plus icon-xs"></i>
								</a>
							</div>
						</div>
						<a href="#" class="symbol symbol-70 flex-shrink-0">
							<img src="{{ asset('assets/media/stock-600x400/img-3.jpg')}}" title="" alt="" />
						</a>
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-solid"></div>
					<!--end::Separator-->
					<!--begin::Item-->
					<div class="d-flex align-items-center justify-content-between py-8">
						<div class="d-flex flex-column mr-2">
							<a href="#" class="font-weight-bold text-dark text-hover-primary">4D Printer</a>
							<span class="text-muted">Manufactoring unique objects</span>
							<div class="d-flex align-items-center mt-2">
								<span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 1450</span>
								<span class="text-muted mr-1">for</span>
								<span class="font-weight-bold mr-2 text-dark-75 font-size-lg">7</span>
								<a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
									<i class="ki ki-minus icon-xs"></i>
								</a>
								<a href="#" class="btn btn-xs btn-light-success btn-icon">
									<i class="ki ki-plus icon-xs"></i>
								</a>
							</div>
						</div>
						<a href="#" class="symbol symbol-70 flex-shrink-0">
							<img src="{{ asset('assets/media/stock-600x400/img-4.jpg')}}" title="" alt="" />
						</a>
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-solid"></div>
					<!--end::Separator-->
					<!--begin::Item-->
					<div class="d-flex align-items-center justify-content-between py-8">
						<div class="d-flex flex-column mr-2">
							<a href="#" class="font-weight-bold text-dark text-hover-primary">MotionWire</a>
							<span class="text-muted">Perfect animation tool</span>
							<div class="d-flex align-items-center mt-2">
								<span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 650</span>
								<span class="text-muted mr-1">for</span>
								<span class="font-weight-bold mr-2 text-dark-75 font-size-lg">7</span>
								<a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
									<i class="ki ki-minus icon-xs"></i>
								</a>
								<a href="#" class="btn btn-xs btn-light-success btn-icon">
									<i class="ki ki-plus icon-xs"></i>
								</a>
							</div>
						</div>
						<a href="#" class="symbol symbol-70 flex-shrink-0">
							<img src="{{ asset('assets/media/stock-600x400/img-8.jpg')}}" title="" alt="" />
						</a>
					</div>
					<!--end::Item-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Purchase-->
				<div class="offcanvas-footer">
					<div class="d-flex align-items-center justify-content-between mb-4">
						<span class="font-weight-bold text-muted font-size-sm mr-2">Total</span>
						<span class="font-weight-bolder text-dark-50 text-right">$1840.00</span>
					</div>
					<div class="d-flex align-items-center justify-content-between mb-7">
						<span class="font-weight-bold text-muted font-size-sm mr-2">Sub total</span>
						<span class="font-weight-bolder text-primary text-right">$5640.00</span>
					</div>
					<div class="text-right">
						<button type="button" class="btn btn-primary text-weight-bold">Place Order</button>
					</div>
				</div>
				<!--end::Purchase-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Quick Cart-->
		<!--begin::Quick Panel-->
		<div id="kt_quick_panel" class="offcanvas offcanvas-right pt-5 pb-10">
			<!--begin::Header-->
			<div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
				<ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_logs">Circulos de estudio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_notifications">Notificaciones</a>
					</li>
					
				</ul>
				<div class="offcanvas-close mt-n1 pr-5">
					<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
						<i class="ki ki-close icon-xs text-muted"></i>
					</a>
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Content-->
			<div class="offcanvas-content px-10">
				<div class="tab-content">
					<!--begin::Tabpane-->
					<div class="tab-pane fade show pt-3 pr-5 mr-n5 active" id="kt_quick_panel_logs" role="tabpanel">
						<!--begin::Section-->
						<div class="mb-15">
							<h5 class="font-weight-bold mb-5">Mensajes de circulos de estudio</h5>
							<!--begin: Item-->
							
							<!--end: Item-->
							<!--begin: Item-->
							<div class="d-flex align-items-center flex-wrap mb-5">
								<div class="symbol symbol-50 symbol-light mr-5">
									<span class="symbol-label">
										<img src="{{asset('assets/media/svg/misc/015-telegram.svg')}}" class="h-50 align-self-center" alt="" />
									</span>
								</div>
								<div class="d-flex flex-column flex-grow-1 mr-2">
									<a href="#" class="font-weight-bolder text-dark-75 text-hover-primary font-size-lg mb-1">Inicio de clases</a>
									<span class="text-muted font-weight-bold">Inicio de clases en enero ...</span>
								</div>
								<span class="btn btn-sm btn-light font-weight-bolder my-lg-0 my-2 py-1 text-dark-50">15/11/2020</span>
							</div>
							<!--end: Item-->

						</div>
						<!--end::Section-->
						<!--begin::Section-->
						<div class="mb-5">
							<h5 class="font-weight-bold mb-5">Notificaciones</h5>
							<!--begin: Item-->
							<div class="d-flex align-items-center bg-light-warning rounded p-5 mb-5">
								<span class="svg-icon svg-icon-warning mr-5">
									<span class="svg-icon svg-icon-lg">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
												<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</span>
								<div class="d-flex flex-column flex-grow-1 mr-2">
									<a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Actualización de actividades</a>
									<span class="text-muted font-size-sm">15/11/2020</span>
								</div>
								
							</div>
							<!--end: Item-->
							<!--begin: Item-->
							<div class="d-flex align-items-center bg-light-success rounded p-5 mb-5">
								<span class="svg-icon svg-icon-success mr-5">
									<span class="svg-icon svg-icon-lg">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
												<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</span>
								<div class="d-flex flex-column flex-grow-1 mr-2">
									<a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Actualización de notas</a>
									<span class="text-muted font-size-sm">14/11/2020</span>
								</div>
								
							</div>
							<!--end: Item-->
					
					
						</div>
						<!--end::Section-->
					</div>
					<!--end::Tabpane-->
					<!--begin::Tabpane-->
					<div class="tab-pane fade pt-2 pr-5 mr-n5" id="kt_quick_panel_notifications" role="tabpanel">
						<!--begin::Nav-->
						<div class="navi navi-icon-circle navi-spacer-x-0">
							<!--begin::Item-->
							<a href="#" class="navi-item">
								<div class="navi-link rounded">
									<div class="symbol symbol-50 mr-3">
										<div class="symbol-label">
											<i class="flaticon-bell text-success icon-lg"></i>
										</div>
									</div>
									<div class="navi-text">
										<div class="font-weight-bold font-size-lg">Creacion de alumno</div>
										<div class="text-muted">Nuevo alumno Juan Lopez</div>
									</div>
								</div>
							</a>
							<!--end::Item-->
						</div>
						<!--end::Nav-->
					</div>
					<!--end::Tabpane-->

				</div>
			</div>
			<!--end::Content-->
		</div>
		<!--end::Quick Panel-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->
		
		
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		 <!--SweetAlert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
   
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#8950FC", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#EEE5FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('assets/js/pages/widgets.js')}}"></script>
		<script type="text/javascript">
			var posGrade;
			function clearLvls()
			{
				$('#SelectLvl').css("visibility", "hidden");
				$('#SelectGrd').css("visibility", "hidden");
				$('#SelectCourse').css("visibility", "hidden");
			}
			function ListGrade(pos)
			{
				clearLvls();
				posGrade=pos;
				if(pos==1)
				{
					$('#Title1').text("Listado de alumnos por grado");
				}
				else if(pos==2)
				{
					$('#Title1').text("Visualizacion de notas por grado");
					$('#Title2').html("Visualice el listado de notas por la jornada, nivel y grados");
				}
				else if(pos==3)
				{
					$('#Title1').text("Visualizacion de Notas por grado");
					$('#Title2').html("Visualice el listado de notas por la jornada, grados del nivel y curso seleccionado");
				}
				else if(pos==4)
				{			
					$('#Title1').text("Visualización de examenes por grado y Voluntarios");
					$('#Title2').html("Visualice el listado de examenes por grados del nivel y jornada seleccionado");
				}
				else if(pos==5)
				{			
					$('#Title1').text("Visualización de examenes por grado y curso");
					$('#Title2').html("Visualice el listado de examenes por curso, grados, nivel y dia seleccionado");
				}
				
				$.ajax ({
					url: '{{route('LoadPeriods')}}',
					type: 'GET',
					success: (e) => {
						$('#periodselect1').empty();
						$.each(e['Periods'], function(fetch, data){
						  $('#periodselect1').append('<option value="'+data.Id+'" >'+data.Name+'</option>');
						});
						$('#periodselect1').selectpicker('refresh');
					}
				});
				
			}
			function save()
			{			
				if(posGrade==1)
				{
					var Id = $('#gradeselect1').val();
					var $url_path = '{!! url('/') !!}';
                    window.location.href = $url_path+"/administration/student/lists/grade/"+Id;
				}
				if(posGrade==2)
				{
					var Id = $('#gradeselect1').val();
					var $url_path = '{!! url('/') !!}';
                    window.location.href = $url_path+"/administration/student/score/"+Id;
				}
				if(posGrade==3)
				{
					var Id = $('#courseselect1').val();
					var $url_path = '{!! url('/') !!}';
                    window.location.href = $url_path+"/administration/teacher/score/"+Id;
				}
				if(posGrade==4)
				{
					var Id = $('#courseselect1').val();
					var $url_path = '{!! url('/') !!}';
                    window.location.href = $url_path+"/administration/teacher/test/"+Id;
				}
				if(posGrade==5)
				{
					var Id = $('#courseselect1').val();
					var $url_path = '{!! url('/') !!}';
                    window.location.href = $url_path+"/administration/student/lists/test/"+Id;
				}
			}
			function ListLevel(Period)
			{
				$.ajax ({
					url: '{{route('LoadLevels')}}',
					type: 'POST',
					data: {
						"_token": "{{ csrf_token() }}",
						"PeriodId"      : Period,
					},
					success: (e) => {
						$('#lvlmodalselect1').empty();
						$.each(e['Levels'], function(fetch, data){
						  $('#lvlmodalselect1').append('<option value="'+data.Id+'" >'+data.Name+'</option>');
						});
						$('#lvlmodalselect1').selectpicker('refresh');
					}
				});
				
			}
			$('#periodselect1').on('change', function() {
				$('#SelectLvl').css("visibility", "visible");
				ListLevel($('#periodselect1').val());
			  });
			  function ListGrades(Level)
			  {
				  $.ajax ({
					  url: '{{route('LoadGrades')}}',
					  type: 'POST',
					  data: {
						  "_token": "{{ csrf_token() }}",
						  "LvlId"      : Level,
					  },
					  success: (e) => {
						  $('#gradeselect1').empty();
						  $.each(e['Grades'], function(fetch, data){
							$('#gradeselect1').append('<option value="'+data.Id+'" >'+data.Name+'</option>');
						  });
						  $('#gradeselect1').selectpicker('refresh');
					  }
				  });
			  }
			  $('#lvlmodalselect1').on('change', function() {
				$('#SelectGrd').css("visibility", "visible");
				ListGrades($('#lvlmodalselect1').val());
			  });
			function ListCourse(Grade) {
				$.ajax ({
					url: '{{route('LoadCourses')}}',
					type: 'POST',
					data: {
						"_token": "{{ csrf_token() }}",
						"GradeId"      : Grade,
					},
					success: (e) => {
						$('#courseselect1').empty();
						$.each(e['Courses'], function(fetch, data) {
							$('#courseselect1').append('<option value="'+data.Id+'" >'+data.Name+'</option>');
						});
						$('#courseselect1').selectpicker('refresh');
					}
				});
			}
			$('#gradeselect1').on('change', function() {
				if(posGrade==3 || posGrade==4 || posGrade==5 ) {
					$('#SelectCourse').css("visibility", "visible");
					ListCourse($('#gradeselect1').val());
				}
			});

			
		</script>


		@section('scripts')
																					          
		@show
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
