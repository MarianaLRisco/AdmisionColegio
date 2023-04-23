<?php
	require ('bd/conexion.php');
	
	$idNivel = $_POST['idNivel'];
	
	$queryG = "SELECT g.idGrado as idGrado, g.nombre as nombre, n.nombre as Nivel
    FROM conforma as c
    JOIN Grado as g
    ON c.idGrado=g.idGrado
    JOIN Nivel as n
    ON c.idNivel= n.idNivel
    WHERE n.idNivel = '$idNivel';";
	$gradoP = $mysqli->query($queryG);
	
	$html= "<option value='0'>Seleccionar grado</option>";
	
	while($rowG = $gradoP->fetch_assoc())
	{
		$html.= "<option value='".$rowG['idGrado']."'>".$rowG['nombre']."</option>";
	}
	
	echo $html;
?>
