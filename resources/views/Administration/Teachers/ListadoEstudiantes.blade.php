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
                                <!--begin::Notice-->
                                <!--<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-xl">
                                         
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                         
                                        </span>
                                    </div>
                                    <div class="alert-text">The foundation for DataTables is progressive enhancement, so it is very adept at reading table information directly from the DOM. This example shows how easy it is to add searching, ordering and paging to your HTML table by simply running DataTables on it. See official documentation
                                    <a class="font-weight-bold" href="https://datatables.net/examples/data_sources/dom.html" target="_blank">here</a>.</div>
                                </div>-->
                                <!--end::Notice-->
                                <!--begin::Card-->
                                <div class="card card-custom">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <span class="card-icon">
                                                <i class="flaticon2-favourite text-primary"></i>
                                            </span>
                                            @isset($course)
                                            <h3 class="card-label">Examen de {{$course->Name ?? ''}} de {{$grado ?? ''}}</h3>
                                            @endisset
                                        </div>
                                        <div class="card-toolbar">
                                            <!--begin::Dropdown-->
                                            <div class="dropdown dropdown-inline mr-2">
                                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-download"></i>Exportar</button>
                                                <!--begin::Dropdown Menu-->
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                    <ul class="nav flex-column nav-hover">
                                                        <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Elija una opcion:</li>
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
                                        <!--begin::Card-->
										<div class="card card-custom gutter-b example-hover">
											<div class="card-header">
												<div class="card-title">
													<h3 class="card-label">Primer Examen Parcial</h3>
												</div>
											</div>
											<div class="card-body">
												<!--begin::Accordion-->
												<div class="accordion accordion-toggle-arrow" id="accordionExample1">
													<div class="card">
														<div class="card-header">
															<div class="card-title" data-toggle="collapse" data-target="#collapseOne1">Pregunta?</div>
														</div>
														<div id="collapseOne1" class="collapse show" data-parent="#accordionExample1">
															<div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
														</div>
													</div>
													<div class="card">
														<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo1">¿Primera Pregunta?</div>
														</div>
														<div id="collapseTwo1" class="collapse" data-parent="#accordionExample1">
															<div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
														</div>
													</div>
													<div class="card">
														<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree1">¿Tercera</div>
														</div>
														<div id="collapseThree1" class="collapse" data-parent="#accordionExample1">
															<div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
														</div>
													</div>
												</div>
												<!--end::Accordion-->
												<!--begin::Code example-->
												<div class="example example-compact mt-5">
													<div class="example-tools">
														<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
														<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
													</div>
													<div class="example-code">
														<div class="example-highlight">
															<pre style="height:300px">
                                                                <code class="language-html">
                                                                    &lt;div class="accordion accordion-toggle-arrow" id="accordionExample1"&gt;
                                                                        &lt;div class="card"&gt;
                                                                            &lt;div class="card-header"&gt;
                                                                                &lt;div class="card-title" data-toggle="collapse" data-target="#collapseOne1"&gt;
                                                                                    Latest Orders
                                                                                &lt;/div&gt;
                                                                            &lt;/div&gt;
                                                                            &lt;div id="collapseOne1" class="collapse show" data-parent="#accordionExample1"&gt;
                                                                                &lt;div class="card-body"&gt;
                                                                                    ...
                                                                                &lt;/div&gt;
                                                                            &lt;/div&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;div class="card"&gt;
                                                                            &lt;div class="card-header"&gt;
                                                                                &lt;div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo1"&gt;
                                                                                    Product Updates
                                                                                &lt;/div&gt;
                                                                            &lt;/div&gt;
                                                                            &lt;div id="collapseTwo1" class="collapse" data-parent="#accordionExample1"&gt;
                                                                                &lt;div class="card-body"&gt;
                                                                                    ...
                                                                                &lt;/div&gt;
                                                                            &lt;/div&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;div class="card"&gt;
                                                                            &lt;div class="card-header"&gt;
                                                                                &lt;div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree1"&gt;
                                                                                    ...
                                                                                &lt;/div&gt;
                                                                            &lt;/div&gt;
                                                                            &lt;div id="collapseThree1" class="collapse" data-parent="#accordionExample1"&gt;
                                                                                &lt;div class="card-body"&gt;
                                                                                    ...
                                                                                &lt;/div&gt;
                                                                            &lt;/div&gt;
                                                                        &lt;/div&gt;
                                                                    &lt;/div&gt;
                                                                </code>
                                                            </pre>
														</div>
													</div>
												</div>
												<!--end::Code example-->
											</div>
										</div>
                                        <!--end::Card-->
                                        <div class="card card-custom bg-white gutter-b">
													<!--begin::Header-->
													<div class="card-header border-0 pt-5">
														<h3 class="card-title align-items-start flex-column">
															<span class="card-label font-weight-bold font-size-h4 text-dark-75">Primer Examen Parcial</span>
															<span class="text-muted mt-3 font-weight-bold font-size-sm">Punteo
															<span class="text-primary font-weight-bolder">20 pts</span></span>
														</h3>
														<div class="card-toolbar">
															<ul class="nav nav-pills nav-pills-sm nav-dark">
																<li class="nav-item ml-0">
																	<a class="nav-link py-2 px-4 font-weight-bolder font-size-sm" data-toggle="tab" href="#kt_tab_pane_7_1">Active Cases</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link py-2 px-4 active font-weight-bolder font-size-sm" data-toggle="tab" href="#kt_tab_pane_7_2">Create</a>
																</li>
															</ul>
														</div>
													</div>
													<!--end::Header-->
													<!--begin::Body-->
													<div class="card-body pt-1">
														<div class="tab-content mt-5" id="myTabContent">
															<!--begin::Tap pane-->
															<div class="tab-pane fade" id="kt_tab_pane_7_1" role="tabpanel" aria-labelledby="kt_tab_pane_7_1">
																<!--begin::Form-->
																<form class="form" id="kt_form_7_1">
																	<div class="form-group">
																		<input type="text" class="form-control form-control-solid border-0" name="name" placeholder="Name" />
																	</div>
																	<div class="form-group">
																		<input type="text" class="form-control form-control-solid border-0" name="email" placeholder="Email" />
																	</div>
																	<div class="form-group">
																		<textarea class="form-control form-control-solid border-0" name="memo" rows="4" placeholder="Message" id="kt_forms_widget_7_1_input"></textarea>
																	</div>
																	<div class="mt-10">
																		<button class="btn btn-primary font-weight-bold">Send</button>
																	</div>
																</form>
																<!--end::Form-->
															</div>
															<!--end::Tap pane-->
															<!--begin::Tap pane-->
															<div class="tab-pane fade show active" id="kt_tab_pane_7_2" role="tabpanel" aria-labelledby="kt_tab_pane_7_2">
																<!--begin::Form-->
																<form class="form" id="kt_form_7_2">
																	<div class="form-group mb-6">
																		<input type="text" class="form-control border-0 form-control-solid pl-6 min-h-50px font-size-lg font-weight-bolder" name="name" placeholder="¿Preguntas?" />
																	</div>
																	<div class="form-group mb-6">
																		<select class="form-control border-0 form-control-solid text-muted font-size-lg font-weight-bolder pl-5 min-h-50px" id="exampleSelects">
																			<option>Select Category</option>
																			<option>2</option>
																			<option>3</option>
																			<option>4</option>
																			<option>5</option>
																		</select>
																	</div>
																	<div class="form-group mb-6">
																		<textarea class="form-control border-0 form-control-solid pl-6 font-size-lg font-weight-bolder min-h-130px" name="memo" rows="4" placeholder="Area de respuesta" id="kt_forms_widget_7_2_input"></textarea>
																	</div>
																	<div>
																		<button class="btn btn-primary font-weight-bold">Enviar Examen</button>
																	</div>
																</form>
																<!--end::Form-->
															</div>
															<!--end::Tap pane-->
														</div>
													</div>
													<!--end::Body-->
												</div>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>

	@stop
	@section('scripts')

        <!--begin::Page Vendors(used by this page)-->
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
        <!--end::Page Vendors-->
        <!--begin::Page Scripts(used by this page)-->
        
        <!--end::Page Scripts-->
        <script type="text/javascript">
           
            "use strict";
            var KTDatatablesDataSourceHtml = function() {

                var initTable1 = function() {
                    var table = $('#kt_datatable');

                    // begin first table
                    table.DataTable({
                        responsive: true,
                        columnDefs: [
                            {
                                targets: -1,
                                title: 'Acciones',
                                orderable: false,
                                render: function(data, type, full, meta) {
                                    return '\
                                        <div class="dropdown dropdown-inline">\
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
                                                <i class="la la-cog"></i>\
                                            </a>\
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                                <ul class="nav nav-hoverable flex-column">\
                                                    <li class="nav-item"><a class="nav-link" href="/administration/teacher/edit/'+full[0]+'"><i class="nav-icon la la-edit"></i><span class="nav-text">Editar</span></a></li>\
                                                    <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-lock"></i><span class="nav-text">Restablecer contraseña</span></a></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                                            <i class="la la-trash"></i>\
                                        </a>\
                                    ';
                                },
                            },
                           
                          
                        ],
                    });

                };

                return {

                    //main function to initiate the module
                    init: function() {
                        initTable1();
                    },

                };

            }();

            jQuery(document).ready(function() {
                KTDatatablesDataSourceHtml.init();
            });


       </script>
	@stop