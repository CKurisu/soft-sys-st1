<?php
try {
    include '../clss/htmsg.cls.php';
    require '../cnx/cnx.php';
    $html=new htmsg();
    $PDO= initCnx();
    $statement=$PDO->prepare("SELECT * FROM {$tbl_cli};");
    $statement->setFetchMode(PDO::FETCH_NUM);
    $statement->execute();
    $rowint=$statement->rowCount();
    if($rowint>0){
        while ($ret=$statement->fetch()){
        if($data[4]==1){
            $status='<span class="label label-success">Activo</span>';
        }else{
            $status='<span class="label label-danger">No Activo</span>';
        }
        $message='
                    <div class="table"><table class="table table-bordered">
                        <thead>
                            <tr class="tab_tr">
                            <th scope="col">Creado por</th>
                            <th scope="col">Creado por</th>
                                <th scope="col">Nombre de Cliente
                                <input type="text" name="filterin" id="filterin" class="form-control" placeholder="Buscar..." required/>
                                <button class="fil-list-src btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button></th>
                                <th scope="col">Creado por</th>
                                <th scope="col">Fecha de Creaci&oacute;n</th>                                
                                <th scope="col">Modificado por</th>
                                <th scope="col">Fecha de Modificaci&oacute;n</th>                                
                            </tr>
                        </thead>
                        <div class="form-group col-md-3" style="float:right;">
                            <label></label>
                            <button class="btn-dtl-u btn azul" data-id="'.$ret[0].'"><i class="fas fa-info"></i> Detalle de cliente</button>
                        </div>
                        <div class="form-group col-md-3" style="float:right;">
                            <label></label>
                            <button class="btn-dtls-u btn azul" data-id="'.$ret[0].'"><i class="fas fa-info"></i> Cliente SirLab</button>
                        </div>
                        <tbody>
                            <tr class="tab_td">
                                <td>'.$ret[0].'</td>
                                <td>'.$ret[0].'</td>
                                <td>'.$ret[0].'</td>
                                <td>'.$status.'</td>
                                <td>'.$ret[2].'</td>
                                <td>'.$ret[4].'</td>
                                <td>'.$ret[5].'</td>
                                <td>'. date('d-m-Y',strtotime($ret[6])).'</td>
                                <td>'.date('d-m-Y',strtotime($ret[8])).'</td>
                            </tr>
                        </tbody>
                    </table></div>';        
    }}else{$message=$html->info('No se encontraron datos');$fail=1;}
    
} catch (Exception $e) {
    $message=$html->dangerEx();$fail=1;
}
closeCnxP($cnxPDO);