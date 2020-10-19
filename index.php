<?php

session_start();
$_SESSION['empleados'] = array();

header("Location: registrar.php");

?>