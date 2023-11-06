<?php
require_once('module_estudiante.php');
validate_login();
$ClsEst = new estudiantes();
$codigoPago = $_POST['pago'];

$ClsPag = new pago();
$pagos = $ClsPag->get( $codigoPago );
while ( $pago = $pagos->fetch_object() ){
  $pag_id = $pago->pag_id; 
  $pag_tipo = $pago->pag_tipo; 
  $tp_pago = $pago->tp_pago;  
  $tp_cantidad = $pago->tp_cantidad;
  $est_nombre = $pago->est_nombre;
  $est_apellido = $pago->est_apellido;

}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://kit.fontawesome.com/f38b76288b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            COLEGIO
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Inicio</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./dashboard.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Gestion</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./pagos.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Registrar Pagos </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./notas.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Visualizacion de Notas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./tareas.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Entrega de Tareas</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

            </ul>
          </div>


          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3"><?= $_SESSION['usu_nombre'] ?> - Perfil</p>
                    </a>

                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">Mis Tareas</p>
                    </a>
                    <a href="../logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Cerrar Sesion</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Realizar Pago</h5>
                        <h6 class="text-muted fw-semibold mb-4 text-underline">Detalles del Pago</h6>


                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alumno </label>
                            <input type="text" class="form-control disabled" id="alumnoNombre" name="alumnoNombre" value="<?=$est_nombre . ' ' . $est_apellido?>">
                            <input type="text" class="form-control disabled" id="codigoPago" name="codigoPago" value="<?=$pag_id?>">

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tipo Pago </label>
                            <input type="text" class="form-control disabled" id="tipoPago" name="tipoPago" value="<?=$tp_pago?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad a Pagar</label>
                            <input type="text" class="form-control disabled" id="cantidadPago" name="cantidadPago" value="<?=$tp_cantidad?>">
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Numero de Boleta</label>
                            <input type="text" class="form-control" id="boleta" name="boleta" value="">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Total</label>
                            <input type="text" class="form-control" id="cantidad" name="cantidad" value="">
                        </div>
                       
                        <button onclick="save()" class="btn btn-primary">Realizar Pago</button>
                    </div>
                </div>
          </div>
          
        </div>

      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="../CORE/JS/pago.js"></script>

</body>

</html>