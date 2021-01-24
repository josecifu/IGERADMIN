@extends('Administration.Base/BaseStudent')
@section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Espacio de Trabajo
    @stop
    @section('breadcrumb2')
    Estudiante
    @stop
    {{-- Page content --}}
    @section('content')
		<div class="content flex-column-fluid" id="kt_content">
			<!--begin::Student-->
			<div class="d-flex flex-row">
				<!--begin::User-->
				
				<!--end::User-->
				<!--begin::Notifications-->
				<div class="col-lg-12">
					<!--begin::List Widget 10-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0">
							<h3 class="card-title font-weight-bolder text-dark">informacion de cursos</h3>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0">
							@foreach($informations as $information)
							<!--begin::Item-->
							<div class="mb-6">
								<!--begin::Content-->
								<div class="d-flex align-items-center flex-grow-1">
									<!--begin::Checkbox-->
									<!--end::Checkbox-->
									<!--begin::Section-->
									<div class="d-flex flex-wrap align-items-center justify-content-between w-100">
										<!--begin::Info-->
										<div class="d-flex flex-column align-items-cente py-2 w-75">
											<!--begin::Title-->
											<a href="{{url('student/home/workspace/view/'.$information['id'])}}" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">{{$information['Title']}}</a>
											<!--end::Title-->
											<!--begin::Data-->
											<span class="text-muted font-weight-bold">{{$information['Date']}}</span>
											<!--end::Data-->
										</div>
										<!--end::Info-->
										<!--begin::Label-->
										<span class="label label-lg label-light-dark label-inline font-weight-bold py-4">{{$information['Course']}}</span>
										<!--end::Label-->
									</div>
									<!--end::Section-->
								</div>
								<!--end::Content-->
							</div>
							<!--end::Item-->
							@endforeach
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
		
		</script>
	@stop
