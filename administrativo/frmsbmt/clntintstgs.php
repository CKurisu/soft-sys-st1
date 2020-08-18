<?php
/* 
 *  Develop Site
 *  Developed with Bootstrap.
 * 
 *  @version     v1.0.1, built on 2020-08-17 10:14:53 PM
 *  @author      SoftSystem, LTD.
 *  @copyright   (c) 2013 - SoftSystem, LTD. All rights reserved.
 *  @license     Licensed under the MIT license
 *               Commercial: http://creativecommons.org/license/
 *               Non-commercial: http://creativecommons.org/licenses/by-nc-nd/3.0/
 */
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
    $statement=$cnxPDO->prepare("SELECT * FROM {$tbl_clinter} WHERE IdusuarioIntermediario=:id LIMIT 1;");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $resultset=$statement->rowCount();
    if($resultset){
        $data=$statement->fetch(PDO::FETCH_NUM);
        if($data[10]==1){
            $status='<span class="label label-success">Activo</span>';
        }else{
            $status='<span class="label label-danger">No Activo</span>';
        }
        $message='<form id="yui11011002" name="yui11011002" novalidate>
        <div class="modal-body">
            <div id="messagefrmdt"></div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label>ID Cliente</label>
                    <input type="number" name="code" id="code" class="form-control" placeholder="00001243" value="'.$data[0].'" readonly/>
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
                    <label>Nombre</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nombre" value="'.$data[2].'"/>
                </div>
                <div class="form-group col-md-3">
                    <label>Apellido Paterno</label>
                    <input type="text" name="appe" id="appe" class="form-control" placeholder="Apellido Paterno" value="'.$data[3].'"/>
                </div>
                <div class="form-group col-md-3">
                    <label>Apellido Materno</label>
                    <input type="text" name="apme" id="apme" class="form-control" placeholder="Apellido Materno" value="'.$data[4].'"/>
                </div>
                <div class="form-group col-md-3">
                    <label>Correo Electr&oacute;nico</label>
                    <input type="email" name="maile" id="maile" class="form-control" placeholder="Correo Electr&oacute;nico" value="'.$data[5].'"/>
                </div>
                <div class="form-group col-md-3">
                    <label>Direcci&oacute;n</label>
                    <input type="text" name="adde" id="adde" class="form-control" placeholder="Direcci&oacute;n" value="'.$data[6].'"/>
                </div>
                <div class="form-group col-md-3">
                    <label>Tel&eacute;fono Oficina</label>
                    <input type="tel" name="teloe" id="teloe" class="form-control" placeholder="Tel&eacute;fono Oficina" value="'.$data[7].'"/>
                </div>
                <div class="form-group col-md-3">
                    <label>Extension</label>
                    <input type="number" name="exte" id="exte" class="form-control" placeholder="Extension" value="'.$data[8].'"/>
                </div>
                <div class="form-group col-md-3">
                    <label>Celular</label>
                    <input type="tel" name="cele" id="cele" class="form-control" placeholder="Celular" value="'.$data[9].'"/>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Modificar</button>
            <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> Cerrar</span></button>
        </div>
    </form>';        
    }else{$message=$html->info('No se encontraron datos');$fail=1;}
} catch (Exception $e) {
    $message=$html->dangerEx();$fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;