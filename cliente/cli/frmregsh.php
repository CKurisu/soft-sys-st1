<div class="modal fade" id="ModalNuevoSh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">  Registrar Sucursal</h3>
            </div>
            <form id="yui11022021" name="yui11022021" novalidate>
                <div class="modal-body">
                    <div id="messagefrmrgclish"></div>
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
                                <option value="sucursal" selected>Sucursal</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Raz&oacute;n Social</label>
                            <input type="text" name="rznscl" id="rznscl" class="form-control" placeholder="Raz&oacute;n Social" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Cliente Intermediario</label>
                            <select class="form-control" name="idint">
                                <option value="">(Seleccione)</option>
                                <?php
                                $stint=$connectionPDO->prepare("SELECT * FROM {$tbl_clinter};");
                                $stint->setFetchMode(PDO::FETCH_NUM);
                                $stint->execute();
                                while ($ret=$stint->fetch()){
                                echo '<option value="'.$ret[0].'">'.$ret[2].' '.$ret[3].' '.$ret[4].'</option>';}
                                unset($stint);
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>RFC</label>
                            <input type="text" name="rfc" id="rfc" class="form-control" placeholder="RFC" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Calle</label>
                            <input type="text" name="str" id="str" class="form-control" placeholder="Calle" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Numero Exterior</label>
                            <input type="number" name="numex" id="numex" class="form-control" placeholder="Numero Exterior" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Numero Interior</label>
                            <input type="number" name="numin" id="numin" class="form-control" placeholder="Numero Interior" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Colonia</label>
                            <input type="text" name="col" id="col" class="form-control" placeholder="Colonia" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>C.P.</label>
                            <input type="number" name="cp" id="cp" class="form-control" placeholder="C.P." />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Localidad</label>
                            <input type="text" name="loc" id="loc" class="form-control" placeholder="Localidad" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Municipio</label>
                            <input type="text" name="mun" id="mun" class="form-control" placeholder="Municipio" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Cuidad</label>
                            <input type="text" name="cd" id="cd" class="form-control" placeholder="Cuidad" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Estado</label>
                            <input type="text" name="edo" id="edo" class="form-control" placeholder="Estado" />
                        </div>
                        <button data-toggle="modal" data-target="#ModalNuevoSn" class="btn-new-sucn btn azul"><i class="fas fa-plus"></i> Registrar Sucursal</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
<!--                        <button type="submit" class="btn btn-primary" id="guardarnuevo">Modificar</button>
                    <button type="submit" class="btn btn-warning" id="guardarnuevo">Eliminar</button>-->
                </div>
            </form>
        </div>
    </div>
</div>