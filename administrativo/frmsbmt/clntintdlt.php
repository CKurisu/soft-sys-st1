<?php
$message="";
$fail=0;
if(!isset($_POST['v'])&&empty($_POST['v']))
   {
        echo "Existen campos vacios.";
	return false;
   }
try {
    include '../../clss/htmsg.cls.php';
    require '../../cnx/cnx.php';
    $html=new htmsg();
    $cnxPDO= initCnx();
    $id=$_POST['v'];
    $cnxPDO->beginTransaction();
    $stmt=$cnxPDO->prepare("SELECT * FROM {$tbl_cli} WHERE IdIntermediario=:id;");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $result=$stmt->rowCount();
    if(!($result)){
        $stclint=$cnxPDO->prepare("SELECT * FROM {$tbl_clinter} WHERE IdusuarioIntermediario=:id;");
        $stclint->bindParam(':id', $id, PDO::PARAM_INT);
        $stclint->execute();
        $resultst=$stclint->rowCount();
        if($resultst){
            $stdlcli=$cnxPDO->prepare("DELETE FROM {$tbl_clinter} WHERE IdusuarioIntermediario=:id;");
            $stdlcli->bindParam(':id', $id, PDO::PARAM_INT);
            $stdlcli->execute();
            $cnxPDO->commit();
            $message=$html->success('Eliminado con exito');$fail=0;
        }else{$message=$html->danger('El usuario no existe');$fail=1;}
    }else{$message=$html->info('El usuario esta activo en un registro, por favor elimine primero el registro para continuar');$fail=1;}
} catch (Exception $ex) {
    $cnxPDO->rollBack();
    $message=$html->dangerEx();
    $fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;
