<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
			</div>
			<form id="registerForm" name="formRegister" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<label>Matr&iaucte;cula</label>
						<input type="text" id="matricula" id="matricula" class="form-control" placeholder="Matr&iacute;cula" />
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" id="nombre" id="nombre" class="form-control" placeholder="Nombre" />
					</div>
					<div class="form-group">
						<label>Apellido Paterno</label>
						<input type="text" id="appaterno" id="appaterno" class="form-control" placeholder="Apellido Paterno" />
					</div>
					<div class="form-group">
						<label>Apellido Materno</label>
						<input type="text" id="apmaterno" id="apmaterno" class="form-control" placeholder="Apellido Materno" />
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" id="correo" id="correo" class="form-control" placeholder="Correo Electrónico" />
					</div> 
					<div class="form-group">
						<label>Semestre</label>
						<input type="text" id="semestre" id="semestre" class="form-control" placeholder="Semestre" />
					</div>
					<div class="form-group">
						<label>Beca</label>
						<input type="text" id="beca" id="beca" class="form-control" placeholder="Beca" />%
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="guardarnuevo">Dar de Alta</button>        
				</div>
			</form>
		</div>
	</div>
</div>