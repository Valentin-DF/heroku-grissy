<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grissy - Clientes</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.0/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.6/sp-2.0.1/sl-1.4.0/datatables.min.css" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/carga.css">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link rel="stylesheet" href="assets/toastify/toastify.css">

    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
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
                <main>
                    <header >
                        <div class="container-xl px-4 mt-5">
                            <!-- Custom page header alternative example-->
                            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                                <div class="me-4 mb-3 mb-sm-0">
                                    
                                </div>
                                <!-- Date range picker example-->
                                <div class="input-group input-group-joined border-0 shadow" style="width: 16.5rem">
                                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                                    <input disabled class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />
                                </div>
                            </div>
                    </header>

                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="row">
                            <div class="col-xl-4 mb-4">
                                <!-- Dashboard example card 2-->
                                <a class="card lift h-100" href="e_perfil.php">
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="me-3">
                                                <i class="feather-xl text-secondary mb-3" data-feather="user"></i>
                                                <h5>Perfil</h5>
                                                <div class="text-muted small">Configuracion de los datos del usuario.</div>
                                            </div>
                                            <img src="assets/img/illustrations/processing.svg" alt="..." style="width: 8rem" />
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 mb-4">
                                <!-- Dashboard example card 1-->
                                <a class="card lift h-100" href="e_venta.php">
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="me-3">
                                                <i class="feather-xl text-primary mb-3" data-feather="layout"></i>
                                                <h5>Ventas</h5>
                                                <div class="text-muted small">Ventana de procesos de venta</div>
                                            </div>
                                            <img src="assets/img/illustrations/browser-stats.svg" alt="..." style="width: 8rem" />
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4 mb-4">
                                <!-- Dashboard example card 3-->
                                <a class="card lift h-100" href="e_compra.php">
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="me-3">
                                                <i class="feather-xl text-green mb-3" data-feather="package"></i>
                                                <h5>Compras</h5>
                                                <div class="text-muted small">Ventana de procesos de compra</div>
                                            </div>
                                            <img src="assets/img/illustrations/windows.svg" alt="..." style="width: 8rem" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-8">
                                <!-- Tabbed dashboard card example-->
                                <div class="card mb-4">
                                    <div class="card-header border-bottom">
                                        <!-- Dashboard card navigation-->
                                        <ul class="nav nav-tabs card-header-tabs" id="dashboardNav" role="tablist">
                                            <li class="nav-item me-1"><a class="nav-link active" id="overview-pill" href="#overview" data-bs-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Overview</a></li>
                                            <li class="nav-item"><a class="nav-link" id="activities-pill" href="#activities" data-bs-toggle="tab" role="tab" aria-controls="activities" aria-selected="false">Activities</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="dashboardNavContent">
                                            <!-- Dashboard Tab Pane 1-->
                                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-pill">
                                                <div class="chart-area mb-4 mb-lg-0" style="height: 20rem"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                                            </div>
                                            <!-- Dashboard Tab Pane 2-->
                                            <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-pill">
                                                <table id="datatablesSimple">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Event</th>
                                                            <th>Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Event</th>
                                                            <th>Time</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <tr>
                                                            <td>01/13/20</td>
                                                            <td>
                                                                <i class="me-2 text-green" data-feather="zap"></i>
                                                                Server online
                                                            </td>
                                                            <td>1:21 AM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/13/20</td>
                                                            <td>
                                                                <i class="me-2 text-red" data-feather="zap-off"></i>
                                                                Server restarted
                                                            </td>
                                                            <td>1:00 AM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/12/20</td>
                                                            <td>
                                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                                New order placed! Order #
                                                                <a href="#!">1126550</a>
                                                            </td>
                                                            <td>5:45 AM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/12/20</td>
                                                            <td>
                                                                <i class="me-2 text-blue" data-feather="user"></i>
                                                                Valerie Luna submitted
                                                                <a href="#!">quarter four report</a>
                                                            </td>
                                                            <td>4:23 PM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/12/20</td>
                                                            <td>
                                                                <i class="me-2 text-yellow" data-feather="database"></i>
                                                                Database backup created
                                                            </td>
                                                            <td>3:51 AM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/12/20</td>
                                                            <td>
                                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                                New order placed! Order #
                                                                <a href="#!">1126549</a>
                                                            </td>
                                                            <td>1:22 AM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/11/20</td>
                                                            <td>
                                                                <i class="me-2 text-blue" data-feather="user-plus"></i>
                                                                New user created:
                                                                <a href="#!">Sam Malone</a>
                                                            </td>
                                                            <td>4:18 PM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/11/20</td>
                                                            <td>
                                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                                New order placed! Order #
                                                                <a href="#!">1126548</a>
                                                            </td>
                                                            <td>4:02 PM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/11/20</td>
                                                            <td>
                                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                                New order placed! Order #
                                                                <a href="#!">1126547</a>
                                                            </td>
                                                            <td>3:47 PM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/11/20</td>
                                                            <td>
                                                                <i class="me-2 text-green" data-feather="zap"></i>
                                                                Server online
                                                            </td>
                                                            <td>1:19 AM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/11/20</td>
                                                            <td>
                                                                <i class="me-2 text-red" data-feather="zap-off"></i>
                                                                Server restarted
                                                            </td>
                                                            <td>1:00 AM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/10/20</td>
                                                            <td>
                                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                                New order placed! Order #
                                                                <a href="#!">1126547</a>
                                                            </td>
                                                            <td>5:31 PM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/10/20</td>
                                                            <td>
                                                                <i class="me-2 text-purple" data-feather="shopping-cart"></i>
                                                                New order placed! Order #
                                                                <a href="#!">1126546</a>
                                                            </td>
                                                            <td>12:13 PM</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/10/20</td>
                                                            <td>
                                                                <i class="me-2 text-blue" data-feather="user"></i>
                                                                Diane Chambers submitted
                                                                <a href="#!">quarter four report</a>
                                                            </td>
                                                            <td>10:56 AM</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xxl-4">
                                <div class="row">
                                    <div class="col-xl-6 col-xxl-12">
                                        <!-- Team members / people dashboard card example-->
                                        <div class="card mb-4">
                                            <div class="card-header">Grupo De Trabajo</div>
                                            <div class="card-body">
                                                <!-- Item 1-->
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <div class="d-flex align-items-center flex-shrink-0 me-3">
                                                        <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-1.png" alt="" /></div>
                                                        <div class="d-flex flex-column fw-bold">
                                                            <a class="text-dark line-height-normal mb-1" href="#!">Sid Rooney</a>
                                                            <div class="small text-muted line-height-normal">Position</div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown no-caret">
                                                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>
                                                        <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople1">
                                                            <a class="dropdown-item" href="#!">Action</a>
                                                            <a class="dropdown-item" href="#!">Another action</a>
                                                            <a class="dropdown-item" href="#!">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Item 2-->
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <div class="d-flex align-items-center flex-shrink-0 me-3">
                                                        <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-2.png" alt="" /></div>
                                                        <div class="d-flex flex-column fw-bold">
                                                            <a class="text-dark line-height-normal mb-1" href="#!">Keelan Garza</a>
                                                            <div class="small text-muted line-height-normal">Position</div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Item 3-->
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <div class="d-flex align-items-center flex-shrink-0 me-3">
                                                        <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-3.png" alt="" /></div>
                                                        <div class="d-flex flex-column fw-bold">
                                                            <a class="text-dark line-height-normal mb-1" href="#!">Kaia Smyth</a>
                                                            <div class="small text-muted line-height-normal">Position</div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown no-caret">
                                                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople3" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>
                                                        <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople3">
                                                            <a class="dropdown-item" href="#!">Action</a>
                                                            <a class="dropdown-item" href="#!">Another action</a>
                                                            <a class="dropdown-item" href="#!">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Item 4-->
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <div class="d-flex align-items-center flex-shrink-0 me-3">
                                                        <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-4.png" alt="" /></div>
                                                        <div class="d-flex flex-column fw-bold">
                                                            <a class="text-dark line-height-normal mb-1" href="#!">Kerri Kearney</a>
                                                            <div class="small text-muted line-height-normal">Position</div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown no-caret">
                                                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople4" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>
                                                        <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople4">
                                                            <a class="dropdown-item" href="#!">Action</a>
                                                            <a class="dropdown-item" href="#!">Another action</a>
                                                            <a class="dropdown-item" href="#!">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Item 5-->
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <div class="d-flex align-items-center flex-shrink-0 me-3">
                                                        <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-5.png" alt="" /></div>
                                                        <div class="d-flex flex-column fw-bold">
                                                            <a class="text-dark line-height-normal mb-1" href="#!">Georgina Findlay</a>
                                                            <div class="small text-muted line-height-normal">Position</div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown no-caret">
                                                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople5" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>
                                                        <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople5">
                                                            <a class="dropdown-item" href="#!">Action</a>
                                                            <a class="dropdown-item" href="#!">Another action</a>
                                                            <a class="dropdown-item" href="#!">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Item 6-->
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center flex-shrink-0 me-3">
                                                        <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-6.png" alt="" /></div>
                                                        <div class="d-flex flex-column fw-bold">
                                                            <a class="text-dark line-height-normal mb-1" href="#!">Wilf Ingram</a>
                                                            <div class="small text-muted line-height-normal">Position</div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown no-caret">
                                                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople6" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>
                                                        <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople6">
                                                            <a class="dropdown-item" href="#!">Action</a>
                                                            <a class="dropdown-item" href="#!">Another action</a>
                                                            <a class="dropdown-item" href="#!">Something else here</a>
                                                        </div>
                                                    </div>
                                                </div>
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

    <script src="js/litepicker.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/configuracion_general.js"></script>


    <script src="assets/toastify/toastify.js"></script>
</body>

<script src="scripts/permisos.js"></script>
<script src="scripts/menu.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        document.getElementById("codigo").disabled = true;

    });
</script>

</html>