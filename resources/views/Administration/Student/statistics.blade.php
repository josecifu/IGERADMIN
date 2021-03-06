@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estudiantes
    @stop
    @section('breadcrumb1')
    Estadística
    @stop
    @section('breadcrumb2')
    Estudiante
    @stop
    {{-- Page content --}}
    @section('content')
        <div class="content flex-column-fluid" id="kt_content">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon"><i class="flaticon2-favourite text-primary"></i></span>
                        <h3 class="card-label">Estadisticas generales</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{url('administration/home/dashboard')}}" class="btn btn-danger font-weight-bolder mr-2"><i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                    </div>
                </div>
                <!--begin::Charts Widget 1-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Header-->
                                <div class="card-header h-auto border-0">
                                    <!--begin::Title-->
                                    <div class="card-title py-5">
                                        <h3 class="card-label">
                                            <span class="d-block text-dark font-weight-bolder">Estudiantes por género</span>
                                            <span class="d-block text-muted mt-2 font-size-sm">Por círculos de estudio</span>
                                        </h3>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar">
                                        
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Chart-->
                                    <div id="kt_charts_widget_1_chart1" class="d-flex justify-content-center">
                                    </div>
                                    <!--end::Chart-->
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Charts Widget 1-->
                <!--begin::Charts Widget 2-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Header-->
                                <div class="card-header h-auto border-0">
                                    <div class="card-title py-5">
                                        <h3 class="card-label">
                                            <span class="d-block text-dark font-weight-bolder">Promedios de estudiantes</span>
                                            <span class="d-block text-muted mt-2 font-size-sm">Descripcion</span>
                                        </h3>
                                    </div>
                                    <div class="card-toolbar">
                                        Por:&nbsp;&nbsp;
                                        <ul class="nav nav-pills nav-pills-sm nav-dark-75" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_charts_widget_2_chart_tab_1">
                                                    <span class="nav-text font-size-sm">Año</span>
                                                </a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div id="kt_charts_widget_3_chart1"></div>
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Charts Widget 2-->
            </div>
        </div>
	@stop
    @section('scripts')
        <script type="text/javascript">
           

             // Charts widgets
    var _initChartsWidget1 = function () {
        var element = document.getElementById("kt_charts_widget_1_chart1");

        if (!element) {
            return;
        }

        var options = {
                series: [{
                    name: 'Femenino',
                    data: [
                        @foreach($countsfemale as $famale)
                        {{$famale}},
                        @endforeach
                        ]
                }, {
                    name: 'Masculino',
                    data: [
                        @foreach($countsmale as $male)
                        {{$male}},
                        @endforeach
                    ]
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: true
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: ['30%'],
                        endingShape: 'rounded'
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: [
                        @foreach($periodsdata as $period)
                        "{{$period}}",
                        @endforeach
                        ],
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                fill: {
                    opacity: 1
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
                            return "" + val + " Alumnos"
                        }
                    }
                },
                colors: [KTApp.getSettings()['colors']['theme']['base']['info'], KTApp.getSettings()['colors']['theme']['base']['warning']],
                grid: {
                    borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                }
            };

        var chart = new ApexCharts(element, options);
        chart.render();
    }
    var _initChartsWidget3 = function () {
        var element = document.getElementById("kt_charts_widget_3_chart1");

        if (!element) {
            return;
        }

        var options = {
            series: [{
                name: 'Promedio general',
                data: [
                    @foreach($averagenotes as $note)
                        {{$note}},
                    @endforeach
                ]
            }],
            chart: {
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {

            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 1
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [KTApp.getSettings()['colors']['theme']['base']['info']]
            },
            xaxis: {
                categories: [@foreach($periodsdata as $period)
                "{{$period}}",
                @endforeach],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    }
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: KTApp.getSettings()['colors']['theme']['base']['info'],
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    }
                }
            },
            yaxis: {
                labels: {
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
                        return "" + val + " Pts"
                    }
                }
            },
            colors: [KTApp.getSettings()['colors']['theme']['light']['info']],
            grid: {
                borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                //size: 5,
                //colors: [KTApp.getSettings()['colors']['theme']['light']['danger']],
                strokeColor: KTApp.getSettings()['colors']['theme']['base']['info'],
                strokeWidth: 3
            }
        };

        var chart = new ApexCharts(element, options);
        chart.render();
    }
    jQuery(document).ready(function () {
        _initChartsWidget1();
        _initChartsWidget3();
    });
        </script>
    @stop
