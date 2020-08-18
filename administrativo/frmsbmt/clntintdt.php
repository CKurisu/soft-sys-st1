<?php
session_start();
/* 
 *  Develop Site
 *  Developed with Bootstrap.
 * 
 *  @version     v1.0.1, built on 2020-08-17 10:34:36 PM
 *  @author      SoftSystem, LTD.
 *  @copyright   (c) 2013 - SoftSystem, LTD. All rights reserved.
 *  @license     Licensed under the MIT license
 *               Commercial: http://creativecommons.org/license/
 *               Non-commercial: http://creativecommons.org/licenses/by-nc-nd/3.0/
 */
if(empty($_POST['x1'])  ||
    empty($_POST['x2']) ||
    empty($_POST['x3']) ||
    empty($_POST['x4']) ||
    empty($_POST['x6']) ||
    empty($_POST['x7']) ||
    empty($_POST['x8']) ||
    empty($_POST['x9']) ||
    empty($_POST['x10']) ||
   !filter_var($_POST['x5'],FILTER_VALIDATE_EMAIL))
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
    $lab=$_POST['x1']; $nom=$_POST['x2']; $app=$_POST['x3']; $apm=$_POST['x4']; $mail=$_POST['x5']; $add=$_POST['x6']; $tel=$_POST['x7']; $ext=$_POST['x8']; $cel=$_POST['x9']; $code=$_POST['x10'];$dt= date('Y-m-d');
    $statement=$cnxPDO->prepare("SELECT * FROM {$tbl_clinter} WHERE IdusuarioIntermediario=:id LIMIT 1;");
    $statement->bindParam(':id', $code, PDO::PARAM_INT);
    $statement->execute();
    $row=$statement->rowCount();
    $cnxPDO->beginTransaction();
    if($row){
        $trcli=$cnxPDO->prepare("UPDATE {$tbl_clinter} SET Laboratorio=:lab,Nombres=:nom,ApPaterno=:app,ApMaterno=:apm,Correo=:mail,Direccion=:add,Telof=:tel,Extension=:ext,Celular=:cel,NomEdit=:usr,FechaEdit=:dt WHERE IdusuarioIntermediario=:id");
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
        $trcli->bindParam(':id', $code, PDO::PARAM_INT);
        $trcli->execute();
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

   