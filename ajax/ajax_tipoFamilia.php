<?php
    require ('./bd/conexion.php');
    $query = "SELECT idTipoFam, nombre FROM tipofamilia";
    $fam=$mysqli->query($query);

?>