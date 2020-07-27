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
					<i class="fa fa-mortar-board"></i><span>&ensp;Alumnos</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="index.php?tp=1"><i class="fa fa-list-alt"></i> Lista </a></li>
					
					 <li class="treeview">
                  <a href="#"><i class="fa fa-user-plus"></i> Nuevo
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="carreras.php"><i class="fa fa-circle-o"></i> Carreras</a></li>                   
                  </ul>
                </li>
					<li><a href="index.php?tp=4"><i class="fa fa-group"></i> Exalumnos </a></li>
					<li><a href="index.php?tp=5"><i class="fa fa-user-circle"></i> Bajas</a></li>
					  
				</ul>
			</li><?php	include("alu_nuevo.php");	?>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-drivers-license-o"></i><span>&ensp;Profesores</span>
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