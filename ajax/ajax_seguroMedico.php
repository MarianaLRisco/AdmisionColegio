<?php
    require ('./bd/conexion.php');
    $query = "SELECT idSeguroMedico, nombre FROM seguromedico";
    $seguroMedico=$mysqli->query($query);

?>