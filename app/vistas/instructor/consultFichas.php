<div class="container text-center" >
    <table id="table">
        <thead class="thead" style=" background: rgba(87,151,193,1);
                background: -moz-linear-gradient(-45deg, rgba(87,151,193,1) 18%, rgba(87,151,193,0.99) 21%, rgba(63,113,151,0.94) 52%, rgba(63,113,151,0.89) 77%);
                background: -webkit-gradient(left top, right bottom, color-stop(18%, rgba(87,151,193,1)), color-stop(21%, rgba(87,151,193,0.99)), color-stop(52%, rgba(63,113,151,0.94)), color-stop(77%, rgba(63,113,151,0.89)));
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5797c1', endColorstr='#3f7197', GradientType=1 );
    " >
            <th>Ficha</th>
            <th>Programa</th>
            <th>Trimestres</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
            <th>Jornada</th>
            <th></th>
        </thead>
        
        <tbody class="tablebody text-center" style=" background: rgba(87,151,193,1);
        
    " >>
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