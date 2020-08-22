<?php
session_start();
if(empty($_POST['x1'])  ||
    empty($_POST['x2']) ||
    empty($_POST['x3']) ||
    empty($_POST['x7']) ||
    empty($_POST['x8']) ||
    empty($_POST['x9']) ||
    empty($_POST['x11'])||
    empty($_POST['x12'])||
    empty($_POST['x14'])||
    empty($_POST['x15'])||
    empty($_POST['x16']))
   {
        echo "No Arguments Provider.";
	return false;
   }
$message='';$fail=0;
try {
    
    include '../../clss/htmsg.cls.php';
    require '../../cnx/cnx.php';
    $html=new htmsg();
    $cnxPDO= initCnx();
    $id = $_SESSION['usuario'];
    $idusr=$cnxPDO->prepare("SELECT nombre FROM usuarios WHERE id_usuario=:id LIMIT 1;");
    $idusr->bindParam(':id', $id, PDO::PARAM_INT);
    $idusr->execute();
    $rowu=$idusr->rowCount();
    if($rowu>0){
        $nomusr =$idusr->fetchColumn();
    }
    $lab=$_POST['x1'];
    $rznscl=$_POST['x2'];
    $idint=$_POST['x3'];
    $rfc=$_POST['x7'];
    $str=$_POST['x8'];
    $numex=$_POST['x9'];
    $numin=$_POST['x10'];
    $col=$_POST['x11'];
    $cp=$_POST['x12'];
    $loc=$_POST['x13'];
    $mun=$_POST['x14'];
    $cd=$_POST['x15'];
    $edo=$_POST['x16'];
    $add=$str.' No.'.$numex.' '.$numin.' '.$col.' '.$cp.' '.$loc.' '.$cd.' '.$edo;
    $dt= date('Y-m-d');
    $stcli=$cnxPDO->prepare("SELECT * FROM {$tbl_cli} WHERE CliLab=:lab OR RznScl=:rzn LIMIT 1;");
    $stcli->bindParam(':lab', $lab, PDO::PARAM_STR);
    $stcli->bindParam(':rzn', $rznscl, PDO::PARAM_STR);
    $stcli->execute();
    $rowcli=$stcli->rowCount();
    $stclisl=$cnxPDO->prepare("SELECT * FROM {$tbl_clisl} WHERE RFC=:rfc AND Calle=:str AND NumExt=:numex AND NumInt=:numin AND Col=:col OR CP=:cp OR Loc=:loc LIMIT 1;");
    $stclisl->bindParam(':rfc', $rfc, pdo::PARAM_STR);
    $stclisl->bindParam(':str', $str, pdo::PARAM_STR);
    $stclisl->bindParam(':numex', $numex, pdo::PARAM_STR);
    $stclisl->bindParam(':numin', $numin, pdo::PARAM_STR);
    $stclisl->bindParam(':col', $col, pdo::PARAM_STR);
    $stclisl->bindParam(':cp', $cp, pdo::PARAM_STR);
    $stclisl->bindParam(':loc', $loc, pdo::PARAM_STR);
    $stclisl->execute();
    $rowclisl=$stclisl->rowCount();
    $cnxPDO->beginTransaction();
    if((!($rowcli))&&(!($rowclisl))){
        $trclirg=$cnxPDO->prepare("INSERT INTO {$tbl_cli} VALUES (NULL,:lab,:rzn,:idint,1,:usr,:dt,:usr,:dt);");
        $trclirg->bindParam(':lab', $lab, PDO::PARAM_STR);
        $trclirg->bindParam(':rzn', $rznscl, PDO::PARAM_STR);
        $trclirg->bindParam(':idint', $idint, PDO::PARAM_INT);
        $trclirg->bindParam(':usr', $nomusr, PDO::PARAM_STR);
        $trclirg->bindParam(':dt', $dt, PDO::PARAM_STR);
        $trclirg->execute();
        $idcli=$cnxPDO->lastInsertId();
        $trclislrg=$cnxPDO->prepare("INSERT INTO {$tbl_clisl} VALUES (:idcli,:rfc,:add,:str,:numex,:numin,:col,:cp,:loc,:mun,:cd,:edo);");
        $trclislrg->bindParam(':idcli', $idcli, PDO::PARAM_INT);
        $trclislrg->bindParam(':rfc', $rfc, PDO::PARAM_STR);
        $trclislrg->bindParam(':add', $add, PDO::PARAM_STR);
        $trclislrg->bindParam(':str', $str, PDO::PARAM_STR);
        $trclislrg->bindParam(':numex', $numex, PDO::PARAM_STR);
        $trclislrg->bindParam(':numin', $numin, PDO::PARAM_STR);
        $trclislrg->bindParam(':col', $col, PDO::PARAM_STR);
        $trclislrg->bindParam(':cp', $cp, PDO::PARAM_INT);
        $trclislrg->bindParam(':loc', $loc, PDO::PARAM_STR);
        $trclislrg->bindParam(':mun', $mun, PDO::PARAM_STR);
        $trclislrg->bindParam(':cd', $cd, PDO::PARAM_STR);
        $trclislrg->bindParam(':edo', $edo, PDO::PARAM_STR);
        $trclislrg->execute();
        $cnxPDO->commit();
        $message=$html->success('Datos registrados exitosamente');$fail=0;
    }else{$message=$html->info('Datos registrados previamente');$fail=1;}
} catch (Exception $e) {
    $cnxPDO->rollBack();
    $message=$html->dangerEx();$fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;

   