 <div class="modal fade" id="Nuevomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Cliente</h3>
			</div>
                    <form id="registerForm" name="formRegister" novalidate action="insert.php" method="POST">
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-3">
							<label>ID Cliente</label>
							<input type="text" name="matricula" id="matricula" class="form-control" placeholder="00001243" readonly/>
						</div>
						<div class="form-group col-md-3">
							<label>Status</label>
							<div><span class="label label-success">Activo</span></div><br />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label>Nombre Cliente</label>
							<input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="Nombre Cliente" />
						</div>
						<div class="form-group col-md-3">
							<label>Intermediario</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Intermediario" />
						</div>
						<div class="form-group col-md-3">
							<label>Estado</label>
							<input type="text" name="correo" id="correo" class="form-control" placeholder="Estado" />
						</div> 
						<div class="form-group col-md-3">
							<label>Tipo Cliente</label>
							<select class="form-control" name="semestre" id="semestre">
								<option>--</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" id="guardarnuevo">Guardar</button>
					<button type="submit" class="btn btn-primary" id="guardarnuevo">Modificar</button>
					<button type="submit" class="btn btn-warning" id="guardarnuevo">Eliminar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<table class="table table-bordered table-hover">
	<thead>
		<tr class="tab_tr">
			<th scope="col" class="tab_centrar">ID</th>
            <th scope="col" class="tab_centrar">Estatus</th>
			<th scope="col" class="tab_centrar">Laboratorio</th>
			<th scope="col" class="tab_centrar">Nombre</th>
			<th scope="col" class="tab_centrar">ID Usuario Intermediario</th>
			<th scope="col" class="tab_centrar">Nombre</th>
			<th scope="col" class="tab_centrar">Creado por</th>
            <th scope="col" class="tab_centrar">Actulizado por</th>
			<th scope="col" class="tab_centrar" colspan="3">&nbsp;</th>
		</tr>
	</thead>
	 <button class="btn btn-primary btn-tbl" data-toggle="modal" data-target="#Nuevomodal"
            id="nuevoAlumno"><i class="fas fa-plus"></i> Agregar</button>
       <tbody>
       	<tr class="tab_td">
       		<th scope="row" class="tab_centrar"></th>
       		<td class="tab_centrar"><span class="label label-success">Activo</span></td>
            <td class="tab_centrar"></td>
            <td class="tab_centrar"></td>
            <td class="tab_centrar"></td>
       		<td class="tab_centrar"></td>
       		<td class="tab_centrar"></td>
       		<td class="tab_centrar"></td>
			<td class="tab_centrar"><a data-toggle="modal" data-target="#ModalModificar" class="btn cafe"><i class="fas fa-edit"></i> Modificar</a></td>
			<td class="tab_centrar"><a href="#" class="btn rojo"><i class="fas fa-times-circle"></i> Eliminar</a></td>
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