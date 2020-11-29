@extends('Administration.Base/BaseTeacher')
{{-- Page title --}}
    @section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Voluntario
    @stop
    @section('breadcrumb2')
    Principal
    @stop
    {{-- Page content --}}
    @section('content')

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
                                                            @if(session()->get('Gender')=="Masculino")
                                                                    <img src="{{ asset ('assets/media/svg/avatars/Teacher-boy-1.svg')}}" class="h-75 align-self-end" alt="" />
                                                                @else
                                                                    <img src="{{ asset ('assets/media/svg/avatars/Teacher-girl-1.svg')}}" class="h-75 align-self-end" alt="" />
                                                                @endif
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
                                                                <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{session()->get('Name')}}
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
                                                                    </span>Voluntario</a>
                                                                </div>
                                                                <!--end::Contacts-->
                                                            </div>
                                                            <!--begin::User-->
                                                            <!--begin::Actions-->
                                                            <div class="my-lg-0 my-1">
                                                                
                                                                <a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Ver perfil</a>
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
                                                            @if(count($DataTeacher))
                                                            {{$DataTeacher['CountPeriods']}}
                                                            @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-presentation-1 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column text-dark-75">
                                                            <span class="font-weight-bolder font-size-sm">Grados asignados</span>
                                                            <span class="font-weight-bolder font-size-h5">
                                                            <span class="text-dark-50 font-weight-bold"></span>
                                                            @if(count($DataTeacher))
                                                            {{$DataTeacher['CountGrades']}}
                                                            @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-list-3 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column text-dark-75">
                                                            <span class="font-weight-bolder font-size-sm">Materias asignadas</span>
                                                            <span class="font-weight-bolder font-size-h5">
                                                            <span class="text-dark-50 font-weight-bold"></span>
                                                            @if(count($DataTeacher)) 
                                                            {{$DataTeacher['CountCourses']}}
                                                            @endif</span>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column flex-lg-fill">
                                                            <span class="text-dark-75 font-weight-bolder font-size-sm">0 Examenes realizados</span>
                                                            <a href="#" class="text-primary font-weight-bolder">Ver</a>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column">
                                                            <span class="text-dark-75 font-weight-bolder font-size-sm">0 Notas realizadas</span>
                                                            <a href="#" class="text-primary font-weight-bolder">Ver</a>
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
                                        <div class="card card-custom">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <span class="card-icon">
                                                        <i class="flaticon2-image-file text-primary"></i>
                                                    </span>
                                                    <h3 class="card-label">Listado de examenes de los cursos asignados</h3>
                                                </div>
                                                <div class="card-toolbar">
                                                  
                                                 
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <!--begin: Datatable-->
                                                <table class="table table-bordered table-checkable" id="TestTables" style="margin-top: 13px !important">
                                                    <thead>
                                                        
                                                        <tr>
                                                            <th colspan="2" ></th>
                                                            @foreach($Titles as $Title)
                                                            <th colspan="{{$Title['No']}}" >{{ $Title['Name'] }}</th>
                                                            @endforeach
                                                        </tr>
                                                        <tr>
                                                            <th>Alumno</th>
                                                            <th>Curso</th>
                                                            @foreach($Titles as $Title)
                                                                @if($Title['No']==0)
                                                                <th><center>No existen exámenes asignados</center></th>
                                                                @endif
                                                               
                                                            @endforeach
                                                        <tr>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        @if($Models)
                                                            @foreach($Models as $Model)
                                                            <tr>
                                                                <td>{{$Model['Id']}}</td>
                                                                <td>{{$Model['Name']}}</td>
                                                                <td>{{$Model['Curse']}}</td>
                                                                <td><center><span class="label label-warning label-pill label-inline mr-2">Sin contestar</span></center></td>
                                                                <td>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped bg-success "  role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25 Pts</div>
                                                                </div>
                                                                </td>
                                                               
                                                            </tr>
                                                            @endforeach
                                                        @endif
                                
                                                    </tbody>
                                                </table>
                                                <!--end: Datatable-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
								<!--end::Card-->
								<!--begin::Teachers-->
								<div class="d-flex flex-row">
                                    <div class="col-xl-6">
                                        <div class="card card-custom gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-7">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bold font-size-h4 text-dark-75">Punteos verificados</span>
                                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">No de punteos  
                                                    <span class="text-primary font-weight-bolder">no verificados 0</span></span>
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
                                                <div class="scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 250px">
                                                <div class="tab-content mt-5" id="myTabLIist18">
                                                    
                                                    <!--begin::Tap pane-->
                                                        <div class="tab-pane fade" id="kt_tab_pane_1_1" role="tabpanel" aria-labelledby="kt_tab_pane_1_1">
                                                            <!--begin::Form-->
                                                            <div class="form">
                                                                <!--begin::Item-->
                                                                <div class="d-flex align-items-center pb-9">
                                                                    <!--begin::Symbol-->
                                                                    
                                                                    <!--end::Symbol-->
                                                                    <!--begin::Section-->
                                                                    <div class="d-flex flex-column flex-grow-1">
                                                                        <!--begin::Title-->
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">Matematicas - Primero Básico / 13-01-001 (Viernes IGER)</a>
                                                                        <!--end::Title-->
                                                                        <!--begin::Desc-->
                                                                        <span class="text-dark-50 font-weight-normal font-size-sm"><span class="label label-dark label-inline mr-2">Notas Semestre 1</span> <span class="label label-warning label-pill label-inline mr-2">24 de noviembre a las 9:25 PM</span></span>
                                                                        <!--begin::Desc-->
                                                                    </div>
                                                                    <!--end::Section-->
                                                                </div>
                                                                <!--end::Item-->

                                                            </div>
                                                            <!--end::Form-->
                                                        </div>
                                                    
                                                    <!--end::Tap pane-->
                                                    <!--begin::Tap pane-->
                                                    <div class="tab-pane fade show active" id="kt_tab_pane_2_2" role="tabpanel" aria-labelledby="kt_tab_pane_2_2">
                                                        <!--begin::Form-->
                                                        <div class="form">
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center pb-9">
                                                                <!--begin::Symbol-->
                                                              
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="d-flex flex-column flex-grow-1">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">Idioma - Primero Básico / 13-01-001 (Viernes IGER)</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Desc-->
                                                                    <span class="text-dark-50 font-weight-normal font-size-sm"><span class="label label-dark label-inline mr-2">Notas Semestre 1</span> <span class="label label-danger label-pill label-inline mr-2">24 de noviembre a las 9:25 PM</span></span>
                                                                    <!--begin::Desc-->
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                            
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
                                    <div class="col-xl-6">
                                        <div class="card card-custom gutter-b">
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">Examenes programados</span>
                                                </h3>
                                                <div class="card-toolbar">
                                                    <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                                        <li class="nav-item">
                                                            <a class="nav-link py-2 px-4 active font-weight-bolder" data-toggle="tab" href="#kt_tab_pane_10_2">Semestre 1</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--begin::Body-->
                                            <div class="card-body pt-2 pb-0 mt-n3">
                                                <div class="scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 293px">
                                                <div class="tab-content mt-5" id="myTabTables10">
                                                    <!--begin::Tap pane-->
                                                    <div class="tab-pane fade show active" id="kt_tab_pane_10_2" role="tabpanel" aria-labelledby="kt_tab_pane_10_2">
                                                        <!--begin::Table-->
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless table-vertical-center">
                                                                <!--begin::Thead-->
                                                                <thead>
                                                                    <tr>
                                                                        <th class="p-0 w-50px"></th>
                                                                        <th class="p-0 w-100 min-w-100px"></th>
                                                                        <th class="p-0"></th>
                                                                        <th class="p-0 min-w-130px w-100"></th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Thead-->
                                                                <!--begin::Tbody-->
                                                                <tbody>
                                                                   
                                                                    <tr>
                                                                        <td class="pl-0 py-5">
                                                                            <div class="symbol symbol-45 symbol-light-warning mr-2">
                                                                                <span class="symbol-label">
                                                                                    <span class="svg-icon svg-icon-2x svg-icon-warning">
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
                                                                            </div>
                                                                        </td>
                                                                        <td class="pl-0">
                                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Parcial 1</a>
                                                                            <span class="text-muted font-weight-bold d-block">Idioma Español - Primero Básico / 13-01-001 (Viernes IGER)</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td class="text-left">
                                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Nov, 4:20PM</span>
                                                                            <span class="text-muted font-weight-bold d-block font-size-sm">Fecha</span>
                                                                        </td>
                                                                        <td class="text-right pr-0">
                                                                            <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                                    
                                                                </tbody>
                                                                <!--end::Tbody-->
                                                            </table>
                                                        </div>
                                                        <!--end::Table-->
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
    "use strict";
    var KTDatatablesAdvancedRowGrouping = function() {
    
        var init = function() {
            var table = $('#TestTables');
    
            // begin first table
            table.DataTable({
                layout: {
                    scroll: true,
                    height: 550,
                    footer: false
                },
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                responsive: true,
                    pageLength: 25,
                    order: [[2, 'asc']],
                    drawCallback: function(settings) {
                        var api = this.api();
                        var rows = api.rows({page: 'current'}).nodes();
                        var last = null;

                        api.column(2, {page: 'current'}).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="10">' + group + '</td></tr>',
                                );
                                last = group;
                            }
                        });
                    },
                    columnDefs: [
                        {
                            // hide columns by index number
                            targets: [0, 2],
                            visible: false,
                        },
              
                
            });
        };
    
        return {
    
            //main function to initiate the module
            init: function() {
                init();
            },
    
        };
    
    }();
    
    jQuery(document).ready(function() {
        KTDatatablesAdvancedRowGrouping.init();
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
</script>
      
	@stop