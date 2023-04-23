<?php
    require ('./bd/conexion.php');
    $query = "SELECT idTipoIE, nombre FROM tipodeie";
    $ie=$mysqli->query($query);

?>