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
        if($data[4]==1){
            $status='<span class="label label-success">Activo</span>';
        }else{
            $status='<span class="label label-danger">No Activo</span>';
        }
        $message='<label>Id Cliente</label> '.$data[0].'
                <label>Estatus</label> '.$status.'
                <div class="table">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="tab_tr">
                                <th scope="col" class="tab_centrar">Nombre Cliente</th>
                                <th scope="col" class="tab_centrar">Intermediario</th>
                                <th scope="col" class="tab_centrar">ID Cliente Pap&aacute;</th>
                                <th scope="col" class="tab_centrar">Estado</th>
                                <th scope="col" class="tab_centrar">Tipo Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>';        
    }else{$message=$html->info('No se encontraron datos');$fail=1;}
} catch (Exception $e) {
    $message=$html->dangerEx();$fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;