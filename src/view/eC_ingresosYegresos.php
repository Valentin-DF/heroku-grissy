<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grissy - Areas</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.6/sp-2.0.1/sl-1.4.0/datatables.min.css" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/carga.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png" />
    <link rel="stylesheet" href="../assets/toastify/toastify.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>

</head>

<body class="nav-fixed">
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
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                    <div class="container-xl px-4">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                <div class="col-auto mb-3">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><em data-feather="user"></em></div>
                                        Estado de Resultado Integral
                                    </h1>
                                </div>
                                <div class="col-12 col-xl-auto mb-3">
                                    <a class="btn btn-sm btn-light text-primary" href="e_productoEmpresa.php">
                                        <em class="me-1" data-feather="arrow-left"></em>
                                        Producto
                                    </a>
                                    <a class="btn btn-sm btn-light text-primary" href="e_cargo.php">

                                        Cargo

                                        <em data-feather="arrow-right"></em>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-xl px-4 mt-4">
                    <!-- Custom page header alternative example-->
                    <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                        <div class="input-group">
                            <input class="input-group-text " disabled type="text" id="descripcion_fecha">
                            <input class="form-control ps-0 pointer text-center" type="date" id="fecha_inicial">
                            <input class="form-control ps-0 pointer text-center" type="date" id="fecha_final">
                            <input class="form-control ps-0 pointer text-center" type="month" id="fecha_mes_ano">
                            <button aria-label="Buscar" class="btn btn-outline-success btn-sm" onclick="ingresos_egresos.mostrar()"><span class="fa-solid fa-magnifying-glass"></span>
                            </button>

                            <button aria-label="filtrar" class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#mostrarFiltros" aria-expanded="false"><span class="fa-solid fa-sort-down"></span>
                            </button>

                        </div>

                    </div>
                    <div class="collapse" id="mostrarFiltros">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="radio" name="status" id="fecha" checked value="fecha" onclick="ingresos_egresos.mostrarRadio()"> <label for="fecha">En Fecha</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" name="status" id="rango_fechas" value="rango_fechas" onclick="ingresos_egresos.mostrarRadio()"> <label for="rango_fechas">Entre Rango de Fechas</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" name="status" id="mes_ano" value="mes_ano" onclick="ingresos_egresos.mostrarRadio()"> <label for="mes_ano">Por Periodo</label>
                                </div>

                            </div>


                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5> Ingresos:</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Monto Monetario</th>
                                            </tr>
                                        </thead>
                                        <tbody id="lst-ingresos">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <th>
                                                    <p id="totalIngresos"></p>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5> Egresos:</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Monto Monetario</th>
                                            </tr>
                                        </thead>
                                        <tbody id="lst-gastos">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Total</th>
                                                <th>
                                                    <p id="totalGastos"></p>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>

                            </div>
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
<script src="scripts/ingresos_egresos.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var fechita = new Date();
        ingresos_egresos.buscarPorFecha(ingresos_egresos.formatDate(fechita), "", "");
        ingresos_egresos.mostrarRadio();
    });
</script>

</html>