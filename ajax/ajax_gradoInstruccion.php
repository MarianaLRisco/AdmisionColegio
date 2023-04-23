<?php
    require ('./bd/conexion.php');
    $query = "SELECT idGradoIns, nombre FROM gradodeinstruccion";
    $instruccionP=$mysqli->query($query);
    $instruccionM=$mysqli->query($query);
    $instruccionA=$mysqli->query($query);
?>