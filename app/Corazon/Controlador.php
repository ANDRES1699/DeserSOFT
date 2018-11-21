<?php
/**
 * @access public
 * @author Amb 302 pc1
 */
class Controlador {
	protected $modelo;
	/**
	 * @access public
	 */
	public function Controlador() {
		
	}

	/**
	 * @access public
	 * @param string aVista
	 * @param array aDatos=[]
	 * @ParamType aVista string
	 * @ParamType aDatos=[] array
	 */
	public function vista($Vista, $Datos=[]) {
		// Not yet implemented
		if(file_exists('../app/vistas/' . $Vista . '.php')){
			require_once('../app/vistas/estructura/header.php');
			require_once('../app/vistas/' . $Vista . '.php');
			require_once('../app/vistas/estructura/footer.php');
		}
	}

	/**
	 * @access public
	 * @param string aCabecera
	 * @param string aCuerpo
	 * @param array aDatos=[]
	 * @ParamType aCabecera string
	 * @ParamType aCuerpo string
	 * @ParamType aDatos=[] array
	 */
	public function vistaConCabecera($Cabecera, $Cuerpo, $Datos=[]) {

		if (file_exists('../app/vistas/' . $Cuerpo . '.php')) {
			if(isset($_SESSION[$Cabecera])){
				require_once( '../app/vistas/estructura/header.php');
				require_once( '../app/vistas/' . $Cabecera .'/'. $Cabecera . '.php');
				require_once( '../app/vistas/' . $Cuerpo . '.php');
				require_once( '../app/vistas/estructura/footer.php');
			}
			else{
				header('Location: '.RUTA_URL.'index/inicio');
			}
	
		}
	}

	/**
	 * @access public
	 * @param string aModelo
	 * @ParamType aModelo string
	 */
	public function modelo($Modelo) {
		$Modelo.='Modelo';
		if (file_exists('../app/modelos/' . $Modelo . '.php')) {
			require_once ('../app/modelos/'. $Modelo . '.php');
			return new $Modelo();
		}
	}
	function asignacionModelo($model) {
		$this->modelo = $this->modelo($model);
	}
}
?>