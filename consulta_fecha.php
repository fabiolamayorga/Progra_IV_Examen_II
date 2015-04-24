<?php
$mensaje = "";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consulta de Factura por Fecha</title>
<script src="funciones_ajax.js" type=""></script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php include_once("header.html") ?>
	<section id="mantenimiento">
		<table align="center">
			<form action="formulario_insertar.php" method="post" onkeypress="return false" id="formulario">
				<tr>
					<td>Numero factura:</td>
					<td><input type="text" name="numero_factura" id="numero_factura"></td>
				</tr>
				<tr>
					<td>Fecha Factura</td>
					<td><input type="date" name="fecha_factura" id="fecha_factura"/></td>
				</tr>
				<tr align="center">
					<td colspan="2"><input type="button" value="Enviar" onclick="buscar_fecha()"/></td>
				</tr>
			</form>
		</table>
		<p style="text-align: center"><?php echo $mensaje ?></p>
		<table id="result" align="center" >
		</table>
	</section>
</body>
</html>