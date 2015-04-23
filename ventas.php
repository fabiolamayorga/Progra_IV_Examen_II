<?php

class ventas{
public $numero_factura;
public $codigo_articulo;
public $cantidad;
public $descuento;
public $total_detalle;
public $codigo_persona;

	
	function insertar($numero_factura, $codigo_articulo, $cantidad, $descuento, $total_detalle, $codigo_persona, $conexion){
		$mensaje = "" ;
		try{
			$query = mysql_query("INSERT INTO ventas (numero_factura, codigo_articulo, cantidad, descuento, total_detalle, codigo_persona, fecha_factura) VALUES (".$numero_factura.", ".$codigo_articulo.", ".$cantidad.", ".$descuento.", ".$total_detalle.",".$codigo_persona.",NOW())", $conexion);
			if(!$query){
		  		throw new Exception(mysql_error()); 
			}else{
		  		$this->mensaje = "El registro se creó correctamente";
			}
			return $query;
		}catch (Exception $e){
	    	throw new Exception($e->getMessage());	 
		}
	}

	function modificar(){}

	function eliminar(){}
}

?>
