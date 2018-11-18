<style>
    img{
        height: 100px;
        width:300px;
        margin-left:40%;
        margin-top:190px;
    }
    a{
        float:right;
    }
</style>

    <img class="" src="<?php echo RUTA_URL?>/public/img/LogoDesertSOFT.png" style>

    <div class="container" style="margin-top:2.5%; width:30%;">
    <form action="<?=RUTA_URL?>index/iniciarSesion" method="post" autocomplete="off">
            <div class="form-group">
                <!-- Cajas de texto -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card"  style="text-size:10px;"></i></span>
                    </div>
                    <input  type="text" name="dni" id="dni" class="form-control form-control-sm" placeholder="Documento" aria-label="Documento" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"style="padding-right:16px;"><i class="fas fa-unlock-alt" ></i></span>
                    </div>
                    <input type="password" name="contrasenia" id="contrasenia" class="form-control form-control-sm"  placeholder="Contraseña" >
                </div>
                
            </div>  
            <button type="submit" value="Iniciar sesión" class="btn btn-sm btn-lg btn-block" style="background-color: #2ECC71; color:#FFF;">Ingresar</button>
            <hr>
        </form>
        <a  href="<?=RUTA_URL?>index/cambiarContrasenia" class="text-center">¿Olvido su contraseña?</a>
    </div>  
    