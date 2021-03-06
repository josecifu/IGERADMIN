@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Reportes generales
    @stop
    @section('breadcrumb2')
    Todos los circulos
    @stop
    {{-- Page content --}}
    @section('content')
    <div class="content flex-column-fluid" id="kt_content">
	<!--begin::Row-->
								<div class="row">
									<div class="col-xl-12">
										<!--begin::Base Table Widget 5-->
										<div class="card card-custom gutter-b card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Utlimas acciones realizadas</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">Acciones de notas y examenes en todos circulos de estudio</span>
												</h3>
												<div class="card-toolbar">
													<ul class="nav nav-pills nav-pills-sm nav-dark-75">
														<li class="nav-item">
															<a class="nav-link py-2 px-4" data-toggle="tab" onclick="change(1)"  href="#kt_tab_pane_5_2">Todos</a>
														</li>
														<li class="nav-item">
															<a class="nav-link py-2 px-4" data-toggle="tab" onclick="change(2)"  href="#kt_tab_pane_5_1">Mes</a>
														</li>
														<li class="nav-item">
															<a class="nav-link py-2 px-4 active" onclick="change(3)" data-toggle="tab" href="#kt_tab_pane_5_3">Dia</a>
														</li>
													</ul>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2 pb-0 mt-n3">
												<div class="tab-content mt-5" id="myTabTables5">
													<!--begin::Tap pane-->
													<div class="tab-pane fade" id="kt_tab_pane_5_1" role="tabpanel" aria-labelledby="kt_tab_pane_5_1">
														<!--begin::Table-->
														<div class="table-responsive">
															<table class="table table-borderless table-vertical-center">
																<thead>
																	<tr>
																		<th class="p-0 w-50px"></th>
																		<th class="p-0 min-w-150px"></th>
																		<th class="p-0 min-w-140px"></th>
																		<th class="p-0 min-w-110px"></th>
																		<th class="p-0 min-w-50px"></th>
																	</tr>
																</thead>
																<tbody>
																	@foreach ($Logs['Month'] as $Log)
																	<tr>
																		<td class="py-5 pl-0">
																			<div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					@if($Log['Type']=="New")
																					<img src="{{asset('assets/media/icons/new.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Edit")
																					<img src="{{asset('assets/media/icons/edit.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Delete")
																					<img src="{{asset('assets/media/icons/delete.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Notes")
																					<img src="{{asset('assets/media/icons/notes.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Test")
																					<img src="{{asset('assets/media/icons/test.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Info")
																					<img src="{{asset('assets/media/icons/info.png')}}" class="h-50 align-self-center" alt="" />
																					@endif
																				</span>
																			</div>
																		</td>
																		<td class="pl-0">
																			<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$Log['Title']}}</a>
																			<span class="text-muted font-weight-bold d-block">{{$Log['User']}}</span>
                                                                        </td>
                                                                        <td class="text-center">
																			
																			<span class="text-muted font-weight-500">{{$Log['Description']}}</span>
																		</td>
																		<td class="text-right">
																			
																			<span class="text-muted font-weight-500">{{$Log['Date']}}</span>
                                                                        </td>
                                                                       
																		<td class="text-right">
																			@if($Log['State']=="Success")
																			<span class="label label-lg label-light-success label-inline">Completado</span>
																			@elseif($Log['State']=="Delete")
																				<span class="label label-lg label-light-danger label-inline">Eliminado</span>
																			@elseif($Log['State']=="Progress")
																				<span class="label label-lg label-light-warning label-inline">En progreso</span>
																			@endif
																		</td>
																		<td class="text-right pr-0">
																			<a href="{{$Log['Url']}}" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<polygon points="0 0 24 0 24 24 0 24" />
																							<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																						</g>
																					</svg>
																					<!--end::Svg Icon-->
																				</span>
																			</a>
																		</td>
																	</tr>
																	@endforeach
																
																	
																	
																	
																</tbody>
															</table>
														</div>
														<!--end::Table-->
													</div>
													<!--end::Tap pane-->
													<!--begin::Tap pane-->
													<div class="tab-pane fade" id="kt_tab_pane_5_2" role="tabpanel" aria-labelledby="kt_tab_pane_5_2">
														<!--begin::Table-->
														<div class="table-responsive">
															<table class="table table-borderless table-vertical-center">
																<thead>
																	<tr>
																		<th class="p-0 w-50px"></th>
																		<th class="p-0 min-w-150px"></th>
																		<th class="p-0 min-w-140px"></th>
																		<th class="p-0 min-w-110px"></th>
																		<th class="p-0 min-w-50px"></th>
																	</tr>
																</thead>
																<tbody>
																	@foreach ($Logs['Week'] as $Log)
																	<tr>
																		<td class="py-5 pl-0">
																			<div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					@if($Log['Type']=="New")
																					<img src="{{asset('assets/media/icons/new.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Edit")
																					<img src="{{asset('assets/media/icons/edit.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Delete")
																					<img src="{{asset('assets/media/icons/delete.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Notes")
																					<img src="{{asset('assets/media/icons/notes.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Test")
																					<img src="{{asset('assets/media/icons/test.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Info")
																					<img src="{{asset('assets/media/icons/info.png')}}" class="h-50 align-self-center" alt="" />
																					@endif
																				</span>
																			</div>
																		</td>
																		<td class="pl-0">
																			<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$Log['Title']}}</a>
																			<span class="text-muted font-weight-bold d-block">{{$Log['User']}}</span>
                                                                        </td>
                                                                        <td class="text-center">
																			
																			<span class="text-muted font-weight-500">{{$Log['Description']}}</span>
																		</td>
																		<td class="text-right">
																			
																			<span class="text-muted font-weight-500">{{$Log['Date']}}</span>
																		</td>
																		<td class="text-right">
																			@if($Log['State']=="Success")
																			<span class="label label-lg label-light-success label-inline">Completado</span>
																			@elseif($Log['State']=="Delete")
																				<span class="label label-lg label-light-danger label-inline">Eliminado</span>
																			@elseif($Log['State']=="Progress")
																				<span class="label label-lg label-light-warning label-inline">En progreso</span>
																			@endif
																		</td>
																		<td class="text-right pr-0">
																			<a href="{{$Log['Url']}}" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<polygon points="0 0 24 0 24 24 0 24" />
																							<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																						</g>
																					</svg>
																					<!--end::Svg Icon-->
																				</span>
																			</a>
																		</td>
																	</tr>
																	@endforeach
																	
																	
																
																	
																</tbody>
															</table>
														</div>
														<!--end::Table-->
													</div>
													<!--end::Tap pane-->
													<!--begin::Tap pane-->
													<div class="tab-pane fade show active" id="kt_tab_pane_5_3" role="tabpanel" aria-labelledby="kt_tab_pane_5_3">
														<!--begin::Table-->
														<div class="table-responsive">
															<table class="table table-borderless table-vertical-center">
																<thead>
																	<tr>
																		<th class="p-0 w-50px"></th>
																		<th class="p-0 min-w-150px"></th>
																		<th class="p-0 min-w-140px"></th>
																		<th class="p-0 min-w-110px"></th>
																		<th class="p-0 min-w-50px"></th>
																	</tr>
																</thead>
																<tbody>
																	@foreach ($Logs['Days'] as $Log)
																	<tr>
																		<td class="py-5 pl-0">
																			<div class="symbol symbol-50 symbol-light mr-2">
																				<span class="symbol-label">
																					@if($Log['Type']=="New")
																					<img src="{{asset('assets/media/icons/new.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Edit")
																					<img src="{{asset('assets/media/icons/edit.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Delete")
																					<img src="{{asset('assets/media/icons/delete.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Notes")
																					<img src="{{asset('assets/media/icons/notes.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Test")
																					<img src="{{asset('assets/media/icons/test.png')}}" class="h-50 align-self-center" alt="" />
																					@elseif($Log['Type']=="Info")
																					<img src="{{asset('assets/media/icons/info.png')}}" class="h-50 align-self-center" alt="" />
																					@endif
																				</span>
																			</div>
																		</td>
																		<td class="pl-0">
																			<a href="javascript:;" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$Log['Title']}}</a>
																			<span class="text-muted font-weight-bold d-block">{{$Log['User']}}</span>
                                                                        </td>
                                                                        <td class="text-center">
																			
																			<span class="text-muted font-weight-500">{{$Log['Description']}}</span>
																		</td>
																		<td class="text-right">
																			
																			<span class="text-muted font-weight-500">{{$Log['Date']}}</span>
																		</td>
																		<td class="text-right">
																			@if($Log['State']=="Success")
																			<span class="label label-lg label-light-success label-inline">Completado</span>
																			@elseif($Log['State']=="Delete")
																				<span class="label label-lg label-light-danger label-inline">Eliminado</span>
																			@elseif($Log['State']=="Progress")
																				<span class="label label-lg label-light-warning label-inline">Asignación</span>
																			@endif
																		</td>
																		<td class="text-right pr-0">
																			<a href="javascript:;" class="btn btn-icon btn-light btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-success">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<polygon points="0 0 24 0 24 24 0 24" />
																							<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																						</g>
																					</svg>
																					<!--end::Svg Icon-->
																				</span>
																			</a>
																		</td>
																	</tr>
																	@endforeach
																	
																	
																	
																</tbody>
															</table>
														</div>
														<!--end::Table-->
													</div>
													<!--end::Tap pane-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Base Table Widget 5-->
									</div>
								</div>
                                <!--end::Row-->
    </div>
	@stop
	@section('scripts')
	<script type="text/javascript">
		var SelectMenu = 3;
		function imprimir()
		{
			var $url_path = '{!! url('/') !!}';
			window.location.href = $url_path+"/reports/pdf/"+SelectMenu+"/generalreportpdf";
		}
		function change($select)
		{
			SelectMenu = $select;
		}
	</script>
	@stop