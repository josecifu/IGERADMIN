@extends('Administration.Base/BaseStudent')
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
            <div class="d-flex flex-row">
                <div class="col-xl-12">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-custom bg-gray-100 gutter-b card-stretch">
                        <!--begin::Header-->
                        <div class="card-header border-0 bg-orange py-5">
                            <h3 class="card-title font-weight-bolder text-white">Promedios del estudiante</h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Utilidades</a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover">
                                            <li class="navi-header pb-1">
                                                <span class="text-primary text-uppercase font-weight-bold font-size-sm">Acciones:</span>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon-speech-bubble"></i>
                                                    </span>
                                                    <span class="navi-text">Ver notas</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-calendar-8"></i>
                                                    </span>
                                                    <span class="navi-text">Ver calendario</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-graph-1"></i>
                                                    </span>
                                                    <span class="navi-text">Ver estadisticas</span>
                                                </a>
                                            </li>
                  
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-writing"></i>
                                                    </span>
                                                    <span class="navi-text">Realizar un examen</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0 position-relative overflow-hidden">
                            <!--begin::Chart-->
                            <div id="StudentAvarages" class="card-rounded-bottom bg-orange" style="height:200px"></div>
                            <!--end::Chart-->
                            <!--begin::Stats-->
                            <div class="card-spacer mt-n25">
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <a href="#">
                                    <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
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
                                        <a href="{{url('student/score/list')}}" class="text-warning font-weight-bold font-size-h6">Visualizar notas</a>
                                    </div>
                                    </a>
                                    <a href="#">
                                    <div class="col bg-light-warning px-6 py-8 rounded-xl mb-7" onclick="hola();">
                                        <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="#" class="text-warning font-weight-bold font-size-h6 mt-2">Actualizar mi información</a>
                                    </div>
                                    </a>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <a href="#">
                                    <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                                        <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="/student/test/list" class="text-danger font-weight-bold font-size-h6 mt-2">Visualizar todos los examenes</a>
                                    </div>
                                    </a>
                                    <a href="#">
                                    <div class="col bg-light-danger px-6 py-8 rounded-xl">
                                        <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <a href="{{url('student/course/list')}}" class="text-danger font-weight-bold font-size-h6 mt-2">Visualizar información de cursos</a>
                                    </div>
                                </a>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
            </div>
            <!--begin::Education-->
            <div class="d-flex flex-row">
                <!--begin::Content-->
                <div class="flex-row-fluid col-xl-12">
                    <div class="row">
                        <div class="col-xxl-12">                        
                            <!--begin::Base Table Widget 10-->
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <div class="card-toolbar">
                                        <ul class="nav nav-pills-sm nav-dark">
                                            <li class="nav-item ml-0">
                                                <a type="button" class="btn btn-success" href="/student/test/view">Evaluaciones programadas</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-2 pb-0 mt-n3">
                                    <div class="tab-content mt-5" id="myTabTables10">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="kt_tab_pane_10_1" role="tabpanel" aria-labelledby="kt_tab_pane_10_1">
                                            <!--begin::Table-->
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-vertical-center">
                                                    <!--begin::Thead-->
                                                    <thead>
                                                        <tr>
                                                            <th class="p-0 w-50px"></th>
                                                            <th class="p-0 w-50 min-w-100px"></th>
                                                            <th class="p-0"></th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Thead-->
                                                    <!--begin::Tbody-->
                                                    <tbody>
                                                        @foreach($models as $model)
                                                        <tr>
                                                            <td class="pl-0 py-5">
                                                                <div class="symbol symbol-45 symbol-light-success mr-2">
                                                                    <a type="button" class="btn btn-outline-success">{{$model['counter']}}</a>
                                                                </div>
                                                            </td>
                                                            <td class="pl-0">
                                                                <a class="text-dark-75 font-weight-bolder mb-1 font-size-lg">{{$model['test']}}</a>
                                                                <span class="text-muted font-weight-bold d-block">{{$model['course']}}</span>
                                                            </td>
                                                            <td></td>
                                                            <td class="text-left">
                                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$model['start']}} - {{$model['end']}}</span>
                                                                <span class="text-muted font-weight-bold d-block font-size-sm">Fecha Inicio & Fecha Final</span>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <!--end::Tbody-->
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Base Table Widget 10-->
                        </div>
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Education-->
        </div>
    @stop
    @section('scripts')
        <script type="text/javascript">
            var _initMixedWidget1 = function () {
                var element = document.getElementById("StudentAvarages");
                var height = parseInt(KTUtil.css(element, 'height'));        
                if (!element) {
                    return;
                }
                var strokeColor = '#fff';
                var options = {
                    series: [{
                        name: 'Net Profit',
                        data: [30, 45, 32, 70, 40, 40, 40]
                    }],
                    chart: {
                        type: 'area',
                        height: height,
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        },
                        sparkline: {
                            enabled: true
                        },
                        dropShadow: {
                            enabled: true,
                            enabledOnSeries: undefined,
                            top: 5,
                            left: 0,
                            blur: 3,
                            color: strokeColor,
                            opacity: 0.5
                        }
                    },
                    plotOptions: {},
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    fill: {
                        type: 'solid',
                        opacity: 0
                    },
                    stroke: {
                        curve: 'smooth',
                        show: true,
                        width: 3,
                        colors: [strokeColor]
                    },
                    xaxis: {
                        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false
                        },
                        labels: {
                            show: false,
                            style: {
                                colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                                fontSize: '12px',
                                fontFamily: KTApp.getSettings()['font-family']
                            }
                        },
                        crosshairs: {
                            show: false,
                            position: 'front',
                            stroke: {
                                color: KTApp.getSettings()['colors']['gray']['gray-300'],
                                width: 1,
                                dashArray: 3
                            }
                        }
                    },
                    yaxis: {
                        min: 0,
                        max: 80,
                        labels: {
                            show: false,
                            style: {
                                colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                                fontSize: '12px',
                                fontFamily: KTApp.getSettings()['font-family']
                            }
                        }
                    },
                    states: {
                        normal: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: false,
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        },
                        y: {
                            formatter: function (val) {
                                return "$" + val + " thousands"
                            }
                        },
                        marker: {
                            show: false
                        }
                    },
                    colors: ['transparent'],
                    markers: {
                        colors: [KTApp.getSettings()['colors']['theme']['light']['danger']],
                        strokeColor: [strokeColor],
                        strokeWidth: 3
                    }
                };
                var chart = new ApexCharts(element, options);
                chart.render();
            }
            jQuery(document).ready(function() {
                _initMixedWidget1();
            });
        </script>
    @stop