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
    empty($_POST['x10'])||
    empty($_POST['x11'])||
    empty($_POST['x12'])||
    empty($_POST['x13'])||
    empty($_POST['x14'])||
    empty($_POST['x15']))
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
    $nom=$_POST['x2'];
    $app=$_POST['x3'];
    $apm=$_POST['x4'];
    $rfc=$_POST['x5'];
    $str=$_POST['x6'];
    $numex=$_POST['x7'];
    $numin=$_POST['x8'];
    $col=$_POST['x9'];
    $cp=$_POST['x10'];
    $loc=$_POST['x11'];
    $cd=$_POST['x12'];
    $edo=$_POST['x13'];
    $apm=$_POST['x14'];
    $apm=$_POST['x15'];
    $dt= date('Y-m-d');
    $statement=$cnxPDO->prepare("SELECT * FROM {$tbl_clinter} WHERE Laboratorio=:lab AND Nombres=:nom AND ApPaterno=:app AND ApMaterno=:apm AND Correo=:mail AND Direccion=:add OR Telof=:tel OR Extension=:ext OR Celular=:cel LIMIT 1;");
    $statement->bindParam(':lab', $lab, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':app', $app, PDO::PARAM_STR);
    $statement->bindParam(':apm', $apm, PDO::PARAM_STR);
    $statement->bindParam(':mail', $mail, PDO::PARAM_STR);
    $statement->bindParam(':add', $add, PDO::PARAM_STR);
    $statement->bindParam(':tel', $tel, PDO::PARAM_INT);
    $statement->bindParam(':ext', $ext, PDO::PARAM_INT);
    $statement->bindParam(':cel', $cel, PDO::PARAM_INT);
    $statement->execute();
    $row=$statement->rowCount();
    $cnxPDO->beginTransaction();
    if(!($row)){
        $trcli=$cnxPDO->prepare("INSERT INTO {$tbl_clinter} VALUES (NULL, :lab, :nom, :app, :apm, :mail, :add, :tel, :ext, :cel, 1, :usr, :dt, :usr, :dt);");
        $trcli->bindParam(':lab', $lab, PDO::PARAM_STR);
        $trcli->bindParam(':nom', $nom, PDO::PARAM_STR);
        $trcli->bindParam(':app', $app, PDO::PARAM_STR);
        $trcli->bindParam(':apm', $apm, PDO::PARAM_STR);
        $trcli->bindParam(':mail', $mail, PDO::PARAM_STR);
        $trcli->bindParam(':add', $add, PDO::PARAM_STR);
        $trcli->bindParam(':tel', $tel, PDO::PARAM_INT);
        $trcli->bindParam(':ext', $ext, PDO::PARAM_INT);
        $trcli->bindParam(':cel', $cel, PDO::PARAM_INT);
        $trcli->bindParam(':usr', $nomusr, PDO::PARAM_STR);
        $trcli->bindParam(':dt', $dt, PDO::PARAM_STR);
        $trcli->execute();
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

   