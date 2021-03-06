<?php
$mensaje = "";  
require_once("conexion.php");
include_once("ventas.php");

	if( (isset($_POST['numero_factura'], $_POST['codigo_articulo'] )) ){
		try{
			$ventas = new ventas;
			$numero_factura = $_POST['numero_factura'];
			$codigo_articulo = $_POST['codigo_articulo'];
			/*$cantidad = $_POST['cantidad'];
			$total_detalle = $_POST['total_detalle'];
			$codigo_empleado = $_POST['codigo_persona'];*/
			$ventas->eliminar($numero_factura,$codigo_articulo, $conexion);
			$mensaje = $ventas->mensaje;
		}catch (Exception $e){
			$mensaje = $e->GetMessage();
		}
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formulario Modificar</title>
<script src="funciones_ajax.js" type=""></script>

</head>

<body>
	<?php include_once("header.html") ?>
	<section id="mantenimiento">
		<h2>Eliminar Factura</h2>
		<p style="text-align:center">Ingrese el numero de factura y codigo de articulo para eliminar</p>
		<table align="center">
			<form action="formulario_eliminar.php" method="post" id="formulario">
				<tr>
					<td>Numero factura:</td>
					<td><input type="text" name="numero_factura" id="numero_factura" class="requerido"/></td>
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
					<td><input type="text" name="codigo_persona" id="codigo_empleado" class="requerido"/></td>
				</tr>
				<tr>
					<td>Nombre de la persona:</td>
					<td><input type="text" name="nombre_persona" id="nombre_persona" class="requerido"/></td>
				</tr>
				<tr>
					<td>Cantidad:</td>
					<td><input type="text" name="cantidad" id="cantidad" class="requerido"/></td>
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
					<td>Descuento:</td>
					<td><input type="text" name="descuento" id="descuento" readonly/></td>
				</tr>
				<tr>
					<td><input type="hidden" name="precio" id="precio"  /></td>
				</tr>
				<tr>
					<td><p><?php echo $mensaje; ?></p></td>
				</tr>
				<tr>
				  <td colspan="2" align="center">&nbsp;&nbsp;
				    <input type="button" value="Buscar" name="Buscar" id="Buscar" onclick="buscar_factura();" />
				    &nbsp;&nbsp;<input type="button" value="Eliminar" name="Eliminar" id="Eliminar" onclick="enviar_form();"/>
				    &nbsp;&nbsp;<input type="button" value="Cancelar" name="Cancelar" id="Cancelar" onclick="limpiar_pantalla();" /> 
				</tr>
			</form>
		</table>
	</section>
</body>
</html>