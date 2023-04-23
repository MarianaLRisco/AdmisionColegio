<?php
	require ('bd/conexion.php');
	
	$idDepartamento = $_POST['idDepartamento'];
	
	$queryM = "SELECT idProvincia, nombre FROM provincia WHERE idDepartamento = '$idDepartamento' ORDER BY nombre";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar provincia</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idProvincia']."'>".$rowM['nombre']."</option>";
	}
	
	echo $html;
?>
