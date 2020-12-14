@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Estadisticas
    @stop
    @section('breadcrumb1')
    Voluntarios    
    @stop
    @section('breadcrumb2')
    Estadísticas generales
    @stop
    {{-- Page content --}}
    @section('content')
    <div class="content flex-column-fluid" id="kt_content">
    <div class="row">
									<div class="col-lg-12">
										<!--begin::Card-->
										<div class="card card-custom gutter-b">
											<div class="card-header">
												<div class="card-title">
													<h3 class="card-label">Actividad de voluntarios</h3>
												</div>
											</div>
											<div class="card-body">
												<!--begin::Chart-->
												<div id="chart_3"></div>
												<!--end::Chart-->
											</div>
										</div>
										<!--end::Card-->
									</div>
									<div class="col-lg-12">
										<!--begin::Card-->
                    <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Encargados de circulo de estudio</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="scroll scroll-pull" data-scroll="true" data-suppress-scroll-x="false" data-swipe-easing="false" style="height: 300px;">
                                        
                        <!--begin::Chart-->
                        <div id="chart_12" class="d-flex justify-content-center"></div>
                        <!--end::Chart-->
                        </div>
                    </div>
                </div>
                <!--end::Card-->
									</div>
								</div>
    </div>
       
        
	@stop
  @section('scripts')
    <script type="text/javascript">
        "use strict";

// Shared Colors Definition
const primary = '#5993C7';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';
        var _demo3 = function () {
            const apexChart = "#chart_3";
            var options = {
                series: [
                @foreach($models as $model)
                {
                    name: "{{$model['Name']}}",
                    data:[@foreach($model['Activity'] as $activity){{$activity}},@endforeach ]
                },
                @endforeach
                ],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
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
                    categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep','Oct','Nov','Dic'],
                },
                yaxis: {
                    title: {
                        text: '(Actividades)'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "" + val + " Actividades"
                        }
                    }
                },
                colors: [primary, success, warning]
            };
    
            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }
        var _demo12 = function () {
            const apexChart = "#chart_12";
            var options = {
                series: [
                    @foreach($models as $model)
                    {{$model['Teachers']}},
                     @endforeach   
                ],
                chart: {
                    width: 500,
                    type: 'pie',
                },
                labels: [
                    @foreach($models as $model)
                   "{{$model['Name']}}",
                    @endforeach
                ],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 500
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: [primary, success, warning, danger, info]
            };
    
            var chart = new ApexCharts(document.querySelector(apexChart), options);
            chart.render();
        }
jQuery(document).ready(function () {
    _demo3();
    _demo12 ();
});
        
    </script>
	@stop