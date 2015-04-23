<?php
require_once("conexion.php");

$codigo_empleado= $_POST["codigo_empleado"];
$nombre_empleado = "";

try{
	$query = mysql_query("SELECT nombre FROM personal where codigo_empleado = '$codigo_empleado'", $conexion);

	if (!$query){
		throw new Exception (mysql_error($query));
	}else{
		while($row = mysql_fetch_array($query)){
			$nombre_empleado = $row['nombre'];
		}
	}

    echo json_encode(array(
   		'nombre' => $nombre_empleado
   	));
}catch(Exception $e){
	      throw new Exception($e->getMessage());
}

?>