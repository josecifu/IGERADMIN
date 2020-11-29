@extends('Administration.Base/BaseStudent')
	{{-- Page title --}}
	@section('title')
	Inicio
	@stop
	@section('breadcrumb1')
	Informacion
	@stop
	@section('breadcrumb2')
	Cursos
	@stop
	{{-- Page content --}}
	@section('content')
		<div class="content flex-column-fluid" id="kt_content">
			<!--begin::Card-->
			<div class="card card-custom">
				<div class="card-header">
					<div class="card-title">
						<span class="card-icon">
							<i class="flaticon2-favourite text-primary"></i>
						</span>
						<h3 class="card-label">Información de Cursos y Profesores</h3>
					</div>
					<div class="card-toolbar">
						<a href="{{url('student/home/dashboard')}}" class="btn btn-danger font-weight-bolder mr-2"><i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
					</div>
				</div>
			</div><br>
			<!--end::Card-->
			<!--begin::Card-->
			@foreach($models as $model)
			<div class="card card-custom gutter-b col-xl-6 loat-left">
				<div class="card-body">
					<div class="d-flex">
						<!--begin::Pic-->
						<div class="flex-shrink-0 mr-7">
							<div class="symbol symbol-50 symbol-lg-120">
								@if($model['gender']=="Masculino")
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
							<div class="d-flex align-items-center justify-content-between flex-wrap">
								<!--begin::User-->
								<div class="mr-3">
									<div class="d-flex align-items-center mr-3">
										<!--begin::Name-->
										<a class="d-flex align-items-center text-dark text-hover-warning font-size-h5 font-weight-bold mr-3">
											<h3>{{$model['teacher']}}</h3></a>
										<!--end::Name-->
									</div>
									<!--begin::Contacts-->
									<div class="d-flex flex-wrap my-2">
										<a class="text-muted text-hover-danger font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
											<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
												<i class="flaticon2-black-back-closed-envelope-shape"></i>
											</span>{{$model['email']}}
										</a>
									</div>
									<div class="d-flex flex-wrap my-2">
										<a class="text-muted text-hover-success font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
											<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
												<i class="flaticon2-phone"></i>
											</span>{{$model['phone']}}
										</a>
									</div>
									<span class="btn btn-outline-dark">
										<h7>{{$model['course']}}</h7>
									</span><br><br>
									<!--end::Contacts-->
								</div>
								<!--begin::User-->
							</div>
							<!--end::Title-->
						</div>
						<!--end::Info-->
					</div>
				</div>
			</div>
			@endforeach
			<!--end::Card-->
		</div>
	@stop
