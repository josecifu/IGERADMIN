@extends('Administration.Base/BaseAttendant')
{{-- Page title --}}
    @section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Encargado de circulo
    @stop
    @section('breadcrumb2')
    Tablero
    @stop
    {{-- Page content --}}
    @section('content')
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    

        <div class="content flex-column-fluid" id="kt_content">
                <h3>Tablero</h3>
                <!--begin::Card-->
                                <div class="d-flex flex-row">
                                    <div class="col-12">
                                        <div class="card card-custom gutter-b">
                                            <div class="card-body">
                                                <!--begin::Top-->
                                                <div class="d-flex">
                                                    <!--begin::Pic-->
                                                    <div class="flex-shrink-0 mr-7">
                                                        <div class="symbol symbol-50 symbol-lg-120">
                                                           
                                                                    <img src="{{ asset ('assets/media/svg/avatars/attendant.png')}}" class="h-75 align-self-end" alt="" />
                                                               
                                                        </div>
                                                    </div>
                                                    <!--end::Pic-->
                                                    <!--begin: Info-->
                                                    <div class="flex-grow-1">
                                                        <!--begin::Title-->
                                                        <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                                            <!--begin::User-->
                                                            <div class="mr-3">
                                                                <!--begin::Name-->
                                                                <a href="#" class="d-flex align-items-center text-dark text-hover-success font-size-h5 font-weight-bold mr-3">{{session()->get('Name')}}
                                                                <i class="flaticon2-correct text-warning icon-md ml-2"></i></a>
                                                                <!--end::Name-->
                                                                <!--begin::Contacts-->
                                                                <div class="d-flex flex-wrap my-2">
                                                                    <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                                                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>{{session()->get('Email')}}</a>
                                                                    
                                                                    <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>Encargado de circulo</a>
                                                                </div>
                                                                <!--end::Contacts-->
                                                            </div>
                                                            <!--begin::User-->
                                                            <!--begin::Actions-->
                                                            <div class="my-lg-0 my-1">
                                                                
                                                                <a href="{{url('/attendant/profile')}}" class="btn btn-sm btn-success font-weight-bolder text-uppercase">Ver perfil</a>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Content-->
                                                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                                                            <!--begin::Description-->
                                                            <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5"></div>
                                                            <!--end::Description-->
                                                            <!--begin::Progress-->
                                                            <div class="d-flex mt-4 mt-sm-0">
                                                                
                                                            </div>
                                                            <!--end::Progress-->
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Top-->
                                                <!--begin::Separator-->
                                                <div class="separator separator-solid my-7"></div>
                                                <!--end::Separator-->
                                                <!--begin::Bottom-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column text-dark-75">
                                                            <span class="font-weight-bolder font-size-sm">Circulos de estudio</span>
                                                            <span class="font-weight-bolder font-size-h5">
                                                            <span class="text-dark-50 font-weight-bold"></span>
                                                            @if(count($DataAttendant))
                                                            {{$DataAttendant['CountPeriods']}}
                                                            @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                   
                                                   
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column flex-lg-fill">
                                                            <span class="text-dark-75 font-weight-bolder font-size-sm">{{$DataAttendant['NotesPending']}} Notas pendientes</span>
                                                            <a href="#" data-toggle="modal" data-target="#kt_select_modalSelect1" onclick="ListGrade(7)" class="text-warning font-weight-bolder">Ver</a>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column">
                                                            <span class="text-dark-75 font-weight-bolder font-size-sm">{{$DataAttendant['NotesAproved']}} Notas aprobadas</span>
                                                            <a href="{{url('attendant/notes/aproved')}}"  class="text-warning font-weight-bolder">Ver</a>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-tabs icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="symbol-group symbol-hover">
                                                            
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                </div>
                                                <!--end::Bottom-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="col-12">
                                        <!--begin::List Widget 9-->
										<div class="card card-custom gutter-b">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-4">
												<h3 class="card-title align-items-start flex-column">
													<span class="font-weight-bolder text-dark">Actividad de circulos de estudios</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">{{count($DataAttendant['Logs'])}} Actividades</span>
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-4">
												<!--begin::Timeline-->
												<div class="timeline timeline-6 mt-3">
                                                    @foreach($DataAttendant['Logs'] as $log)
													<!--begin::Item-->
													<div class="timeline-item align-items-start">
														<!--begin::Label-->
														<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg" style="width: 150px;">{{$log->created_at->format('d/m/Y h:i A')}}</div>
														<!--end::Label-->
														<!--begin::Badge-->
														<div class="timeline-badge">
															<i class="fa fa-genderless text-success icon-xl"></i>
														</div>
														<!--end::Badge-->
														<!--begin::Text-->
														<div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">{{$log->Description}}</div>
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
                                <br>
								<!--end::Card-->
								<!--begin::Teachers-->
								<div class="d-flex flex-row">
                                    <div class="col-xl-12">
                                        <div class="card card-custom gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-7">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bold font-size-h4 text-dark-75">Punteos verificados</span>
                                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">No de punteos  
                                                    <span class="text-primary font-weight-bolder">no verificados {{count($DataAttendant['Pending'])}} , notas aprobadas {{count($DataAttendant['Aproved'])}}</span></span>
                                                </h3>
                                                <div class="card-toolbar">
                                                    <ul class="nav nav-pills nav-pills-sm nav-dark">
                                                        <li class="nav-item ml-0">
                                                            <a class="nav-link py-2 px-4 font-weight-bolder font-size-sm" data-toggle="tab" href="#kt_tab_pane_1_1">Verificados</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link py-2 px-4 active font-weight-bolder font-size-sm" data-toggle="tab" href="#kt_tab_pane_2_2">No verificados</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body pt-1">
                                                <div class="scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 350px">
                                                <div class="tab-content mt-5" id="myTabLIist18">
                                                    
                                                    <!--begin::Tap pane-->
                                                        <div class="tab-pane fade" id="kt_tab_pane_1_1" role="tabpanel" aria-labelledby="kt_tab_pane_1_1">
                                                            <!--begin::Form-->
                                                            <div class="form">
                                                                @if(count($DataAttendant['Aproved'])>0)
                                                                    @foreach($DataAttendant['Aproved'] as $note)
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-center pb-9">
                                                                        <!--begin::Symbol-->
                                                                        
                                                                        <!--end::Symbol-->
                                                                        
                                                                        <!--begin::Section-->
                                                                        <div class="d-flex flex-column flex-grow-1">
                                                                            <!--begin::Title-->
                                                                            <a href="{{url('/attendant/notes/view/'.$note['id'])}}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">{{$note['Course']}}</a>
                                                                            <!--end::Title-->
                                                                            <!--begin::Desc-->
                                                                            <span class="text-dark-50 font-weight-normal font-size-sm"><span class="label label-dark label-inline mr-2">{{$note['Activity']}}</span> <span class="label label-warning label-pill label-inline mr-2">{!!$note['Update']!!}</span></span>
                                                                            <!--begin::Desc-->
                                                                        </div>
                                                                        <!--end::Section-->
                                                                        
                                                                    </div>
                                                                    <!--end::Item-->
                                                                    @endforeach
                                                                @else
                                                                <!--begin::Item-->
                                                                    <div class="d-flex align-items-center pb-9">
                                                                        <!--begin::Symbol-->
                                                                        
                                                                        <!--end::Symbol-->
                                                                        
                                                                        <!--begin::Section-->
                                                                        <div class="d-flex flex-column flex-grow-1">
                                                                            <!--begin::Title-->
                                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">No existen notas aprobadas</a>
                                                                            <!--end::Title-->
                                                                            
                                                                            <!--begin::Desc-->
                                                                        </div>
                                                                        <!--end::Section-->
                                                                        
                                                                    </div>
                                                                    <!--end::Item-->
                                                                @endif
                                                            </div>
                                                            <!--end::Form-->
                                                        </div>
                                                    
                                                    <!--end::Tap pane-->
                                                    <!--begin::Tap pane-->
                                                    <div class="tab-pane fade show active" id="kt_tab_pane_2_2" role="tabpanel" aria-labelledby="kt_tab_pane_2_2">
                                                        <!--begin::Form-->
                                                        <div class="form">
                                                            @if(count($DataAttendant['Pending'])>0)
                                                                @foreach($DataAttendant['Pending'] as $note)
                                                                <!--begin::Item-->
                                                                <div class="d-flex align-items-center pb-9">
                                                                    <!--begin::Symbol-->
                                                                
                                                                    <!--end::Symbol--> 
                                                                
                                                                    <!--begin::Section-->
                                                                    <div class="d-flex flex-column flex-grow-1">
                                                                        <!--begin::Title-->
                                                                        <a href="{{url('/attendant/notes/view/'.$note['id'])}}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">{{$note['Course']}}</a>
                                                                        <!--end::Title-->
                                                                        <!--begin::Desc-->
                                                                        <span class="text-dark-50 font-weight-normal font-size-sm"><span class="label label-dark label-inline mr-2">{{$note['Activity']}}</span> <span class="label label-danger label-pill label-inline mr-2">{!!$note['Update']!!}</span></span>
                                                                        <!--begin::Desc-->
                                                                    </div>
                                                                    <!--end::Section-->
                                                                
                                                                </div>
                                                                <!--end::Item-->
                                                                @endforeach
                                                            @else
                                                                <!--begin::Item-->
                                                                    <div class="d-flex align-items-center pb-9">
                                                                        <!--begin::Symbol-->
                                                                        
                                                                        <!--end::Symbol-->
                                                                        
                                                                        <!--begin::Section-->
                                                                        <div class="d-flex flex-column flex-grow-1">
                                                                            <!--begin::Title-->
                                                                            <a class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">No existen notas pendientes</a>
                                                                            <!--end::Title-->
                                                                            
                                                                            <!--begin::Desc-->
                                                                        </div>
                                                                        <!--end::Section-->
                                                                        
                                                                    </div>
                                                                    <!--end::Item-->
                                                                @endif
                                                        </div>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Tap pane-->
                                                </div>
                                            </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                    </div>
                                    
                                <!--end::Teachers-->
                                </div>
        </div>
	@stop
    @section('scripts')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script type="text/javascript">
    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
</script>
      
	@stop