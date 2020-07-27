<div class="modal fade" id="Nuevomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
      </div>
      <form id="registerForm" name="formRegister" novalidate>
        <div class="modal-body">
          <div class="form-group">
            <label>Matr&iaucte;cula</label>
            <input type="text" id="matricula" id="matricula" class="form-control" placeholder="Matr&iacute;cula" />
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" id="nombre" id="nombre" class="form-control" placeholder="Nombre" />
          </div>
          <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" id="appaterno" id="appaterno" class="form-control" placeholder="Apellido Paterno" />
          </div>
          <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" id="apmaterno" id="apmaterno" class="form-control" placeholder="Apellido Materno" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" id="correo" id="correo" class="form-control" placeholder="Correo Electrónico" />
          </div> 
          <div class="form-group">
            <label>Semestre</label>
            <input type="text" id="semestre" id="semestre" class="form-control" placeholder="Semestre" />
          </div>
          <div class="form-group">
            <label>Beca</label>
            <input type="text" id="beca" id="beca" class="form-control" placeholder="Beca" />%
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="guardarnuevo">Dar de Alta</button>        
        </div>
      </form>
    </div>
  </div>
</div>

<table class="table table-hover">
  <thead>
    <tr class="tab_tr">
      <th scope="col" class="tab_centrar">#</th>
      <th scope="col" class="tab_centrar">Matr&iacute;cula</th>
      <th scope="col" class="tab_centrar">Nombre</th>
      <th scope="col" class="tab_centrar">Carrera</th>
      <th scope="col" class="tab_centrar">Semestre</th>
      <th scope="col" class="tab_centrar">Beca</th>
      <th scope="col" class="tab_centrar" colspan="3">&nbsp;</th>
    </tr>
  </thead>
   <button class="btn btn-primary" data-toggle="modal" data-target="#Nuevomodal"
            id="nuevoAlumno">AgregarAlumno</button>
       <tbody>
    <?php
      $x=0;
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
      include("alu_modificar.php");
    ?>
  </tbody>
</table>