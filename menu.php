<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="../fotos/<?php	echo $_SESSION["idus"];	?>.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php	echo $_SESSION["nmus"];	?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MENU</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-mortar-board"></i> <span>&ensp;Administraci&oacute;n del Sistema</span>
					 <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
                                    <li><a href="../administrativo/index.php?tp=1"><i class="fa fa-list-alt"></i> Administraci&oacute;n de Usuarios </a></li>
					<li class="treeview">
                                            <a><i class="fa fa-group"></i> Administraci&oacute;n de Clientes 
						<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
						<ul class="treeview-menu">
                                                    <li><a href="../cliente/clientes-inter.php"><i class="fa fa-group"></i> Intermediarios </a>
                                                        
                                                    </li>
                                                    <li class="treeview">
                                                        <a><i class="fa fa-group"></i> Clientes
                                                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                                        <ul class="treeview-menu">
                                                            <li><a href="../cliente/clientes.php"><i class="fa fa-group"></i> Clientes </a></li>
                                                            <li><a href="../cliente/reportes-siralab.php"><i class="fa fa-group"></i> Clientes SirLab</a></li>
                                                            <li><a href="../cliente/detail.client.php"><i class="fa fa-group"></i> Historia de Regstro</a></li>
                                                        </ul>
                                                    </li>
						</ul>
					</li>
					  
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-drivers-license-o"></i><span> Recepci&oacute;n</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-list-alt"></i> Solicitudes </a></li>
					<li><a href="#"><i class="fa fa-user-plus"></i> Cotizaciones </a></li>
				</ul>
			</li>
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-vcard"></i><span> Rastreabilidad</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-vcard-o"></i> Procesos </a></li>
					<li><a href="#"><i class="fa fa-user-plus"></i> Unidades </a></li>
				</ul>
			</li>
			<li><a href="#"><i class="fa fa-line-chart"></i><span> Calidad</span></a></li>
			<li><a href="#"><i class="fa fa-line-chart"></i><span> Facturaci&oacute;n</span></a></li>
			<li><a href="#"><i class="fa fa-line-chart"></i><span> Cobranza</span></a></li>
			<li><a href="#"><i class="fa fa-line-chart"></i><span> RH</span></a></li>
		</ul>
	</section>
</aside>