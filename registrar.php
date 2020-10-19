<?php 

session_start();

$registrado = false;
$errores = "";

if(isset($_POST['registrar'])) 
{
  extract($_POST);

  if((!empty($primerNombre) && !empty($segundoNombre)) && 
  (!empty($primerApellido) && !empty($segundoApellido)) && 
  (!empty($cedula) && !empty($direccion)) && 
  (!empty($email) && (!empty($departamento))) &&
  (!empty($lugarDeTrabajo) && !empty($sueldo))) 
  {
    if(intval($cedula) <= 0)
      $errores .= '<li>Cedula invalida</li>';

    if(strlen($cedula) < 8)
      $errores .= "<li>La cedula no puede tener menos de 7 digitos</li>";

    if(intval($sueldo) <= 0)
      $errores .= '<li>El sueldo tiene que ser mayor que 0$</li>';

    if(empty($errores))
    {
      $_SESSION['empleados'][$cedula] = array(
        'primerNombre' => $primerNombre,
        'segundoNombre' => $segundoNombre,
        'primerApellido' => $primerApellido,
        'segundoApellido' => $segundoApellido,
        'cedula' => $cedula,
        'direccion' => $direccion,
        'email' => $email,
        'departamento' => $departamento,
        'lugarDeTrabajo' => $lugarDeTrabajo,
        'sueldo' => $sueldo
      );
      $registrado = true;

    }
  } else {
    $errores .= "<li>Los campos no pueden quedar vacios</li>";
  }
}

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
          <li class="nav-item active  ">
            <a class="nav-link" style="display: flex; justify-content: space-around;" href="#">
              <img src="icons/person_add-black-18dp.svg" alt="">
              <p>Registro de empleados</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" style="display: flex; justify-content: space-around;" href="lista.php">
              <img src="icons/list-black-18dp.svg" alt="" />
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
                
                <div class="card-header card-header-danger">
                  <h4 class="card-title">Registro de empleado</h4>
                </div>

                <div class="card-body">
                  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="primerNombre">(*) Primer Nombre</label>
                        <input type="text" class="form-control" name="primerNombre" id="primerNombre">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="segundoNombre">(*) Segundo Nombre</label>
                        <input type="text" class="form-control" name="segundoNombre" id="segundoNombre">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="primerApellido">(*) Primer Apellido</label>
                        <input type="text" class="form-control" name="primerApellido" id="primerApellido">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="segundoApellido">(*) Segundo Apellido</label>
                        <input type="text" class="form-control" name="segundoApellido" id="segundoApellido">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="direccion">(*) Direccion</label>
                      <input type="text" class="form-control" name="direccion" id="direccion" placeholder="1234 Main St">
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="email">(*) Correo Electronico</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@hotmail.com">
                      </div>  
                      <div class="form-group col-md-6">
                        <label for="cedula">(*) Cedula(minimo 7 digitos)</label>
                        <input type="number" class="form-control" name="cedula" id="cedula" placeholder="(V)XX.XXX.XXX">                        
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="departamento">(*) Departamento</label>
                          <select class="form-control selectpicker" data-style="btn btn-link" name="departamento" id="departamento">
                            <option value="" disabled selected>Selecciona un departamento</option>
                            <option>IT</option>
                            <option>Contabilidad</option>
                            <option>Compras</option>
                            <option>Contraloria</option>
                            <option>Recursos Humanos</option>
                            <option>Marketing</option>
                          </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="lugarDeTrabajo">(*) Lugar de Trabajo</label>
                        <select class="form-control selectpicker" name="lugarDeTrabajo" data-style="btn btn-link" id="lugarDeTrabajo" disabled>
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
                                <span class="fileinput-new">Seleccionar Foto(opcional)</span>
                                <input type="file" name="..." disabled/>
                            </span>
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="sueldo">(*) Sueldo($)</label>
                        <input type="number" class="form-control" step="0.1" min="0.1" name="sueldo" id="sueldo" placeholder="0.0">                        
                      </div>
                    </div>


                    <p>Los campos marcados con * son obligatorios</p>

                    <button type="submit" name="registrar" class="btn btn-primary">Registrar</button>

                    <?php if($errores): ?>
                      <h2>Se encontraron los siguientes errores: </h2>
                      <ul><?php echo $errores; ?></ul>
                    <?php elseif($registrado): ?>
                      <h2>Empleado registrado con exito!!!</h2>
                    <?php endif; ?>
                  </form>
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

  
  <script>
    (() => {
      const quitarTodasLasOptions = (select) => {
        let j = select.options.length - 1;

        for(j; j >= 0 ; j--) 
        {
          select.remove(j);
        }
      }

      const agregarOptionsAlSelect = (selectLugares, objetoLugares, departamentoSeleccionado) => {
        for(let dep in objetoLugares) 
        {
          if(dep == departamentoSeleccionado) 
          {
            objetoLugares[dep].forEach(lugar => {
              let option = document.createElement("option");
              option.text = lugar;
              option.value = lugar;
              selectLugares.appendChild(option);
            });
          }
        }
      }

      const cambiarLugaresSegunDepartamento = (e) => {
        let lugarDeTrabajo = document.getElementById("lugarDeTrabajo");
        let lugaresDeTrabajo = {
          "IT": [
            "Taller de electronica",
            "Direccion De IT"
          ],
          "Contabilidad": [
            "Direccion de Contabilidad",
            "Oficina 1",
            "Oficina 2"
          ],
          "Compras": [
            "Direccion de Compras",
            "Oficina 1",
            "Oficina 2",
            "Oficina 3"
          ],
          "Contraloria": [
            "Direccion de Contraloria",
            "Oficina 1",
            "Oficina 2",
            "Oficina 3"
          ],
          "Recursos Humanos": [
            "Direccion de RH",
          ],
          "Marketing": [
            "Direccion de Marketing",
          ]
        };

        quitarTodasLasOptions(lugarDeTrabajo);

        lugarDeTrabajo.removeAttribute("disabled");
        let departamento = e.target.value;
        
        agregarOptionsAlSelect(lugarDeTrabajo, lugaresDeTrabajo, departamento);
      }

      let departamento = document.getElementById("departamento");

      departamento.addEventListener("change", cambiarLugaresSegunDepartamento);
    })();
  </script>
   <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
   <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
   <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script> 
</body>

</html>
