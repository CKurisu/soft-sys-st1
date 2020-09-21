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
    $statement=$cnxPDO->prepare("SELECT * FROM {$tbl_cli} INNER JOIN {$tbl_dtcli} ON {$tbl_cli}.idCliente={$tbl_dtcli}.idCliente WHERE {$tbl_cli}.idCliente=:id LIMIT 1;");
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
        $message='<div class="table">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="tab_tr">
                                <th scope="col" class="tab_centrar">RFC</th>
                                <th scope="col" class="tab_centrar">Calle</th>
                                <th scope="col" class="tab_centrar">Numero Exterior</th>
                                <th scope="col" class="tab_centrar">Numero Interior</th>
                                <th scope="col" class="tab_centrar">Colonia</th>
                                <th scope="col" class="tab_centrar">C.P.</th>
                                <th scope="col" class="tab_centrar">Localidad</th>
                                <th scope="col" class="tab_centrar">Municipio</th>
                                <th scope="col" class="tab_centrar">Cuidad</th>
                                <th scope="col" class="tab_centrar">Estado</th>
                                <th scope="col" class="tab_centrar">Status</th>
                                <th scope="col" class="tab_centrar">Direccion</th>
                                <th scope="col" class="tab_centrar">Puntos de Muestreo</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>';        
    }else{$message=$html->info('No se encontraron datos');$fail=1;}
} catch (Exception $e) {
    $message=$html->dangerEx();$fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;