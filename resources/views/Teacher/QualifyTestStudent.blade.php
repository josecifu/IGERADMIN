@extends('Administration.Base/BaseTeacher')
{{-- Page title --}}
    @section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Asignación
    @stop
    @section('breadcrumb2')
    Preguntas
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
                                            <div class="card-toolbar">
                                                <!--begin::Dropdown-->
                                                <!--end::Dropdown-->
                                            </div>
                                        </div>
                                        <div class="card-toolbar">
                                            <div class="card-toolbar">
                                                <!--begin::Dropdown-->
                                                <a onclick="calificar();" class="btn btn-primary font-weight-bolder mr-2">
                                                <i class="ki ki-check icon-sm"></i>Guardar Calificación</a>
                                                <!--end::Dropdown-->
                                            </div>
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
                                                    <span class="card-icon">
                                                        <i class="flaticon2-favourite text-primary"></i>
                                                    </span>
													<h3 class="card-label">{{$test->Title}} - Valor: {{$test->Score}} pts</h3>
												</div>
											</div>
											<div class="card-body">
												<!--begin::Accordion-->
												<div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                                    @foreach($Models as $key => $q)
                                                        <div class="card">
                                                            <div class="card-header">
                                                                    <div class="card-title" data-toggle="collapse" data-target="#collapseOne{{$key}}">{{$q['Pregunta']}}  - valor: {{$q['valor']}} pts - Tipo: {{$q['Tipo']}}</div>
                                                            </div>
                                                             <div id="collapseOne{{$key}}" data-parent="#accordionExample1"> <!-- style="text-align: center" -->
                                                                <div class="card-body">
                                                                    <h5>{{$q['Title']}}</h5><br>
                                                                    <div class="container">
                                                                    {!! $q['Content'] !!}
                                                                    </div><br>
                                                                    <h5>Respuesta Correcta: {{$q['RespuestaC']}}</h5>
                                                                    <label>Respuesta del estudiante: {{$q['RespuestaE']}}</label>
                                                                    <div class="form-group row">
                                                                        <label class="col-2 col-form-label">Punteo: </label>
                                                                        <div class="col-2">
                                                                            <input name="score{{$key}}" id="score{{$key}}"  value="{{$q['Punteo']}}" class="form-control" type="number" style="text-align: center"/>
                                                                        </div>
                                                                    </div>
                                                                    <input name="answer{{$key}}" id="answer{{$key}}"  value="{{$q['id']}}" class="form-control" type="hidden" style="text-align: center"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
												</div>
												<!--end::Accordion-->
											</div>
										</div>
                                        <!--end::Card-->
                                        
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
           
            function calificar() {
                var modelo=[];
                var code = {{$nota}};
                for (let i = 0; i < {{count($Models)}}; i++) {
                    var id = $('#answer'+i).val();
                    var Punteo = $('#score'+i).val();
                    var data = [{
                        id: id,
                        Punteo: Punteo,
                    }];
                    modelo.push(data);
                }
                $.ajax({
                url:'/teacher/qualify/question',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":modelo,'id':code},
                dataType: "JSON",
                success: function(e){
                        if (e.Error) {
                            swal.fire({
                            title: 'Error!',
                            text: e.Error,
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                            })
                        } else {
                            swal.fire({ title: "Accion completada", 
                            text: "El exámen ha sido calificado!", 
                            type: "success"
                            }).then(function () {
                            var $url_path = '{!! url('/') !!}';
                                window.location.href = $url_path+"/teacher/test/score/"+{{$course}};    
                            });
                        }
                        
                    },
                    error: function(e){
                        console.log(e);
                        swal.fire({
                            title: 'Ocurrio un error!',
                            text:  'Los datos no han sido registrados!, verifique los campos',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                        })
                    }
                });
            }
       </script>
	@stop