<?php
if(!isset($_POST['i'])||empty($_POST['i'])){
    echo "No Arguments Provider.";
    return false;
}
$message='';$fail=0;
try {
    include '../../clss/htmsg.cls.php';
    require '../../cnx/cnx.php';
    $html=new htmsg();
    $cnxPDO= initCnx();
    $id=$_POST['i'];
    $menu="";
    $statement=$cnxPDO->prepare("SELECT * FROM {$tbl_cli} INNER JOIN {$tbl_dtcli} ON {$tbl_dtcli}.IdCliente=:id LIMIT 1;");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $resultset=$statement->rowCount();
    if($resultset){
        $data=$statement->fetch(PDO::FETCH_NUM);
        $stint=$cnxPDO->prepare("SELECT * FROM {$tbl_clinter};");
        $stint->setFetchMode(PDO::FETCH_NUM);
        $stint->execute();
        while ($ret=$stint->fetch()){if($data[3]==$ret[0]){$selected=' selected';}else{$selected='';}
            $menu.='<option value="'.$ret[0].'"'.$selected.'>'.$ret[2].' '.$ret[3].' '.$ret[4].'.</option>';}
        if($data[4]==1){
            $status='<span class="label label-success">Activo</span>';
        }else{
            $status='<span class="label label-danger">No Activo</span>';
        }
        $message='<form id="yui11022002" name="yui11022002" novalidate>
                <div class="modal-body">
                    <div id="messagefrmdtcli"></div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>ID Cliente</label>
                            <input type="number" name="code" id="code" class="form-control" placeholder="00001243" value="'.$id.'" readonly/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Status</label>
                            <div>'.$status.'</div><br />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Laboratorio</label>
                            <input type="text" name="labe" id="labe" class="form-control" placeholder="Laboratorio" value="'.$data[1].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Raz&oacute;n Social</label>
                            <input type="text" name="rznscle" id="rznscle" class="form-control" placeholder="Raz&oacute;n Social" value="'.$data[2].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Cliente Intermediario</label>
                            <select class="form-control" name="idinte">
                                <option value="">(Seleccione)</option>
                                '.$menu.'
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>RFC</label>
                            <input type="text" name="rfce" id="rfce" class="form-control" placeholder="RFC" value="'.$data[11].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Calle</label>
                            <input type="text" name="stre" id="stre" class="form-control" placeholder="Calle" value="'.$data[13].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Numero Exterior</label>
                            <input type="number" name="numexe" id="numexe" class="form-control" placeholder="Numero Exterior" value="'.$data[14].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Numero Interior</label>
                            <input type="number" name="numine" id="numine" class="form-control" placeholder="Numero Interior" value="'.$data[15].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Colonia</label>
                            <input type="text" name="cole" id="cole" class="form-control" placeholder="Colonia" value="'.$data[16].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>C.P.</label>
                            <input type="number" name="cpe" id="cpe" class="form-control" placeholder="C.P." value="'.$data[17].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Localidad</label>
                            <input type="text" name="loce" id="loce" class="form-control" placeholder="Localidad" value="'.$data[18].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Municipio</label>
                            <input type="text" name="mune" id="mune" class="form-control" placeholder="Municipio" value="'.$data[19].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Cuidad</label>
                            <input type="text" name="cde" id="cde" class="form-control" placeholder="Cuidad" value="'.$data[20].'"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Estado</label>
                            <input type="text" name="edoe" id="edoe" class="form-control" placeholder="Estado" value="'.$data[21].'"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Modificar</button>
                </div></form>';        
    }else{$message=$html->info('No se encontraron datos');$fail=1;}
} catch (Exception $e) {
    $message=$html->dangerEx();$fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;