<?php
$mensaje = "";  
require_once("conexion.php");
include_once("ventas.php");

	if( (isset($_POST['numero_factura'], $_POST['codigo_articulo'], $_POST['cantidad'], $_POST['descuento'], $_POST['total_detalle'], $_POST['codigo_empleado'] )) ){
		if( (trim($_POST['numero_factura']) == "") ||  (trim($_POST['codigo_articulo']) == "") || (trim($_POST['cantidad']) == "") || (trim($_POST['descuento']) == "") || (trim($_POST['total_detalle']) == "") || (trim($_POST['codigo_empleado']) == "")){
			$mensaje = "Los campos no pueden ir en blanco";
		}else{
			try{
				$numero_factura = $_POST["numero_factura"];
				$codigo_articulo = $_POST["codigo_articulo"];
				$cantidad = $_POST["cantidad"];
				$descuento = $_POST["descuento"];
				$total_detalle = $_POST["total_detalle"];
				$codigo_persona = $_POST["codigo_empleado"];

				$ventas = new ventas;
				$ventas->insertar($numero_factura, $codigo_articulo, $cantidad, $descuento, $total_detalle,$codigo_persona, $conexion);
				$mensaje = $ventas->mensaje;
			}catch(Exception $e){
				$mensaje = $e->GetMessage();
			}
		}
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formulario Insertar</title>
<script src="funciones_ajax.js" type=""></script>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
	<?php include_once("header.html") ?>
	<section id="mantenimiento">
		<h2>Ingresar una factura:</h2>
		<table align="center">
			<form action="formulario_insertar.php" method="post" onkeypress="return false" id="formulario">
				<tr>
					<td>Numero factura:</td>
					<td><input type="text" name="numero_factura" id="numero_factura" class="requerido"></td>
				</tr>
				<tr>
					<td>Codigo del articulo: </td>
					<td><input type="text" name="codigo_articulo" id="codigo_articulo" class="requerido"/></td>
				</tr>
				<tr>
					<td>Codigo de la categoria:</td>
					<td><input type="text" name="codigo_categoria" readonly id="codigo_categoria" class="requerido"/></td>
				</tr>
				<tr>
					<td>Nombre de la categoria: </td>
					<td><input type="text" name="nombre_categoria" readonly id="nombre_categoria" class="requerido"/></td>
				</tr>
				<tr>
					<td>Codigo de la persona:</td>
					<td><input type="text" name="codigo_empleado" id="codigo_empleado" class="requerido" /></td>
				</tr>
				<tr>
					<td>Nombre de la persona:</td>
					<td><input type="text" name="nombre_persona" id="nombre_persona" readonly class="requerido"/></td>
				</tr>
				<tr>
					<td>Cantidad:</td>
					<td><input type="text" name="cantidad" id="cantidad" onkeypress="buscar_descuento()" class="requerido"/></td>
				</tr>
				<tr>
					<td>Total detalle:</td>
					<td><input type="text" name="total_detalle" id="total_detalle" readonly class="requerido"/></td>
				</tr>
				<tr>
					<td>Total acumulado:</td>
					<td><input type="text" name="total_acumulado" id="total_acumulado" readonly class="requerido"/></td>
				</tr>
				<tr>
					<td><input type="hidden" name="precio" id="precio" class="requerido"/></td>
				</tr>
				<tr>
					<td>Descuento:</td>
					<td><input type="text" name="descuento" id="descuento" readonly onkeydown="calcular_descuento" class="requerido"/></td>
				</tr>
				<tr align="center">
					<td colspan="2"><input type="button" value="Enviar" onclick="enviar_form()" class="requerido"/></td>
				</tr>
			</form>
		</table>
		<p style="text-align: center"><?php echo $mensaje ?></p>
	</section>
</body>
</html>