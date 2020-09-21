<?php
session_start();
include '../clss/htmsg.cls.php';
require '../cnx/cnx.php';
$html=new htmsg();
$connectionPDO= initCnx();
$id = $_SESSION['usuario'];
$idusr=$connectionPDO->prepare("SELECT nombre FROM usuarios WHERE id_usuario=:id LIMIT 1;");
$idusr->bindParam(':id', $id, PDO::PARAM_INT);
$idusr->execute();
$rowu=$idusr->rowCount();
if($rowu>0){
    $nom =$idusr->fetchColumn();
}
?>

<!DOCTYPE html>
<html lang="es">
    <!-----					COMIENZA DECLARACI�N DE CLASES, JS Y CSS					----->
    <head>
        <?php
            include("../head_menu_css.php");
            include("../head_gen.php");
        ?>
        <link rel="stylesheet" href="../css/estilo_administrativo.css" type="text/css" media="screen" />
    </head>
    <!-----					COMIENZA EL CUERPO DEL SISTEMA					----->
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!----------     AQUI COMIENZA EL HEADER     ---------->
            <header class="main-header">
                    <?php	include("../header.php");	?>
            </header>
            <!----------     AQUI TERMINA EL HEADER
            ********************************************************
            AQUI COMIENZA EL MENU     ---------->
            <?php	include("../menu.php");	?>
            <!----------     AQUI TERMINA EL MENU
            ********************************************************
            AQUI COMIENZA LA P�GINA     ---------->
            <div class="content-wrapper">
                <!----------     TITULO     ---------->
                <section class="content-header">
                    <center class="titulo">
                        Lista de Intermediarios
                    </center>
                </section>
                <!----------     TITULO     ---------->
                    <?php require './int/intlist.php';	?>
			</div>
			
			<!----------     AQUI TERMINA LA P�GINA
			********************************************************
			AQUI COMIENZA LA PIECERA     ---------->
			
			<footer class="main-footer">

			</footer>
			
			<!----------     AQUI TERMINA LA PIECERA     ---------->
		</div>
                <?php require './int/frmreg.php';?>
                <?php require'./int/intdtl.php';?>
                <?php require'./int/intstgs.php'?>
                <?php require'./int/intdlt.php'?>
        
		<?php	include("../head_menu_js.php");	?>
	</body>
        <?php closeCnxP($connectionPDO);?>
	<!-----					TERMINA EL SISTEMA					----->
</html>
