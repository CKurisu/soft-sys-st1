<div class="modal fade" id="Nuevomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel"> Datos Cliente Intermedio</h3>
            </div>
            <form id="yui11011001" name="yui11011001" novalidate>
                <div class="modal-body">
                    <div id="messagefrmrg"></div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>ID Cliente</label>
                            <input type="number" class="form-control" placeholder="00001243" readonly/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Status</label>
                            <div><span class="label label-success">Activo</span></div><br />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Laboratorio</label>
                            <select class="form-control" name="lab">
                                <option value="">(Seleccione)</option>
                                <option value="matriz">Matriz</option>
                                <option value="sucursal">Sucursal</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Nombre</label>
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="Nombre" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Apellido Paterno</label>
                            <input type="text" name="app" id="app" class="form-control" placeholder="Apellido Paterno" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Apellido Materno</label>
                            <input type="text" name="apm" id="apm" class="form-control" placeholder="Apellido Materno" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Correo Electr&oacute;nico</label>
                            <input type="email" name="mail" id="mail" class="form-control" placeholder="Correo Electr&oacute;nico" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Direcci&oacute;n</label>
                            <input type="text" name="add" id="add" class="form-control" placeholder="Direcci&oacute;n" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tel&eacute;fono Oficina</label>
                            <input type="number" name="telo" id="telo" class="form-control" placeholder="Tel&eacute;fono Oficina" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Extension</label>
                            <input type="number" name="ext" id="ext" class="form-control" placeholder="Extension" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Celular</label>
                            <input type="number" name="cel" id="cel" class="form-control" placeholder="Celular" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
<!--                                    <button type="submit" class="btn btn-primary" id="guardarnuevo">Modificar</button>
                    <button type="submit" class="btn btn-warning" id="guardarnuevo">Eliminar</button>-->
                </div>
            </form>
        </div>
    </div>
</div>