<div class="tb">
    <table id="table">
        <thead class="thead">
            <th>T.Documento</th>
        </thead>
        <tbody class="tablebody">
            <tr>
            <?php foreach ($Datos as $fila):?> 
                    <td><?=$fila->id_ficha?></h2></td>
           <?php endforeach;?>
           </tr>
        </tbody>
    </table>
</div>