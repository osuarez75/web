<?php
 include("./config/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administracion Modulo vehiculos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/autobus.ico">
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
        		<div class="sidebar-brand-text"><h1>Administrar Modulo Vehiculos</h1></div>
            <div>
        </div>
        <div class="row" style="background-color:#ffffff">
        	<div class="col-6" align="center">
                <div id="vehiculos_l"></div>
            </div>
            <div class="col-5">
                <br>
                <table width='' border='0' cellspacing='0' cellpadding='1'>
                    <tr bgcolor='#02fcfc' align='center'>
                    <td><b><font color='#ffffff'>VEHICULO</font></b></td>
                    </tr>
                    <tr bgcolor='#02fcfc'>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='4'>
                        <tr bgcolor='#ffffff'>
                        <td>
                            <b>Numero Vehiculo: </b> <br>
                            <input type='text' id='Numero_Vehiculo' value='' placeholder='Ingrese Numero de Vehiculo'><br>
                            <b>Tipo Vehiculo: </b> <br>
                            <input type='text' id='Tipo_Vehiculo' value='' placeholder='Ingrese Tipo Vehiculo'><br>
							<b>Placa: </b> <br>
                            <input type='text' id='Placa_Vehiculo' value='' placeholder='Ingrese Placa'><br>
							<b>Modelo: </b> <br>
                            <input type='text' id='Modelo_Vehiculo' value='' placeholder='Ingrese Modelo'><br>
							<b>idConductor: </b> <br>
							<input type='text' id='idConductores_Vehiculo' value='' placeholder='Ingrese idConductor'><br>
							
                        </tr>
                        <tr bgcolor='#ffffff'>
                        <td>
                            <button class="alert-info" type='submit' name='AGREGAR_V' onClick='Agregar_V()'>Agregar Nuevo</button>
                            
                        </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <div id="vehiculos_2"></div>
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
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#vehiculos_l').html(a);
			}
		});
}
function Administrar_V(Numero_Vehiculo){
		var parametros = {
			"NUMERO_VEHICULO": Numero_Vehiculo,
			"TIPO":"CARGAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#vehiculos_2').html(a);
			}
		});
		}
function Agregar_V(){
		var parametros = {
			"NUMERO_VEHICULO_V": $("#Numero_Vehiculo").val(),
			"TIPO_VEHICULO_V": $("#Tipo_Vehiculo").val(),
			"PLACA_VEHICULO_V": $("#Placa_Vehiculo").val(),
			"MODELO_VEHICULO_V": $("#Modelo_Vehiculo").val(),
			"IDCONDUCTORES_VEHICULO_V": $("#idConductores_Vehiculo").val(),
			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Numero_Vehiculo").val('');
				$("#Tipo_Vehiculo").val('');
				$("#Placa_Vehiculo").val('');
				$("#Modelo_Vehiculo").val('');
				$("#idCoonductores_Vehiculo").val('');
				
				
			}
		});
		}
function Modificar_V(Numero_Vehiculo){
		var parametros = {
			"NUMERO_VEHICULO": Numero_Vehiculo,
			"NUMERO_VEHICULO_V": $("#NUMERO_VEHICULO_V").val(),
			"TIPO_VEHICULO_V": $("#TIPO_VEHICULO_V").val(),
            "PLACA_VEHICULO_V": $("#PLACA_VEHICULO_V").val(),
			"MODELO_VEHICULO_V": $("#MODELO_VEHICULO_V").val(),
			"IDCONDUCTORES_VEHICULO_V": $("#IDCONDUCTORES_VEHICULO_V").val(),
			
			
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#vehiculos_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_V(Numero_Vehiculo){
		var parametros = {
			"NUMERO_VEHICULO": Numero_Vehiculo,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#vehiculos_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>