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
                <i class="submenu"id="nom" onclick="menutoggle('conten')"><p><?= utf8_decode(mb_convert_encoding(ucwords($_SESSION['instructor']['nombre']),'HTML-ENTITIES','UTF-8')); ?></p><i class="fas fa-angle-down" >    </i></i>
                <i id="rol"><?= $_SESSION['instructor']['rol'] ?></i>  
        </div>                 
    </div>

    <div id="conten">
        <ul class="list-group">
            <li><a href="">Configurar Perfil</a></li>
            <li><a href="">Cambiar Contraseña</a></li>
            <li><a href="<?= RUTA_URL ?>index/cerrarSesion">Cerrar sesion</a></li>
        </ul>
    </div>


<hr>
    <div class="cuerpo">
        <ul class="list-group">
        <li><i class="fas fa-address-book"></i><a href="<?= RUTA_URL ?>instructor/vistaConsultarficha">Mis Fichas</a></li>
        <li><i class="fas fa-exclamation-triangle"></i><a href="#">Desertar</a></li>    
        </ul>
    </div>

    <div class="pie">

    </div>
</div>

