<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grissy - Personal</title>
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


        * {
            margin: 0;
            padding: 0;
        }

        .caja {
            display: flex;
            flex-flow: column wrap;
            justify-content: center;
            align-items: center;
            background: #333944;

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
                                        Personal
                                    </h1>
                                </div>
                                <div class="col-12 col-xl-auto mb-3">
                                    <a class="btn btn-sm btn-light text-primary" href="e_cliente.php">
                                        <em class="me-1" data-feather="arrow-left"></em>
                                        Cliente
                                    </a>
                                    <a class="btn btn-sm btn-light text-primary" href="e_proveedor.php">

                                        Proveedor

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
                            <button class="btn btn-outline-success  btn-sm " data-bs-toggle="modal" type="button" onclick="personal.en_guardar()" data-bs-target="#agregarPersonal">
                                <em class="fa-solid fa-plus me-1"></em> Agregar
                            </button>
                            <!-- <h1 class="mb-0"> Registro de personal</h1> -->
                        </div>
                        <!-- Date range picker example-->
                        <div class="input-group input-group-joined border-0 shadow" style="width: 16.5rem">
                            <input disabled class="form-control ps-0 pointer text-center" id="litepickerRangePlugin" placeholder="Select date range..." />
                        </div>
                    </div>

                    <div class="sbp-preview">
                        <div class="sbp-preview-content">
                            <div class="row" id="lst-personal">
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

    <!--AGREGAR PERSONAL EN UN MODAL-->
    <div class="modal fade text-left" id="agregarPersonal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row ">
                        <div class="me-4 mb-3 mb-sm-0">
                            Registro de personal
                        </div>
                        <div class=" shadow">
                            <span class="badge rounded-pill" id="estadoC"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="text" id="codigo" class="form-control " placeholder="Codigo" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="dni">Doc Identidad*</label>
                                <input type="number" id="dni" class="form-control " placeholder="Doc Identidad"  onkeypress="return event.charCode>=48 && event.charCode<=57" onchange="personal.validarCantidades();" oninput="personal.consultarDocIdentidad()">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label></label>
                                <button type="button" class="form-control" onclick="personal.consultarDocIdentidad()">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nombre">Nombre*</label>
                                <input type="text" id="nombre" class="form-control " placeholder="Nombre">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="apellidoPaterno">Apellido Paterno</label>
                                <input type="text" id="apellidoPaterno" class="form-control " placeholder="Apellido Paterno">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="apellidoMaterno">Apellido Materno</label>
                                <input type="text" id="apellidoMaterno" class="form-control " placeholder="ApellidoMaterno">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="contacto">Telefono</label>
                                <input type="number" id="contacto" class="form-control"  onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Telefono" onchange="personal.validarTelefono();">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="correo">Correo*</label>
                                <input type="email" id="correo" class="form-control " placeholder="Correo">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="noEdit1" for="contrasena">Contraseña*</label>
                                <input type="password" id="contrasena" class="form-control " placeholder="Contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" id="direccion" class="form-control " placeholder="Direccion">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="foto">URL Foto</label>
                                <input type="text" id="foto" class="form-control " placeholder="Foto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
 

                            <div class="form-group ">
                            <label for="idcargo">Cargo</label>
                                <select class="form-control form-selec" id="idcargo"">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="noEdit2" for="sueldo">Sueldo Base</label>
                                <input type="number" id="sueldo" class="form-control " placeholder="Sueldo" onkeypress="return (event.charCode>=48 && event.charCode<=57) || event.charCode==46">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn btn-outline-danger " data-bs-dismiss="modal">
                        <em class="bx bx-x d-block d-sm-none"></em>
                        <span class="d-none d-sm-block">Cancelar</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary" id="editar" onclick="personal.editarPersonal()">
                        <em class="bx bx-x d-block d-sm-none"></em>
                        <span class="d-none d-sm-block">Editar</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary" id="guardar" onclick="personal.guardarPersonal()">
                        <em class="bx bx-x d-block d-sm-none"></em>
                        <span class="d-none d-sm-block">Guardar</span>
                    </button>
                </div>
            </div>
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
<script src="scripts/personal.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        personal.obtenerListaPersonal();
        personal.obtenerListaCargo();

        document.getElementById("codigo").disabled = true;

        [...document.getElementsByClassName("title")].forEach(function(e) {

            e.innerHTML = e.innerHTML.replace(/(.{1,20})(.*)/g, "$1...");

        })


    });
</script>

</html>