<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Producto Empresa</title>
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
                    <div class="container-fluid px-4">
                        <div class="page-heading">
                            <div class="page-title mt-4">
                                <div class="row">
                                    <div class="col-12 col-md-6 order-md-1 order-last">

                                        <div class="row g-2">
                                            <div class="col-auto">
                                                <h2>PRODUCTOS DE LA EMPRESA </h2>
                                            </div>
                                            <div class="col-4"> <button class="btn btn-outline-success " data-bs-toggle="modal" type="button" onclick="producto.en_guardar()" data-bs-target="#agregarProducto"><i class="fa-solid fa-plus"></i> Agregar</button>
                                            </div>
                                        </div>

                                        <p class="text-subtitle text-muted">Registro de productos</p>
                                    </div>
                                    <div class="col-12 col-md-6 order-md-2 order-first">
                                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                            <ol class="breadcrumb">
                                            <li class="breadcrumb-item " aria-current="page">Administracion</li>
                                                <li class="breadcrumb-item " aria-current="page">Registros</li>
                                                <li class="breadcrumb-item active" aria-current="page"><a href="producto_empresa.php">Producto Empresa</a></li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Lista General de productos
                                </div>
                                <div class="card-body">
                                    <table class="table " id="example" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>precio</th>
                                                <th>Talla</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php include "footer.html"; ?>
                </footer>
            </div>
        </div>
    </div>

      <!--AGREGAR PRODUCTO EN UN MODAL-->
      <div class="modal fade text-left" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Producto</h5>
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="talla">Talla</label>
                                <input type="text" id="talla" class="form-control " placeholder="Talla">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cantidad">Cantidad*</label>
                                <input type="text" id="cantidad" class="form-control " placeholder="Cantidad">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="precio">Precio*</label>
                                <input type="text" id="precio" class="form-control " placeholder="Precio">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="idarea">Area</label>
                                <select class="form-control form-select" id="idarea">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn btn-outline-danger " data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Cancelar</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary" id="editar"
                        onclick="producto.editarProducto();">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Editar</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary"  id="guardar"
                        onclick="producto.guardarProducto();">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Guardar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="assets/js/datatables-simple-demo.js"></script>

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

<script src="scripts/producto.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        producto.obtenerListaProductos();
        producto.obtenerListaArea();

    });
</script>


</html>