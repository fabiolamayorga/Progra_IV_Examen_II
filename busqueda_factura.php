<?php
require_once("conexion.php");

$mensaje = "";
$codigo_articulo = $_POST["codigo_articulo"];
$codigo_empleado= $_POST["codigo_empleado"];
$num_factura = $_POST["numero_factura"];
$precio = "";
$codigo_categoria = "";
$descripcion = "";
$descuento = "";
$cantidad = $_POST["cantidad"];
$nombre_empleado = "";
$disponible = "";
$total_acumulado = "";

try{
	$query = mysql_query("SELECT descripcion, precio, descuento, codigo_categoria, disponible FROM inventario where codigo_articulo='$codigo_articulo'",$conexion);
	$queryEmpleado = mysql_query("SELECT nombre FROM personal where codigo_empleado = '$codigo_empleado'", $conexion);
	$queryFactura = mysql_query("SELECT SUM(total_detalle) AS 'Total_Acumulado' FROM ventas WHERE numero_factura = '$num_factura'", $conexion);
	//echo $cantidad;
	if (!$query){
		throw new Exception (mysql_error($query));
	}else{
		while($row = mysql_fetch_array($query)){
			if( intval($cantidad) > intval($row['disponible']) ){
				$mensaje = "No hay suficientes cantidades en la reserva";
				echo "No hay suficientes cantidades en la reserva";
			}else{
				$descripcion = $row['descripcion'];
				$codigo_categoria = $row['codigo_categoria'];
				$precio = $row['precio'];
				$descuento = $row['descuento'];
				$disponible = $row['disponible'];
			}
		}
	}

	if (!$queryEmpleado){
		throw new Exception (mysql_error($queryEmpleado));
	}else{
		while($row = mysql_fetch_array($queryEmpleado)){
			$nombre_empleado = $row['nombre'];
		}
	}

	if (!$queryFactura){
		throw new Exception (mysql_error($queryFactura));
	}else{
		while($row = mysql_fetch_array($queryFactura)){
			$total_acumulado = $row['Total_Acumulado'];
			//echo $total_acumulado;
		}
	}

   echo json_encode(array(
            'descripcion' => $descripcion,
            'codigo_categoria' => $codigo_categoria,
            'descuento' => $descuento,
            'precio' => $precio,
            'nombre_empleado' => $nombre_empleado,
            'disponible' => $disponible,
            'total_acumulado' => $total_acumulado 

    ));
}catch(Exception $e){
	      throw new Exception($e->getMessage());
}

?>