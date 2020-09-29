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
    $statement=$cnxPDO->prepare("SELECT * FROM {$tbl_cli} WHERE IdCliente=:id LIMIT 1;");
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $resultset=$statement->rowCount();
    if($resultset){
        $data=$statement->fetch(PDO::FETCH_NUM);
        $dater = strtotime($data[6]);
        $daterf = date('d-m-Y', $dater);
        $datee = strtotime($data[8]);
        $dateef = date('d-m-Y', $datee);
        if($data[4]==1){
            $status='<span class="label label-success">Activo</span>';
        }else{
            $status='<span class="label label-danger">No Activo</span>';
        }
        $message='<div class="col-md-3"><label>Id Cliente</label> '.$data[0].'
                    <label>Estatus</label> '.$status.'</div>
                    <div class="table"><table class="table table-bordered">
                        <thead>
                            <tr class="tab_tr">
                                <th scope="col" class="tab_centrar">Nombre de Cliente
                                <input type="text" name="filterin" id="filterin" class="form-control" placeholder="Buscar..." required/>
                                <button class="fil-list-src btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button></th>
                                <th scope="col" class="tab_centrar">Creado por</th>
                                <th scope="col" class="tab_centrar">Fecha de Creaci&oacute;n</th>                                
                                <th scope="col" class="tab_centrar">Modificado por</th>
                                <th scope="col" class="tab_centrar">Fecha de Modificaci&oacute;n</th>                                
                            </tr>
                        </thead>
                        <div class="form-group col-md-3" style="float:right;">
                            <label></label>
                            <button class="btn-dtl-u btn azul" data-id="'.$data[0].'"><i class="fas fa-info"></i> Detalle de cliente</button>
                        </div>
                        <div class="form-group col-md-3" style="float:right;">
                            <label></label>
                            <button class="btn-dtls-u btn azul" data-id="'.$data[0].'"><i class="fas fa-info"></i> Cliente SirLab</button>
                        </div>
                        <tbody>
                            <tr class="tab_td">
                                <td>'.$data[2].'</td>
                                <td>'.$data[5].'</td>
                                <td>'.$daterf.'</td>
                                <td>'.$data[7].'</td>
                                <td>'.$dateef.'</td>
                            </tr>
                        </tbody>
                    </table></div>';        
    }else{$message=$html->info('No se encontraron datos');$fail=1;}
} catch (Exception $e) {
    $message=$html->dangerEx();$fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;