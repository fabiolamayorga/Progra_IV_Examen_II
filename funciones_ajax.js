function buscar_descuento(){
	if (event.keyCode==13){
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

                if ( parseFloat(cantidad) > parseFloat(data.disponible) ){
                    alert("No hay suficientes prendas disponibles para facturar. El numero de prendas en inventario es: " + data.disponible);
                    document.getElementById("cantidad").value = "";
                } else{

                    descuento = (parseFloat(data.descuento)*parseFloat(data.precio))/100;
                    total_detalle = (parseFloat(data.precio)*cantidad) - descuento;

                    document.getElementById("total_detalle").value = total_detalle;
                    document.getElementById("total_acumulado").value = parseFloat(data.total_acumulado) + total_detalle;                    
                }
            }
        }

        var codigo_articulo= document.getElementById("codigo_articulo").value;
        var codigo_empleado= document.getElementById("codigo_empleado").value;
        var cantidad = document.getElementById("cantidad").value;
        var numero_factura = document.getElementById("numero_factura").value;


        xmlhttp.open("POST","busqueda.php",true);

		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    	xmlhttp.send("codigo_articulo=" + codigo_articulo + "&codigo_empleado="+ codigo_empleado + "&cantidad="+cantidad + "&numero_factura="+numero_factura);
	}

};

function buscar_factura(){
    document.getElementById("numero_factura").readOnly=true;    
    document.getElementById("codigo_articulo").readOnly=true;    

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
            document.getElementById("nombre_categoria").value = data.descripcion;
            document.getElementById("codigo_categoria").value = data.codigo_categoria;
            document.getElementById("descuento").value = data.descuento;
            document.getElementById("nombre_persona").value = data.nombre_empleado;
            document.getElementById("codigo_empleado").value = data.codigo_empleado;
            document.getElementById("cantidad").value = data.cantidad;
            document.getElementById("total_detalle").value = data.total_detalle;
            document.getElementById("total_acumulado").value = data.total_acumulado;
            document.getElementById("precio").value = data.precio;

        }
    }

    var numero_factura = document.getElementById("numero_factura").value;
    var codigo_articulo = document.getElementById("codigo_articulo").value;

    xmlhttp.open("GET","busqueda_factura.php?numero_factura=" + numero_factura + "&codigo_articulo="+ codigo_articulo ,true);

    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send();
};

function verificar_espacios(){
    var elementos = document.getElementsByClassName('requerido');
    for (var i=0; elementos.length>i; i++){
        console.log(elementos[i].value);
        if(elementos[i].value == ""){
            return false;
        }else return true;
    }
};

function enviar_form(){
    if (verificar_espacios() !== false ){
        document.getElementById("formulario").submit();

    }else{
        alert("No puede dejar espacios en blanco");
    }
};

function calcular_descuento(){
    if (event.keyCode==13){
        cantidad= parseFloat(document.getElementById("cantidad").value);
        descuento = parseFloat(document.getElementById("descuento").value);
        precio = parseFloat(document.getElementById("precio").value);
        total_acumulado = parseFloat(document.getElementById("total_acumulado").value);

        total_descuento = (parseFloat(descuento)*parseFloat(precio))/100;
        total_detalle = (parseFloat(precio)*cantidad) - descuento;

        document.getElementById("total_detalle").value = total_detalle;
        document.getElementById("total_acumulado").value = parseFloat(total_acumulado) + total_detalle;
    }
};

function buscar_empleado(){
    if (event.keyCode==13){
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
                document.getElementById("nombre_persona").value = data.nombre;
            }
        }

        var codigo_empleado = document.getElementById("codigo_empleado").value;

        xmlhttp.open("GET","busqueda_empleado.php?codigo_empleado=" + codigo_empleado,true);

        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send();
    }
};

function buscar_fecha(){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                console.log(xmlhttp.responseText);
                var data = JSON.parse(xmlhttp.responseText);
                var table = "<tr><th>Nombre</th><th>Codigo empleado</th><th>Descripcion</th></tr>";
                var itemObj;
                var item;
                console.log(data.factura);
                for (var i=0; data.factura.length>i; i++){
                    table += "<tr><td>"+ data.factura[i].nombre + "</td><td>"+ data.factura[i].codigo_empleado+"</td><td>"+ data.factura[i].descripcion +"</td></tr>";
                }
                console.log(table);
                document.getElementById("result").innerHTML = table;


            }
        }

        var numero_factura= document.getElementById("numero_factura").value;
        var fecha_factura = document.getElementById("fecha_factura").value;


        xmlhttp.open("POST","busqueda_fecha.php",true);

        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("fecha_factura=" + fecha_factura + "&numero_factura="+ numero_factura);
};

function limpiar_pantalla(){
    var elementos = document.getElementsByClassName('requerido');
    for (var i=0; elementos.length>i; i++){
        //console.log(elementos[i].value);
        elementos[i].value = "";
    }   
}


