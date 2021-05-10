@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Evaluaciones</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                        </div>



                        <div class="card-body table-full-width table-responsive">
                            <table id="eval" class="table-hover table-striped p-2">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Rating</th>
                                        <th>Titulo</th>
                                        <th>Evaluación</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>

                            </table>
                            @php
                            $showEval = url("/evaluations/");
                            $destroy = url("evaluation/destroy/");

                            @endphp




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

              <!-- Mini Modal -->
            <div class="modal fade modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="modal-profile">
                                <i class="nc-icon nc-single-copy-04"></i>
                            </div>
                        </div>
                        <div class="modal-body text-center">
                            <p id="modalTitle"></p>
                        </div>
                        <div class="modal-footer" style="margin:auto;">
                            <button type="button" class="btn btn-warning btn-wd" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
@endsection



@push('js')

  <script type="text/javascript">

                            $(document).ready(function() {
                                oTable = $('#eval').DataTable({
                                    "order": [[ 0, 'desc' ]],
                                    "processing": true,
                                    "serverSide": false,
                                    "bFilter": true,
                                    "bLengthMenu": false,
                                    "bLengthChange": false,

                                    "ajax": "{{ route('datatable.allEvaluations') }}",
                                    "columns": [
                                        {data: 'id', name: 'id'},
                                        {data: 'created_at', name: 'created_at'},
                                        {data: 'name', name: 'name'},
                                        {data: 'rating', name: 'rating'},
                                        {data: 'title', name: 'title'},
                                        {data: 'evaluationShort', name: 'evaluationShort'},
                                        {

                                            data: null,
                                            render: function (data, type, row) {
                                                        return '<a href="#" data-toggle="modal" data-id="' + row.id + '" data-evaluation="' + row.evaluation + '" data-target="#myModal1"><i class="fa fa-eye mr-2"></i></a> <a href="{{ $destroy }}/'+ row.id +'"><i class="fa fa-trash"></i></a>'
                                            }
                                        }



                                    ],
                                    "responsive": true,
                                    "language": {
                                        "sProcessing":    "Procesando...",
                                        "sLengthMenu":    "Mostrar _MENU_ registros",
                                        "sZeroRecords":   "No se encontraron resultados",
                                        "sEmptyTable":    "Ningún dato disponible en esta tabla",
                                        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
                                        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                                        "sInfoPostFix":   "",
                                        "sSearch":        "Filtra por cualquier campo:",
                                        "sUrl":           "",
                                        "sInfoThousands":  ",",
                                        "sLoadingRecords": "Cargando...",
                                        "oPaginate": {
                                            "sFirst":    "Primero",
                                            "sLast":    "Último",
                                            "sNext":    "Siguiente",
                                            "sPrevious": "Anterior"
                                        },
                                        "oAria": {
                                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                        }
                                    },
                                }).columns.adjust();
                            });


                            $("#myModal1").on('show.bs.modal', function(e) {
                                let triggerLink = $(e.relatedTarget);
                                let evaluation = triggerLink[0].dataset['evaluation'];
                                let exitMessage = triggerLink.data("exitMessage");

                                $("#modalTitle").text(evaluation);
                                $(this).find(".modal-body").html("<h5> " + evaluation + "</h5>");

                            });
                        </script>

@endpush
