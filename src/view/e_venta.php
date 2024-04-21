<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grissy - Venta</title>
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
                                        <div class="page-header-icon"><em class="fa-solid fa-cart-shopping"></em></div>
                                        Venta
                                    </h1>
                                </div>

                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-xl px-4 mt-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row ">
                                <div class="me-4 mb-3 mb-sm-0">
                                    <em class="fas fa-table me-1"></em>
                                    Lista General de Ventas
                                </div>
                                <div class="border-0 shadow">
                                    <button class="btn btn-outline-success  btn-sm " data-bs-toggle="modal" type="button" onclick="venta.en_guardar()" data-bs-target="#agregarVenta">
                                        <em class="fa-solid fa-plus me-1"></em> Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table summary="Lista Venta General" class="table " id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>Vendedor</th>
                                        <th>Total</th>
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

    <!-- MODAL VENTA -->

    <div class="modal fade text-left" id="agregarVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" data-bs-backdrop="stactic" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-header">

                    <div class=" col-9">
                        <h2 class="modal-title">Venta</h3>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control form-control-sm text-center " placeholder="Codigo" id="codigoVenta" aria-label="text" disabled readonly>
                    </div>

                </div>
                <div class="modal-body ">

                    <div class="row">


                        <div class="col-sm-1">
                            <div class="input-group ">
                                <div class="form-check form-check-solid">
                                    <input class="form-check-input" type="radio" name="esDocumento" id="dni" value="dni" checked>
                                    <label class="form-check-label" for="dni"> DNI </label>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="form-check form-check-solid">
                                    <input class="form-check-input" type="radio" name="esDocumento" id="ruc" value="ruc">
                                    <label class="form-check-label" for="ruc"> RUC </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-11">
                            <div class="input-group ">
                                <input type="number" class="form-control" placeholder="Documento de identidad del cliente" id="docIdentidad" aria-label="text" oninput="venta.consultaDocumento();" onchange="venta.validarCantidades();" onkeypress="return (event.charCode>=48 && event.charCode<=57)">
                                <button aria-label="visualizarCliente" data-bs-toggle="collapse" onclick="venta.consultaDocumento();" data-bs-target="#datoCliente" aria-expanded="false" class="btn btn-outline-primary btn-sm " type="button" id="vizualizarCliente"><span class="fa-fw select-all fas"></span></button>
                                <button aria-label="guardarCliente" class="btn btn-outline-success btn-sm" id="agregarCliente" type="button" onclick="venta.agregarCliente();"><span class="fa-fw select-all fas"></span></button>
                            </div>
                        </div>

                    </div>

                    <!--MODAL DE CLIENTE-->
                    <div class="collapse" id="datoCliente">
                        <div class="card card-body">
                            <div class="row">
                                <input type="hidden" id="idCliente" class="form-control">
                                <div class="col-sm-4">
                                    <div class="form-grou">
                                        <label for="codigo">Codigo</label>
                                        <input type="text" id="codigo" class="form-control" placeholder="Codigo" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="estadoSunat">Estado Sunat</label>
                                        <input type="text" id="estadoSunat" class="form-control" placeholder="Estado Sunat" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="condicionSunat">Condicion Sunat</label>
                                        <input type="text" id="condicionSunat" class="form-control" placeholder="Condicion Sunat" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" id="nombre" class="form-control" placeholder="Nombre" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="apellidoPaterno">Apellido Paterno</label>
                                        <input type="text" id="apellidoPaterno" class="form-control" placeholder="Apellido Paterno" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="apellidoMaterno">Apellido Materno</label>
                                        <input type="text" id="apellidoMaterno" class="form-control" placeholder="Apellido Materno" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="text" id="telefono" class="form-control" placeholder="Telefono" disabled >
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label for="direccion">Direccion</label>
                                        <input type="text" id="direccion" class="form-control" placeholder="Direccion" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-12">
                            <div class="input-group ">
                                <div class="input-group-text">
                                    <label class="form-check-label">Producto</label>
                                </div>
                                <input type="text" class="form-control" placeholder="Nombre del producto" id="nombrePro" aria-label="text" oninput="venta.obtenerPorNombre()">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;" id="tabla-producto">
                        <div class="col-sm-12">
                            <table  summary="Lista Producto"class="table table-responsive-sm mb-0" id="table1">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Talla</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="lst-producto">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">

                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="hidden" class="form-control" disabled id="idPro">
                                <input type="hidden" class="form-control" disabled id="precioPro">
                                <input type="hidden" class="form-control" disabled id="cantidadPro">
                                <input type="text" placeholder="Codigo del producto" class="form-control" disabled id="codigoPro" aria-label="text">
                                <input type="number" class="form-control" placeholder="Cantidad" id="cantidadEditable" aria-label="text" oninput="venta.validarCantidad()" onkeypress="return (event.charCode>=48 && event.charCode<=57)">
                                <button aria-label="guardarCliente" class="btn btn-outline-success btn-sm" onclick="venta.IngresarProductoVenta(1)" type="button" id="guardarProducto"><span class="fa-fw select-all fas"></span>
                                </button>
                                <button aria-label="limpiarCliente" class="btn btn-outline-danger btn-sm" onclick="venta.limpiarSeleccion()" type="button" id="limpiarSeleccion"><span class="fa-fw select-all fas"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 10px;">
                        <h5 class="text-center">Detalle Venta</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row" id="tabla-dettalleventa">
                                <div class="col-sm-12">
                                    <table summary="Lista Detalle Venta" class="table table-striped" id="table2">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Total</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody id="lst-detalle">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">SubTotal</span>
                                    </div>
                                    <input type="number" id="subTotal" class="form-control" pattern="(d{3})([.])(d{2})" disabled>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">IGV (18%)</span>
                                    </div>
                                    <input type="number" id="igv" class="form-control" pattern="(d{3})([.])(d{2})" disabled>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Total</span>
                                    </div>
                                    <input type="number" id="total" class="form-control" pattern="(d{3})([.])(d{2})" disabled>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn btn-outline-danger" data-bs-dismiss="modal">
                        <em class="bx bx-x d-block d-sm-none"></em>
                        <span class="d-none d-sm-block">Cancelar</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" id="editar" onclick="venta.editarVenta()">
                        <em class="bx bx-x d-block d-sm-none"></em>
                        <span class="d-none d-sm-block">Editar</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary" id="guardar" onclick="venta.guardarVenta()">
                        <em class="bx bx-x d-block d-sm-none"></em>
                        <span class="d-none d-sm-block">Guardar</span>
                    </button>
                </div>
                </form>
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
<script src="scripts/venta.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        venta.obtenerPorNombre();
        venta.obtenerListaVenta();

    });
</script>

</html>