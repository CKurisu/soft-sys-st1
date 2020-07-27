<div class="modal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<center><h4 class="modal-title" id="myModalLabel">Modifica datos del Alumno</h4><center>
			</div>
			<form id="registerForm" name="formRegister" novalidate>
				<?php
					$query_alu = "SELECT * FROM alumnos WHERE id_alumno=1";
					$consulta_alu = $sag->query($query_alu);
					$rs_alu = $consulta_alu->fetch_assoc();
				?>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" id="matricula" id="matricula" class="form-control" placeholder="Matr&iacute;cula" value="<?php	echo $rs_alu["matricula"];	?>" />
					</div>
					<div class="form-group">
						<input type="text" id="nombre" id="nombre" class="form-control" placeholder="Nombre" value="<?php	echo $rs_alu["nombre"];	?>" />
					</div>
					<div class="form-group">
						<input type="text"id="appaterno" id="appaterno" class="form-control" placeholder="Apellido Paterno" value="<?php	echo $rs_alu["appaterno"];	?>" />
					</div>
					<div class="form-group">
						<input type="text"id="apmaterno" id="apmaterno" class="form-control" placeholder="Apellido Materno" value="<?php	echo $rs_alu["apmaterno"];	?>" />
					</div>
					<div class="form-group">
						<input type="text" id="correo" id="correo" class="form-control" placeholder="Correo Electr&oacute;nico" value="<?php	echo $rs_alu["correo"];	?>" />
					</div> 
					<div class="form-group">
						<input type="number" id="semestre" id="semestre" class="form-control" placeholder="Semestre" value="<?php	echo $rs_alu["semestre"];	?>" />
					</div>
					<div class="form-group">
						<input type="number" id="beca" id="beca" class="form-control" placeholder="Beca" value="<?php	echo $rs_alu["beca"];	?>" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="guardarnuevo">Dar de Alta</button>        
				</div>
			</form>
		</div>
	</div>
</div>