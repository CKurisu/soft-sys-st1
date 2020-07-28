 <div class="modal fade" id="Nuevomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agregar nuevo empelado</h4>
			</div>
			<div class="modal-body">
				<form id="registerForm" name="formRegister" novalidate action="insert.php" method="POST">
				<div class="form-group col-sm-4">
					<label>Apellido Paterno</label>
					<input type="text" name="matricula" id="matricula" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-4">
					<label>Apellido Materno</label>
					<input type="text" name="nombre" id="nombre" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-4">
					<label>Nombre(s)</label>
					<input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-4">
					<label>Puesto</label>
					<input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-4">
					<label>Departamento</label>
					<input type="text" name="correo" id="correo" class="form-control" placeholder="" />
				</div> 
				<div class="form-group col-sm-4">
					<label>Estado</label><div><span class="label label-success">Activo</span></div><br />
				</div>
				<div class="form-group col-sm-4">
					<label>RFC</label>
					<input type="text" name="beca" id="beca" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-4">
					<label>CURP</label>
					<input type="text" name="beca" id="beca" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-4">
					<label>IMSS</label>
					<input type="text" name="beca" id="beca" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-4">
					<label>Direccion</label>
					<textarea type="text" name="beca" id="beca" class="form-control" placeholder="" /></textarea>
				</div>
				<div class="form-group col-sm-4">
					<label>Tel&eacute;fono</label>
					<input type="text" name="beca" id="beca" class="form-control" placeholder="" />
				</div>
				<div class="form-group col-sm-4">
					<label>Correo Electr&oacute;nico</label>
					<input type="text" name="beca" id="beca" class="form-control" placeholder="" />
				</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3"><button class="btn btn-block" type="submit" style="font-size: 1.5em;">Registrar</button></div>        
			</div>
		</div>
	</div>
</div>

<table class="table table-bordered table-hover">
	<thead>
		<tr class="tab_tr">
			<th scope="col" class="tab_centrar">ID Empleado</th>
			<th scope="col" class="tab_centrar">Activo</th>
			<th scope="col" class="tab_centrar">Apellido Paterno</th>
			<th scope="col" class="tab_centrar">Apellido Materno</th>
			<th scope="col" class="tab_centrar">Nombre(s)</th>
			<th scope="col" class="tab_centrar">RFC</th>
			<th scope="col" class="tab_centrar">CURP</th>
			<th scope="col" class="tab_centrar">IMSS</th>
			<th scope="col" class="tab_centrar">Departamento</th>
			<th scope="col" class="tab_centrar">Puesto</th>
			<th scope="col" class="tab_centrar">Direcci&oacute;n</th>
			<th scope="col" class="tab_centrar">Tel&eacute;fono</th>
			<th scope="col" class="tab_centrar" colspan="3">&nbsp;</th>
		</tr>
	</thead>
	 <button class="btn btn-primary btn-tbl" data-toggle="modal" data-target="#Nuevomodal"
            id="nuevoAlumno"><i class="fas fa-user-plus"></i></button>
       <tbody>
       	<tr class="tab_td">
       		<th scope="row" class="tab_centrar"></th>
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
			<td class="tab_centrar"><a data-toggle="modal" data-target="#ModalModificar" class="btn cafe"><i class="fas fa-user-edit"></i></a></td>
			<td class="tab_centrar"><a href="#" class="btn rojo"><i class="fas fa-user-times"></i></a></td>
       	</tr>
       	<tr class="tab_td">
       		<th scope="row" class="tab_centrar"></th>
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
			<td class="tab_centrar"><a data-toggle="modal" data-target="#ModalModificar" class="btn cafe"><i class="fas fa-user-edit"></i></a></td>
			<td class="tab_centrar"><a href="#" class="btn rojo"><i class="fas fa-user-times"></i></a></td>
       	</tr>
       	<tr class="tab_td">
       		<th scope="row" class="tab_centrar"></th>
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
			<td class="tab_centrar"><a data-toggle="modal" data-target="#ModalModificar" class="btn cafe"><i class="fas fa-user-edit"></i></a></td>
			<td class="tab_centrar"><a href="#" class="btn rojo"><i class="fas fa-user-times"></i></a></td>
       	</tr>
		<!-- <?php
			$x=0;
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
			include("alu_modificar.php");
		?> -->
	</tbody>
</table>