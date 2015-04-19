<?php

	$servidor = "localhost";
	$usuario = "root";
	$clave = "1234";
	$basedatos = "Examen_II";
	$conexion = mysql_connect($servidor, $usuario,$clave);
	if (!$conexion)
	{
		die('No se pudo conectar');
	}
	mysql_select_db($basedatos);
?>

