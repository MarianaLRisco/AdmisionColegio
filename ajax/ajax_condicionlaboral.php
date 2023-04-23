<?php
    require ('./bd/conexion.php');
    $query = "SELECT idConLaboral, nombre FROM condicionlaboral ORDER BY nombre";
    $condicionlaboralP=$mysqli->query($query);
    $condicionlaboralM=$mysqli->query($query);
?>