
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
              <?php $p+=1; 
              if ($p == 1){?>
                <thead>
                  <tr class="table-primary" >
                    <th style="padding-left:10px;" colspan="2" class="text-left">Fecha de inicio: <?= $fila->fecha_inicio?></th>
                    <th colspan="3" class="text-center">PROGRAMA: <?= $fila->nom_programa ?><br>TRIMESTRE: <?= $fila->num_trimestre ?></th>
                    <th style="padding-right:10px;"colspan="3" class="text-right">Fecha de finalización: <?= $fila->fecha_fin ?></th>
                  </tr>
                </thead>
              <?php }?>
            <tr >
                    <td><?=$fila->Tip_doc?></h2></td>
                    <td><?=$fila->num_documento?></h2></td>
                    <td><?=$fila->nombres?></h2></td>
                    <td><?=$fila->apellidos?></h2></td>
                    <td><?=$fila->correo_perso?></h2></td>
                    <td><?=$fila->correo_instu?></h2></td>
                    <td style="padding:2px;"><button class="btn btn-danger btn-sm">Desertar</button></td>
           <?php endforeach;?>
           
           </tr>
        </tbody>
    </table>
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
<div class="modal-body" style="background:#707070;">
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
      <button type="submit" class="btn btn-dark btn-sm" style="color:#4fc572;">Agregar</button>  
    </div>                 
  </form>
</div>

</div>
</div>
</div>

              