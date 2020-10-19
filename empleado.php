<?php 

session_start();

$empleados = $_SESSION['empleados'];

$cedula = $_GET['cedula'];
$encontrado = false;

foreach($empleados as $emp) {
  if($cedula == $emp['cedula']){
    $GLOBALS['empleado'] = $emp;
    $encontrado = true;
  }
}

if(!$encontrado)
  header("Location: index.php");

?>

<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>

<body>
  <div class="wrapper ">

    <!-- BARRA LATERAL -->
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
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


      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">EMS</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
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



        <!-- CONTENIDO -->
        <div class="container-fluid">
          <!-- your content here -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="primerNombre">Primer Nombre</label>
                        <input 
                          type="text" 
                          class="form-control" 
                          name="primerNombre" 
                          id="primerNombre" 
                          value="<?php echo $empleado['primerNombre']; ?>" 
                          disabled
                        >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="segundoNombre">Segundo Nombre</label>
                        <input 
                          type="text" 
                          class="form-control" 
                          id="segundoNombre" 
                          value="<?php echo $empleado['segundoNombre'];?>" 
                          disabled
                        >
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="primerApellido">Primer Apellido</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        name="primerApellido" 
                        value="<?php echo $empleado['primerApellido'];?>"
                        id="primerApellido" 
                        disabled 
                        >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="segundoApellido">Segundo Apellido</label>
                        <input 
                          type="text" 
                          class="form-control" 
                          value="<?php echo $empleado['segundoApellido'];?>"
                          id="segundoApellido"
                          disabled 
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="direccion">Direccion</label>
                      <input 
                        type="text" 
                        class="form-control" 
                        id="direccion" 
                        value="<?php echo $empleado['direccion'];?>"
                        disabled
                      >
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input 
                          type="email" 
                          class="form-control" 
                          id="email" 
                          value="<?php echo $empleado['email'];?>"
                          disabled
                        >
                      </div>  
                      <div class="form-group col-md-6">
                        <label for="cedula">Cedula</label>
                        <input 
                          type="number" 
                          class="form-control" 
                          id="cedula" 
                          value="<?php echo $empleado['cedula'];?>"
                          disabled
                        >                        
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="departamento">Departamento</label>
                          <select class="form-control selectpicker" data-style="btn btn-link" id="departamento" disabled>
                            <option selected>
                              <?php echo $empleado['departamento'];?>                              
                            </option>
                          </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="lugarDeTrabajo">Lugar de Trabajo</label>
                        <select class="form-control selectpicker" data-style="btn btn-link" id="lugarDeTrabajo" disabled>
                          <option selected>
                                <?php echo $empleado['lugarDeTrabajo'];?>                              
                          </option>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="fileinput fileinput-new text-center col-md-6" data-provides="fileinput">
                        <div class="fileinput-new thumbnail img-raised">
                            <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" rel="nofollow" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                        <div>
                            <span class="btn btn-raised btn-round btn-default btn-file">
                                <span class="fileinput-new">Seleccionar Foto</span>
                                <input type="file" name="..." disabled/>
                            </span>
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="sueldo">Sueldo($)</label>
                        <input 
                          type="number" 
                          class="form-control" 
                          id="sueldo" 
                          disabled
                          value="<?php echo $empleado['sueldo'];?>" 
                        >                        
                      </div>
                    </div>


                    <a href="lista.php">
                      <button class="btn btn-primary ">
                        <img src="icons/list-white-18dp.svg" alt="icono lista">
                          Volver a la lista
                      </button>
                    </a>
                </div>
              </div>
            </div>
        </div>
      </div>

      <!-- FOOTER -->
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  Luis Barboza
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </footer>
    </div>
  </div>
   <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
   <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
   <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script> 
</body>

</html>