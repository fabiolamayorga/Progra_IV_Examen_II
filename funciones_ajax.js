function buscar_descuento(){
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
                document.getElementById("nombre_categoria").value = data.descripcion;
                document.getElementById("codigo_categoria").value = data.codigo_categoria;
                document.getElementById("descuento").value = data.descuento;

            }
        }

        var codigo_articulo= document.getElementById("codigo_articulo").value;

        xmlhttp.open("POST","busqueda.php",true);

		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    	xmlhttp.send("codigo_articulo=" + codigo_articulo);
	}

};

function buscar_persona(){
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
	
}