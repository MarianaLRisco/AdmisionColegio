<?php
    require ('./bd/conexion.php');
    $query = "SELECT idTipoResponsable, nombre FROM tipoderesponsable";
    $responsables=$mysqli->query($query);

?>