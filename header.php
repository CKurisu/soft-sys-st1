
<a href="index.php?tp=0" class="logo">
	<span class="logo-mini"><b>S</b><b>L</b></span>
	<span class="logo-lg"><b>Sis</b>Lab</span>
</a>

<?php
	switch($_SESSION['lvl'])
	{
		case 1:
			$lvl = "Director";
		break;
		case 2:
			$lvl = "Administrativo";
		break;
		case 3:
			$lvl = "Caja";
		break;
		case 4:
			$lvl = "Alumno";
		break;
		case 5:
			$lvl = "Profesor";
		break;
	}
?>

<nav class="navbar navbar-static-top">
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Menu</span>
	</a>

	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="../fotos/<?php	echo $id;	?>.png" class="user-image" alt="User Image">
					<span class="hidden-xs"><?php	echo $nom;	?></span>
				</a>
				<ul class="dropdown-menu">
					<li class="user-header">
						<img src="../fotos/<?php	echo $id;	?>.png" class="img-circle" alt="User Image">
						<p><?php	echo $nom." <br/> ".$lvl;	?>
						<br/><small>Sistema de Laboratorios</small>
						</p>
					</li>
					<li class="user-footer">
						<div class="pull-right">
							<a href="../salir.php" class="btn btn-default btn-flat">Salir</a>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>