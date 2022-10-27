<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grissy - Permisos</title>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body ">

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="lst-personal">Personal</label>
                                    <select class="form-select" id="lst-personal" oninput="permisos.seleccionar();">
                                        <option value="0" selected>Seleccionar</option>
                                    </select>
                                </div>

                                <div class="container" style="margin-top: 10px;" id="contenido">
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <div class="row">
                                                <h5>ADMINISTRACION</h5>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="p_grissyCliente" value="0" aria-label="p_grissyCliente" class="form-check-input form-check-primary form-check-glow">
                                                        <label for=" p_grissyCliente">Cliente</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="p_grissyPersonal" value="0" aria-label="p_grissyPersonal" class="form-check-input form-check-primary form-check-glow" <label for=" p_grissyPersonal">Personal</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="p_grissyArea" value="0" aria-label="p_grissyArea" class="form-check-input form-check-primary form-check-glow">
                                                        <label for=" p_grissyArea">Area</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="p_grissyProductoEmp" value="0" aria-label="p_grissyProductoEmp" class="form-check-input form-check-primary form-check-glow">
                                                        <label for=" p_grissyProductoEmp">Producto Empresa</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="p_grissyProveedor" value="0" aria-label="p_grissyProveedor" class="form-check-input form-check-primary form-check-glow">
                                                        <label for=" p_grissyProveedor">Proveedor</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="row">
                                                <h5>GESTOR</h5>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="p_grissyVenta" value="0" class="form-check-input form-check-primary form-check-glow">
                                                        <label for="p_grissyVenta">Venta</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <h5>CONFIGURACIONES</h5>


                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="p_grissyConfiguraciones" value="0" class="form-check-input form-check-primary form-check-glow">
                                                        <label for="p_grissyConfiguraciones">Configuraciones</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" id="guardar" onclick="permisos.guardarCambios()">
                                            <em class="bx bx-x d-block d-sm-none"></em>
                                            <span class="d-none d-sm-block">Guardar Cambios</span>
                                        </button>
                                    </div>
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
<script type="text/javascript">
    $(document).ready(function() {
        
        permisos.obtenerListaPersonal();


    });
</script>

</html>