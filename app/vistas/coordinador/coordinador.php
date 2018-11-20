

<div class="menu">
    <div class="imgn">
        <img src="<?php echo RUTA_URL?>/public/img/Solo_LogoDesertSOFT.png" >
        <label class="titulo">DesertSOFT</label>
    </div>
    
 <hr>
    <div class="cabeza">       
        
        <div class = "imgperfil">
            <img src="<?php echo RUTA_URL?>/public/img/male.png" >   
        </div>

        <div class="infor">
                <i class="submenu text-capitalize"id="nom" onclick="menutoggle('conten')"><?= $_SESSION['Coordinador']['nombre']; ?><i class="fas fa-angle-down" ></i></i>
                
                <i id="rol"><?= $_SESSION['Coordinador'] ['rol']?></i>  
        </div>                 
    </div>

    <div id="conten">
        <ul class="list-group">
            <li><a href="">Configurar Perfil</a></li>
            <li><a href="">Cambiar Contraseña</a></li>
            <li><a href="<?= RUTA_URL ?>index/cerrarSesion">Cerrar sesion</a></li>
        </ul>
    </div>

<script>
    function menutoggle(x){
        var panel = document.getElementById(x), navarrow = document.getElementById('navarrow'), disp = "block";

        if(panel.style.display == disp){
            panel.style.display = "none";
            
        }else{
            panel.style.display = disp;
        }
    }

</script>

<hr>
    <div class="cuerpo">
        <ul class="list-group">
            <li><i class="fas fa-address-book"></i><a href="">Usuarios</a></li>
            <li><i class="fas fa-book-reader"></i><a href="">Modificar Estado</a></li>
            <li><i class="fas fa-exclamation-triangle"></i><a href="">Procesos</a></li> 
            <li><i class="fas fa-exclamation-triangle"></i><a href="">Programas</a></li>   
        </ul>
    </div>

    <div class="pie">

    </div>
</div>