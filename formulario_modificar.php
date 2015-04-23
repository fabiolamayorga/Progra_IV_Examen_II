<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formulario Modificar</title>
<script src="funciones_ajax.js" type=""></script>

</head>

<body>
	<p>Ingrese el numero de factura y codigo de articulo para modificar</p>
	<table align="center">
		<form action="" method="post">
			<tr>
				<td>Numero factura:</td>
				<td><input type="text" name="numero_factura" id="numero_factura"/></td>
			</tr>
			<tr>
				<td>Codigo del articulo: </td>
				<td><input type="text" name="codigo_articulo" id="codigo_articulo"/></td>
			</tr>
			<tr>
				<td>Codigo de la categoria:</td>
				<td><input type="text" name="codigo_categoria"/></td>
			</tr>
			<tr>
				<td>Nombre de la categoria: </td>
				<td><input type="text" name="nombre_categoria"/></td>
			</tr>
			<tr>
				<td>Codigo de la persona:</td>
				<td><input type="text" name="codigo_persona"/></td>
			</tr>
			<tr>
				<td>Nombre de la persona:</td>
				<td><input type="text" name="nombre_persona" /></td>
			</tr>
			<tr>
				<td>Cantidad:</td>
				<td><input type="text" name="cantidad" /></td>
			</tr>
			<tr>
				<td>Total detalle:</td>
				<td><input type="text" name="total_detalle"/></td>
			</tr>
			<tr>
				<td>Total acumulado:</td>
				<td><input type="text" name="total_acumulado"/></td>
			</tr>
			<tr>
				<td>Descuento:</td>
				<td><input type="text" name="descuento" /></td>
			</tr>
			<tr>
			  <td colspan="2" align="center">&nbsp;&nbsp;
			    <input type="button" value="Buscar" name="Buscar" id="Buscar" onclick="buscar_factura();" />
			    &nbsp;&nbsp;<input type="submit" value="Actualizar" name="Actualizar" id="Actualizar" onclick="asignar_variable_escondida();"/>
			    &nbsp;&nbsp;<input type="button" value="Cancelar" name="Cancelar" id="Cancelar" onclick="limpiar_pantalla();" /> 
				<input type="hidden" name="Code" id="Code" value="<?php echo $jornada;?>"/>
				<input type="hidden" name="Code2" id="Code2" value="<?php echo $equipo_local;?>"/>
				<input type="hidden" name="Code3" id="Code3" value="<?php echo $equipo_visita;?>"/></td>
			</tr>
		</form>
	</table>
</body>
</html>