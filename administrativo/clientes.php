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
            <?php	include("menu.php");	?>
            <!----------     AQUI TERMINA EL MENU
            ********************************************************
            AQUI COMIENZA LA P�GINA     ---------->
            <div class="content-wrapper">			
                <!----------     TITULO     ---------->
                <section class="content-header">
                    <center class="titulo">
                        Lista de Clientes
                    </center>
                </section>
                <!----------     TITULO     ---------->
                <section class="content">
                    <div class="table">
                        <table class="table table-bordered table-hover" id="t-cli">
                            <thead>
                                <tr class="tab_tr">
                                    <th scope="col" class="tab_centrar">ID</th>
                                    <th scope="col" class="tab_centrar">Estatus</th>
                                    <th scope="col" class="tab_centrar">Laboratorio</th>
                                    <th scope="col" class="tab_centrar">ID Usuario Intermediario</th>
                                    <th scope="col" class="tab_centrar">RFC</th>
                                    <th scope="col" class="tab_centrar">Nombre</th>
                                    <th scope="col" class="tab_centrar" colspan="3">&nbsp;</th>
                                </tr>
                            </thead>
                            <div class="col-md-4 col-sm-4 col-lg-4 form-search">
                                <i class="fas fa-calendar"></i> Busqueda Periodo
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="form-control" name="start" id="start" placeholder="Fecha Inicio"/>
                                    <span class="input-group-addon">a</span>
                                    <input type="text" class="form-control" name="end" id="end" placeholder="Fecha Fin"/>
                                </div>
                                <button class="btn-tblcli-fild btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-3 form-search">
                                <i class="fas fa-search"></i> Busqueda Avanzada 
                                <input type="text" name="filter" id="filter" class="form-control" placeholder="Buscar...">
                                <button class="fil-list-src-cli btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button>
                            </div>
                            <button class="btn btn-primary btn-tbl" data-toggle="modal" data-target="#ModalNuevo" id="nuevoAlumno"><i class="fas fa-plus"></i> Agregar</button>
                            <tbody>
                                <?php
                                try {
                                $statement=$connectionPDO->prepare("SELECT DISTINCT {$tbl_cli}.IdCliente,Status,CliLab,IdInt,RFC,RznScl,CliDateReg,CliDateMod FROM {$tbl_cli} INNER JOIN {$tbl_dtcli} ON {$tbl_cli}.idCliente={$tbl_dtcli}.idCliente;");
                                $statement->setFetchMode(PDO::FETCH_NUM);
                                $statement->execute();
                                $i=1;
                                while ($ret=$statement->fetch()){
                                    switch ($ret[1]){
                                        case 0:
                                        $status='<span class="label label-danger">No Activo</span>';
                                        break 1;
                                        case 1:
                                        $status='<span class="label label-success">Activo</span>';
                                        break 1;
                                    }
                                echo '<tr class="tab_td">
                                <td class="tab_centrar">'.$ret[0].'</td>
                                <td class="tab_centrar">'.$status.'</td>
                                <td class="tab_centrar">'.$ret[2].'</td>
                                <td class="tab_centrar">'.$ret[3].'</td>
                                <td class="tab_centrar">'.$ret[4].'</td>
                                <td class="tab_centrar">'.$ret[5].'</td>
                                <td class="tab_centrar hidden">'. date('d-m-Y',strtotime($ret[6])).'</td>
                                <td class="tab_centrar hidden">'.date('d-m-Y',strtotime($ret[7])).'</td>
                                <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalDetalle" class="btn-info-u btn azul" data-id="'.$ret[0].'"><i class="fas fa-info"></i> Detalle</button></td>
                                <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalModificar" class="btn-sttng-u btn cafe"  data-id="'.$ret[0].'"><i class="fas fa-edit"></i> Modificar</a></td>
                                <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalEliminar" class="btn-dlst1-u btn rojo" data-id="'.$ret[0].'"><i class="fas fa-times-circle"></i> Eliminar</a></td>
                                </tr>';
                                $i++;
                                }} catch (Exception $ex) {
                                echo $ex->getMessage();
                                }
                                ?>
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
                    </div>
                </section>
            </div>	
            <!----------     AQUI TERMINA LA P�GINA
            ********************************************************
            AQUI COMIENZA LA PIECERA     ---------->
            <footer class="main-footer">
            </footer>
            <!----------     AQUI TERMINA LA PIECERA     ---------->
        </div>
        <div class="modal fade" id="ModalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel"> Datos Cliente</h3>
                    </div>
                    <form id="yui11022001" name="yui11022001" novalidate>
                        <div class="modal-body">
                            <div id="messagefrmrgcli"></div>
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
                                    <select class="form-control" name="lab">
                                        <option value="">(Seleccione)</option>
                                        <option value="matriz" selected>Matriz</option>
                                        <option value="sucursal">Sucursal</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Raz&oacute;n Social</label>
                                    <input type="text" name="rznscl" id="rznscl" class="form-control" placeholder="Raz&oacute;n Social" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cliente Intermediario</label>
                                    <select class="form-control" name="idint">
                                        <option value="">(Seleccione)</option>
                                        <?php
                                        $stint=$connectionPDO->prepare("SELECT * FROM {$tbl_clinter};");
                                        $stint->setFetchMode(PDO::FETCH_NUM);
                                        $stint->execute();
                                        while ($ret=$stint->fetch()){
                                        echo '<option value="'.$ret[0].'">'.$ret[2].' '.$ret[3].' '.$ret[4].'</option>';}
                                        unset($stint);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>RFC</label>
                                    <input type="text" name="rfc" id="rfc" class="form-control" placeholder="RFC" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Calle</label>
                                    <input type="text" name="str" id="str" class="form-control" placeholder="Calle" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Numero Exterior</label>
                                    <input type="number" name="numex" id="numex" class="form-control" placeholder="Numero Exterior" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Numero Interior</label>
                                    <input type="number" name="numin" id="numin" class="form-control" placeholder="Numero Interior" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Colonia</label>
                                    <input type="text" name="col" id="col" class="form-control" placeholder="Colonia" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>C.P.</label>
                                    <input type="number" name="cp" id="cp" class="form-control" placeholder="C.P." />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Localidad</label>
                                    <input type="text" name="loc" id="loc" class="form-control" placeholder="Localidad" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Municipio</label>
                                    <input type="text" name="mun" id="mun" class="form-control" placeholder="Municipio" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cuidad</label>
                                    <input type="text" name="cd" id="cd" class="form-control" placeholder="Cuidad" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Estado</label>
                                    <input type="text" name="edo" id="edo" class="form-control" placeholder="Estado" />
                                </div>
                                <button data-toggle="modal" data-target="#ModalNuevoSh" class="btn-new-such btn azul"><i class="fas fa-plus"></i> Registrar Sucursal</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
