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
                                        <div class="dropdown dropdown-inline">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right col-xl-4">
                                                <!--begin::Navigation-->
                                                <ul class="navi navi-hover">
                                                    <li class="navi-header font-weight-bold py-3">
                                                        <span class="font-size-lg">Exportar:</span>
                                                    </li>
                                                    <li class="navi-separator mb-3 opacity-70"></li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-success">Imprimir</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-danger">PDF</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-warning">PNG</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                            <span class="navi-text">
                                                                <span class="label label-xl label-inline label-light-primary">CSV</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Chart-->
                                    <div id="kt_charts_widget_1_chart" class="d-flex justify-content-center">
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
                                                <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_charts_widget_2_chart_tab_1">
                                                    <span class="nav-text font-size-sm">Año</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_charts_widget_2_chart_tab_2">
                                                    <span class="nav-text font-size-sm">Semestre</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_charts_widget_2_chart_tab_3">
                                                    <span class="nav-text font-size-sm">Mes</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div id="kt_charts_widget_3_chart"></div>
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
            var options = {
                series: [{
                    name: 'Femenino',
                    data: [50, 50, 50, 50, 50, 50]
                }, {
                    name: 'Masculino',
                    data: [50, 50, 50, 50, 50, 50]
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: false
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
                    categories: ['13-01-001 (Viernes IGER)', '13-01-004 (Sábados IGER)', '13-01-006 (Domingos MA)', '13-01-019 (Domingos IGER)'],
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
                    opacity: 0
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
                    }
                },
                colors: [KTApp.getSettings()['colors']['theme']['base']['success'], KTApp.getSettings()['colors']['gray']['gray-300']],
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
            var chart = new ApexCharts(document.querySelector("#kt_charts_widget_1_chart"), options);
            chart.render();
        </script>
    @stop
