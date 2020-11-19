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
    	<link href="{{ asset('assets/css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" />
        <div class="content flex-column-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <table class="table table-bordered table-hover table-checkable" style="margin-top: 20px !important ">
                            <thead>
                                <tr>
                                    <th>
                                        <h4>
                                        	Titulo del Test<br>
                                        	Semestre<br>
                                        	Nombre del profesor
                                        </h4>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
				<form class="form flex-column-fluid">
					<div class="card-body">
						<div class="form-group">
							<label>¿Pregunta 1?</label>
							<input type="text" style="width:500px;" name="respuesta" id="respuesta" class="form-control form-control-solid" placeholder="Ingrese su respuesta" />
						</div>
						<div class="form-group">
							<label>¿Pregunta 2?</label>
						    <div class="radio-inline">
						        <label class="radio radio-lg">
						            <input type="radio" name="radios3_1"/>
						            <span></span>
						            Verdadero
						        </label>
						        <label class="radio radio-lg">
						            <input type="radio" name="radios3_1"/>
						            <span></span>
						            Falso
						        </label>
						    </div>
						</div>
						<div class="form-group">
							<label>¿Pregunta 3?</label>
							<div class="radio-inline">
						        <label class="radio radio-square">
						            <input type="radio" name="radios13_1"/>
						            <span></span>
						            Opcion 1
						        </label>
								<label class="radio radio-square">
									<input type="radio" name="radios13_1"/>
									<span></span>
									Opcion 2
								</label>
								<label class="radio radio-square">
									<input type="radio" name="radios13_1"/>
									<span></span>
									Opcion 3
								</label>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="reset" class="btn btn-primary mr-2">Terminar y enviar</button>
					</div>
				</form>
            	<!--end::Card-->
        	</div>
        </div>
    @stop
