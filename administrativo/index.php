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
                                        Lista de Usuarios
                                    </center>
                            </section>

                            <!----------     TITULO     ---------->
                            <section class="content">
                                <table class="table table-bordered table-hover" id="t-usr">
                                    <thead>
                                        <tr class="tab_tr">
                                            <th scope="col" class="tab_centrar">ID Usuario</th>
                                            <th scope="col" class="tab_centrar">Nombre</th>
                                            <th scope="col" class="tab_centrar">Area</th>
                                            <th scope="col" class="tab_centrar">Tipo de Usuario</th>
                                            <th scope="col" class="tab_centrar" colspan="3">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <div class="col-md-3 col-sm-3 col-lg-3 form-search">
                                        <i class="fas fa-calendar"></i> Busqueda Periodo
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="form-control" name="start" id="start" placeholder="Fecha Inicio"/>
                                            <span class="input-group-addon">a</span>
                                            <input type="text" class="form-control" name="end" id="end" placeholder="Fecha Fin"/>
                                        </div>
                                        <button class="btn-tblusr-fild btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-lg-3 form-search">
                                        <i class="fas fa-search"></i> Busqueda Avanzada 
                                        <input type="text" name="filter" id="filter" class="form-control" placeholder="Buscar...">
                                        <button class="fil-list-src-usr btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button>
                                    </div>
                                    <button class="btn btn-primary btn-tbl" data-toggle="modal" data-target="#ModalNuevo" id="nuevoAlumno"><i class="fas fa-plus"></i> Agregar</button>
                                    <tbody>
                                        <?php
                                            try {
                                            $statement=$connectionPDO->prepare("SELECT * FROM {$tbl_user};");
                                            $statement->setFetchMode(PDO::FETCH_NUM);
                                            $statement->execute();
                                            $i=1;
                                            while ($ret=$statement->fetch()){
//                                                switch ($ret[1]){
//                                                    case 0:
//                                                    $status='<span class="label label-danger">No Activo</span>';
//                                                    break 1;
//                                                    case 1:
//                                                    $status='<span class="label label-success">Activo</span>';
//                                                    <td class="tab_centrar">'.$status.'</td>
//                                                    break 1;
//                                                }
                                            echo '<tr class="tab_td">
                                            <td class="tab_centrar">'.$ret[0].'</td>
                                            <td class="tab_centrar">'.$ret[2].'</td>
                                            <td class="tab_centrar">'.$ret[3].'</td>
                                            <td class="tab_centrar">'.$ret[4].'</td>
                                            <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalDetalle" class="btn-info-u btn azul" data-id="'.$ret[0].'"><i class="fas fa-info"></i> Detalle</button></td>
                                            <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalModificar" class="btn-sttng-u btn cafe"  data-id="'.$ret[0].'"><i class="fas fa-edit"></i> Modificar</a></td>
                                            <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalEliminar" class="btn-dlst1-u btn rojo" data-id="'.$ret[0].'"><i class="fas fa-times-circle"></i> Eliminar</a></td>
                                            </tr>';
                                            $i++;
                                            }} catch (Exception $ex) {
                                            echo $ex->getMessage();
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </section>
			</div>
			
			<!----------     AQUI TERMINA LA P�GINA
			********************************************************
			AQUI COMIENZA LA PIECERA     ---------->
			
			<footer class="main-footer">

			</footer>
			
			<!----------     AQUI TERMINA LA PIECERA     ---------->
		</div>
		<?php	include("../head_menu_js.php");	?>
	</body>
	<!-----					TERMINA EL SISTEMA					----->
</html>