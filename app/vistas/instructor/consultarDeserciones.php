<div class="container text-center">    
    
    <table>
        <tr class="thead">
            <th>Ficha</th>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Causa</th>
            <th>Trimestre</th>
            <th>Estado</th>
        </tr>
    
        <tbody class="tablebody">

            <?php foreach ($Datos as $fila):?> 
            <tr onclick="estado('<?=$fila->id_usuario?>','<?=$fila->estado_usuario_id_estado?>');">
                    <td><?=htmlspecialchars($fila->num_ficha);?></h2></td>
                    <td><?=htmlspecialchars($fila->num_documento);?></h2></td>
                    <td><?=htmlspecialchars($fila->nombres);?></h2></td>
                    <td><?=htmlspecialchars($fila->apellidos);?></h2></td>
                    <td><?=htmlspecialchars($fila->nombre);?></h2></td>
                    <td><?=htmlspecialchars($fila->num_trimestre);?></h2></td>
                    <td><?=htmlspecialchars($fila->nombre_estado);?></h2></td>
           <?php endforeach;?>
           
           </tr>
        </tbody>
        <script>
        function estado(cd,es){
            let menj = confirm('¿Desea cancelar el proceso?');
            if (menj) {
                $.ajax({
                    type:'POST',
                    url:'<?php echo RUTA_URL;?>instructor/estadoA',
                    dataType:'json',
                    data:{cod:cd,estado:es},
                    success: function(data){
                        console.log(data);
                        window.location.href = "<?php echo RUTA_URL;?>instructor/vistaDesertados";
                    }                 
                    ,error:function(){
                        console.log('ERROR');
                    }
                });
            }

        }    
    </script>
    </table>
</div>