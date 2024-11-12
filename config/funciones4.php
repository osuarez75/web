<?php
include("database.php");
if ($_POST['TIPO']=="LISTAR"){
	$sql = "SELECT idEmpresas,Nit,Nombre,Direccion,Telefono,Email,Pagina_Web,idVehiculos from empresa order by idEmpresas"; 
    $tabla="<div class='box-body'><table id='detalle1' class='table table-bordered table-striped table-condensed'>
                 <thead>
                        <tr>
                          <th>Nit</th>
						  <th>Nombre</th>
						  <th>Direccion</th>
						  <th>Telefono</th>
						  <th>Email</th>
						  <th>Pagina_Web</th>
						  <th>idVehiculos</th>
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
					<td>".$row[6]."</td>
					<td>".$row[7]."</td>
                    <td>
                       <button type='submit' name='ADMINISTRAR' onClick='Administrar_E(".$row[0].")'>Administrar</button>
                     </td>
                    </tr>";
            }
            $tabla=$tabla.$datos;
            echo $tabla."</tbody></table> <br> <b>Total de Registros: </b>".$count;
			mysqli_close($con);	
	}else{
		echo "<b>No existen empresasa registradas.</b>";
		}
}//FIN FUNCION LISTAR EMPRESA

if ($_POST['TIPO']=="NUEVO"){
	$sql = "insert into empresa(Nit,Nombre,Direccion,Telefono,Email,Pagina_Web,idVehiculos) values('".$_POST['NIT_E']."','".$_POST['NOMBRE_E']."','".$_POST['DIRECCION_E']."','".$_POST['TELEFONO_E']."','".$_POST['EMAIL_E']."','".$_POST['PAGINA_WEB_E']."', '".$_POST['IDVEHICULOS_E']."')";
	mysqli_query($con, $sql);
	mysqli_close($con);		
}//FIN FUNCION NUEVO 

if ($_POST['TIPO']=="CARGAR"){ 
$Nit = $_POST['NIT'];
$sql = "select idEmpresas,Nit,Nombre,Direccion,Telefono,Email,Pagina_Web,idVehiculos from empresa where idEmpresas=".$Nit;
$result=mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if ($count>0) {
	echo"
		<table width='' border='0' cellspacing='0' cellpadding='1'>
		<tr bgcolor='#56070C' align='center'>
		<td><b><font color='#FFFFFF'>____MODULO CRUD____</font></b></td>
		</tr>
		<tr bgcolor='#56070C'>
		<td>
		<table width='100%' border='0' cellspacing='0' cellpadding='4'>
	";
	while($row = mysqli_fetch_row($result)){
		echo"
			<tr bgcolor='#FFFFFF'>
			<td>
				<b>Nit: </b> <br>
				<input type='text' id='NIT_E' value='".$row[1]."'><br>
				<b>Nombre: </b> <br>
				<input type='text' id='NOMBRE_E' value='".$row[2]."'><br>
				<b>Direccion: </b> <br>
				<input type='text' id='DIRECCION_E' value='".$row[3]."'><br>
				<b>Telefono: </b> <br>
				<input type='text' id='TELEFONO_E' value='".$row[4]."'><br>
				<b>Email: </b> <br>
				<input type='text' id='EMAIL_E' value='".$row[5]."'><br>
				<b>Pagina Web: </b> <br>
				<input type='text' id='PAGINA_WEB_E' value='".$row[6]."'><br>
				<b>idVehiculos: </b> <br>
				<input type='text' id='IDVEHICULOS_E' value='".$row[7]."'><br>

			</td>
			</tr>
			<tr bgcolor='#FFFFFF'>
			<td>
				<button type='submit' class='alert-primary' name='MODIFICAR_E' onClick='Modificar_E(".$row[0].")'>Modificar</button>
				<button type='submit' class='alert-warning' name='ELIMINAR_E' onClick='Eliminar_E(".$row[0].")'>Eliminar</button>
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
$idEmpresas = $_POST['NIT'];
$Nit = $_POST['NIT_E'];
$Nombre = $_POST['NOMBRE_E'];
$Direccion = $_POST['DIRECCION_E'];
$Telefono = $_POST['TELEFONO_E'];
$Email = $_POST['EMAIL_E'];
$Pagina_Web = $_POST['PAGINA_WEB_E'];
$idVehiculos = $_POST['IDVEHICULOS_E'];

$sql = "update empresa set Nit='".$Nit."', Nombre='".$Nombre."', Direccion='".$Direccion."',  Telefono='".$Telefono."', Email='".$Email."', Pagina_Web='".$Pagina_Web."', idVehiculos='".$idVehiculos."'   where idEmpresas=".$idEmpresas;
mysqli_query($con, $sql);
mysqli_close($con);	
}//FIN FUNCION MODIFICAR

if ($_POST['TIPO']=="ELIMINAR"){ 
$idEmpresas = $_POST['NIT'];
$sql = "delete empresa.* from empresa where idEmpresas=".$idEmpresas;
mysqli_query($con, $sql);	
mysqli_close($con);	
}//FIN FUNCION MODIFICAR
?>