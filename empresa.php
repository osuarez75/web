<?php
 include("./config/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Administracion Modulo Empresas</title>
	<link rel="icon" href="img/conductor.ico">

	<!--<link rel="icon" href="img/3.ico">--->

	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/prue.css">
	

	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/main.js"></script>

	
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
        		<div class="sidebar-brand-text"><h1>Administrar Modulo Empresas</h1></div>
            <div>
        </div>
        <div class="row" style="background-color:#ffffff">
        	<div class="col-6" align="center">
                <div id="empresas_l"></div>
            </div>
            <div class="col-5">
                <br>
                <table width='' border='0' cellspacing='0' cellpadding='1'>
                    <tr bgcolor='#56070C' align='center'>
                    <td><b><font color='#ffffff'>EMPRESAS</font></b></td>
                    </tr>
                    <tr bgcolor='#56070C'>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='4'>
                        <tr bgcolor='#ffffff'>
                        <td>
                            <b>Numero Nit: </b> <br>
                            <input type='text' id='Nit_Empresa' value='' placeholder='Ingrese Nit'><br>
                            <b>Nombre: </b> <br>
                            <input type='text' id='Nombre_Empresa' value='' placeholder='Ingrese El Nombre'><br>
							<b>Direccion: </b> <br>
                            <input type='text' id='Direccion_Empresa' value='' placeholder='Ingrese La Direccion'><br>
							<b>Telefono: </b> <br>
                            <input type='text' id='Telefono_Empresa' value='' placeholder='Ingrese El Telefono'><br>
							<b>Email: </b> <br>
							<input type='text' id='Email_Empresa' value='' placeholder='Ingrese El Email'><br>
							<b>Pagina Web: </b> <br>
							<input type='text' id='Pagina_Web_Empresa' value='' placeholder='Ingrese La Pagina Web'><br>
							<b>idVehiculos: </b> <br>
							<input type='text' id='idVehiculos_Empresa' value='' placeholder='Ingrese idVehiculos'><br>
                        </tr>
                        <tr bgcolor='#ffffff'>
                        <td>
                            <button class="alert-info" type='submit' name='AGREGAR_E' onClick='Agregar_E()'>Agregar Nuevo</button>
                            
                        </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <div id="empresas_2"></div>
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
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#empresas_l').html(a);
			}
		});
}
function Administrar_E(Nit){
		var parametros = {
			"NIT": Nit,
			"TIPO":"CARGAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#empresas_2').html(a);
			}
		});
		}
function Agregar_E(){
		var parametros = {
			"NIT_E": $("#Nit_Empresa").val(),
			"NOMBRE_E": $("#Nombre_Empresa").val(),
			"DIRECCION_E": $("#Direccion_Empresa").val(),
			"TELEFONO_E": $("#Telefono_Empresa").val(),
			"EMAIL_E": $("#Email_Empresa").val(),
			"PAGINA_WEB_E": $("#Pagina_Web_Empresa").val(),
			"IDVEHICULOS_E": $("#idVehiculos_Empresa").val(),
			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Nit_Empresa").val('');
				$("#Nombre_Empresa").val('');
				$("#Direccion_Empresa").val('');
				$("#Telefono_Empresa").val('');
				$("#Email_Empresa").val('');
				$("#Pagina_Web_Empresa").val('');
				$("#idVehiculos_Empresa").val('');
			}
		});
		}
function Modificar_E(Nit){
		var parametros = {
			"NIT": Nit,
			"NIT_E": $("#NIT_E").val(),
			"NOMBRE_E": $("#NOMBRE_E").val(),
			"DIRECCION_E": $("#DIRECCION_E").val(),
            "TELEFONO_E": $("#TELEFONO_E").val(),
			"EMAIL_E": $("#EMAIL_E").val(),
			"PAGINA_WEB_E": $("#PAGINA_WEB_E").val(),
			"IDVEHICULOS_E": $("#IDVEHICULOS_E").val(),
			
			
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#empresas_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_E(Nit){
		var parametros = {
			"NIT": Nit,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#empresas_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>