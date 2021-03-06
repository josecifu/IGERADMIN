@extends('Administration.Base/Base')
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
				
				<!--end::User-->
				<!--begin::Notifications-->
				<div class="col-lg-12">
					<!--begin::List Widget 10-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0">
                            <h3 class="card-title font-weight-bolder text-dark">informacion de cursos</h3>
                            <div class="card-toolbar">
                                <a href="{{url('attendant/home/workspace/list/'.$id)}}" class="btn btn-danger font-weight-bolder mr-2"><i class="ki ki-long-arrow-back icon-sm"></i>Regresar</a>
                            </div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
	
							<div class="card card-custom gutter-b">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Header-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        {{--<div class="symbol symbol-40 symbol-light-success mr-5">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/avatars/018-girl-9.svg" class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>--}}
                                        <!--end::Symbol-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$information['Teacher']}}</a>
                                            <span class="text-muted font-weight-bold">{{$information['Title']}}</span>
                                        </div>
                                        <!--end::Info-->
                                       
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="pt-5">
                                        <!--begin::Text-->
                                        <p class="text-dark-75 font-size-lg font-weight-normal mb-2">{!!$information['Description']!!}</p>
                                        <!--end::Text-->
                                        {{--<!--begin::Action-->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2 mr-2">
                                            <span class="svg-icon svg-icon-md svg-icon-dark-25 pr-2">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
                                                        <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>24</a>
                                            <a href="#" class="btn btn-sm btn-text-dark-50 btn-hover-icon-danger btn-hover-text-danger bg-hover-light-danger font-weight-bolder rounded font-size-sm p-2">
                                            <span class="svg-icon svg-icon-md svg-icon-dark-25 pr-1">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Heart.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>75</a>
                                        </div>
                                        <!--end::Action-->--}}
                                    </div>
                                    <!--end::Body-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-solid mt-2 mb-4"></div>
                                    <!--end::Separator-->
                                    {{--<!--begin::Editor-->
                                    <form class="position-relative">
                                        <textarea id="kt_forms_widget_3_input" class="form-control border-0 p-0 pr-10 resize-none" rows="1" placeholder="Reply..."></textarea>
                                        <div class="position-absolute top-0 right-0 mt-n1 mr-n2">
                                            <span class="btn btn-icon btn-sm btn-hover-icon-primary">
                                                <i class="flaticon2-clip-symbol icon-ms"></i>
                                            </span>
                                            <span class="btn btn-icon btn-sm btn-hover-icon-primary">
                                                <i class="flaticon2-pin icon-ms"></i>
                                            </span>
                                        </div>
                                    </form>
                                    <!--edit::Editor-->--}}
                                </div>
                                <!--end::Body-->
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
            function deleteinfo($url)
			{
                Swal.fire({
                        text: "¿Esta seguro que desea eliminar la publicacion?",
                        icon: "error",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Eliminar",
                        cancelButtonText: "Cancelar",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-danger",
                            cancelButton: "btn font-weight-bold btn-default"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            console.log($url);
                            window.location.href = $url;
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: "La publicacion no ha sido eliminada!.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Aceptar",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-success",
                                }
                            });
                        }
                    });
                    
			}
            function getId(url) {
                var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                var match = url.match(regExp);
            
                if (match && match[2].length == 11) {
                    return match[2];
                } else {
                    return 'error';
                }
            }
            jQuery(document).ready(function() {
                document.querySelectorAll( 'oembed[url]' ).forEach( element => {
                    
                    var videoId = getId(element.getAttribute("url"));
            
                    var iframeMarkup = '<iframe width="560" height="315" src="//www.youtube.com/embed/' 
                        + videoId + '" frameborder="0" allowfullscreen></iframe>';
                        let div = document.createElement('div');
                        div.innerHTML = iframeMarkup;
                        element.parentNode.appendChild(div);
                        element.parentNode.removeChild(element);
                 } );
            });
            
		</script>
	@stop