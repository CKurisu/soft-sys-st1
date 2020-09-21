<section class="content">
            <div class="table">
                <table class="table table-bordered table-hover" id="t-int">
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
                    <div class="col-md-3 col-sm-3 col-lg-3 form-search">
                        <i class="fas fa-calendar"></i> Busqueda Periodo
                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="form-control" name="start" id="start" placeholder="Fecha Inicio"/>
                            <span class="input-group-addon">a</span>
                            <input type="text" class="form-control" name="end" id="end" placeholder="Fecha Fin"/>
                        </div>
                        <button class="btn-tblint-fild btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 form-search">
                        <i class="fas fa-search"></i> Busqueda Avanzada 
                        <input type="text" name="filter" id="filter" class="form-control" placeholder="Buscar...">
                        <button class="fil-list-src-cliint btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button>
                    </div>
                    <button class="btn btn-primary btn-tbl" data-toggle="modal" data-target="#Nuevomodal" id="nuevoAlumno"><i class="fas fa-plus"></i> Agregar</button>
                    <tbody>
                    <?php
                    try {
                    $statement=$connectionPDO->prepare("SELECT IdusuarioIntermediario,Laboratorio,Nombres,ApPaterno,ApMaterno,Correo,Direccion,Telof,Extension,Celular,FechaReg,FechaEdit FROM {$tbl_clinter};");
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
                    <td class="tab_centrar hidden">'. date('d-m-Y',strtotime($ret[10])).'</td>
                    <td class="tab_centrar hidden">'.date('d-m-Y',strtotime($ret[11])).'</td>
                    <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalDetalle" class="btn-info-uint btn azul" data-id="'.$ret[0].'"><i class="fas fa-info"></i> Detalle</button></td>
                    <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalModificar" class="btn-sttng-uint btn cafe"  data-id="'.$ret[0].'"><i class="fas fa-edit"></i> Modificar</a></td>
                    <td class="tab_centrar"><button data-toggle="modal" data-target="#ModalEliminar" class="btn-dlst1-uint btn rojo" data-id="'.$ret[0].'"><i class="fas fa-times-circle"></i> Eliminar</a></td>
                    </tr>';
                    $i++;
                    }} catch (Exception $ex) {
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