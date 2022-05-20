<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Proveedor</title>
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.6/sp-2.0.1/sl-1.4.0/datatables.min.css" />
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
                                    <div class="col-lg-4 col-xlg-3 col-md-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <center class="m-t-30"> <img id="foto" src="../assets/images/users/5.jpg" class="rounded-circle" width="150" height="130"/>
                                                    <h4 class="card-title m-t-10"><span id="nombreCompleto"></span></h4>
                                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>

                                                </center>
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
                                                    <div class="form-group">
                                                        <label class="col-md-12">Contraseña</label>
                                                        <div class="col-md-12">
                                                            <input type="password" id="contrasena" value="password" class="form-control form-control-line">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12">Telefono</label>
                                                        <div class="col-md-12">
                                                            <input type="text" id="contacto" placeholder="123 456 7890" class="form-control form-control-line">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12">Message</label>
                                                        <div class="col-md-12">
                                                            <textarea rows="5" class="form-control form-control-line"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-12">Direccion</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" id="direccion" placeholder="123 456 7890" class="form-control form-control-line">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-success text-white">Update Profile</button>
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
                <footer class="py-4 bg-light mt-auto">
                    <?php include "footer.html"; ?>
                </footer>
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

<script src="scripts/perfil.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        const storedToDos = localStorage.getItem("empleado");
        const obj = JSON.parse(storedToDos);
        perfil.obtenerPorId(obj.id);

    });
</script>


</html>