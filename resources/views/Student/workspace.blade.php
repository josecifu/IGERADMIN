@extends('Administration.Base/BaseStudent')
@section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Espacio de Trabajo
    @stop
    @section('breadcrumb2')
    Voluntario
    @stop
    {{-- Page content --}}
    @section('content')
		<div class="content flex-column-fluid" id="kt_content">
			<!--begin::Student-->
			<div class="d-flex flex-row">
				<!--begin::User-->
				<div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
					<!--begin::Card-->
					<div class="card card-custom">
						<!--begin::Body-->
						<div class="card-body pt-15">
							<!--begin::User-->
							<div class="text-center mb-10">
								<div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                    @if(session()->get('Avatar')!=null)
                                        <img src="{{ asset ('assets/media/svg/avatars/'.session()->get('Avatar'))}}" class="h-75 align-self-end" alt="" />
                                    @else
                                        @if(session()->get('Gender')=="Masculino")
                                        <img src="{{ asset ('assets/media/svg/avatars/001-boy.svg')}}" class="h-75 align-self-end" alt="" />
                                        @else
                                        <img src="{{ asset ('assets/media/svg/avatars/002-girl.svg')}}" class="h-75 align-self-end" alt="" />
                                        @endif
                                    @endif
									<i class="symbol-badge symbol-badge-bottom bg-success"></i>
								</div>
								<h4 class="font-weight-bold my-2">{{session()->get('Name')}}</h4>
								<div class="text-muted mb-2">Nivel & Grado</div>
								<span class="label label-light-warning label-inline font-weight-bold label-lg">Activo</span>
							</div>
							<!--end::User-->
							<!--begin::Nav-->
							<a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Cambiar Nombre de Usuario</a>
							<a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Cambiar Número de Teléfono</a>
							<a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Cambiar Contraseña</a>
							<a href="#" class="btn btn-hover-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">Actulizar Correo Eléctronico</a>
							<!--end::Nav-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::User-->
				<!--begin::Notifications-->
				<div class="col-lg-8">
					<!--begin::List Widget 10-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0">
							<h3 class="card-title font-weight-bolder text-dark">Notificaciones</h3>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0">
							<!--begin::Item-->
							<div class="mb-6">
								<!--begin::Content-->
								<div class="d-flex align-items-center flex-grow-1">
									<!--begin::Checkbox-->
									<label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
										<input type="checkbox" value="1" />
										<span></span>
									</label>
									<!--end::Checkbox-->
									<!--begin::Section-->
									<div class="d-flex flex-wrap align-items-center justify-content-between w-100">
										<!--begin::Info-->
										<div class="d-flex flex-column align-items-cente py-2 w-75">
											<!--begin::Title-->
											<a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Informacion del voluntario 1</a>
											<!--end::Title-->
											<!--begin::Data-->
											<span class="text-muted font-weight-bold">Hace un 1 dia</span>
											<!--end::Data-->
										</div>
										<!--end::Info-->
										<!--begin::Label-->
										<span class="label label-lg label-light-primary label-inline font-weight-bold py-4">Approved</span>
										<!--end::Label-->
									</div>
									<!--end::Section-->
								</div>
								<!--end::Content-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="mb-6">
								<!--begin::Content-->
								<div class="d-flex align-items-center flex-grow-1">
									<!--begin::Checkbox-->
									<label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
										<input type="checkbox" value="1" />
										<span></span>
									</label>
									<!--end::Checkbox-->
									<!--begin::Section-->
									<div class="d-flex flex-wrap align-items-center justify-content-between w-100">
										<!--begin::Info-->
										<div class="d-flex flex-column align-items-cente py-2 w-75">
											<!--begin::Title-->
											<a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Informacion del voluntairo 2</a>
											<!--end::Title-->
											<!--begin::Data-->
											<span class="text-muted font-weight-bold">Hace 2 dias</span>
											<!--end::Data-->
										</div>
										<!--end::Info-->
										<!--begin::Label-->
										<span class="label label-lg label-light-warning label-inline font-weight-bold py-4">In Progress</span>
										<!--end::Label-->
									</div>
									<!--end::Section-->
								</div>
								<!--end::Content-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="mb-6">
								<!--begin::Content-->
								<div class="d-flex align-items-center flex-grow-1">
									<!--begin::Checkbox-->
									<label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
										<input type="checkbox" value="1" />
										<span></span>
									</label>
									<!--end::Checkbox-->
									<!--begin::Section-->
									<div class="d-flex flex-wrap align-items-center justify-content-between w-100">
										<!--begin::Info-->
										<div class="d-flex flex-column align-items-cente py-2 w-75">
											<!--begin::Title-->
											<a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Informacion del voluntario 3</a>
											<!--end::Title-->
											<!--begin::Data-->
											<span class="text-muted font-weight-bold">Hace 2 dias</span>
											<!--end::Data-->
										</div>
										<!--end::Info-->
										<!--begin::Label-->
										<span class="label label-lg label-light-success label-inline font-weight-bold py-4">Success</span>
										<!--end::Label-->
									</div>
									<!--end::Section-->
								</div>
								<!--end::Content-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="mb-6">
								<!--begin::Content-->
								<div class="d-flex align-items-center flex-grow-1">
									<!--begin::Checkbox-->
									<label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
										<input type="checkbox" value="1" />
										<span></span>
									</label>
									<!--end::Checkbox-->
									<!--begin::Section-->
									<div class="d-flex flex-wrap align-items-center justify-content-between w-100">
										<!--begin::Info-->
										<div class="d-flex flex-column align-items-cente py-2 w-75">
											<!--begin::Title-->
											<a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Informacion del voluntario 4</a>
											<!--end::Title-->
											<!--begin::Data-->
											<span class="text-muted font-weight-bold">Hace 3 dias</span>
											<!--end::Data-->
										</div>
										<!--end::Info-->
										<!--begin::Label-->
										<span class="label label-lg label-light-danger label-inline font-weight-bold py-4">Rejected</span>
										<!--end::Label-->
									</div>
									<!--end::Section-->
								</div>
								<!--end::Content-->
							</div>
							<!--end: Item-->
							<!--begin: Item-->
							<div class="">
								<!--begin::Content-->
								<div class="d-flex align-items-center flex-grow-1">
									<!--begin::Checkbox-->
									<label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
										<input type="checkbox" value="1" />
										<span></span>
									</label>
									<!--end::Checkbox-->
								</div>
								<!--end::Content-->
							</div>
							<!--end: Item-->
						</div>
						<!--end: Card Body-->
					</div>
					<!--end: List Widget 10-->
				</div>
				<!--end::Notifications-->
			</div>
			<!--end::Student-->
		</div>
	@stop
	@section('scripts')
		<script src="{{ asset ('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
		<script type="text/javascript">
			var KTCkeditor = function () {
				var demos = function () {
					ClassicEditor
						.create( document.querySelector( '#kt-ckeditor-1') )
						.then( editor => {
							mediaEmbed: {previewsInData: true}
						} )
						.catch( error => {	
						} );
				}
				return {
					// public functions
					init: function() {
						demos();
					}
				};
			}();
			jQuery(document).ready(function() {
				KTCkeditor.init();
			});
		</script>
	@stop