<!--                        <button type="submit" class="btn btn-primary" id="guardarnuevo">Modificar</button>
                            <button type="submit" class="btn btn-warning" id="guardarnuevo">Eliminar</button>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalNuevoSh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel">  Registrar Sucursal</h3>
                    </div>
                    <form id="yui11022021" name="yui11022021" novalidate>
                        <div class="modal-body">
                            <div id="messagefrmrgclish"></div>
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
                                    <select class="form-control" name="lab">
                                        <option value="">(Seleccione)</option>
                                        <option value="matriz">Matriz</option>
                                        <option value="sucursal" selected>Sucursal</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Raz&oacute;n Social</label>
                                    <input type="text" name="rznscl" id="rznscl" class="form-control" placeholder="Raz&oacute;n Social" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cliente Intermediario</label>
                                    <select class="form-control" name="idint">
                                        <option value="">(Seleccione)</option>
                                        <?php
                                        $stint=$connectionPDO->prepare("SELECT * FROM {$tbl_clinter};");
                                        $stint->setFetchMode(PDO::FETCH_NUM);
                                        $stint->execute();
                                        while ($ret=$stint->fetch()){
                                        echo '<option value="'.$ret[0].'">'.$ret[2].' '.$ret[3].' '.$ret[4].'</option>';}
                                        unset($stint);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>RFC</label>
                                    <input type="text" name="rfc" id="rfc" class="form-control" placeholder="RFC" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Calle</label>
                                    <input type="text" name="str" id="str" class="form-control" placeholder="Calle" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Numero Exterior</label>
                                    <input type="number" name="numex" id="numex" class="form-control" placeholder="Numero Exterior" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Numero Interior</label>
                                    <input type="number" name="numin" id="numin" class="form-control" placeholder="Numero Interior" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Colonia</label>
                                    <input type="text" name="col" id="col" class="form-control" placeholder="Colonia" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>C.P.</label>
                                    <input type="number" name="cp" id="cp" class="form-control" placeholder="C.P." />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Localidad</label>
                                    <input type="text" name="loc" id="loc" class="form-control" placeholder="Localidad" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Municipio</label>
                                    <input type="text" name="mun" id="mun" class="form-control" placeholder="Municipio" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cuidad</label>
                                    <input type="text" name="cd" id="cd" class="form-control" placeholder="Cuidad" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Estado</label>
                                    <input type="text" name="edo" id="edo" class="form-control" placeholder="Estado" />
                                </div>
                                <button data-toggle="modal" data-target="#ModalNuevoSn" class="btn-new-sucn btn azul"><i class="fas fa-plus"></i> Registrar Sucursal</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
