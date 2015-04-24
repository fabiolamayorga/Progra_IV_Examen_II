<?php
require_once("conexion.php");

$mensaje = "";
$codigo_articulo = "";
$numero_factura = $_POST["numero_factura"];
$fecha_factura = $_POST["fecha_factura"];
$nombre ="";
$codigo_empleado = "";
$descripcion = "";

try{
	$consulta= "SELECT
			 personal.nombre,
			 personal.codigo_empleado,
			 inventario.descripcion,
			 ventas.codigo_persona,
			 ventas.codigo_articulo
			 FROM personal, inventario, ventas where ventas.numero_factura = '$numero_factura' 
			 and ventas.fecha_factura = '$fecha_factura' 
			 and ventas.codigo_persona = personal.codigo_empleado 
			 and ventas.codigo_articulo = inventario.codigo_articulo
			 ";

	$query = mysql_query($consulta,$conexion) or die(mysql_error());

	if (!$query){
		throw new Exception (mysql_error($query));
	}else{
		$array = array();
		while($row = mysql_fetch_array($query)){
			/*$nombre = $row['nombre'];
			$codigo_empleado = $row['codigo_empleado'];
			$descripcion = $row['descripcion'];*/
			$array[] = $row;
		}
	}

	/*echo json_encode(array(
            'nombre' => $nombre,
            'codigo_empleado' => $codigo_empleado,
            'descripcion' => $descripcion,

		));*/

	echo '{"factura":'.json_encode($array).'}';

}catch(Exception $e){
	      throw new Exception($e->getMessage());
}




?>