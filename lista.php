<?php 

session_start();

$empleados = $_SESSION['empleados'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
    />
    <!-- Material Kit CSS -->
    <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  </head>

  <body>
    <div class="wrapper">
      <div class="sidebar" data-color="purple" data-background-color="white">
        <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
        <div class="logo">
          <a href="index.php" class="simple-text logo-mini">
            EMS
          </a>
          <a href="index.php" class="simple-text logo-normal">
            Employee Management
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item">
              <a
                class="nav-link"
                style="display: flex; justify-content: space-around"
                href="registrar.php"
              >
                <img src="icons/person_add-black-18dp.svg" alt="" />
                <p>Registro de empleados</p>
              </a>
            </li>

            <li class="nav-item active">
              <a
                class="nav-link"
                style="display: flex; justify-content: space-around"
                href="lista.php"
              >
                <img src="icons/list-white-18dp.svg" alt="" />
                <p>Lista de empleados</p>
              </a>
            </li>

            <!-- your sidebar here -->
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav
          class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top"
        >
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="javascript:;">EMS</a>
            </div>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              aria-controls="navigation-index"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
              <ul class="navbar-nav">
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-danger">
                    <div class="card-icon">
                      <img src="icons/list-white-18dp.svg" alt="icono" />
                    </div>
                    <h4 class="card-title">Lista de empleados</h4>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Nombre</th>
                          <th>Departamento</th>
                          <th>Cedula</th>
                          <th class="text-right">Sueldo</th>
                          <th class="text-right">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php if(count($empleados) > 0): ?>
                        <?php foreach($empleados as $empleado): ?>
                          <tr>
                            <td class="text-center">1</td>
                            <td>
                              <?php echo $empleado['primerNombre'] . " " . $empleado['primerApellido']; ?>
                            </td>
                            <td>
                              <?php echo $empleado['departamento']; ?>
                            </td>
                            <td>
                              <?php echo $empleado['cedula']; ?>
                            </td>
                            <td class="text-right">
                              &euro; <?php echo $empleado['sueldo']; ?>
                            </td>
                            <td class="td-actions text-right">
                              <a href="empleado.php?cedula=<?php echo $empleado['cedula'];?>">
                                <button
                                  type="button"
                                  rel="tooltip"
                                  class="btn btn-info"
                                >
                                  Ver
                                  <i class="material-icons">person</i>
                                </button>
                              </a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <h2>Todavia no has registrado ningun empleado</h2>
                      <?php endif;?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="container-fluid">
            <nav class="float-left">
              <ul>
                <li>Luis Barboza</li>
              </ul>
            </nav>
            <!-- your footer here -->
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>
