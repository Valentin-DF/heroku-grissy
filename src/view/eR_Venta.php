<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grissy - Repor Ventas</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.6/sp-2.0.1/sl-1.4.0/datatables.min.css" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/carga.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png" />
    <link rel="stylesheet" href="../assets/toastify/toastify.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="contenedor_carga">
        <div id="carga">
        </div>
    </div>
    <?php include "eP_nav.html"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "eP_sidevar.html"; ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container-xl px-4">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><em data-feather="mouse-pointer"></em></div>
                                        Movimientos de las Ventas
                                    </h1>
                                    <div class="page-header-subtitle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="container-xl px-4 mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">

                            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row ">
                                <div class="me-4 mb-3 mb-sm-0">
                                    <em class="fas fa-table me-1"></em>
                                    Reporte de Ventas
                                </div>
                                <div class="btn-group">
                                    <button aria-label="excel" onclick="tableToExcel('example', 'W3C Example Table')" class="btn btn-outline-primary btn-sm btn-light " type="button" id="excel">Exportar</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm btn-light " value="Imprimir" onclick="javascript:window.print()">Imprimir</button>
                                    <button aria-label="visualizarCliente" data-bs-toggle="collapse" data-bs-target="#busquedaAvanzada" aria-expanded="false" class="btn btn-outline-primary btn-sm " type="button" id="vizualizarCliente">Avanzado</button>
                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="busquedaAvanzada">
                            <div class="card card-body">
                                <div class="row">
                                    <input type="hidden" id="idCliente" class="form-control">
                                    <div class="col-sm-4">
                                        <div class="form-grou">
                                            <label for="fechaInicio">Fecha Inicio</label>
                                            <input type="date" id="fechaInicio" class="form-control" placeholder="Fecha Inicio">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="fechaFinal">Fecha Final</label>
                                            <input type="date" id="fechaFinal" class="form-control" placeholder="Fecha Final">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="idEncargado">Encargado</label>
                                            <select class="form-control form-select" id="idEncargado">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button aria-label="busqueda" class="btn btn-outline-primary btn-sm " type="button" id="busquedar" onclick="rVentas.busquedaAvanzadav();">BUSCAR</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table summary="Lista vENTA" class="table " id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Doc. Identidad</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Fecha Registro</th>
                                        <!-- <th>Estado</th> -->
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right">Total:</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer-admin mt-auto footer-light">
                <?php include "eP_footer.html"; ?>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.6/sp-2.0.1/sl-1.4.0/datatables.min.js"></script>

    <script src="../js/litepicker.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/configuracion_general.js"></script>


    <script src="../assets/toastify/toastify.js"></script>
</body>

<script src="scripts/permisos.js"></script>
<script src="scripts/rVentas.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        rVentas.obtenerListaEncargado();

        rVentas.obtenerListaV();
    });
</script>


</html>