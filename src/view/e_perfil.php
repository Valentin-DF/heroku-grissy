<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grissy - Perfil</title>
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
                <div class="container-fluid px-4">
                    <div class="page-heading">
                        <div class="page-title mt-4">

                            <div class="row">
                                <div class="col-lg-4 col-xlg-3 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center m-t-30"> <img id="foto" alt="" src="../assets/img/ES_121355.gif" class="rounded-circle" width="150" height="150" />
                                                <h4 class="card-title m-t-10"><span id="nombreCompleto"></span></h4>
                                                <h6 class="card-subtitle"><span id="nombreCargo"></span></h6>
                                            </div>
                                        </div>
                                        <div>
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <small class="text-muted">Email address </small>
                                            <h6><span id="correos"></span></h6>
                                            <small class="text-muted p-t-30 db">Phone</small>
                                            <h6><span id="telefono"></span></h6>
                                            <small class="text-muted p-t-30 db">Codigo</small>
                                            <h6><span id="codigos"></span></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xlg-9 col-md-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal form-material mx-2">
                                                <div class="form-group">
                                                    <label class="col-md-12">Nombre</label>
                                                    <div class="col-md-12">
                                                        <input type="text" id="nombre" placeholder="nombre" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="apellidoPaterno">Apellido Paterno</label>
                                                            <input type="text" id="apellidoPaterno" class="form-control form-control-line" placeholder="Apellido Paterno">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="apellidoMaterno">Apellido Materno</label>
                                                            <input type="text" id="apellidoMaterno" class="form-control form-control-line" placeholder="ApellidoMaterno">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-email" class="col-md-12">Correo</label>
                                                    <div class="col-md-12">
                                                        <input type="email" id="correo" placeholder="correo" class="form-control form-control-line" name="example-email" id="example-email">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="contrasena">Contraseña</label>
                                                            <input type="password" id="contrasena" value="password" class="form-control form-control-line">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="contacto">Telefono</label>
                                                            <input type="number" id="contacto" placeholder="123 456 7890" onkeypress="return event.charCode>=48 && event.charCode<=57" onchange="perfil.validarTelefono();" class="form-control form-control-line">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Foto</label>
                                                    <input type="text" id="fotos" class="form-control form-control-line">
                                                </div>
                                                <!-- <input type="file" id="selectFile"> -->
                                                <div class="form-group">
                                                    <label class="col-sm-12">Direccion</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" id="direccion" placeholder="123 456 7890" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <hr style="color: #0056b2;" />
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <button type="button" class="btn btn-success text-white" onclick="perfil.actualizarPerfil();">Actulizar Perfil </button>
                                                    </div>
                                                </div>
                                            </form>
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
<script src="scripts/perfil.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        perfil.obtenerPorId();

    });
    // $('#selectFile').on('change', function(e) {
    //     var base64String='';
    //     var file = e.target.files[0];

    //     console.log(file)

    //     var reader = new FileReader();
    //     reader.onload = function() {
    //         base64String = reader.result.replace("data:", "")
    //             .replace(/^.+,/, "");
    //         imageBase64Stringsep = base64String;
    //         console.log()
    //     }
    //     console.log(reader.readAsDataURL(file));

    // });
</script>



</html>