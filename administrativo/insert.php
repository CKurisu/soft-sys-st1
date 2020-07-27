<?php
if( empty($_POST['matricula'])   ||
	empty($_POST['nombre'])   ||
    empty($_POST['appaterno'])  ||
    empty($_POST['apmaterno'])  ||
    empty($_POST['correo'])	||
    empty($_POST['semestre'])  ||
    empty($_POST['beca'])){
    echo 'No arguments provider';
    return false;
}
$message="";
require '../cnx.php';
$matricula=$_POST['matricula'];
$name=$_POST['nombre'];
$appaterno=$_POST['appaterno'];
$apmaterno=$_POST['apmaterno'];
$email=$_POST['correo'];
$semestre=$_POST['semestre'];
$beca=$_POST['beca'];

$servidor="localhost";
		$usuario="root";
		$password="";
		$bd="corpo133_sii";
$cnx = mysqli_connect($servidor, $usuario, $password, $bd);


if(mysqli_query($cnx, "INSERT INTO alumnos VALUES (NULL,'1','".$matricula."','','".$name."','".$appaterno."','".$apmaterno."','".$email."','".$semestre."','".$beca."','".date("Y-m-d")."','".date("Y-m-d")."',1)")){
    $message="Datos registrados";
}else{
    $message="No se pudieron registrar los datos".date("Y-m-d");
}
header('Location:./');
echo $message;return true;