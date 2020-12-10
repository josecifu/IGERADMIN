@extends('Administration.Base/BaseAttendant')
{{-- Page title --}}
    @section('title')
    Administración
    @stop
    @section('breadcrumb1')
    Encargado de circulo
    @stop
    @section('breadcrumb2')
    Notas
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
                                                <h3 class="card-label">Listado de Notas de {{$course->Name ?? ''}} de {{$grado ?? ''}} / Voluntario encargado: {{$Nombre}}</h3>
                                            @endisset
                                        </div>
                                        <div class="card-toolbar">
                                            <!--begin::Dropdown-->
                                            <div class="dropdown dropdown-inline mr-2">
                                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
                                                <i class="la la-download" style="color: white"></i>Exportar</button>
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
                                        <!--begin: Datatable-->
                                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    @foreach($Titles as $Title)
                                                        <th colspan="{{ $Title['No'] }}" ><center>{{ $Title['Name'] }}</center></th>
                                                    @endforeach
                                                    
                                                </tr>
                                                <tr>
                                                    <th>Nombre de los alumnos</th>
                                                    @foreach($Titles as $Title)
                                                        @if($Title['No']==0)
                                                        <th><center>No existen examenes asignados</center></th>
                                                        @endif
                                                        @foreach($Title['Test'] as $title)
                                                        <th><center>{{$title->Title}}</center></th>
                                                        @endforeach
                                                    @endforeach
                                                    
                                                  </tr>
                                            </thead>
                                            <tbody>
                                                
                                                    @foreach( $Models as $model)
                                                        <tr>
                                                            <td>{{$model['Alumno']}}</td>
                                                            @foreach($model['Notas'] as $nota)
                                                                @if(isset($nota['score']))
                                                                    @if(intval($nota['score'])==0)
                                                                        <td><center>{{$nota['score']}}</center></td>
                                                                    @elseif(intval($nota['score']) > 0)
                                                                        @if($nota['State']=='Approved')
                                                                            <td><center><span class="label label-rounded label-success mr-2">{{$nota}}</span></center></td>
                                                                        @else

                                                                        @endif
                                                                    @endif
                                                                @else
                                                                        <td style="background-color: #E2E4ED"></td>
                                                                @endif
                                                            @endforeach
                                                            
                                                        </tr>
                                                    @endforeach                                                    
                                                </div>
                                            </tbody>
                                        </table>
                                        <!--end: Datatable-->
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>
                            <div class="modal fade" id="kt_grades_modal1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Visualizar actividades del curso {{$course->Name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <form class="form">
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Seleccione el nivel</label>
                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                        <select class="form-control selectpicker" data-size="10" data-live-search="true" id="detailA">
                                                            <option value="0">--Seleccione una opción</option>
                                                            @foreach($Modal as $m)
                                                                <option value="{{ $m['id']}} ">{{$m['Name']}} </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="form-text text-muted">Visualice los detalles de la actividad seleccionada</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary mr-2" onclick="detalleActividad();">Visualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

    @stop
    
	@section('scripts')

        <!--begin::Page Vendors(used by this page)-->
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
        <!--end::Page Vendors-->
        <!--begin::Page Scripts(used by this page)-->
        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        
        <!--end::Page Scripts-->
        <script type="text/javascript">
           
            "use strict";
            var KTDatatablesDataSourceHtml = function() {

                var initTable1 = function() {
                    var table = $('#kt_datatable');

                    // begin first table
                    table.DataTable({
                        responsive: true,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
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

            $.fn.editable.defaults.mode = 'inline';
            $(document).ready(function() {
                $('#username').editable();
            });
            function create()
            {
                Swal.mixin({
                    input: 'text',
                    confirmButtonText: 'Siguiente  &rarr;',
                    showCancelButton: true,
                    progressSteps: ['1','2',]
                }).queue([
                    {
                    title: 'Ingrese nombre de la actividad:',
                    
                    },
                    {
                    title: 'Ingrese Punteo total de la actividad:',
                    },
                ]).then((result) => {
                    if (result.value) {
                    const answers = JSON.stringify(result.value)
                    console.log(result.value);
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })
                    
                    swalWithBootstrapButtons.fire({
                        title: '¿Está seguro de los datos?',
                        text: "El nombre de la actividad: "+result.value[0]+" y el punteo: "+result.value[1],
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Si, crearlo!',
                        cancelButtonText: 'No, cancelar!',
                        reverseButtons: true
                    }).then((result2) => {
                        if (result2.isConfirmed) {
                            var data = [{
                                Actividad: result.value[0],
                                Punteo: result.value[1],
                            }];
                
                            $.ajax({
                                url:'/teacher/save/activity/'+{{$course->id}},
                                type:'POST',
                                data: {"_token":"{{ csrf_token() }}","data":data},
                                dataType: "JSON",
                                success: function(e){
                                    if(e.id){
                                        swalWithBootstrapButtons.fire({
                                        title: 'Error!',
                                        text: e.id,
                                        icon: 'error',
                                        confirmButtonText: 'Aceptar',
                                        })
                                    }else{
                                        swalWithBootstrapButtons.fire({
                                        title: 'Creado!',
                                        text: 'Se ha creado con exito!',
                                        icon: 'success',
                                        confirmButtonText: 'Aceptar',
                                        }).then(function () {    
                                            var $url_path = '{!! url('/') !!}';
                                            window.location.href = $url_path+"/teacher/score/list/"+{{$course->id}};
                                        });
                                    }//fin else
                                },
                                error: function(e){
                                    swalWithBootstrapButtons.fire({
                                        title: 'Error!',
                                        text:   e.responseJSON['error'],
                                        icon: 'error',
                                        confirmButtonText: 'Aceptar',
                                    })
                                
                                }
                            });
                        
                        } else {
                        swalWithBootstrapButtons.fire({
                            title: 'Cancelado!',
                            text:  'La actividad no ha sido creada!',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                        }
                    })
                    }
                })
            }//fin funcion crear
            function modal() {
                $("#kt_grades_modal1").modal("show");
            }
            function detalleActividad() {
                var id = $('#detailA').val();
                var $url_path = '{!! url('/') !!}';
                window.location.href = $url_path+"/teacher/detail/activity/"+{{$course->id}}+"/"+id;   
            }
       </script>

      
    @stop
    
