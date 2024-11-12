<?php
include("database.php");
if ($_POST['TIPO']=="LISTAR"){
	$sql = "SELECT idVehiculos,Numero_Vehiculo,Tipo_Vehiculo,Placa,Modelo,idConductores from vehiculo order by idVehiculos"; 
    $tabla="<div class='box-body'><table id='detalle1' class='table table-bordered table-striped table-condensed'>
                 <thead>
                        <tr>
                          <th>Numero Vehiculo</th>
						  <th>Tipo Vehiculo</th>
						  <th>Placa</th>
						  <th>Modelo</th>
						  <th>idConductores</th>
						  <th></th>
                        </tr>
                 </thead>
                 <tbody>";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        $datos="";
	if ($count>0) { 
		while($row = mysqli_fetch_row($result)){
                $datos=$datos."<tr>
                    <td>".$row[1]."</td>
					<td>".$row[2]."</td>
					<td>".$row[3]."</td>
					<td>".$row[4]."</td>
					<td>".$row[5]."</td>
						
									
                    <td>
                       <button type='submit' name='ADMINISTRAR' onClick='Administrar_V(".$row[0].")'>Administrar</button>
                     </td>
                    </tr>";
            }
            $tabla=$tabla.$datos;
            echo $tabla."</tbody></table> <br> <b>Total de Registros: </b>".$count;
			mysqli_close($con);	
	}else{
		echo "<b>No existen conductores creados.</b>";
		}
}//FIN FUNCION LISTAR VEHICULOS

if ($_POST['TIPO']=="NUEVO"){
	$sql = "insert into vehiculo(Numero_Vehiculo,Tipo_Vehiculo,Placa,Modelo,idConductores) values('".$_POST['NUMERO_VEHICULO_V']."','".$_POST['TIPO_VEHICULO_V']."','".$_POST['PLACA_VEHICULO_V']."','".$_POST['MODELO_VEHICULO_V']."','".$_POST['IDCONDUCTORES_VEHICULO_V']."')";
	mysqli_query($con, $sql);
	mysqli_close($con);		
}//FIN FUNCION NUEVO 

if ($_POST['TIPO']=="CARGAR"){ 
$Numero_Vehiculo = $_POST['NUMERO_VEHICULO'];
$sql = "select idVehiculos,Numero_Vehiculo,Tipo_Vehiculo,Placa,Modelo,idConductores from vehiculo where idVehiculos=".$Numero_Vehiculo;
$result=mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if ($count>0) {
	echo"
		<table width='' border='0' cellspacing='0' cellpadding='1'>
		<tr bgcolor='#02fcfc' align='center'>
		<td><b><font color='#FFFFFF'>MODIFICAR</font></b></td>
		</tr>
		<tr bgcolor='#02fcfc'>
		<td>
		<table width='100%' border='0' cellspacing='0' cellpadding='4'>
	";
	while($row = mysqli_fetch_row($result)){
		echo"
			<tr bgcolor='#ffffff'>
			<td>
				<b>Numero Vehiculo: </b> <br>
				<input type='text' id='NUMERO_VEHICULO_V' value='".$row[1]."'><br>
				<b>Tipo Vehiculo: </b> <br>
				<input type='text' id='TIPO_VEHICULO_V' value='".$row[2]."'><br>
				<b>Placa: </b> <br>
				<input type='text' id='PLACA_VEHICULO_V' value='".$row[3]."'><br>
				<b>Modelo: </b> <br>
				<input type='text' id='MODELO_VEHICULO_V' value='".$row[4]."'><br>
				<b>idConductores: </b> <br>
				<input type='text' id='IDCONDUCTORES_VEHICULO_V' value='".$row[5]."'><br>
				
			</td>
			</tr>
			<tr bgcolor='#FFFFFF'>
			<td>
				<button type='submit' class='alert-primary' name='MODIFICAR_V' onClick='Modificar_V(".$row[0].")'>Modificar</button>
				<button type='submit' class='alert-warning' name='ELIMINAR_V' onClick='Eliminar_V(".$row[0].")'>Eliminar</button>
			</td>
			</tr>
		";
		}
	echo"
		</table>
		</td>
		</tr>
		</table>
	";	
	}else{
		echo "Error al realizar la consulta en la base de datos. Consulte a soporte técnico.";
		}
mysqli_close($con);
}//FIN FUNCION CARGAR

if ($_POST['TIPO']=="MODIFICAR"){ 
$idVehiculos = $_POST['NUMERO_VEHICULO'];
$Numero_Vehiculo = $_POST['NUMERO_VEHICULO_V'];
$Tipo_Vehiculo = $_POST['TIPO_VEHICULO_V'];
$Placa = $_POST['PLACA_VEHICULO_V'];
$Modelo = $_POST['MODELO_VEHICULO_V'];
$idConductores = $_POST['IDCONDUCTORES_VEHICULO_V'];
$sql = "update vehiculo set Numero_Vehiculo='".$Numero_Vehiculo."', Tipo_Vehiculo='".$Tipo_Vehiculo."',  Placa='".$Placa."',  Modelo='".$Modelo."', idConductores='".$idConductores."' where idVehiculos=".$idVehiculos;
mysqli_query($con, $sql);
mysqli_close($con);	
}//FIN FUNCION MODIFICAR

if ($_POST['TIPO']=="ELIMINAR"){ 
$idVehiculos = $_POST['NUMERO_VEHICULO'];
$sql = "delete vehiculo.* from vehiculo where idVehiculos=".$idVehiculos;
mysqli_query($con, $sql);	
mysqli_close($con);	
}//FIN FUNCION ELIMINAR
?>