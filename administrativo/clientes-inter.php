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
            <?php	include("menu.php");	?>
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
                <section class="content">
                    <div class="table">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="tab_tr">
                                    <th scope="col" class="tab_centrar">ID Usuario Intermedio</th>
                                    <th scope="col" class="tab_centrar">Laboratorio</th>
                                    <th scope="col" class="tab_centrar">Nombre</th>
                                    <th scope="col" class="tab_centrar">Correo</th>
                                    <th scope="col" class="tab_centrar">Direcci&oacute;n</th>
                                    <th scope="col" class="tab_centrar">Telefono(s)</th>
                                    <th scope="col" class="tab_centrar" colspan="3">&nbsp;</th>
                                </tr>
                            </thead>
                            <button class="btn btn-primary btn-tbl" data-toggle="modal" data-target="#Nuevomodal" id="nuevoAlumno"><i class="fas fa-plus"></i> Agregar</button>
                            <tbody>
                            <?php
                            try {
                            $connectionPDO= initCnx();
                            $statement=$connectionPDO->prepare("SELECT IdusuarioIntermediario,Laboratorio,Nombres,ApPaterno,ApMaterno,Correo,Direccion,Telof,Extension,Celular FROM {$tbl_clinter};");
                            $statement->setFetchMode(PDO::FETCH_NUM);
                            $statement->execute();
                            $i=1;
                            while ($ret=$statement->fetch()){
                            echo '<tr class="tab_td">
                            <td class="tab_centrar">'.$ret[0].'</td>
                            <td class="tab_centrar">'.$ret[1].'</td>
                            <td class="tab_centrar">'.$ret[2].' '.$ret[3].' '.$ret[4].''.'</td>
                            <td class="tab_centrar">'.$ret[5].'</td>
                            <td class="tab_centrar">'.$ret[6].'</td>
                            <td class="tab_centrar">Tel.:'.$ret[7].' Ext.:'.$ret[8].' cel.:'.$ret[9].'</td>
                            <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalDetalle" class="btn-info-uint btn azul" data-id="'.$ret[0].'"><i class="fas fa-info"></i> Detalle</button></td>
                            <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalModificar" class="btn-sttng-uint btn cafe"  data-id="'.$ret[0].'"><i class="fas fa-edit"></i> Modificar</a></td>
                            <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalEliminar" class="btn-dlst1-uint btn rojo" data-id="'.$ret[0].'"><i class="fas fa-times-circle"></i> Eliminar</a></td>
                            </tr>';
                            $i++;
                            }
                            unset($connectionPDO);} catch (Exception $ex) {
                            echo $ex->getMessage();
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
		<?php
			/*$x=0;
			$query_alu = "SELECT * FROM alumnos LIMIT 0,100";
			$consulta_alu = $sag->query($query_alu);
			if($consulta_alu->num_rows > 0)
			{
				while($rs_alu = $consulta_alu->fetch_assoc())
				{
					$x++;
					$query_car= "SELECT nombre FROM carreras  WHERE id_carrera='".$rs_alu["ref_carrera"]."'";
					$consulta_car = $sag->query($query_car);
					$rs_car = $consulta_car->fetch_assoc();
					$carrera = $rs_car["nombre"];
					
					echo '<tr class="tab_td">
						<th scope="row" class="tab_centrar">'.$x.'</th>
						<td class="tab_centrar">'.$rs_alu["matricula"].'</td>
						<td>'.$rs_alu["nombre"].' '.$rs_alu["appaterno"].' '.$rs_alu["apmaterno"].'</td>
						<td>'.$carrera.'</td>
						<td class="tab_centrar">'.$rs_alu["semestre"].'</td>
						<td class="tab_centrar">'.$rs_alu["beca"].'%</td>
						<td class="tab_centrar"><a data-toggle="modal" data-target="#ModalModificar" class="btn cafe">Modificar</a></td>

						

						<td class="tab_centrar"><a href="#" class="btn rojo">Dar de baja</a></td>
					</tr>';
				}
			}
			include("alu_modificar.php");*/
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
                    <div class="modal fade" id="Nuevomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title" id="myModalLabel"> Datos Cliente Intermedio</h3>
                                </div>
                                <form id="yui11011001" name="yui11011001" novalidate>
                                    <div class="modal-body">
                                        <div id="messagefrmrg"></div>
					<div class="row">
                                            <div class="form-group col-md-3">
                                                <label>ID Cliente</label>
                                                <input type="number" class="form-control" placeholder="00001243" readonly/>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Status</label>
                                                <div><span class="label label-success">Activo</span></div><br />
                                            </div>
					</div>
					<div class="row">
                                            <div class="form-group col-md-3">
                                                <label>Laboratorio</label>
                                                <input type="text" name="lab" id="lab" class="form-control" placeholder="Laboratorio" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Nombre</label>
                                                <input type="text" name="nom" id="nom" class="form-control" placeholder="Nombre" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Apellido Paterno</label>
                                                <input type="text" name="app" id="app" class="form-control" placeholder="Apellido Paterno" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Apellido Materno</label>
                                                <input type="text" name="apm" id="apm" class="form-control" placeholder="Apellido Materno" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Correo Electr&oacute;nico</label>
                                                <input type="email" name="mail" id="mail" class="form-control" placeholder="Correo Electr&oacute;nico" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Direcci&oacute;n</label>
                                                <input type="text" name="add" id="add" class="form-control" placeholder="Direcci&oacute;n" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Tel&eacute;fono Oficina</label>
                                                <input type="tel" name="telo" id="telo" class="form-control" placeholder="Tel&eacute;fono Oficina" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Extension</label>
                                                <input type="number" name="ext" id="ext" class="form-control" placeholder="Extension" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Celular</label>
                                                <input type="tel" name="cel" id="cel" class="form-control" placeholder="Celular" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
<!--                                    <button type="submit" class="btn btn-primary" id="guardarnuevo">Modificar</button>
                                        <button type="submit" class="btn btn-warning" id="guardarnuevo">Eliminar</button>-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"> Detalle de Registro</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="info-uint"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> Cerrar</span></button>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"> Modificaci&oacute;n de Registro</h4>
                                </div>
                                <div id="sttgs-uint"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"> Eliminaci&oacute;n de Registro</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="messagefrmdl"></div>
                                    <div class="center-block text-center">Estas seguro de querer eliminar este registro?</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-dlst2-uint btn btn-danger" data-id=""><i class="fas fa-times-circle"></i> Eliminar</button>
                                    <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> Cerrar</span></button>   
                                </div>
                            </div>
                        </div>
                    </div>
		<?php	include("../head_menu_js.php");	?>
		<script type="text/javascript">
		
		</script>
	</body>
	<!-----					TERMINA EL SISTEMA					----->
</html>
