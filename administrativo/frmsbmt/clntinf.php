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
        $message='<div class="row"><div class="form-group col-md-3"><label>ID Cliente</label>
                <input type="text"class="form-control" readonly value="'.$data[0].'"/></div>
            <div class="form-group col-md-3"><label>Status</label>
                <div>'.$status.'</div><br /></div></div>
            <div class="row"><div class="form-group col-md-3"><label>Creado por:</label>
                <input type="text" class="form-control"readonly value="'.$data[5].'"/></div>
            <div class="form-group col-md-3"><label>Fecha:</ label>
                <input type="text" class="form-control" readonly value="'.$daterf.'"/></div>
            <div class="form-group col-md-3"><label>Editado por:</label>
                <input type="text" class="form-control" readonly value="'.$data[7].'"/></div> 
            <div class="form-group col-md-3"><label>Fecha:</label>
                <input type="text" class="form-control" readonly value="'.$dateef.'"/></div></div>';        
    }else{$message=$html->info('No se encontraron datos');$fail=1;}
} catch (Exception $e) {
    $message=$html->dangerEx();$fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;