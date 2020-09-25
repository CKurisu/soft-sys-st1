<section class="content">
    <div class="table">
        <table class="table table-bordered table-hover" id="t-cli">
            <thead>
                <tr class="tab_tr">
                    <th scope="col" class="tab_centrar">ID
                    <input type="text" name="filterin" id="filterin" class="form-control" placeholder="Buscar..." required/>
                    <button class="fil-list-src btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button></th>
                    <th scope="col" class="tab_centrar">Estatus
                    <input type="text" name="filterin" id="filterin" class="form-control" placeholder="Buscar..." required/>
                    <button class="fil-list-src btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button></th></th>
                    <th scope="col" class="tab_centrar">Laboratorio
                    <input type="text" name="filterin" id="filterin" class="form-control" placeholder="Buscar..." required/>
                    <button class="fil-list-src btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button></th></th>
                    <th scope="col" class="tab_centrar">ID Usuario Intermediario
                    <input type="text" name="filterin" id="filterin" class="form-control" placeholder="Buscar..." required/>
                    <button class="fil-list-src btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button></th></th>
                    <th scope="col" class="tab_centrar">Usuario Intermediario
                    <input type="text" name="filterin" id="filterin" class="form-control" placeholder="Buscar..." required/>
                    <button class="fil-list-src btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button></th></th>
                    <th scope="col" class="tab_centrar">RFC
                    <input type="text" name="filterin" id="filterin" class="form-control" placeholder="Buscar..." required/>
                    <button class="fil-list-src btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button></th></th>
                    <th scope="col" class="tab_centrar">Nombre
                    <input type="text" name="filterin" id="filterin" class="form-control" placeholder="Buscar..." required/>
                    <button class="fil-list-src btn btn-primary btn-tbl" type="button"><i class="fas fa-filter"></i> Filtrar</button></th></th>
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
                    <input type="text" name="filterin" id="filterin" class="form-control" placeholder="Buscar..." required/>
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
                    $stint=$connectionPDO->prepare("SELECT Nombres,ApPaterno,ApMaterno FROM {$tbl_clinter} WHERE IdusuarioIntermediario=:idi LIMIT 1;");
                    $stint->bindParam(':idi', $ret[3], PDO::PARAM_INT);
                    $stint->setFetchMode(PDO::FETCH_NUM);
                    $stint->execute();
                    $rowint=$stint->rowCount();
                    if($rowint>0){
                        while ($rs=$stint->fetch()){
                            $nameinter=$rs[0]." ".$rs[1]." ".$rs[2];
                        }                        
                    }
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
                <td class="tab_centrar">'.$nameinter.'</td>
                <td class="tab_centrar">'.$ret[4].'</td>
                <td class="tab_centrar">'.$ret[5].'</td>
                <td class="tab_centrar hidden">'. date('d-m-Y',strtotime($ret[6])).'</td>
                <td class="tab_centrar hidden">'.date('d-m-Y',strtotime($ret[7])).'</td>
                <td class="tab_centrar"><button class="btn-info-u btn azul" data-id="'.$ret[0].'"><i class="fas fa-info"></i> Detalle</button></td>
                <td class="tab_centrar"><button class="btn-sttng-u btn cafe"  data-id="'.$ret[0].'"><i class="fas fa-edit"></i> Modificar</a></td>
                <td class="tab_centrar"><button class="btn-dlst1-u btn rojo" data-id="'.$ret[0].'"><i class="fas fa-times-circle"></i> Eliminar</a></td>
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