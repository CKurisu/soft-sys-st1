<?php 

	require_once "cnx.php";
	$conexion=conexion();
	$n=$_POST['nombre'];
	$a=$_POST['apellido'];
	$e=$_POST['status'];
	$t=$_POST['rol'];

	$sql="INSERT into usuarios (nombre,apellido,status,rol)
								values ('$n','$a','$e','$t')";
	echo $result=mysqli_query($conexion,$sql);

 ?>