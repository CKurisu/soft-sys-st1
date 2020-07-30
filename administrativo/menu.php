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
			<li class="treeview active">
				<a href="#">
					<i class=""></i><span>&ensp;Administración del sistema
</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="index.php?tp=1"><i class="fa fa-list-alt"></i> Administración de usuarios </a></li>
					<li><a href="index.php?tp=4"><i class="fa fa-group"></i> Administración de clientes </a></li>
					  
				</ul>
			</li><?php	include("alu_nuevo.php");	?>

			<li class="treeview active">
				<a href="#">
					<i class="fa fa-drivers-license-o"></i><span>&ensp;Recepción</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-list-alt"></i> Solicitudes </a></li>
					<li><a href="#"><i class="fa fa-user-plus"></i> Cotizaciones </a></li>
				</ul>
			</li>
			
			<li class="treeview active">
				<a href="#">
					<i class="fa fa-vcard"></i><span>&ensp;Rastreabilidad</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-vcard-o"></i> Cotizaciones </a></li>
					<li><a href="#"><i class="fa fa-user-plus"></i> Unidades </a></li>
				</ul>
			</li>


			<li class="treeview">
				<a href="#">
					<i class="fa fa-line-chart"></i><span>&ensp;Calidad</span>
				</a>
			</li>


			<li class="treeview">
				<a href="#">
					<i class="fa fa-th"></i><span>&ensp;Facturación</span>
				</a>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-th"></i><span>&ensp;Cobranza</span>
				</a>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-calendar"></i><span>&ensp;RH</span>
				</a>
			</li>
		</ul>
	</section>
</aside>