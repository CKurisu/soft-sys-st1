<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="../fotos/<?php	echo $id;	?>.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php	echo $nom;	?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MENU</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-mortar-board"></i><span>&ensp;Administraci&oacute;n del Sistema</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="index.php?tp=1"><i class="fa fa-list-alt"></i> Administraci&oacute;n de Usuarios </a></li>
					<li class="treeview">
						<a href="index.php?tp=4"><i class="fa fa-group"></i> Administraci&oacute;n de Clientes </a>
						<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						<ul class="treeview-menu">
							<li><a href="index.php?tp=4"><i class="fa fa-group"></i> Intermediarios </a></li>
							<li><a href="index.php?tp=4"><i class="fa fa-group"></i> Clientes </a></li>
						</ul>
					</li>
					  
				</ul>
			</li><?php	include("alu_nuevo.php");	?>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-drivers-license-o"></i><span> Recepci&oacute;n</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-list-alt"></i> Lista </a></li>
					<li><a href="#"><i class="fa fa-user-plus"></i> Nuevo </a></li>
				</ul>
			</li>
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-vcard"></i><span>&ensp;Usuarios</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-vcard-o"></i> Lista </a></li>
					<li><a href="#"><i class="fa fa-user-plus"></i> Nuevo </a></li>
				</ul>
			</li>


			<li class="treeview">
				<a href="#">
					<i class="fa fa-line-chart"></i><span>&ensp;Carreras</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-list-alt"></i> Lista </a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i> Nuevo </a></li>
				</ul>
			</li>


			<li class="treeview">
				<a href="#">
					<i class="fa fa-th"></i><span>&ensp;Materias</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-list-alt"></i> Lista </a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i> Nuevo </a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-calendar"></i><span>&ensp;Horarios</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-list-alt"></i> Lista </a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i> Nuevo </a></li>
				</ul>
			</li>
		</ul>
	</section>
</aside>