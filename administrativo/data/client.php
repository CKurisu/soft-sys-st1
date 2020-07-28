 <div class="modal fade" id="Nuevomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
			</div>
                    <form id="registerForm" name="formRegister" novalidate action="insert.php" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>Matr&iaucte;cula</label>
						<input type="text" name="matricula" id="matricula" class="form-control" placeholder="Matr&iacute;cula" />
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" />
					</div>
					<div class="form-group">
						<label>Apellido Paterno</label>
						<input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="Apellido Paterno" />
					</div>
					<div class="form-group">
						<label>Apellido Materno</label>
						<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Apellido Materno" />
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="correo" id="correo" class="form-control" placeholder="Correo Electrónico" />
					</div> 
					<div class="form-group">
						<label>Semestre</label>
						<input type="text" name="semestre" id="semestre" class="form-control" placeholder="Semestre" />
					</div>
					<div class="form-group">
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

<table class="table table-bordered table-hover">
	<thead>
		<tr class="tab_tr">
			<th scope="col" class="tab_centrar">ID Usuario Intermedio</th>
			<th scope="col" class="tab_centrar">Laboratorio</th>
			<th scope="col" class="tab_centrar">Nombre</th>
			<th scope="col" class="tab_centrar">Correo</th>
			<th scope="col" class="tab_centrar">Direcci&oacute;n</th>
			<th scope="col" class="tab_centrar">Telefono(s)</th>
			<th scope="col" class="tab_centrar" colspan="3">&nbsp;</th>
		</tr>
	</thead>
	 <button class="btn btn-primary btn-tbl" data-toggle="modal" data-target="#Nuevomodal"
            id="nuevoAlumno"><i class="fas fa-plus"></i></button>
       <tbody>
       	<tr class="tab_td">
       		<th scope="row" class="tab_centrar"></th>
       		<td class="tab_centrar"></td>
			<td class="tab_centrar"></td>
       		<td class="tab_centrar"></td>
       		<td class="tab_centrar"></td>
       		<td class="tab_centrar"></td>
			<td class="tab_centrar"><a data-toggle="modal" data-target="#ModalModificar" class="btn cafe"><i class="fas fa-edit"></i></a></td>
			<td class="tab_centrar"><a href="#" class="btn rojo"><i class="fas fa-times-circle"></i></a></td>
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