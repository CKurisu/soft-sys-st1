<?php	session_start();	?>
<!-----------------------------------------------------------
-----													-----
-----		LIDER DE PROYECTO: SAUL ARROYO G.			-----
-----		PROGRAMADORA: KATERIN CAROLINA PEREZ CRUZ	-----
-----		ThE SaG Corp								-----
-----		INDEX										-----
-----													-----
------------------------------------------------------------>
<?php
	include("cnx.php");
	$sag = cnx();
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

	</head>
	<!-----					COMIENZA EL CUERPO DEL SISTEMA					----->
	<body class="fondo">
		<div class="espacio-64"></div>
		<div class="contenedor">
			<section>
				<div class="espacio-105"></div>
				<article>
					<?php
						if(isset($_POST["btn_enviar"]))
						{
							$clave = md5($_POST["clave"]);
							$query_usu = "SELECT id_usuario, lvl FROM usuarios WHERE usuario = '".$_POST["usuario"]."' AND clave = '".$clave."'";
							$consulta_usu = $sag->query($query_usu);
							if($consulta_usu->num_rows > 0)
							{
								$rs_usu = $consulta_usu->fetch_assoc();
								$_SESSION['usuario'] = $rs_usu["id_usuario"];
								$_SESSION['lvl'] = $rs_usu["lvl"];
								$_SESSION['autenticado'] = "SI";
								
								if($clave=="202cb962ac59075b964b07152d234b70")
								{
									echo '<script type="text/javascript">
											document.location="admin/modclave.php?tp=0";
										</script>';
								}
								else if($rs_usu["lvl"]==1)		//DIRECTORES
								{
									echo '<script type="text/javascript">
										document.location="directores/index.php?tp=0";
									</script>';
								}
								else if($rs_usu["lvl"]==2)		//SECRETAR�AS
								{
									$_SESSION['tp']=1;
									echo '<script type="text/javascript">
										document.location="administrativo/index.php";
									</script>';
								}
								else if($rs_usu["lvl"]==3)		//CONTABILIDAD
								{
									echo '<script type="text/javascript">
										document.location="contabilidad/index.php?tp=0";
									</script>';
								}
							}
							else
							{
								$query_alu = "SELECT id_alumno FROM alumnos WHERE matricula = '".$_POST["usuario"]."' AND clave = '".$clave."'";
								$consulta_alu = $sag->query($query_alu);
								if($consulta_alu->num_rows > 0)
								{
									$rs_alu = $consulta_alu->fetch_assoc();
									$_SESSION['usuario'] = $rs_alu["id_alumno"];
									$_SESSION['lvl'] = 4;
									$_SESSION['autenticado'] = "SI";
									
									if($clave=="202cb962ac59075b964b07152d234b70")
									{
										echo '<script type="text/javascript">
												document.location="admin/modclave.php?tp=0";
											</script>';
									}
									else						//ALUMNOS
									{
										echo '<script type="text/javascript">
											document.location="alumnos/index.php?tp=0";
										</script>';
									}
								}
								else
								{
									$query_pro = "SELECT id_profesor FROM profesores WHERE id_profesor = '".$_POST["usuario"]."' AND clave = '".$clave."'";
									$consulta_pro = $sag->query($query_pro);
									if($consulta_pro->num_rows > 0)
									{
										$rs_pro = $consulta_pro->fetch_assoc();
										$_SESSION['usuario'] = $rs_pro["id_profesor"];
										$_SESSION['lvl'] = 5;
										$_SESSION['autenticado'] = "SI";
										
										if($clave=="202cb962ac59075b964b07152d234b70")
										{
											echo '<script type="text/javascript">
													document.location="admin/modclave.php?tp=0";
												</script>';
										}
										else					//PROFESORES
										{
											echo '<script type="text/javascript">
												document.location="profesores/index.php?tp=0";
											</script>';
										}
									}
									else
									{
										echo '<script type="text/javascript">
											alert("Error al ingresar, verifique su usuario y contrase\u00f1a");
										</script>';
										include("ini_entrada.php");
									}
								}
							}
							
						}
						else
							include("ini_entrada.php");
					?>
				</article>
			</section>
		</div>
	</body>
	<!-----					TERMINA EL CUERPO DEL SISTEMA					----->
</html>
<?php	mysqli_close($sag);	?>