<!--                        <button type="submit" class="btn btn-primary" id="guardarnuevo">Modificar</button>
                            <button type="submit" class="btn btn-warning" id="guardarnuevo">Eliminar</button>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModalNuevoSn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel"> Registrar Sucursal</h3>
                    </div>
                    <form id="yui11022031" name="yui11022031" novalidate>
                        <div class="modal-body">
                            <div id="messagefrmrgclisn"></div>
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
                                    <select class="form-control" name="lab">
                                        <option value="">(Seleccione)</option>
                                        <option value="matriz">Matriz</option>
                                        <option value="sucursal" selected>Sucursal</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Raz&oacute;n Social</label>
                                    <input type="text" name="rznscl" id="rznscl" class="form-control" placeholder="Raz&oacute;n Social" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cliente Intermediario</label>
                                    <select class="form-control" name="idint">
                                        <option value="">(Seleccione)</option>
                                        <?php
                                        $stint=$connectionPDO->prepare("SELECT * FROM {$tbl_clinter};");
                                        $stint->setFetchMode(PDO::FETCH_NUM);
                                        $stint->execute();
                                        while ($ret=$stint->fetch()){
                                        echo '<option value="'.$ret[0].'">'.$ret[2].' '.$ret[3].' '.$ret[4].'</option>';}
                                        unset($stint);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>RFC</label>
                                    <input type="text" name="rfc" id="rfc" class="form-control" placeholder="RFC" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Calle</label>
                                    <input type="text" name="str" id="str" class="form-control" placeholder="Calle" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Numero Exterior</label>
                                    <input type="number" name="numex" id="numex" class="form-control" placeholder="Numero Exterior" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Numero Interior</label>
                                    <input type="number" name="numin" id="numin" class="form-control" placeholder="Numero Interior" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Colonia</label>
                                    <input type="text" name="col" id="col" class="form-control" placeholder="Colonia" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>C.P.</label>
                                    <input type="number" name="cp" id="cp" class="form-control" placeholder="C.P." />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Localidad</label>
                                    <input type="text" name="loc" id="loc" class="form-control" placeholder="Localidad" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Municipio</label>
                                    <input type="text" name="mun" id="mun" class="form-control" placeholder="Municipio" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cuidad</label>
                                    <input type="text" name="cd" id="cd" class="form-control" placeholder="Cuidad" />
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Estado</label>
                                    <input type="text" name="edo" id="edo" class="form-control" placeholder="Estado" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
<!--                        <button type="submit" class="btn btn-primary" id="guardarnuevo">Modificar</button>
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
                        <div id="info-u"></div>
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
                    <div id="sttgs-u"></div>
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
                        <div id="messagefrmdlcli"></div>
                        <div class="center-block text-center">Estas seguro de querer eliminar este registro?</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-dlst2-u btn btn-danger" data-id=""><i class="fas fa-times-circle"></i> Eliminar</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> Cerrar</span></button>   
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="DetalleCli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel"> Informaci&oacute;n de Cliente</h3>
                    </div>
                    <div class="modal-body">
                        <div id="info-dtl-u"></div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times-circle"></i> Cerrar</span></button>
                        <a href="clientes-informe.php"><button class="btn azul"><i class="fas fa-info"></i> Reporte de Cliente</button></a>
                        <button data-toggle="modal" data-target="#ReporteCliente" class="btn-rpt-cli btn azul" data-id=""><i class="fas fa-info"></i> Reporte Cliente Modal</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="DetalleCli2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel"> Informaci&oacute;n de Cliente SirLab</h3>
                    </div>
                    <div class="modal-body">
                        <div id="info-dtls-u"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times-circle"></i> Cerrar</span></button>
                        <a href="reportes-siralab.php"><button class="btn azul"><i class="fas fa-info"></i> Reporte SirLab</button></a>
                        <button data-toggle="modal" data-target="#ReporteSirLab" class="btn-rpt-slb btn azul" data-id=""><i class="fas fa-info"></i> Reporte SirLab Modal</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ReporteCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel"> Reporte de Cliente</h3>
                    </div>
                    <div class="modal-body" id="rpt-cli">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times-circle"></i> Cerrar</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ReporteSirLab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel"> Reporte SirLab</h3>
                    </div>
                    <div class="modal-body" id="rpt-slb">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times-circle"></i> Cerrar</span></button>
                    </div>
                </div>
            </div>
        </div>
        <?php	include("../head_menu_js.php");	?>
    </body>
    <?php closeCnxP($connectionPDO);?>
    <!-----					TERMINA EL SISTEMA					----->
</html>