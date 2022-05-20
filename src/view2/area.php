<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Proveedor</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.6/sp-2.0.1/sl-1.4.0/datatables.min.css" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/carga.css">
</head>

<body>
    <div id="contenedor_carga">
        <div id="carga">
        </div>
    </div>
    <div class="contenedor">
        <?php include "nav.html"; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include "sidevar.html"; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="page-heading">
                            <div class="page-title mt-4">
                                <div class="row">
                                    <div class="col-12 col-md-6 order-md-1 order-last">

                                        <div class="row g-2">
                                            <div class="col-auto">
                                                <h2>AREAS </h2>
                                            </div>
                                            <div class="col-4">
                                                <!-- <button class="btn btn-outline-success " data-bs-toggle="modal" type="button" onclick="area.en_guardar()" data-bs-target="#agregarArea"><i class="fa-solid fa-plus"></i> Agregar</button> -->

                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalXl">Extra Large</button>
                                                <div class="modal fade" id="exampleModalXl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Extra Large Modal</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>This is an example of an extra large modal!</p>
                                                            </div>
                                                            <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <p class="text-subtitle text-muted">Registro de areas de la empresa</p>
                                    </div>
                                    <div class="col-12 col-md-6 order-md-2 order-first">
                                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item " aria-current="page">Administracion</li>
                                                <li class="breadcrumb-item " aria-current="page">Registro</li>
                                                <li class="breadcrumb-item active" aria-current="page"><a href="personal.php">Area</a></li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="row gallery " id="lst-area">

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
    <div class="modal fade" id="agregarArea" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Static Backdrop Modal</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    When using the
                    <code>data-bs-backdrop='static'</code>
                    attribute with a modal window, the user cannot dismiss the modal by clicking outside of the modal pane.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Understood</button>
                </div>
            </div>
        </div>
    </div>
    <!--AGREGAR AREA EN UN MODAL-->
    <!-- <div class="modal fade " id="agregarArea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Area</h5>
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
                    <div class="modal-footer ">
                        <button type="button" class="btn btn btn-outline-danger" data-bs-dismiss="modal" id="cancelar" onclick="area.limpiar()">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Cancelar</span>
                        </button>
                        <button type="button" class="btn btn-outline-primary" id="editar" onclick="area.editarArea()">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Editar</span>
                        </button>
                        <button type="button" class="btn btn-outline-primary" id="guardar" onclick="area.guardarArea()">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Guardar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <script src="assetss/js/configuracion_general.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="assets/js/datatables-simple-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>


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


<script src="js/scripts.js"></script>

<script src="scripts/area.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        area.obtenerListaArea();
        document.getElementById("codigo").disabled = true;

        $("#guardar").click(function() {
            $("#agregarArea").modal('hide');

        });


    });
</script>


</html>