
<div class="container text-center">    
  <div class="row">
    <div class="col mt-5 text-left">
        <?php foreach ($Datos as $fila):?> 
              <p>
                <tr class="table-primary" >
                  <th style="padding-left:10px;" colspan="2" class="text-left">Fecha de inicio: <?=htmlspecialchars( $fila->fecha_inicio);?></th>
                  <th colspan="3" class="text-center">PROGRAMA: <?=htmlspecialchars( $fila->nom_programa); ?><br>TRIMESTRE: <?=htmlspecialchars( $fila->num_trimestre); ?></th>
                  <th style="padding-right:10px;"colspan="3" class="text-right">Fecha de finalización: <?=htmlspecialchars( $fila->fecha_fin );?></th>
                </tr>
              </p>
          <?php endforeach;?>
        </div>
        <div class="col mt-5 text-right mb-0">
            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" >Añadir</button>
    </div>
  </div>
    
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
              <?php }?>
            <tr >
                    <td><?=htmlspecialchars($fila->Tip_doc);?></h2></td>
                    <td><?=htmlspecialchars($fila->num_documento);?></h2></td>
                    <td><?=htmlspecialchars($fila->nombres);?></h2></td>
                    <td><?=htmlspecialchars($fila->apellidos);?></h2></td>
                    <td><?=htmlspecialchars($fila->correo_perso);?></h2></td>
                    <td><?=htmlspecialchars($fila->correo_instu);?></h2></td>
                    <td style="padding:2px;"><button type="button" onclick="idA(<?=$fila->id_usuario;?>)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId">Desertar</button></td>
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
  <form action="<?=RUTA_URL;?>instructor/registrarDesercion" method="post">
        <input type="hidden" id="id_aprendiz"  name="id_aprendiz">
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
          <select class="form-control  my-0 py-0" name="causa" id="causa">
          <option value="">-- Seleccionar causa --</option>
           <?php foreach ($Datos2 as $causa):?>
             <option value="<?= $causa->idDCausa;?>"><?=$causa->nombre;?></option>
           <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label for="obser">Observaciones</label>
          <textarea class="form-control" name="obser" id="obser" rows="3"></textarea>
        </div>
        <div class="text-center">
          <button type="submit" name="" id="" class="btn btn-success btn-lg btn-block">Iniciar</button>   
        </div>
  </form>
</div>
</div>
</div>
</div>

<!-- Inicio del formulario modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#b8daff">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Aprendiz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Cuerpo -->
<div class="modal-body" >
<form action="<?= RUTA_URL ?>instructor/registrarAprendices" method="post">
    <div class="form-group row">
      <div class="form-group col-md-6">
            <input  name="nombres" type="text" class="form-control" placeholder="Nombres" required>
      </div>
      <div class="form-group col-md-6">
            <input  name="apellidos" type="text" class="form-control" placeholder="Apellidos" required>
      </div>
    </div>

      <div class="y form-group">
        <select id="id_doc" name="id_doc" class="form-control">
            <option value="1">Tarjeta Identidad</option>
            <option value="2">Cedula Ciudadania</option>
            <option value="3">Cedula de Extranjeria</option>
            <option value="4">Documento nacional de Identificacion</option>
        </select><br>
        <input name="num_documento"  type="text" class="form-control" placeholder="Numero Documento" required>
      </div>
    <div class="form-group row">
      <div class="form-group col-md-6">
            <input  name="cel_usuario" type="text" class="form-control" placeholder="Celular" required>      
      </div>
      <div class="form-group col-md-6">
            <input  name="tel_usuario" type="text" class="form-control" placeholder="Telefono" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="form-group col-md-6">
            <input  name="correo_instu" type="text" class="form-control" placeholder="Correo electronico personal" required>
      </div>
      <div class="form-group col-md-6">
           <input name="correo_perso" type="text" class="form-control" placeholder="Correo electronico institucional" required>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-info btn-sm col-12" >Agregar</button>  
    </div>                 
  </form>
</div>

</div>
</div>
</div>
<script>
function idA(id){
  $('#id_aprendiz').val(id);
}
</script>
              