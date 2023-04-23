<?php
    require ('./bd/conexion.php');
    $query = "SELECT idTipoVivienda, nombre FROM tipodevivienda";
    $vivienda=$mysqli->query($query);

?>