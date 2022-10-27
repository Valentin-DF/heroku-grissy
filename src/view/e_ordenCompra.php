<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Grissy - Orden de Compra</title>
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
                    <div class="page-header-icon"><em data-feather="package"></em></div>
                    Ordenes
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
                  Lista General de Ordenes de Compra
                </div>
                <div class="border-0 shadow">
                  <button class="btn btn-outline-success  btn-sm " data-bs-toggle="modal" type="button" onclick="ordenes.en_guardar(1)" data-bs-target="#agregarordenes">
                    <em class="fa-solid fa-plus me-1"></em> Agregar
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table summary="Lista Ordenes de Compra" class="table " id="example" style="width:100%">
                <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
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

  <!-- MODAL ordenes -->

  <div class="modal fade text-left" id="agregarordenes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" data-bs-backdrop="stactic" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
      <div class="modal-content">

        <div class="modal-header">

          <div class=" col-9">
            <h4 class="modal-title">ORDEN DE COMPRA</h4>
          </div>
          <div class="col-3">
            <input type="text" class="form-control form-control-sm text-center " placeholder="Codigo" id="codigoordenes" aria-label="text" disabled readonly>
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
            <div class="col-sm-4">
              <div class="input-group ">
                <input type="number" class="form-control" placeholder="Documento de identidad del Proveedor" id="docIdentidad" aria-label="text" oninput="ordenes.consultaDocumento();" onchange="ordenes.validarCantidades();" onkeypress="return (event.charCode>=48 && event.charCode<=57)">
                <button aria-label="visualizarCliente" data-bs-toggle="collapse" onclick="ordenes.consultaDocumento();" data-bs-target="#datoCliente" aria-expanded="false" class="btn btn-outline-primary btn-sm " type="button" id="vizualizarCliente"><span class="fa-fw select-all fas"></span></button>
                <button aria-label="guardarCliente" class="btn btn-outline-success btn-sm" id="agregarCliente" type="button" onclick="ordenes.agregarProveedor();"><span class="fa-fw select-all fas"></span></button>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="input-group">
                <input class="input-group-text " disabled type="text" value="Moneda">
                <select class="form-control form-select" id="idMoneda" placeholder="Moneda" onchange="ordenes.ocultarTipoCambio()">
                </select>
                <input class="input-group-text " disabled type="number" id="tipo_cambio">
              </div>
            </div>

          </div>

          <!--MODAL DE PROVEEDOR -->
          <div class="collapse" id="datoCliente">
            <div class="card card-body">
              <div class="row">
                <input type="hidden" id="idProveedor" class="form-control">
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
                    <input type="text" id="telefono" class="form-control" placeholder="Telefono" disabled>
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
                <div class="input-group-text"> <label class="form-check-label">Producto</label> </div>
                <input type="text" class="form-control" placeholder="Nombre del producto" id="nombrePro" aria-label="text" oninput="ordenes.obtenerPorNombre(1)">
                <button aria-label="guardarProducto" data-bs-toggle="collapse" onclick="ordenes.limpiarDataProducto();" data-bs-target="#agregarProducto" aria-expanded="false" class="btn btn-outline-success btn-sm " type="button" id="vizualizarDataProducto"><span class="fa-fw select-all fas"></span></button>
              </div>
            </div>
          </div>


          <div class="collapse" id="agregarProducto">
            <div class="card card-body">
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="codigo">Codigo*</label>
                    <input type="text" id="codigoProducto" class="form-control " placeholder="Codigo">
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="form-group">
                    <label for="nombre">Nombre*</label>
                    <input type="text" id="nombreProducto" class="form-control " placeholder="Nombre">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="idproducto">Producto</label>
                    <select class="form-control form-select" id="idproductoGeneral">
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="idarea">Area</label>
                    <select class="form-control form-select" id="idareaProducto">
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="idtipo">Tipo</label>
                    <select class="form-control form-select" id="idtipoProducto">
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="talla">Talla</label>
                    <input type="text" id="tallaProducto" class="form-control " placeholder="Talla" onkeypress="return (event.charCode>=48 && event.charCode<=57) || (event.charCode>=65 && event.charCode<=90)|| (event.charCode>=97 && event.charCode<=122)">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="precio">Precio*</label>
                    <input type="number" id="precioProducto" class="form-control " placeholder="Precio" onkeypress="return (event.charCode>=48 && event.charCode<=57) || event.charCode==46">
                  </div>
                </div>
                <div class="col-sm-4 ">
                  <button type="button" class="btn btn-outline-primary" id="guardarProducto" onclick="productoEmpresa.guardarProducto();">
                    <em class="bx bx-x d-block d-sm-none"></em>
                    <span class="d-none d-sm-block">Guardar</span>
                  </button>

                </div>
              </div>
            </div>

          </div>

          <div class="row" style="margin-top: 10px;" id="tabla-producto">
            <div class="col-sm-12">
              <table summary="Lista Producto" class="table table-responsive-sm mb-0" id="table1">
                <thead class="thead">
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody id="lst-producto">
                </tbody>
              </table>
            </div>
          </div>

          <div class="row" style="margin-top: 10px;">

            <div class="col-sm-12">
              <div class="input-group">
                <input type="hidden" class="form-control" disabled id="idPro">
                <!-- <input type="hidden" class="form-control" disabled id="precioPro"> -->
                <input type="hidden" class="form-control" disabled id="cantidadPro">
                <input type="text" placeholder="Codigo del producto" class="form-control" disabled id="codigoPro" aria-label="text">
                <input type="number" class="form-control" placeholder="Cantidad" id="cantidadEditable" aria-label="text" onkeypress="return (event.charCode>=48 && event.charCode<=57)">
                <input type="number" class="form-control" placeholder="Precio del Producto" id="precioPro" aria-label="text">

                <!-- onkeypress="return (event.charCode>=48 && event.charCode<=57)" -->
                <button aria-label="guardarCliente" class="btn btn-outline-success btn-sm" onclick="ordenes.IngresarProductoOrden(1)" type="button" id="guardarProducto"><span class="fa-fw select-all fas"></span>
                </button>
                <button aria-label="limpiarCliente" class="btn btn-outline-danger btn-sm" onclick="ordenes.limpiarSeleccion()" type="button" id="limpiarSeleccion"><span class="fa-fw select-all fas"></span>
                </button>
              </div>
            </div>
          </div>

          <div style="margin-top: 10px;">
            <h5 class="text-center">Detalle ordenes</h5>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="row" id="tabla-dettalleordenes">
                <div class="col-sm-12">
                  <table summary="Lista Detalle Ordenes" class="table table-striped" id="table2">
                    <thead>
                      <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio S/.</th>
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
          <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" id="editar" onclick="ordenes.editarOrdenes(1)">
            <em class="bx bx-x d-block d-sm-none"></em>
            <span class="d-none d-sm-block">Editar</span>
          </button>
          <button type="button" class="btn btn-outline-primary" id="guardar" onclick="ordenes.guardarOrdenes(1)">
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
<script src="./scripts/ordenes.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    ordenes.obtenerPorNombre(1);
    ordenes.obtenerListaOrdenesC(1);
    ordenes.obtenerListaMoneda();
  });
</script>

</html>