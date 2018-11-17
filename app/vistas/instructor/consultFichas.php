<div class="container text-center">
    <table id="table">
        <thead class="thead">
            <th>Ficha</th>
            <th>Programa</th>
            <th>Trimestres</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
            <th>Jornada</th>
            <th></th>
        </thead>
        <tbody class="tablebody text-center">
            <?php foreach ($Datos as $fila):?>
            <tr> 
                <td><?=$fila->num_ficha?></td>
                <td><?=$fila->nom_programa?></td>
                <td><?=$fila->num_trimestre?></td>
                <td><?=$fila->fecha_inicio?></td>
                <td><?=$fila->fecha_fin?></td>
                <td><?=$fila->nom_jornada?></td>
                <td><a href="<?= RUTA_URL ?>instructor/vistaRegistrarAprendices/<?=$fila->num_ficha;?>"><button class="btn btn-info btn-sm">Ver Aprendices</button></a></td>
           </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>