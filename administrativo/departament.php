<?php	session_start();	?>
<!--
 -- Develop Site
 -- Developed with Bootstrap
 --
 -- @version   v1.0.1, Created on Mon Jul 27 2020 18:21:27
 -- SoftSystem, LTD.
 -- @autor   (c) 2013 - SoftSystem, LTD. All rights reserved.
 -- @licence   Licensed under the MIT license.
-->
<?php
	include("../cnx.php");
	$sag=cnx();
	
	$id = $_SESSION['usuario'];
	$query_usu = "SELECT nombre FROM usuarios WHERE id_usuario = '".$id."'";
	$consulta_usu = $sag->query($query_usu);
	if($consulta_usu->num_rows > 0)
	{
		$rs_usu = $consulta_usu->fetch_assoc();
		$nom = $rs_usu["nombre"];
	}
?>

<!DOCTYPE html>
<html lang="es">
	<!-----					COMIENZA DECLARACI�N DE CLASES, JS Y CSS					----->
	<head>
		<?php
			include("../head_menu_css.php");
			include("../head_gen.php");
		?>
		<link rel="stylesheet" href="../css/estilo_administrativo.css" type="text/css" media="screen" />
	</head>
	<!-----					COMIENZA EL CUERPO DEL SISTEMA					----->
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
		
			<!----------     AQUI COMIENZA EL HEADER     ---------->
			<header class="main-header">
				<?php	include("../header.php");	?>
			</header>
			<!----------     AQUI TERMINA EL HEADER
			********************************************************
			AQUI COMIENZA EL MENU     ---------->
			
			<?php	include("menu.php");	?>
			
			<!----------     AQUI TERMINA EL MENU
			********************************************************
			AQUI COMIENZA LA P�GINA     ---------->
			
			<div class="content-wrapper">
				
				<!----------     TITULO     ---------->
			
				<section class="content-header">
					<center class="titulo">
						<?php
							switch($_SESSION['tp'])
							{
								case 1:
									echo 'Lista de Departamentos';
								break;
								case 2:
									echo 'Nuevo Alumno';
								break;
								case 3:
									echo 'Lista de Alumnos';
								break;
							}
						?>
					</center>
				</section>
					
				<!----------     TITULO     ---------->
				<section class="content">
					<?php
						switch($_SESSION['tp'])
						{
							case 1:
								include("data/departament.php");
							break;
							case 2:
								include("alu_nuevo.php");
								include("alu_nuevo.php");
							break;
							case 3:
								include("alu_nuevog.php");
								include("alu_lista.php");
							break;
						}
					?>
				</section>
			</div>
			
			<!----------     AQUI TERMINA LA P�GINA
			********************************************************
			AQUI COMIENZA LA PIECERA     ---------->
			
			<footer class="main-footer">

			</footer>
			
			<!----------     AQUI TERMINA LA PIECERA     ---------->
		</div>
		<?php	include("../head_menu_js.php");	?>
	</body>
	<!-----					TERMINA EL SISTEMA					----->
</html>