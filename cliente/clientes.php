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
    </head>
    <!-----					COMIENZA EL CUERPO DEL SISTEMA					----->
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="modal fade" id="ModalDetalleree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> Detalle de Registro</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>ID Cliente</label>
                                <input type="text" name="matricula" id="matricula" class="form-control" placeholder="00001243" readonly value="00001243"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Status</label>
                                <div><span class="label label-success">Activo</span></div><br />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Creado por:</label>
                                <input type="text" name="appaterno" id="appaterno" class="form-control" placeholder="nombre" value="Alicia Osuna"/> 
                            </div>
                            <div class="form-group col-md-3">
                                <label>Fecha:</label>
                                <input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Fecha" value="13-08-2020"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Editado por:</label>
                                <input type="text" name="correo" id="correo" class="form-control" placeholder="Nombre" value="Javier Solis"/> 
                            </div> 
                            <div class="form-group col-md-3">
                                <label>Fecha:</label>
                                <input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Fecha" value="13-08-2020"/>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Fecha Inicio Validez:</label>
                                <input type="text" name="correo" id="correo" class="form-control" placeholder="Nombre" value="13-08-2020"/> 
                            </div> 
                            <div class="form-group col-md-3">
                                <label>Fecha Termino Validez:</label>
                                <input type="text" name="apmaterno" id="apmaterno" class="form-control" placeholder="Fecha" value="13-08-2020"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn azul" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> Cerrar</span></button>   
                    </div>
		</div>
            </div>
        </div>
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
            <div class="content-wrapper" id="tabledata">
                <!----------     TITULO     ---------->
                <section class="content-header">
                    <center class="titulo">
                        Lista de Clientes
                    </center>
                </section>
                <!----------     TITULO     ---------->
                <?php include './cli/clilist.php';?>
            </div>	
            <!----------     AQUI TERMINA LA P�GINA
            ********************************************************
            AQUI COMIENZA LA PIECERA     ---------->
            <footer class="main-footer">
            </footer>
            <!----------     AQUI TERMINA LA PIECERA     ---------->
        
        <?php include './cli/frmregm.php';?>
        <?php include './cli/frmregsh.php';?>
        <?php include './cli/frmregsn.php';?>
        <?php include './cli/cliinf.php';?>
        <?php include './cli/clistgs.php';?>
        <?php include './cli/clidlt.php';?>
        <?php include './cli/dtcli.php';?>
        <?php include './cli/dtslisl.php';?>
            </div>
        <?php	include("../head_menu_js.php");	?>
    </body>
    <?php closeCnxP($connectionPDO);?>
    <!-----					TERMINA EL SISTEMA					----->
</html>