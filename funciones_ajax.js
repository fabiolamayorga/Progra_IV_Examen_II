function buscar_descuento(){
	//if (event.keyCode==13){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                console.log(xmlhttp.responseText);
            	var data = JSON.parse(xmlhttp.responseText);
                console.log(data);
                var total_detalle = 0;
                var cantidad = 0;
            	//console.log(data);
                document.getElementById("nombre_categoria").value = data.descripcion;
                document.getElementById("codigo_categoria").value = data.codigo_categoria;
                document.getElementById("descuento").value = data.descuento;
                document.getElementById("nombre_persona").value = data.nombre_empleado;
                cantidad=document.getElementById("cantidad").value;
                descuento = (parseFloat(data.descuento)*parseFloat(data.precio))/100;
                console.log(descuento);
                total_detalle = (parseFloat(data.precio)*cantidad) - descuento;
                console.log(total_detalle);

                document.getElementById("total_detalle").value = total_detalle;
                document.getElementById("total_acumulado").value = parseFloat(data.total_acumulado) + total_detalle;

            }
        }

        var codigo_articulo= document.getElementById("codigo_articulo").value;
        var codigo_empleado= document.getElementById("codigo_empleado").value;
        var cantidad = document.getElementById("cantidad").value;
        var numero_factura = document.getElementById("numero_factura").value;


        xmlhttp.open("POST","busqueda.php",true);

		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    	xmlhttp.send("codigo_articulo=" + codigo_articulo + "&codigo_empleado="+ codigo_empleado + "&cantidad="+cantidad + "&numero_factura="+numero_factura);
	//}

};

function buscar_factura(){
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            console.log(xmlhttp.responseText);
            var data = JSON.parse(xmlhttp.responseText);
            console.log(data);
        }
    }

    var numero_factura = document.getElementById("numero_factura").value;
    var codigo_articulo = document.getElementById("codigo_articulo").value;

    //console.log( numero_factura);

    xmlhttp.open("POST","busqueda_factura.php",true);

    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("numero_factura=" + numero_factura + "&codigo_articulo="+ codigo_articulo);
}

function verificar_espacios(){
    alert();

}

/*function buscar_persona(){
	if (event.keyCode==13){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            	var data = JSON.parse(xmlhttp.responseText);
            	console.log(data);
                document.getElementById("nombre_persona").value = data.nombre;
            }
        }

        var codigo_empleado= document.getElementById("codigo_empleado").value;

        xmlhttp.open("POST","busqueda_empleado.php",true);

		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    	xmlhttp.send("codigo_empleado=" + codigo_empleado);
	}	
};

function calcular_descuento(){
	
}*/