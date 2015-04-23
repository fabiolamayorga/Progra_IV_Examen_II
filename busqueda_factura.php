<?php
require_once("conexion.php");

$mensaje = "";
$codigo_articulo = $_POST["codigo_articulo"];
$numero_factura = $_POST["numero_factura"];
$precio = "";
$codigo_categoria = "";
$descripcion = "";
$descuento = "";
$cantidad = "";
$nombre_empleado = "";
$disponible = "";
$total_acumulado = "";

//echo $codigo_articulo;

try{
	$query = mysql_query("SELECT fecha_factura, cantidad, descuento, total_detalle, codigo_persona FROM ventas where codigo_articulo='$codigo_articulo' and numero_factura='$numero_factura'",$conexion);
	echo $query;
	//$queryEmpleado = mysql_query("SELECT nombre FROM personal where codigo_empleado = '$codigo_empleado'", $conexion);
	//$queryFactura = mysql_query("SELECT SUM(total_detalle) AS 'Total_Acumulado' FROM ventas WHERE numero_factura = '$num_factura'", $conexion);
	//echo $cantidad;
	if (!$query){
		throw new Exception (mysql_error($query));
	}else{
		while($row = mysql_fetch_array($query)){
			$fecha_factura = $row['fecha_factura'];
			$cantidad = $row['cantidad'];
			$descuento = $row['descuento'];
			$total_detalle = $row['total_detalle'];
			
		}
	}


   echo json_encode(array(
            'numero_factura' => $numero_factura,
            'codigo_articulo' => $codigo_articulo,
            'fecha_factura' => $fecha_factura,
            'cantidad' => $cantidad,
            'descuento' => $descuento,
            'total_detalle' => $total_detalle

    ));
}catch(Exception $e){
	      throw new Exception($e->getMessage());
}

?>