<div class="menu">
    <div class="container-fluid imgn">
            <div class="row my-2">
                <div class="col-5">
                    <img class="img-fluid" src="<?php echo RUTA_URL?>/public/img/Solo_LogoDesertSOFT.png" >
                </div>
                <div class="col-7 text-left d-flex align-items-center">
                    <label class="titulo">DesertSOFT <i  id="rol"><?= $_SESSION['instructor']['rol'] ?></i> </label>
                </div>
         </div>
    </div>
    
 <hr>
    <div class="cabeza">       
        
        <div class = "imgperfil mx-5 pl-1">
      
            <img src="<?=RUTA_URL.'img/i.jpg'?>" align="center">
        </div>
        <div class="justify-content-center text-center">
            <div class="infor ">
                    <i class="submenu"id="nom" onclick="menutoggle('conten')"><p><?= utf8_decode(mb_convert_encoding(ucwords($_SESSION['instructor']['nombre']),'HTML-ENTITIES','UTF-8')); ?></p><i class="fas fa-angle-down" >    </i></i>
                     
            </div>                 

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
        <li><i class="fas fa-exclamation-triangle"></i><a href="<?= RUTA_URL ?>instructor/vistaDesertados">Procesos</a></li>
            
        </ul>
    </div>

    <div class="pie">

    </div>
</div>

