<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grissy</title>
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
                <main>
                    <header>
                        <div class="container-xl px-4 mt-5">
                            <!-- Custom page header alternative example-->
                            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                                <div class="me-4 mb-3 mb-sm-0">

                                </div>
                                <!-- Date range picker example-->
                                <div class="input-group input-group-joined border-0 shadow" style="width: 16.5rem">
                                    <span class="input-group-text"><em data-feather="calendar"></em></span>
                                    <input disabled class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />
                                </div>
                            </div>
                    </header>

                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="row">
                            <div class="col-xl-4 mb-4">
                                <!-- Dashboard example card 2-->
                                <a class="card lift h-100" href="e_perfil.php">
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="me-3">
                                                <em class="feather-xl text-secondary mb-3" data-feather="user"></em>
                                                <h5>Perfil</h5>
                                                <div class="text-muted small">Configuracion de los datos del usuario.</div>
                                            </div>
                                            <img src="../assets/img/illustrations/processing.svg" alt="..." style="width: 8rem" />
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 mb-4">
                                <!-- Dashboard example card 1-->
                                <a class="card lift h-100" href="e_venta.php">
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="me-3">
                                                <em class="feather-xl text-primary mb-3" data-feather="layout"></em>
                                                <h5>Ventas</h5>
                                                <div class="text-muted small">Ventana de procesos de venta</div>
                                            </div>
                                            <img src="../assets/img/illustrations/browser-stats.svg" alt="..." style="width: 8rem" />
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 mb-4">
                                <!-- Dashboard example card 3-->
                                <a class="card lift h-100" href="e_ordenCompra.php">
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="me-3">
                                                <em class="feather-xl text-green mb-3" data-feather="package"></em>
                                                <h5>Orden de compra</h5>
                                                <div class="text-muted small">Ventana de Ordenes de Compra</div>
                                            </div>
                                            <img src="../assets/img/illustrations/windows.svg" alt="..." style="width: 8rem" />
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 mb-4">
                                <!-- Dashboard example card 3-->
                                <a class="card lift h-100" href="e_ordenServicio.php">
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="me-3">
                                                <em class="feather-xl text-orange mb-3" data-feather="package"></em>
                                                <h5>Orden de Servicio</h5>
                                                <div class="text-muted small">Ventana de Ordenes de Servicio</div>
                                            </div>
                                            <img src="../assets/img/illustrations/windows.svg" alt="..." style="width: 8rem" />
                                        </div>
                                    </div>
                                </a>
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
<script src="scripts/menu.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // document.getElementById("codigo").disabled = true;

    });
</script>

</html>