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
    $stmt=$cnxPDO->prepare("SELECT * FROM {$tbl_clisl} WHERE IdCliente=:id;");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $result=$stmt->rowCount();
    $stmtsl=$cnxPDO->prepare("SELECT * FROM {$tbl_cli} WHERE IdCliente=:id;");
    $stmtsl->bindParam(":id", $id, PDO::PARAM_INT);
    $stmtsl->execute();
    $resul=$stmtsl->rowCount();
    if(($result>0)&&($resul>0)){
        $stdlcli=$cnxPDO->prepare("DELETE FROM {$tbl_clisl} WHERE IdCliente=:id;");
        $stdlcli->bindParam(':id', $id, PDO::PARAM_INT);
        $stdlcli->execute();
        $stdlclisl=$cnxPDO->prepare("DELETE FROM {$tbl_cli} WHERE IdCliente=:id;");
        $stdlclisl->bindParam(':id', $id, PDO::PARAM_INT);
        $stdlclisl->execute();
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
