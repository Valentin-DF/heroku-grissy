<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Clientes</title>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.6/sp-2.0.1/sl-1.4.0/datatables.min.css" />
    <link href="assets/css/styles.css" rel="stylesheet" />


</head>

<body>
    <div class="contenedor">
        <?php include "nav.html"; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include "sidevar.html"; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-4"">
                        <div class=" row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Ventas Pendientes</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" onclick="menu.tablaDetealles(1)">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Ventas Cobradas</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" onclick="menu.tablaDetealles(2);">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Ventas Anuladas</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" onclick="menu.tablaDetealles(0);">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Venta Semanales
                                </div>
                                <div id="chartContainer" style="height: 300px; width: 100%;"></div>

                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Venta Mensual
                                </div>
                                <div id="chartContainer2" style="height: 300px; width: 100%;"></div>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Detalle de las ventas
                        </div>
                        <div class="card-body">
                            <table class="table " id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>SubTotal</th>
                                        <th>IGV</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
            </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <?php include "footer.html"; ?>
            </footer>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="assets/js/datatables-simple-demo.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

</body>
<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- DATATABLES -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>
<!-- BOOTSTRAP -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.6/sp-2.0.1/sl-1.4.0/datatables.min.js"></script>


<script src="assets/js/scripts.js"></script>

<script src="scripts/menu.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        menu.mapaSemanal();
        menu.mapaMensual();
    });
</script>


</html>