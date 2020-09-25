<?php	session_start();
	require './cnx/cnx.php';
	$PDO = initCnx();
	//hola mundo 
?>

<!DOCTYPE html>
<html lang="es">
	<!-----					COMIENZA DECLARACI�N DE CLASES, JS Y CSS					----->
	<head>
		<?php	include("head_gen.php");	?>
		<link rel="stylesheet" href="css/estilo_index.css" type="text/css" media="screen" />
		<title>S.I.I.</title>
		<link rel="shortcut icon" href="imgs/icon.ico" />

		<!------------------------------          META's          ------------------------------>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<!------------------------------          CSS's          ------------------------------>
		<link rel="stylesheet" href="css/estilos.css" type="text/css" media="screen" />
                <link rel="stylesheet" href="./css/menu/font-awesome.min" type="text/css" media="screen"/>

	</head>
	<!-----					COMIENZA EL CUERPO DEL SISTEMA					----->
	<body class="fondo">
		<div class="espacio-64"></div>
		<div class="contenedor">
			<section>
				<div class="espacio-105"></div>
				<article>
					<?php
                                        include("ini_entrada.php");
					?>
				</article>
			</section>
		</div>
	</body>
        <script src="./js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="./js/jquery.js"><\/script>')</script>
        <script src="./js/menu/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
        <script src="./js/menu/temas.min.js"></script>        
        <script type="text/javascript" src="./js/jQuery.loggin.form.action.js"></script>
	<!-----					TERMINA EL CUERPO DEL SISTEMA					----->
</html>
<?php closeCnxP($PDO)	?>