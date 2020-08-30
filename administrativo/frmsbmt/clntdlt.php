<?php
if(!isset($_POST['v'])&&empty($_POST['v']))
   {
        echo "Existen campos vacios.";
	return false;
   }
$message="";
$fail=0;
try {
    include '../../clss/htmsg.cls.php';
    require '../../cnx/cnx.php';
    $html=new htmsg();
    $cnxPDO= initCnx();
    $id=$_POST['v'];
    $cnxPDO->beginTransaction();
    $stmt=$cnxPDO->prepare("SELECT * FROM {$tbl_dtcli} WHERE IdCliente=:id;");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $result=$stmt->rowCount();
    $stmtdt=$cnxPDO->prepare("SELECT * FROM {$tbl_cli} WHERE IdCliente=:id;");
    $stmtdt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmtdt->execute();
    $resul=$stmtdt->rowCount();
    if(($result>0)&&($resul>0)){
        $stdlcli=$cnxPDO->prepare("DELETE FROM {$tbl_dtcli} WHERE IdCliente=:id;");
        $stdlcli->bindParam(':id', $id, PDO::PARAM_INT);
        $stdlcli->execute();
        $stdlclidt=$cnxPDO->prepare("DELETE FROM {$tbl_cli} WHERE IdCliente=:id;");
        $stdlclidt->bindParam(':id', $id, PDO::PARAM_INT);
        $stdlclidt->execute();
        $cnxPDO->commit();
        $message=$html->success('Eliminado con exito');$fail=0;
    }else{$message=$html->danger('El usuario no existe');$fail=1;}
} catch (Exception $ex) {
    $cnxPDO->rollBack();
    $message=$html->dangerEx();
    $fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;
