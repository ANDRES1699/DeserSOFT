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
    <form action="<?=RUTA_URL?>index/emails" method="POST">
        <div class="container" style="margin-top:2.5%; width:30%;">
            <div class="form-group">
                <!-- Cajas de texto -->
                <div class="alert alert-info" role="alert">
                    Ingrese el correo registrado en el sistema.
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card"  style="text-size:10px;"></i></span>
                    </div>
                    <input type="number" class="form-control form-control-sm" placeholder="Documento" aria-label="Documento" aria-describedby="basic-addon1" name="dni">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</i></span>
                    </div>
                    <input type="email" class="form-control form-control-sm" placeholder="Email" aria-label="Documento" aria-describedby="basic-addon1" name="email">
                </div>
            </div>  
            <button type="submit" class="btn btn-sm btn-lg btn-block" style="background-color: #2ECC71; color:#FFF;">Enviar</button>
        </div>  
    </form>