<?php

/**
 */
class Index extends Controlador {
	private $opcion;
	/**
	 * @access public
	 */
	function __construct() {
		parent::asignacionModelo('usuario');
	}
	public function inicio()
	{
		parent::vista('inicio');
	}
	public function iniciarSesion() {
		// Not yet implemented
		$data=$this->modelo->consultarUsuario($_POST['dni']);
		if ($data != null) {
			if($data->contrasenia == md5($_POST['contrasenia'])){
				$_SESSION[$data->tip_rol] = ['nombre' => $data->nombres.' '.$data->apellidos, 'id' => $data->id_usuario, 'rol' => $data->tip_rol];
			    parent::vista($data->tip_rol .'/'.$data->tip_rol);
			}
			else{
				header('Location: '.RUTA_URL.'index/inicio');
			}
		}
		else{
			header('Location: '.RUTA_URL.'index/inicio');
		}
	}
	
	public function validar() {
		// Not yet implemented
		$valor=false;
		if ($_SERVER['REQUEST_METHOD']) {
			$data=$this->modelo->consultarUsuario($_SESSION[$_POST['rol']]['id']);
			if ($data != null) {
				if($data->contrasenia == md5($_POST['contrasenia'])){
					$valor=true;				
				}
			}
		}
			
		// echo json_encode(['valor' => $valor]);
	}

	/**
	 * @access public
	 */
	public function cerrarSesion() {
		// Not yet implemented
		session_destroy();
		parent::vista('inicio');
	}
	
	/**
	 * @access public
	 */
	public function cambiarContrasenia() {
		parent::vista('usuarios/recuperarPassword');

	}
	public function emails(){
		$data=$this->modelo->consultarUsuario($_POST['dni']);
		if ($data != null && $data->correo_instu === $_POST['email']) {
			$pass = substr(md5(mt_rand()), 0, 7);
			$opcion = 1;
			require_once 'vendor/PHPMailer-master/index2.php';
			$data = ['dni'=>$_POST['dni'], 'pass'=>md5($pass)];
			$this->modelo->modificarDatos($data);
		}
		else {
			echo "No se puede cambiar!";
		}
	}
}
?>