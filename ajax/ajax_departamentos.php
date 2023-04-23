<?php
    require ('./bd/conexion.php');
    $query = "SELECT idDepartamento, nombre FROM departamento ORDER BY nombre";
    $resultado=$mysqli->query($query);

?>