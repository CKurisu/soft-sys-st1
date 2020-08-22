<?php
session_start();
if(empty($_POST['x1'])  ||
    empty($_POST['x2']) ||
    empty($_POST['x3']) ||
    empty($_POST['x4']) ||
    empty($_POST['x5']) ||
    empty($_POST['x6']) ||
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
    $nomcli=$_POST['x2'];
    $idint=$_POST['x3'];
    $nom=$_POST['x4'];
    $app=$_POST['x5'];
    $apm=$_POST['x6'];
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
    $statement=$cnxPDO->prepare("SELECT * FROM {$tbl_cli} INNER JOIN {$tbl_clisl} ON {$tbl_clisl}.IdCliente=:id LIMIT 1;");
    $statement->bindParam(':id', $code, PDO::PARAM_INT);
    $statement->execute();
    $resultset=$statement->rowCount();
    $cnxPDO->beginTransaction();
    if($resultset){
        $trclirg=$cnxPDO->prepare("UPDATE {$tbl_cli} SET CliLab=:lab,`CliNomEm`=:nomcli,`CliNom`=:nom,`CliApp`=:app,`CliApm`=:apm,`IdInt`=:idint,`CliNomMod`=:usr,`CliDateMod`=:dt WHERE IdCliente=:id;");
        $trclirg->bindParam(':lab', $lab, PDO::PARAM_STR);
        $trclirg->bindParam(':nomcli', $nomcli, PDO::PARAM_STR);
        $trclirg->bindParam(':nom', $nom, PDO::PARAM_STR);
        $trclirg->bindParam(':app', $app, PDO::PARAM_STR);
        $trclirg->bindParam(':apm', $apm, PDO::PARAM_STR);
        $trclirg->bindParam(':idint', $idint, PDO::PARAM_INT);
        $trclirg->bindParam(':usr', $nomusr, PDO::PARAM_STR);
        $trclirg->bindParam(':dt', $dt, PDO::PARAM_STR);
        $trclirg->bindParam(':id', $code, PDO::PARAM_INT);
        $trclirg->execute();
        $trclislrg=$cnxPDO->prepare("UPDATE {$tbl_clisl} SET `RFC`=:rfc,`AddInf`=:add,`Calle`=:str,`NumExt`=:numex,`NumInt`=:numin,`Col`=:col,`CP`=:cp,`Loc`=:loc,`Mun`=:mun,`Cd`=:cd,`Edo`=:edo WHERE IdCliente=:id;");
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
        $trclislrg->bindParam(':id', $code, PDO::PARAM_INT);
        $trclislrg->execute();
        $cnxPDO->commit();
        $message=$html->success('Datos actualizados correctamente');$fail=0;
    }else{$message=$html->info('Informacion incorrecta');$fail=1;}
} catch (Exception $e) {
    $cnxPDO->rollBack();
    $message=$html->dangerEx();$fail=1;
}
closeCnxP($cnxPDO);
$returnArray=array("message"=>$message, "fail" => $fail);
echo json_encode($returnArray);
return true;

   