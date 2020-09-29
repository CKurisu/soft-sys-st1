<?php	session_start();
include("../cnx/cnx.php");
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
			
			<?php	include("../menu.php");	?>
			
			<!----------     AQUI TERMINA EL MENU
			********************************************************
			AQUI COMIENZA LA P�GINA     ---------->
			
			<div class="content-wrapper">
				
				<!----------     TITULO     ---------->
			
				<section class="content-header">
					<center class="titulo">
                                            Cliente siralab
					</center>
				</section>
					
				<!----------     TITULO     ---------->
				<section class="content">
                                     <div class="modal fade" id="Nuevomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
			</div>
                    <form id="registerForm" name="formRegister" novalidate action="insert.php" method="POST">
				<div class="modal-body">
					<div class="form-group col-sm-6">
						<label>Matr&iaucte;cula</label>
						<input type="text" name="matricula" id="matricula" class="form-control" placeholder="Matr&iacute;cula" />
					</div>
					<div class="form-group col-sm-6">
						<label>Nombre</label>
						<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" />
					</div>
					<div class="form-group col-sm-6">
						<label>Apellido Paterno</label>
						<input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="Apellido Paterno" />
					</div>
					<div class="form-group col-sm-6">
						<label>Apellido Materno</label>
						<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Apellido Materno" />
					</div>
					<div class="form-group col-sm-6">
						<label>Email</label>
						<input type="text" name="correo" id="correo" class="form-control" placeholder="Correo Electrónico" />
					</div> 
					<div class="form-group col-sm-6">
						<label>Semestre</label>
						<input type="text" name="semestre" id="semestre" class="form-control" placeholder="Semestre" />
					</div>
					<div class="form-group col-sm-6">
						<label>Beca</label>
						<input type="text" name="beca" id="beca" class="form-control" placeholder="Beca" />%
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="guardarnuevo">Dar de Alta</button>        
				</div>
			</form>
		</div>
	</div>
</div>

                                    <table class="table table-bordered table-hover" id="t-infsl">
	<thead>
		<tr class="tab_tr">
                    <th scope="col" class="tab_centrar">Status</th>
                    <th scope="col" class="tab_centrar">ID Puntos de Muestreo</th>
                    <th scope="col" class="tab_centrar">Titulo Concesi&oacute;n</th>
                    <th scope="col" class="tab_centrar">Puntos de muestro</th>
                    <th scope="col" class="tab_centrar">Anexo</th>
                    <th scope="col" class="tab_centrar">SIRALAB</th>
                    <th scope="col" class="tab_centrar">Solido</th>
                    <th scope="col" class="tab_centrar">Cuerpo Receptor</th>
                    <th scope="col" class="tab_centrar">Uso de Agua</th>
                    <th scope="col" class="tab_centrar">Observaciones</th>
                    <th scope="col" class="tab_centrar">Fecha Inicio</th>
                    <th scope="col" class="tab_centrar">Fecha Termino</th>
                    <th scope="col" class="tab_centrar" colspan="3">&nbsp;</th>
		</tr>
	</thead>
        <div class="col-md-4 col-sm-4 col-lg-4 form-search">
            <i class="fas fa-calendar"></i> Busqueda Periodo
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="form-control" name="start" id="start" placeholder="Fecha Inicio"/>
                <span class="input-group-addon">a</span>
                <input type="text" class="form-control" name="end" id="end" placeholder="Fecha Fin"/>
            </div>
            <button class="btn-tblinfsl-fild btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 form-search">
            <i class="fas fa-search"></i> Busqueda Avanzada 
            <input type="text" name="filter" id="filter" class="form-control" placeholder="Buscar...">
            <button class="fil-list-src-infsl btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button>
        </div>
	 <button class="btn btn-primary btn-tbl" data-toggle="modal" data-target="#Nuevomodal" id="nuevoAlumno"><i class="fas fa-plus">Agregar</i></button>
       <tbody>
       	<tr class="tab_td">
            <th scope="row" class="tab_centrar"><span class="label label-success">Activo</span></th>
       		<td class="tab_centrar"></td>
                <td class="tab_centrar"></td>
                <td class="tab_centrar"></td>
                <td class="tab_centrar"></td>
                <td class="tab_centrar"></td>
                <td class="tab_centrar"></td>
                <td class="tab_centrar"></td>
                <td class="tab_centrar"></td>
                <td class="tab_centrar"></td>
                <td class="tab_centrar"></td>
                <td class="tab_centrar"></td>
                <td class="tab_centrar"><a data-toggle="modal" data-target="#ModalModificar" class="btn cafe">Modificar<i class="fas fa-edit"></i></a></td>
                <td class="tab_centrar"><a href="#" class="btn rojo"><i class="fas fa-times-circle"></i></a>Eliminar</td>
       	</tr>
		<?php
			/*$x=0;
			$query_alu = "SELECT * FROM alumnos LIMIT 0,100";
			$consulta_alu = $sag->query($query_alu);
			if($consulta_alu->num_rows > 0)
			{
				while($rs_alu = $consulta_alu->fetch_assoc())
				{
					$x++;
					$query_car= "SELECT nombre FROM carreras  WHERE id_carrera='".$rs_alu["ref_carrera"]."'";
					$consulta_car = $sag->query($query_car);
					$rs_car = $consulta_car->fetch_assoc();
					$carrera = $rs_car["nombre"];
					
					echo '<tr class="tab_td">
						<th scope="row" class="tab_centrar">'.$x.'</th>
						<td class="tab_centrar">'.$rs_alu["matricula"].'</td>
						<td>'.$rs_alu["nombre"].' '.$rs_alu["appaterno"].' '.$rs_alu["apmaterno"].'</td>
						<td>'.$carrera.'</td>
						<td class="tab_centrar">'.$rs_alu["semestre"].'</td>
						<td class="tab_centrar">'.$rs_alu["beca"].'%</td>
						<td class="tab_centrar"><a data-toggle="modal" data-target="#ModalModificar" class="btn cafe">Modificar</a></td>

						

						<td class="tab_centrar"><a href="#" class="btn rojo">Dar de baja</a></td>
					</tr>';
				}
			}
			include("alu_modificar.php");*/
		?>
	</tbody>
</table>
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