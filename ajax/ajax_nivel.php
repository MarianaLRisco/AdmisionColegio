<?php
    require ('./bd/conexion.php');
    $query = "SELECT idNivel, nombre FROM nivel ORDER BY nombre";
    $nivelesP=$mysqli->query($query);
?>