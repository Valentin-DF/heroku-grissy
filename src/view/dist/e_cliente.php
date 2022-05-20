<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modals - SB Admin Pro</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.6/sp-2.0.1/sl-1.4.0/datatables.min.css" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link rel="stylesheet" href="assets/toastify/toastify.css">
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="nav-fixed">
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
                                        <div class="page-header-icon"><i data-feather="file"></i></div>
                                        Cliente
                                    </h1>
                                </div>
                                <div class="col-12 col-xl-auto mb-3">Optional page header content</div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-xl px-4 mt-4">
                    <!-- Custom page header alternative example-->
                    <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                        <div class="me-4 mb-3 mb-sm-0">
                            <h1 class="mb-0"> Registro de clientes</h1>
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
                                    <i class="fas fa-table me-1"></i>
                                    Lista General de clientes
                                </div>
                                <div class="border-0 shadow">
                                    <button class="btn btn-outline-success  btn-sm " data-bs-toggle="modal" type="button" onclick="cliente.en_guardar()" data-bs-target="#agregarCliente">
                                        <i class="fa-solid fa-plus"></i> Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table " id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Doc. Identidad</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Fecha Registro</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
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

    <!--AGREGAR AREA EN UN MODAL-->
    <div class="modal fade text-left" id="agregarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" data-bs-backdrop="stactic" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Cliente</h5>
                    <div class="row">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="esDocumento" id="dni" value="dni" onclick="cliente.oninputDni_Ruc()" checked>
                            <label class="form-check-label" for="dni"> DNI </label>

                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="esDocumento" id="ruc" value="ruc" onclick="cliente.oninputDni_Ruc()">
                            <label class="form-check-label" for="ruc"> RUC </label>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="text" id="codigo" class="form-control " placeholder="Codigo">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="docIdentidad">Doc Identidad*</label>
                                <input type="number" id="docIdentidad" class="form-control " placeholder="Doc Identidad" onchange="cliente.validarCantidades();" oninput="cliente.consultarDocIdentidad();">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label></label>
                                <button type="button" class="form-control" onclick="cliente.consultarDocIdentidad()">Buscar</button>
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
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="estadoSunat">Estado Sunat</label>
                                <input type="text" id="estadoSunat" class="form-control " placeholder="Estado Sunat" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="condicionSunat">Condicion Sunat</label>
                                <input type="text" id="condicionSunat" class="form-control " placeholder="Condicion Sunat" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="number" id="telefono" class="form-control " placeholder="Telefono" onchange="cliente.validarTelefono();">
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
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn btn-outline-danger" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Cancelar</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary" id="editar" onclick="cliente.editarCliente()">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Editar</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary" id="guardar" onclick="cliente.guardarCliente()">
                        <i class="bx bx-x d-block d-sm-none"></i>
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

    <script src="js/litepicker.js"></script>
    <script src="js/scripts.js"></script>

    <script src="assets/toastify/toastify.js"></script>
</body>

<script src="scripts/permisos.js"></script>
<script src="scripts/cliente.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        const storedToDos = localStorage.getItem("empleado");
        const obj = JSON.parse(storedToDos);

        console.log(obj);
        permisos.configurarAcceso(obj.codigo);
        // $("#usuario").val(obj.nombre);
        document.getElementById("usuario1U").innerHTML = obj.nombre + " " + obj.apellidoPaterno + " " + obj.apellidoMaterno;
        document.getElementById("usuario2U").innerHTML = obj.nombre + " " + obj.apellidoPaterno + " " + obj.apellidoMaterno;
        document.getElementById("correosU").innerHTML = obj.correo;

        cliente.obtenerListaCliente();
        document.getElementById("codigo").disabled = true;

    });
</script>

</html>