<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formulario Insertar</title>
<script src="funciones_ajax.js" type=""></script>
</head>

<body>
	<table align="center">
		<form action="" method="post" autocomplete="off" >
			<tr>
				<td>Numero factura:</td>
				<td><input type="text" name="numero_factura" ></td>
			</tr>
			<tr>
				<td>Codigo del articulo: </td>
				<td><input type="text" name="codigo_articulo" id="codigo_articulo"  onkeypress="buscar_descuento()"/></td>
			</tr>
			<tr>
				<td>Codigo de la categoria:</td>
				<td><input type="text" name="codigo_categoria" disabled id="codigo_categoria"/></td>
			</tr>
			<tr>
				<td>Nombre de la categoria: </td>
				<td><input type="text" name="nombre_categoria" disabled id="nombre_categoria"/></td>
			</tr>
			<tr>
				<td>Codigo de la persona:</td>
				<td><input type="text" name="codigo_empleado" id="codigo_empleado" onkeypress="buscar_persona()"/></td>
			</tr>
			<tr>
				<td>Nombre de la persona:</td>
				<td><input type="text" name="nombre_persona" id="nombre_persona" disabled/></td>
			</tr>
			<tr>
				<td>Cantidad:</td>
				<td><input type="text" name="cantidad" onkeypress="calcular_descuento"/></td>
			</tr>
			<tr>
				<td>Total detalle:</td>
				<td><input type="text" name="total_detalle" disabled/></td>
			</tr>
			<tr>
				<td>Total acumulado:</td>
				<td><input type="text" name="total_acumulado" disabled/></td>
			</tr>
			<tr>
				<td><input type="hidden" name="precio" id="precio"/></td>
			</tr>
			<tr>
				<td>Descuento:</td>
				<td><input type="text" name="descuento" id="descuento" disabled onkeypress="calcular_descuento"/></td>
			</tr>
			<tr align="center">
				<td><input type="button" value="Enviar"/></td>
			</tr>
		</form>
	</table>
</body>
</html>