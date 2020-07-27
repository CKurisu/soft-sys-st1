<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$m=$_POST['matricula'];
	$n=$_POST['nombre'];
	$app=$_POST['appaterno'];
	$apm=$_POST['apmaterno'];
	$e=$_POST['correo'];
	$s=$_POST['semestre'];
	$b=$_POST['beca'];

	$sql="INSERT into usuarios (nombre,apellido,status,rol)
								values ('$n','$a','$e','$t')";
	echo $result=mysqli_query($conexion,$sql);

 ?>