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
                                        Area
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
                        <div class="me-4 mb-3 mb-sm-0">
                            <h1 class="mb-0"> Relacion de Ingresos y Egresos</h1>
                        </div>
                        <!-- Date range picker example-->
                        <!-- <div class="input-group input-group-joined border-0 shadow" style="width: 16.5rem">
                            <input disabled class="form-control ps-0 pointer text-center" id="litepickerRangePlugin" placeholder="Select date range..." />
                        </div> -->
                    </div>


                    <!-- <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row ">
                                <div class="me-4 mb-3 mb-sm-0">
                                    <em class="fas fa-table me-1"></em>
                                    Lista General de Areas de la Empresa
                                </div>
                                <div class="border-0 shadow">
                                    <button class="btn btn-outline-success  btn-sm " data-bs-toggle="modal" type="button" onclick="area.en_guardar()" data-bs-target="#agregarArea">
                                        <em class="fa-solid fa-plus me-1"></em> Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table summary="Lista Area"  class="table " id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div> -->

                </div>
            </main>
            <footer class="footer-admin mt-auto footer-light">
                <?php include "eP_footer.html"; ?>
            </footer>
        </div>
    </div>

    <!--AGREGAR AREA EN UN MODAL-->
    <div class="modal fade " id="agregarArea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row ">
                        <div class="me-4 mb-3 mb-sm-0">
                            Registro de area
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
                                <label for="codigo">Codigo*</label>
                                <input type="text" id="codigo" class="form-control " placeholder="Codigo">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="nombre">Nombre*</label>
                                <input type="text" id="nombre" class="form-control " placeholder="Nombre">
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control" id="descripcion" rows="3" placeholder="Descripcion"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center ">
                        <button type="button" class="btn btn btn-outline-danger" data-bs-dismiss="modal" id="cancelar" onclick="area.limpiar()">
                            <em class="bx bx-x d-block d-sm-none"></em>
                            <span class="d-none d-sm-block">Cancelar</span>
                        </button>
                        <button type="button" class="btn btn-outline-primary" id="editar" onclick="area.editarArea()">
                            <em class="bx bx-x d-block d-sm-none"></em>
                            <span class="d-none d-sm-block">Editar</span>
                        </button>
                        <button type="button" class="btn btn-outline-primary" id="guardar" onclick="area.guardarArea()">
                            <em class="bx bx-x d-block d-sm-none"></em>
                            <span class="d-none d-sm-block">Guardar</span>
                        </button>
                    </div>
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
<script src="scripts/area.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        area.obtenerListaArea();
        document.getElementById("codigo").disabled = true;

    });
</script>

</html>