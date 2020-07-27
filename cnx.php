<?php
	function cnx()
	{
		$servidor="localhost";
		$usuario="root";
		$password="";
		$bd="corpo133_sii";

		$cnx = mysqli_connect($servidor, $usuario, $password, $bd);

		if($cnx->connect_error)
			die("Connection failed: ".$cnx->connect_error);
		else
			return $cnx;
	}

	function cerrar(){
		mysqli_close($cnx);
	}
 ?>