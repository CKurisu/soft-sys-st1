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
            <label>Nombre</label>
            <input type="text" id="nombre" class="form-control"></div>
            <div class="form-group">
            <label>Apellido</label>
            <input type="text"id="apellido" class="form-control"></div>
            <div class="form-group">
            <label>Email</label>
            <input type="text" id="email" class="form-control"></div>
            <div class="form-group">
            <label>telefono</label>
            <input type="text" id="telefono" class="form-control"></div>
            <div class="form-group">
            <label>grupo</label>
            <input type="text" id="grupo" class="form-control"></div>
            <div class="form-group">
            <label>status</label>
            <input type="text" id="status" class="form-control"></div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="guardarnuevo">Agregar</button>        
        </div>
        </form>
    </div>
  </div>
</div>