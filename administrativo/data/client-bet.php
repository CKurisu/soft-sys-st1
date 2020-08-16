 <div class="modal fade" id="Nuevomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel"> Datos Cliente Intermedio</h3>
			</div>
				<form id="yui11011001" name="yui11011001" novalidate>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-3">
							<label>ID Cliente</label>
							<input type="text" name="matricula" id="matricula" class="form-control" placeholder="00001243" readonly value="00001243"/>
						</div>
						<div class="form-group col-md-3">
							<label>Status</label>
							<div><span class="label label-success">Activo</span></div><br />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label>Laboratorio</label>
							<input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="Laboratorio" />
						</div>
						<div class="form-group col-md-3">
							<label>Nombre</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Nombre" />
						</div>
						<div class="form-group col-md-3">
							<label>Apellido Paterno</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Apellido Paterno" />
						</div>
						<div class="form-group col-md-3">
							<label>Apellido Materno</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Apellido Materno" />
						</div>
						<div class="form-group col-md-3">
							<label>Correo Electr&oacute;nico</label>
							<input type="text" name="correo" id="correo" class="form-control" placeholder="Correo Electr&oacute;nico" />
						</div>
						<div class="form-group col-md-3">
							<label>Direcci&oacute;n</label>
							<input type="text" name="correo" id="correo" class="form-control" placeholder="Direcci&oacute;n" />
						</div>
						<div class="form-group col-md-3">
							<label>Tel&eacute;fono Oficina</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Tel&eacute;fono Oficina" />
						</div>
						<div class="form-group col-md-3">
							<label>Extension</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Extension" />
						</div>
						<div class="form-group col-md-3">
							<label>Celular</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Celular" />
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

 <div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"> Detalle de Registro</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="form-group col-md-3">
						<label>ID Cliente</label>
						<input type="text" name="matricula" id="matricula" class="form-control" placeholder="00001243" readonly value="00001243"/>
					</div>
					<div class="form-group col-md-3">
						<label>Status</label>
						<div><span class="label label-success">Activo</span></div><br />
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						<label>Creado por:</label>
						<input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="nombre" value="Alicia Osuna"/> 
					</div>
					<div class="form-group col-md-3">
						<label>Fecha:</label>
						<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Fecha" value="13-08-2020"/>
					</div>
					<div class="form-group col-md-3">
						<label>Editado por:</label>
						<input type="text" name="correo" id="correo" class="form-control" placeholder="Nombre" value="Javier Solis"/> 
					</div> 
					<div class="form-group col-md-3">
						<label>Fecha:</label>
						<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Fecha" value="13-08-2020"/>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> Cerrar</span></button>   
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel"> Datos Cliente Intermedio</h3>
			</div>
				<form id="yui11011002" name="yui11011002" novalidate method="POST">
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-3">
							<label>ID Cliente</label>
							<input type="text" name="matricula" id="matricula" class="form-control" placeholder="00001243" readonly value="00001243"/>
						</div>
						<div class="form-group col-md-3">
							<label>Status</label>
							<div><span class="label label-success">Activo</span></div><br />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label>Laboratorio</label>
							<input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="Laboratorio" />
						</div>
						<div class="form-group col-md-3">
							<label>Nombre</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Nombre" />
						</div>
						<div class="form-group col-md-3">
							<label>Apellido Paterno</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Apellido Paterno" />
						</div>
						<div class="form-group col-md-3">
							<label>Apellido Materno</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Apellido Materno" />
						</div>
						<div class="form-group col-md-3">
							<label>Correo Electr&oacute;nico</label>
							<input type="text" name="correo" id="correo" class="form-control" placeholder="Correo Electr&oacute;nico" />
						</div>
						<div class="form-group col-md-3">
							<label>Direcci&oacute;n</label>
							<input type="text" name="correo" id="correo" class="form-control" placeholder="Direcci&oacute;n" />
						</div>
						<div class="form-group col-md-3">
							<label>Tel&eacute;fono Oficina</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Tel&eacute;fono Oficina" />
						</div>
						<div class="form-group col-md-3">
							<label>Extension</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Extension" />
						</div>
						<div class="form-group col-md-3">
							<label>Celular</label>
							<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Celular" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="guardarnuevo">Modificar</button>
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
            id="nuevoAlumno"><i class="fas fa-plus"></i> Agregar</button>
       <tbody>
       	<tr class="tab_td">
       		<th scope="row" class="tab_centrar">00001243</th>
       		<td class="tab_centrar">Matriz</td>
			<td class="tab_centrar">Juan Antonio Pacheco Pulido</td>
       		<td class="tab_centrar">kaleb29q_f351b@xedmi.com</td>
       		<td class="tab_centrar">Calle Metepec 50, Col. Cumbria, Cuautitlán Izcalli</td>
       		<td class="tab_centrar">55-5868-6664</td>
			<td class="tab_centrar"><a data-toggle="modal" data-target="#ModalDetalle" class="btn azul"><i class="fas fa-info"></i> Detalle</a></td>
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