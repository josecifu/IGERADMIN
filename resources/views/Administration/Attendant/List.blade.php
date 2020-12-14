@extends('Administration.Base/Base')
{{-- Page title --}}
    @section('title')
    Encargado de circulo
    @stop
    @section('breadcrumb1')
    Administración
    @stop
    @section('breadcrumb2')
    Principal
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
                    <h3 class="card-label">Listado Encargados de circulo - @if($type=="Active") Activos @else Eliminados @endif</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                   
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a href="{{url('administration/workspace/attendant/create')}}"class="btn btn-success font-weight-bolder">
                    <i class="la la-plus"></i>Añadir un encargado de circulo</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            @foreach($Titles as $Title)
                            <th>{{ $Title }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @if($Models)
                                                    @foreach($Models as $Model)
                                                    <tr>
                                                        <td>{{$Model['Id']}}</td>                                                  
                                                        <td>{{$Model['Name']}} {{$Model['LastName']}}</td>
                                                        <td>{{$Model['Phone']}}</td>
                                                        <td>{{$Model['Email']}}</td>
                                                        <td>{{$Model['User']}}</td>
                                                        <td>{{$Model['Conection']}}</td>
                                                        <td>
                                                            @if($Model['Attendant'])
                                                            <ul>
                                                                @foreach($Model['Attendant'] as $m)
                                                                    <li>{{$m['Circulo']}}</li>    
                                                                @endforeach
                                                            </ul>
                                                            @else
                                                            <p style="text-align: center;">  Ningun circulo de estudio asignado</p>
                                                                
                                                            @endif
                                                            
                                                        <td nowrap="nowrap"></td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                    </tbody>
                </table>
                <!--end: Datatable-->
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

        <script type="text/javascript">
           
            "use strict";
            var KTDatatablesDataSourceHtml = function() {
                var d = new Date();
                var strDate =  d.getDate()+ "-" + (d.getMonth()+1) + "-" + d.getFullYear();
                var initTable1 = function() {
                    var table = $('#kt_datatable');

                    // begin first table
                    table.DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                text: 'Exportar a excel',
                                extend: 'excelHtml5',
                                fieldSeparator: '\t',
                                messageTop: 'Listado de encargados .',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 , 5 ,6 ],
                                },
                                title: 'Listado de encargados  -'+strDate
                            },
                            {
                                text: 'Exportar a csv',
                                extend: 'csvHtml5',
                                extension: '.csv',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 , 5 ,6 ],
                                },
                                title: 'Listado de encargados -'+strDate
                            },
                            {
                                text: 'Exportar a PDF',
                                extend: 'pdfHtml5',
                                extension: '.pdf',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 , 5 ,6],
                                },
                                title: 'Listado de encargados -'+strDate,
                                customize: function(doc) {
                                    doc['styles'] = {
                                        userTable: {
                                            margin: [0, 15, 0, 15]
                                        },
                                        tableHeader: {
                                            bold:!0,
                                            fontSize:11,
                                            color:'white',
                                            fillColor:'#85AED1',
                                            alignment:'center'
                                        }
                                    },
                                    doc.styles.tableBodyOdd = {
                                        alignment: 'center'
                                      },
                                    doc.styles.title = {
                                      color: 'white',
                                      fontSize: '40',
                                      background: '#ec7e35',
                                      alignment: 'center'
                                    }   
                                  } ,
                            }
                            
                        ],
                        responsive: true,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        },
                        columnDefs: [
                            {
                                targets: -1,
                                title: 'Acciones',
                                orderable: false,
                                render: function(data, type, full, meta) {
                                    return '\
                                        @if($type=="Active")
                                        <div class="dropdown dropdown-inline">\
                                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
                                                <i class="la la-cog"></i>\
                                            </a>\
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" >\
                                                <ul class="nav nav-hoverable flex-column" >\
                                                    <li class="nav-item"><a class="nav-link" href="/administration/workspace/attendant/assign/'+full[0]+'" ><i class="nav-icon la la-mail-reply-all"></i><span class="nav-text" style="padding-left:10px;"> Asignación de circulos de estudio</span></a></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                        <a href="/administration/workspace/attendant/edit/'+full[0]+'" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip"  title="Editar encargado de circulo" data-placement="top">\
                                            <i class="la la-edit"></i>\
                                        </a>\
                                        <a href="javascript:;" onclick="DeleteAttendant(\''+full[0]+'\',\''+full[1]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" title="Eliminar encargado de circulo" data-placement="top">\
                                        <i class="la la-trash"></i>\
                                        </a>\
                                        @else
                                        <center><a href="javascript:;" onclick="ActiveAttendant(\''+full[0]+'\',\''+full[1]+'\')" class="btn btn-sm btn-clean btn-icon" data-toggle="tooltip" title="Activar encargado de circulo" data-placement="top">\
                                        <i class="la la-check-circle"></i>\
                                        </a></center>\
                                        @endif';
                                        
                                },
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

      
       
        function ViewTeachers($lvl)
        {
            var lvl = $('#lvlselect'+$lvl).val();
            var $url_path = '{!! url('/') !!}';
            window.location.href = $url_path+"/administration/configurations/level/list/grades/level/"+lvl;
        }
       
        function DeleteAttendant($id,$name)
        {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })
            swalWithBootstrapButtons.fire({
                title: '¿Está seguro de eliminar el encargado de circulo?',
                text: "El nombre del encargado : "+$name+".",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, ¡eliminar!',
                cancelButtonText: 'No, ¡cancelar!',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: '¡Eliminado!',
                        text: '¡Se ha eliminado con exito!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    }).then(function () {
                          var $url_path = '{!! url('/') !!}';
                          console.log("HOLA");
                          window.location.href = $url_path+"/administration/workspace/attendant/change/"+$id+"/deleteattendant";
                        });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire({
                    title: 'Cancelado!',
                    text:  'El encargado de circulo no ha sido eliminado!',
                    icon: 'error',
                    confirmButtonText: 'Aceptar',
                })
                }
              })
        }
        function Addgrade($id)
        {
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Siguiente  &rarr;',
                showCancelButton: true,
                progressSteps: ['1']
              }).queue([
                {
                  title: 'Ingrese el nombre del nuevo grado:',
                 
                }
              ]).then((result) => {
                if (result.value) {
                  const answers = JSON.stringify(result.value)
                  const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                      confirmButton: 'btn btn-success',
                      cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                  })
                  
                  swalWithBootstrapButtons.fire({
                    title: '¿Está seguro de los datos?',
                    text: "El nombre del nivel : "+result.value[0],
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, crearlo!',
                    cancelButtonText: 'No, cancelar!',
                    reverseButtons: true
                  }).then((result2) => {
                    if (result2.isConfirmed) {
                        var data = [{
                            //Usuario
                            Name: result.value[0],
                            id: $id,
                        }];
            
                        $.ajax({
                            url:'/administration/configurations/level/save',
                            type:'POST',
                            data: {"_token":"{{ csrf_token() }}","data":data},
                            dataType: "JSON",
                            success: function(e){
                                swalWithBootstrapButtons.fire({
                                    title: 'Creado!',
                                    text: 'Se ha creado con exito!',
                                    icon: 'success',
                                    confirmButtonText: 'Aceptar',
                                }).then(function () {
                                       
                                      var $url_path = '{!! url('/') !!}';
                                      window.location.href = $url_path+"/administration/configurations/level/list";
                                    });
                                 
                            },
                            error: function(e){
                                swalWithBootstrapButtons.fire({
                                    title: 'Cancelado!',
                                    text:   e.responseJSON['error'],
                                    icon: 'error',
                                    confirmButtonText: 'Aceptar',
                                })
                               
                            }
                        });
                     
                    } else if (
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                      swalWithBootstrapButtons.fire({
                        title: 'Cancelado!',
                        text:  'El dia no ha sido creada!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    })
                    }
                  })
                }
              })
        }
        function create()
        {
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Siguiente  &rarr;',
                showCancelButton: true,
                progressSteps: ['1']
              }).queue([
                {
                  title: 'Ingrese el nombre de la jornada:',
                 
                }
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
                    text: "El nombre de la jornada: "+result.value[0],
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, crearlo!',
                    cancelButtonText: 'No, cancelar!',
                    reverseButtons: true
                  }).then((result2) => {
                    if (result2.isConfirmed) {
                        var data = [{
                            //Usuario
                            Name: result.value[0],
                        }];
            
                        $.ajax({
                            url:'/administration/configurations/period/save',
                            type:'POST',
                            data: {"_token":"{{ csrf_token() }}","data":data},
                            dataType: "JSON",
                            success: function(e){
                                swalWithBootstrapButtons.fire({
                                    title: 'Creado!',
                                    text: 'Se ha creado con exito!',
                                    icon: 'success',
                                    confirmButtonText: 'Aceptar',
                                }).then(function () {
                                       
                                      var $url_path = '{!! url('/') !!}';
                                      window.location.href = $url_path+"/administration/configurations/level/list";
                                    });
                                 
                            },
                            error: function(e){
                                swalWithBootstrapButtons.fire({
                                    title: 'Cancelado!',
                                    text:   e.responseJSON['error'],
                                    icon: 'error',
                                    confirmButtonText: 'Aceptar',
                                })
                               
                            }
                        });
                     
                    } else if (
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                      swalWithBootstrapButtons.fire({
                        title: 'Cancelado!',
                        text:  'La jornada no ha sido creada!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    })
                    }
                  })
                }
              })
        }
       
