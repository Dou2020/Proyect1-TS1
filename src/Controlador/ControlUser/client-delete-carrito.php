<?php
    error_reporting(E_PARSE);
    session_start();
	include '../../Config/configDB.php';
	include '../../Modelo/consulSQL.php';
    $codigo=consultasSQL::clean_string($_POST['codigo']);
    unset($_SESSION['carro'][$codigo]);
    echo '<script> window.location="/Vista/viewUser/Vistacarrito.php"; </script>';