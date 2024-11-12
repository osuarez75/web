<?php
 include("./config/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Administracion Modulo Conductores</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/conductor.ico">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/prue.css">
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
        		<div class="sidebar-brand-text"><h1><MARQUEE WIDTH=90% HEIGHT=60> ADMINISTAR MODULO CONDUCTORES</MARQUEE></h1></div>
            <div>
        </div>
		<div class="row" style="background-color:FFFFFF">
        	<div class="col-6" align="center">
                <div id="conductores_l"></div>
            </div>
            <div class="col-5">
                <br>
                <table width='' border='0' cellspacing='0' cellpadding='1'>
                    <tr bgcolor='#3733FF' align='center'>
                    <td><b><font color='#ffffff'>CONDUCTOR</font></b></td>
                    </tr>
                    <tr bgcolor='#3733FF'>
                    <td>
                        <table width='100%' border='0' cellspacing='0' cellpadding='4'>
                        <tr bgcolor='#ffffff'>
                        <td>
                            <b>Numero Cedula: </b> <br>
                            <input type='text' id='Cedula_Conductor' value='' placeholder='Ingrese Numero de Cedula'><br>
                            <b>Nombres: </b> <br>
                            <input type='text' id='Nombres_Conductor' value='' placeholder='Ingrese Nombres'><br>
							<b>Apellidos: </b> <br>
                            <input type='text' id='Apellidos_Conductor' value='' placeholder='Ingrese Apellidos'><br>
							<b>Telefono: </b> <br>
                            <input type='text' id='Telefonos_Conductor' value='' placeholder='Ingrese Telefonos'><br>
							<b>Rh: </b> <br>
                            <input type='text' id='Rh_Conductor' value='' placeholder='Ingrese Rh'><br>
							<b>Eps: </b> <br>
                            <input type='text' id='Eps_Conductor' value='' placeholder='Ingrese Eps'><br>
                        </td>
                        </tr>
                        <tr bgcolor='#ffffff'>
                        <td>
                            <button class="alert-info" type='submit' name='AGREGAR_C' onClick='Agregar_C()'>Agregar Nuevo</button>
                            
                        </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <div id="conductores_2"></div>
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
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#conductores_l').html(a);
			}
		});
}
function Administrar_C(cedula){
		var parametros = {
			"CEDULA": cedula,
			"TIPO":"CARGAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#conductores_2').html(a);
			}
		});
		}
function Agregar_C(){
		var parametros = {
			"CEDULA_C": $("#Cedula_Conductor").val(),
			"NOMBRES_C": $("#Nombres_Conductor").val(),
			"APELLIDOS_C": $("#Apellidos_Conductor").val(),
			"TELEFONO_C": $("#Telefonos_Conductor").val(),
			"RH_C": $("#Rh_Conductor").val(),
			"EPS_C": $("#Eps_Conductor").val(),

			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Cedula_Conductor").val('');
				$("#Nombres_Conductor").val('');
				$("#Apellidos_Conductor").val('');
				$("#Telefonos_Conductor").val('');
                $("#Rh_Conductor").val('');
                $("#Eps_Conductor").val('');
			}
		});
		}
function Modificar_C(cedula){
		var parametros = {
			"CEDULA": cedula,
			"CEDULA_C": $("#CEDULA_C").val(),
			"NOMBRES_C": $("#NOMBRES_C").val(),
            "APELLIDOS_C": $("#APELLIDOS_C").val(),
			"TELEFONO_C": $("#TELEFONO_C").val(),
			"RH_C": $("#RH_C").val(),
			"EPS_C": $("#EPS_C").val(),

			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#conductores_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_C(cedula){
		var parametros = {
			"CEDULA": cedula,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#conductores_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>