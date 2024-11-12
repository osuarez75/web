<?php
include("database.php");
if ($_POST['TIPO']=="LISTAR"){
	$sql = "SELECT idConductores,Cedula,Nombres,Apellidos,Telefono,Rh,Eps from conductor order by idConductores"; 
    $tabla="<div class='box-body'><table id='detalle1' class='table table-bordered table-striped table-condensed'>
                 <thead>
                        <tr>
                          <th>Cedula</th>
						  <th>Nombres</th>
						  <th>Apellidos</th>
						  <th>Telefono</th>
						  <th>Rh</th>
						  <th>Eps</th>
                          <th></th>
                        </tr>
                 </thead>
                 <tbody>";
        $result=mysqli_query($con, $sql);
        $count=mysqli_num_rows($result);
        $datos="";
	if ($count>0) { 
		while($row = mysqli_fetch_row($result)){
                $datos=$datos."<tr>
                    <td>".$row[1]."</td>
					<td>".$row[2]."</td>
					<td>".$row[3]."</td>
					<td>".$row[4]."</td>
					<td>".$row[5]."</td>
					<td>".$row[6]."</td>
					<td>
                       <button type='submit' name='ADMINISTRAR' onClick='Administrar_C(".$row[0].")'>Administrar</button>
                     </td>
                    </tr>";
            }
            $tabla=$tabla.$datos;
            echo $tabla."</tbody></table> <br> <b>Total de Registros: </b>".$count;
			mysqli_close($con);	
	}else{
		echo "<b>No existen conductores creados.</b>";
		}
}//FIN FUNCION LISTAR CONDUCTORES

if ($_POST['TIPO']=="NUEVO"){
	$sql = "insert into conductor(Cedula,Nombres,Apellidos,Telefono,Rh,Eps) values('".$_POST['CEDULA_C']."','".$_POST['NOMBRES_C']."','".$_POST['APELLIDOS_C']."','".$_POST['TELEFONO_C']."','".$_POST['RH_C']."','".$_POST['EPS_C']."')";
	mysqli_query($con, $sql);
	mysqli_close($con);		
}//FIN FUNCION NUEVO 

if ($_POST['TIPO']=="CARGAR"){ 
$Cedula = $_POST['CEDULA'];
$sql = "select idConductores,Cedula,Nombres,Apellidos,Telefono,Rh,Eps from conductor where idConductores=".$Cedula;
$result=mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if ($count>0) {
	echo"
		<table width='' border='0' cellspacing='0' cellpadding='1'>
		<tr bgcolor='#FFFFFF align='center'>
		<td><b><font color='#FFFFFF'>MODIFICAR</font></b></td>
		</tr>
		<tr bgcolor='#3733FF'>
		<td>
		<table width='100%' border='0' cellspacing='0' cellpadding='4'>
	";
	while($row = mysqli_fetch_row($result)){
		echo"
			<tr bgcolor='#FFFFFF'>
			<td>
				<b>Cedula: </b> <br>
				<input type='text' id='CEDULA_C' value='".$row[1]."'><br>
				<b>Nombres: </b> <br>
				<input type='text' id='NOMBRES_C' value='".$row[2]."'><br>
				<b>Apellidos: </b> <br>
				<input type='text' id='APELLIDOS_C' value='".$row[3]."'><br>
				<b>Telefono: </b> <br>
				<input type='text' id='TELEFONO_C' value='".$row[4]."'><br>
				<b>Rh: </b> <br>
				<input type='text' id='RH_C' value='".$row[5]."'><br>
				<b>Eps: </b> <br>
				<input type='text' id='EPS_C' value='".$row[6]."'><br>
			</td>
			</tr>
			<tr bgcolor='#FFFFFF'>
			<td>
				<button type='submit' class='alert-primary' name='MODIFICAR_C' onClick='Modificar_C(".$row[0].")'>Modificar</button>
				<button type='submit' class='alert-warning' name='ELIMINAR_C' onClick='Eliminar_C(".$row[0].")'>Eliminar</button>
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
$idConductores = $_POST['CEDULA'];
$Cedula = $_POST['CEDULA_C'];
$Nombres = $_POST['NOMBRES_C'];
$Apellidos = $_POST['APELLIDOS_C'];
$Telefono = $_POST['TELEFONO_C'];
$Rh = $_POST['RH_C'];
$Eps = $_POST['EPS_C'];
$sql = "update conductor set Cedula='".$Cedula."', Nombres='".$Nombres."',  Apellidos='".$Apellidos."', Telefono='".$Telefono."',  Rh='".$Rh."',  Eps='".$Eps."' where idConductores=".$idConductores;
mysqli_query($con, $sql);
mysqli_close($con);	
}//FIN FUNCION MODIFICAR

if ($_POST['TIPO']=="ELIMINAR"){ 
$idConductores = $_POST['CEDULA'];
$sql = "delete conductor.* from conductor where idConductores=".$idConductores;
mysqli_query($con, $sql);	
mysqli_close($con);	
}//FIN FUNCION MODIFICAR
?>