@foreach ($Models as $Model)
$('#CoursesModal{{$Model['Id']}}').on('shown.bs.modal', function () {
    $('#CoursesList{{$Model['Id']}}').select2({
        placeholder: "Añada los cursos para el grado",
        tags: true,
        "language": {
            "noResults": function(){
                return "Agrege cursos precionando la tecla enter";
            }
        },
    });  
});
@endforeach
          
         function AddCourses(id)
         {
            var courses = $('#CoursesList'+id).val();
            $.ajax({
                url:'/administration/configurations/level/list/grades/courses/save',
                type:'POST',
                data: {"_token":"{{ csrf_token() }}","data":courses,'Id':id},
                dataType: "JSON",
                success: function(e){
                    swal.fire({
                        title: 'Creado!',
                        text: 'Se ha creado con exito!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    }).then(function () {
                           
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/administration/configurations/level/list";
                        });
                     
                },
                error: function(e){
                    swal.fire({
                        title: 'Cancelado!',
                        text:   e.responseJSON['error'],
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    })
                   
                }
            });
         }
         function ActiveAttendant($id,$name)
        {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })
            swalWithBootstrapButtons.fire({
                title: '¿Está seguro de activar el encargado de circulo de estudio?',
                text: "El nombre del encargado: "+$name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, ¡activar!',
                cancelButtonText: 'No, ¡cancelar!',
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                    var Code = $id;
                    var data = [{
                        Code: Code,
                        Name: result.value[0],
                    }];
                    swalWithBootstrapButtons.fire({
                        title: '¡Activada!',
                        text: '¡Se ha activado con exito!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    }).then(function () {
                           
                          var $url_path = '{!! url('/') !!}';
                          window.location.href = $url_path+"/administration/workspace/attendant/change/"+$id+"/active";
                        });
                } else if (
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire({
                    title: '¡Cancelado!',
                    text:  '¡El circulo de estudio no ha sido activado!',
                    icon: 'error',
                    confirmButtonText: 'Aceptar',
                })
                }
              })
        }
         $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          })
       </script>
        <!--end::Page Scripts-->
      
	@stop