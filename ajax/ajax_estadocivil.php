<?php
    require ('./bd/conexion.php');
    $query = "SELECT idEstadoCivil, nombre FROM estadocivil";
    $estadocivilP=$mysqli->query($query);
    $estadocivilM=$mysqli->query($query);
    $estadocivilA=$mysqli->query($query);

?>