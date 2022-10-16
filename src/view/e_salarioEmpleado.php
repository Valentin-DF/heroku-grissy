<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grissy - Salario</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.6/sp-2.0.1/sl-1.4.0/datatables.min.css" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/carga.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png" />
    <link rel="stylesheet" href="../assets/toastify/toastify.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
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
                                        Registro de Salario
                                    </h1>
                                </div>
                                <div class="col-12 col-xl-auto mb-3">
          
                                    <a class="btn btn-sm btn-light text-primary" href="e_caja.php">
                                        Caja
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
                        <div class="me-4 mb-3 mb-sm-0">
                            <h1 class="mb-0"></h1>
                        </div>
                        <!-- Date range picker example-->
                        <div class="input-group input-group-joined border-0 shadow" style="width: 16.5rem">
                            <input disabled class="form-control ps-0 pointer text-center" id="litepickerRangePlugin" placeholder="Select date range..." />
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row ">
                                <div class="me-4 mb-3 mb-sm-0">
                                    <div class="input-group">
                                        <input type="text" placeholder="Documento de identidad" class="form-control" disabled id="codigoPro" aria-label="text">

                                        <input type="number" class="form-control" placeholder="" id="docIdentidad" aria-label="text" onkeypress="return (event.charCode>=48 && event.charCode<=57)">
                                    </div>
                                </div>
                                <div class="border-0 shadow">
                                    <button class="btn btn-outline-success  btn-sm " type="button" onclick="salario.buscarPersonalPorDocumento();">
                                        <em class="fa-solid fa-magnifying-glass"></em>Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="card col-md-6">
                                    <div class="card-header">
                                        Datos del Personal
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" class="form-control col-8" placeholder="" disabled id="idPersonal" aria-label="text">

                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" placeholder="NOMBRES" class="form-control col-4" disabled id="SVnombre" aria-label="text">
                                                <input type="text" class="form-control col-8" placeholder="" disabled id="nombrePersonal" aria-label="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" placeholder="APELLIDOS" class="form-control col-sm-4" disabled id="SVapellidos" aria-label="text">
                                                <input type="text" class="form-control col-sm-6" placeholder="" disabled id="apellidosPersonal" aria-label="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" placeholder="DOC.IDENTIDAD" class="form-control col-sm-4" disabled id="SVdocumento" aria-label="text">
                                                <input type="text" class="form-control col-sm-6" placeholder="" disabled id="documentoPersonal" aria-label="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" placeholder="SUELDO BASE" class="form-control" disabled id="SVsueldo" aria-label="text">
                                                <input type="text" class="form-control" placeholder="" disabled id="sueldoPersonal" aria-label="text" pattern="(d{3})([.])(d{2})">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" placeholder="BONIFICACION EXTRA" class="form-control" disabled id="SVsueldo" aria-label="text">
                                                <input type="number" class="form-control" placeholder="" id="bonificacionPersonal" aria-label="text"  pattern="(d{3})([.])(d{2})" onchange="salario.operacionDeSueldo()">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" placeholder="DESCUENTOS" class="form-control" disabled id="SVsueldo" aria-label="text">
                                                <input type="number" class="form-control" placeholder="" id="descuentosPersonal" aria-label="text" pattern="(d{3})([.])(d{2})" onchange="salario.operacionDeSueldo()">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" placeholder="SUELDO" class="form-control" disabled id="SVsueldo" aria-label="text">
                                                <input type="number" class="form-control" placeholder="" id="sueldoTotalPersonal" disabled aria-label="text"  pattern="(d{3})([.])(d{2})">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">

                                        <button type="button" class="btn btn-outline-primary" id="guardar" onclick="salario.registrarSalario()">
                                            <em class="bx bx-x d-block d-sm-none"></em>
                                            <span class="d-none d-sm-block">Registrar</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card col-md-6">
                                    <div class="card-header">
                                        Personal Faltantes en Cancelar Este Mes
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <table summary="Lista Area" class="table " id="example" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Documento</th>
                                                        <th>Nombre</th>
                                                        <th>Fecha</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
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
<script src="scripts/salario_personal.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        salario.personalSinPagarEnElMes();
    });
</script>

</html>