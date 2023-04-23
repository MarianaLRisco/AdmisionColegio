<?php
	require ('bd/conexion.php');
		
	$idProvincia = $_POST['idProvincia'];
	
	$query = "SELECT idDistrito, nombre FROM distrito WHERE idProvincia = '$idProvincia' ORDER BY nombre";
	$resultado=$mysqli->query($query);
	$html= "<option value='0'>Seleccionar distrito</option>";
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['idDistrito']."'>".$row['nombre']."</option>";
	}
	echo $html;
?>
