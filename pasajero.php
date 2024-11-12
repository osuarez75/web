<?php
 include("./config/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administracion Modulo Pasajeros</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
	background: rgb(133, 127, 133)
 }
 </style>
</head>
<body onLoad="cargar()">
<div class="container-contact100">
    <div class="wrap-contact100">
        <div class="row">
        	<div class="col-12" align="center">
        		<div class="sidebar-brand-text"><h1>ADMINISTRAR PASAJEROS</h1></div>
            <div>
        </div>
        <div class="row" style="background-color:#ffffff">
        	<div class="col-6" align="center">
                <div id="pasajeros_l"></div>
            </div>
            <div class="col-5">
                <br>
                <table width='' border='0' cellspacing='0' cellpadding='1'>
                    <tr bgcolor='#3733FF' align='center'>
                    <td><b><font color='#ffffff'>PASAJERO</font></b></td>
                    </tr>
                    <tr bgcolor='#3733FF'>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='4'>
                        <tr bgcolor='#ffffff'>
                        <td>
                            <b>Numero Documento: </b> <br>
                            <input type='text' id='Numero_Documento_P' value='' placeholder='Ingrese Numero Documento'><br>
							<b>Tipo Documento: </b> <br>
                            <input type='text' id='Tipo_Documento_P' value='' placeholder='Ingrese Tipo de Documento'><br>
							<b>Nombres: </b> <br>
                            <input type='text' id='Nombres_P' value='' placeholder='Ingrese Nombres'><br>
							<b>Apellidos: </b> <br>
                            <input type='text' id='Apellidos_P' value='' placeholder='Ingrese Apellidos'><br>
							<b>Fecha: </b> <br>
							<input type='date' id='Fecha_P' value='' placeholder='Ingrese Fecha'><br>
							<b>Origen: </b> <br>
                            <input type='text' id='Origen_P' value='' placeholder='Ingrese Origen'><br>
							<b>Destino: </b> <br>
                            <input type='text' id='Destino_P' value='' placeholder='Ingrese Destino'><br>
							<b>Valor pasaje: </b> <br>
                            <input type='text' id='Valor_Pasaje_P' value='' placeholder='Ingrese Valor del pasaje'><br>
							<b>IdVehiculo: </b> <br>
                            <input type='text' id='idVehiculos_P' value='' placeholder='Ingrese IdVehiculo'><br>
							
                        </td>
                        </tr>
                        <tr bgcolor='#ffffff'>
                        <td>
                            <button class="alert-info" type='submit' name='AGREGAR_P' onClick='Agregar_P()'>Agregar Nuevo</button>
                            
                        </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <div id="pasajeros_2"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type='text/javascript'>
function cargar(){
	var parametros = {
			"TIPO":"LISTAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#pasajeros_l').html(a);
			}
		});
}
function Administrar_P(numero_documento){
		var parametros = {
			"NUMERO_DOCUMENTO": numero_documento,
			"TIPO":"CARGAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#pasajeros_2').html(a);
			}
		});
		}
function Agregar_P(){
		var parametros = {
			"NUMERO_DOCUMENTO_P": $("#Numero_Documento_P").val(),
			"TIPO_DOCUMENTO_P": $("#Tipo_Documento_P").val(),
			"NOMBRES_P": $("#Nombres_P").val(),
			"APELLIDOS_P": $("#Apellidos_P").val(),
			"FECHA_P": $("#Fecha_P").val(),
            "ORIGEN_P": $("#Origen_P").val(),
			"DESTINO_P": $("#Destino_P").val(),
			"VALOR_PASAJE_P": $("#Valor_Pasaje_P").val(),
			"IDVEHICULOS_P": $("#idVehiculos_P").val(),

			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Numero_Documento_P").val('');
				$("#Tipo_Documento_P").val('');
				$("#Nombres_P").val('');
				$("#Apellidos_P").val('');
				$("#Fecha_P").val('');
				$("#Origen_P").val('');
                $("#Destino_P").val('');
                $("#Valor_Pasaje_P").val('');
				$("#idVehiculos_P").val('');
			}
		});
		}
function Modificar_P(numero_documento){
		var parametros = {
			"NUMERO_DOCUMENTO": numero_documento,
			"NUMERO_DOCUMENTO_P": $("#NUMERO_DOCUMENTO_P").val(),
			"TIPO_DOCUMENTO_P": $("#TIPO_DOCUMENTO_P").val(),
			"NOMBRES_P": $("#NOMBRES_P").val(),
            "APELLIDOS_P": $("#APELLIDOS_P").val(),
			"FECHA_P": $("#FECHA_P").val(),
			"ORIGEN_P": $("#ORIGEN_P").val(),
			"DESTINO_P": $("#DESTINO_P").val(),
			"VALOR_PASAJE_P": $("#VALOR_PASAJE_P").val(),
			"IDVEHICULOS_P": $("#IDVEHICULOS_P").val(),
			
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#pasajeros_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_P(numero_documento){
		var parametros = {
			"NUMERO_DOCUMENTO": numero_documento,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#pasajeros_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>