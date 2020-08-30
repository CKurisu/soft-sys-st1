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
    empty($_POST['x16'])||
    empty($_POST['x17']))
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
    $code=$_POST['x17'];
    $add=$str.' No.'.$numex.' '.$numin.' '.$col.' '.$cp.' '.$loc.' '.$cd.' '.$edo;
    $dt= date('Y-m-d');
    $statement=$cnxPDO->prepare("SELECT * FROM {$tbl_cli} INNER JOIN {$tbl_dtcli} ON {$tbl_dtcli}.IdCliente=:id LIMIT 1;");
    $statement->bindParam(':id', $code, PDO::PARAM_INT);
    $statement->execute();
    $resultset=$statement->rowCount();
    $cnxPDO->beginTransaction();
    if($resultset){
        $stcli=$cnxPDO->prepare("SELECT * FROM {$tbl_cli} WHERE CliLab=:lab OR RznScl=:rzn LIMIT 1;");
        $stcli->bindParam(':lab', $lab, PDO::PARAM_STR);
        $stcli->bindParam(':rzn', $rznscl, PDO::PARAM_STR);
        $stcli->execute();
        $rowcli=$stcli->rowCount();
        $stdtcli=$cnxPDO->prepare("SELECT * FROM {$tbl_clisl} WHERE RFC=:rfc AND Calle=:str AND NumExt=:numex AND NumInt=:numin AND Col=:col OR CP=:cp OR Loc=:loc LIMIT 1;");
        $stdtcli->bindParam(':rfc', $rfc, pdo::PARAM_STR);
        $stdtcli->bindParam(':str', $str, pdo::PARAM_STR);
        $stdtcli->bindParam(':numex', $numex, pdo::PARAM_STR);
        $stdtcli->bindParam(':numin', $numin, pdo::PARAM_STR);
        $stdtcli->bindParam(':col', $col, pdo::PARAM_STR);
        $stdtcli->bindParam(':cp', $cp, pdo::PARAM_STR);
        $stdtcli->bindParam(':loc', $loc, pdo::PARAM_STR);
        $stdtcli->execute();
        $rowdtcli=$stdtcli->rowCount();
        if((!($rowcli))&&(!($rowdtcli))){
            $trclirg=$cnxPDO->prepare("UPDATE {$tbl_cli} SET CliLab=:lab,RznScl=:rzn,IdInt=:idint,CliNomMod=:usr,CliDateMod=:dt WHERE IdCliente=:id;");
            $trclirg->bindParam(':lab', $lab, PDO::PARAM_STR);
            $trclirg->bindParam(':rzn', $rznscl, PDO::PARAM_STR);
            $trclirg->bindParam(':idint', $idint, PDO::PARAM_INT);
            $trclirg->bindParam(':usr', $nomusr, PDO::PARAM_STR);
            $trclirg->bindParam(':dt', $dt, PDO::PARAM_STR);
            $trclirg->bindParam(':id', $code, PDO::PARAM_INT);
            $trclirg->execute();
            $trdtclirg=$cnxPDO->prepare("UPDATE {$tbl_dtcli} SET RFC=:rfc,AddInf=:add,Calle=:str,NumExt=:numex,NumInt=:numin,Col=:col,CP=:cp,Loc=:loc,Mun=:mun,Cd=:cd,Edo=:edo WHERE IdCliente=:id;");
            $trdtclirg->bindParam(':rfc', $rfc, PDO::PARAM_STR);
            $trdtclirg->bindParam(':add', $add, PDO::PARAM_STR);
            $trdtclirg->bindParam(':str', $str, PDO::PARAM_STR);
            $trdtclirg->bindParam(':numex', $numex, PDO::PARAM_STR);
            $trdtclirg->bindParam(':numin', $numin, PDO::PARAM_STR);
            $trdtclirg->bindParam(':col', $col, PDO::PARAM_STR);
            $trdtclirg->bindParam(':cp', $cp, PDO::PARAM_INT);
            $trdtclirg->bindParam(':loc', $loc, PDO::PARAM_STR);
            $trdtclirg->bindParam(':mun', $mun, PDO::PARAM_STR);
            $trdtclirg->bindParam(':cd', $cd, PDO::PARAM_STR);
            $trdtclirg->bindParam(':edo', $edo, PDO::PARAM_STR);
            $trdtclirg->bindParam(':id', $code, PDO::PARAM_INT);
            $trdtclirg->execute();
            $cnxPDO->commit();
            $message=$html->success('Datos actualizados correctamente');$fail=0;
        }else{$message=$html->info('Datos registrados previamente');$fail=1;}
    }else{$message=$html->info('Informacion incorrecta');$fail=1;}
} catch (Exception $e) {
    $cnxPDO->rollBack();
    $message=$html->danger($e->getMessage());$fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;

   