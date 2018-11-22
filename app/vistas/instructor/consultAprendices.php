
<div class="container text-center">    
<button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal" style="color:#4fc572;">Añadir</button>
    <table>
        <tr class="thead">
            <th>T.Documento</th>
            <th>N.Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>C. personal</th>
            <th>C. institucional</th>
            <th></th>
        </tr>
        <tbody class="tablebody">
        <?php $p=0;?>
            <?php foreach ($Datos as $fila):?> 
            <?php $ficha = $fila->num_ficha?>
              <?php $p+=1; 
              if ($p == 1){?>
                <thead>
                  <tr class="table-primary" >
                    <th style="padding-left:10px;" colspan="2" class="text-left">Fecha de inicio: <?=htmlspecialchars( $fila->fecha_inicio);?></th>
                    <th colspan="3" class="text-center">PROGRAMA: <?=htmlspecialchars( $fila->nom_programa); ?><br>TRIMESTRE: <?=htmlspecialchars( $fila->num_trimestre); ?></th>
                    <th style="padding-right:10px;"colspan="3" class="text-right">Fecha de finalización: <?=htmlspecialchars( $fila->fecha_fin );?></th>
                  </tr>
                </thead>
              <?php }?>
            <tr >
                    <td><?=htmlspecialchars($fila->Tip_doc);?></h2></td>
                    <td><?=htmlspecialchars($fila->num_documento);?></h2></td>
                    <td><?=htmlspecialchars($fila->nombres);?></h2></td>
                    <td><?=htmlspecialchars($fila->apellidos);?></h2></td>
                    <td><?=htmlspecialchars($fila->correo_perso);?></h2></td>
                    <td><?=htmlspecialchars($fila->correo_instu);?></h2></td>
                    <td style="padding:2px;"><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modelId">Desertar</button></td>
           <?php endforeach;?>
           
           </tr>
        </tbody>
    </table>
</div>

<!-- Inicio del formulario modal-->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="despliege modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#b8daff">
        <h5 class="modal-title" id="exampleModalLabel">Añadir deserción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Cuerpo -->
<div class="modal-body">
  <form action="<?= RUTA_URL ?>instructor/registrarAprendices" method="post">
        <div class="form-group">
          <label for="fecha1">Primera inasistencia</label>
          <input type="date"
              class="form-control form-control-sm|lg" name="fecha1" id="fecha1" aria-describedby="Fecha 1">
          <small id="helpId" class="form-text text-muted">Por favor, seleccione o escriba la fecha.</small>
        </div>        
        <div class="form-group">
          <label for="fecha2">Segunda inasistencia</label>
          <input type="date"
              class="form-control form-control-sm|lg" name="fecha2" id="fecha2" aria-describedby="helpId">
          <small id="helpId" class="form-text text-muted">Por favor, seleccione o escriba la fecha.</small>
        </div>        
        <div class="form-group">
          <label for="fecha3">Tercera inasistencia</label>
          <input type="date"
              class="form-control form-control-sm|lg" name="fecha3" id="fecha3" aria-describedby="helpId">
          <small id="helpId" class="form-text text-muted">Por favor, seleccione o escriba la fecha.</small>
        </div>
        <div class="form-group">
          <label for="causa">Causa</label>
          <select class="form-control  my-0 py-0" name="" id="causa">
            <option value="">-- --</option>
            <option value="">Lorem, ipsum.</option>
            <option value="">Lorem, ipsum.</option>
            <option value="">Lorem, ipsum.</option>
          </select>
        </div>
        <div class="form-group">
          <label for="obser">Observaciones</label>
          <textarea class="form-control" name="obser" id="obser" rows="3"></textarea>
        </div>
        <div class="text-center">
          <button type="button" name="" id="" class="btn btn-success" btn-lg btn-block">Iniciar</button>   
        </div>
  </form>
</div>

</div>
</div>
</div>

              