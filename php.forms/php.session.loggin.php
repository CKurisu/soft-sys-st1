<?php
// check if fields passed are empty
if(empty($_POST['username'])    ||
   empty($_POST['password'])    )
   {
	echo "No arguments Provided!";
        return false;
   }
   $message='';$redirect='';$fail=0;
try{
    session_start();
    require '../cnx/cnx.php';
    require '../clss/htmsg.cls.php';
    require '../clss/mysql.fun.clas.php';
    $html=new htmsg();
    $PDO= initCnx();
    $mysql=new mysqlfunctions();
    $username= $_POST['username'];
    $pass= $_POST['password'];
    $password=$mysql->hashpasswordsha1($pass);
    $user_type="";$name_of_user="";$name_user="";$user_type_name="";
    //$PDO->beginTransaction();   
    $statement=$PDO->prepare("SELECT idUsuario FROM {$tbl_user} WHERE NmUs=:us AND ClvUs=:pw AND st=1 AND UsVal!=1 LIMIT 1;");    
    $statement->bindParam(":us", $username, PDO::PARAM_STR);
    $statement->bindParam(":pw", $password, PDO::PARAM_STR);
    $statement->execute();
    $validate=$statement->rowCount();
    if($validate){
        $redirect='';
        $message=$html->info("Aun no activa su cuenta?. Reenvie el email de activacion. <br /><a href='#resendemailval' data-toggle='tab' class='btn' class='alert-link'><button class='btn btn-info'><strong>Volver a enviar email<strong></button></a>");
        $failure=1; 
    }
    $stmt=$PDO->prepare("SELECT idUsuario,TpUs,NomUs,AppUs,ApmUs FROM {$tbl_user} WHERE NmUs=:us AND ClvUs=:pw AND st=1 LIMIT 1;");
    $stmt->bindParam(":us", $username, PDO::PARAM_STR);
    $stmt->bindParam(":pw", $password, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->rowCount();
    $datares=$stmt->fetch(PDO::FETCH_NUM);
    if($result && !$validate){
        $stmtrol=$PDO->prepare("SELECT UsTpNm FROM {$tbl_tpus}  WHERE idUsTp=:idtp LIMIT 1;");
        $stmtrol->bindParam(":idtp", $datares[1], PDO::PARAM_INT);
        $stmtrol->execute();
        $roltype=$stmtrol->fetchColumn();
        $user_type=$datares[1];
        $name_of_user=$datares[2]." ".$datares[3]." ".$datares[4];
        $name_user=$username;
        $user_type_name=$roltype;
        $userId=$datares[0];
        $_SESSION["idus"]=$userId;
        $_SESSION["tpnm"]=$user_type_name;
        $_SESSION["tpus"]=$user_type;
        $_SESSION["nomus"]= utf8_encode($name_of_user);    
        $_SESSION["nmus"]= utf8_encode($name_user);
        
        if($pass==$mysql->hashpasswordsha1('1234'))
        {
                $redirect= "admin/modclave.php?tp=0";
        }
        else if($user_type==3)		//DIRECTORES
        {
                $redirect= "directores/index.php?tp=0";
        }
        else if($user_type==2)		//CONTABILIDAD
        {
                $redirect= "contabilidad/index.php?tp=0";
        }
        else if($user_type==1)		//SECRETAR�AS
        {
                $redirect= "administrativo/index.php";
        }
        
        //$connectionPDO->commit();
        //$redirect=URL_SITE;
        $message='';
        $failure=0;
    }
    if(!$result){
        $redirect='';
        $message=$html->danger("Usuario y/o contraseña incorrectos");
        $failure=1;
    }
    closeCnxP($PDO);
} catch (Exception $ex) {
    //$connectionPDO->rollBack();
    $redirect='';
    //$message=$html->dangerEx();
    $message=$html->danger($ex->getMessage());
    $failure=1;
}
$returnArray=array("message"=>$message, "redirect" => $redirect, "fail" => $failure);
echo json_encode($returnArray);
return true;