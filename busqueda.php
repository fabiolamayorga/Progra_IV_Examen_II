<?php
require_once("conexion.php");

$codigo_articulo = $_POST["codigo_articulo"];
$precio = "";
$codigo_categoria = "";
$descripcion = "";
$descuento = "";
$cantidad = "";

try{
	$query = mysql_query("SELECT descripcion, precio, descuento, codigo_categoria FROM inventario where codigo_articulo='$codigo_articulo'",$conexion);

	if (!$query){
		throw new Exception (mysql_error($query));
	}else{
		while($row = mysql_fetch_array($query)){
			$descripcion = $row['descripcion'];
			$codigo_categoria = $row['codigo_categoria'];
			$precio = $row['precio'];
			$descuento = $row['descuento'];

		}
	}

   echo json_encode(array(
            'descripcion' => $descripcion,
            'codigo_categoria' => $codigo_categoria,
            'descuento' => $descuento

    ));




}catch(Exception $e){
	      throw new Exception($e->getMessage());
}

?>