<?php
require_once("conexion.php");

$mensaje = "";
$codigo_articulo = $_GET["codigo_articulo"];
$numero_factura = $_GET["numero_factura"];
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
	$queryFactura = mysql_query("SELECT SUM(total_detalle) AS 'Total_Acumulado' FROM ventas WHERE numero_factura = '$numero_factura'", $conexion);
	$consulta = "SELECT
			  ventas.fecha_factura,
			  ventas.cantidad,
			  ventas.total_detalle,
			  inventario.descripcion,
			  inventario.codigo_articulo,
			  inventario.disponible,
			  inventario.precio,
			  inventario.descuento,
			  inventario.codigo_categoria,
			  personal.nombre,
			  personal.codigo_empleado
			  FROM ventas, inventario, personal
			  where ventas.codigo_articulo = '$codigo_articulo' and ventas.numero_factura = '$numero_factura' and inventario.codigo_articulo = ventas.codigo_articulo and ventas.codigo_persona = personal.codigo_empleado  
			  ";

	$query = mysql_query($consulta,$conexion) or die(mysql_error());


	if (!$query){
		throw new Exception (mysql_error($query));
	}else{
		while($row = mysql_fetch_array($query)){
			$descripcion = $row['descripcion'];
			$codigo_categoria = $row['codigo_categoria'];
			$precio = $row['precio'];
			$descuento = $row['descuento'];
			$disponible = $row['disponible'];
			$nombre_empleado = $row['nombre'];
			$codigo_empleado = $row['codigo_empleado'];
			$cantidad = $row['cantidad'];
			$total_detalle = $row['total_detalle'];
		}
	}


	if (!$queryFactura){
		throw new Exception (mysql_error($queryFactura));
	}else{
		while($row = mysql_fetch_array($queryFactura)){
			$total_acumulado = $row['Total_Acumulado'];
		}
	}


   echo json_encode(array(
            'descripcion' => $descripcion,
            'codigo_categoria' => $codigo_categoria,
            'descuento' => $descuento,
            'precio' => $precio,
            'nombre_empleado' => $nombre_empleado,
            'disponible' => $disponible,
            'total_acumulado' => $total_acumulado,
            'total_detalle' => $total_detalle,
            'codigo_empleado' => $codigo_empleado,
            'cantidad' => $cantidad

    ));
}catch(Exception $e){
	      throw new Exception($e->getMessage());
}

?>