<?php

/**
 * @access public
 * @author Amb 302 pc1
 */
class Aprendiz extends Controlador {
	private $_modelo;

	/**
	 * @access public
	 */
	public function Aprendiz() {
		// Not yet implemented
		$this->_modelo = parent::modelo('aprendiz');
	}

	/**
	 * @access public
	 */
	public function consultarFallas() {
		// Not yet implemented
		$data=$this->_modelo->consultarFallas($_SESSION['aprendiz']['id']);
		parent::vistaConCabecera('aprendiz/menu', 'aprendiz/consultarFalla', $data);
	}
	
	/**
	 * @access public
	 */
	public function registrarJustificacion() {
		// Not yet implemented
		$data=$this->_modelo->registrarJustificacion($_POST);
		header('Location: ' . RUTA_URL . 'aprendiz/vistaRegistrarJustificacion');
	}
	
	/**
	 * @access public
	 */
	public function vistaRegistrarJustificacion() {
		// Not yet implemented
		parent::vistaConCabecera('aprendiz/menu', 'aprendiz/registrarJustificacion');
		
	}
	
	/**
	 * @access public
	 */
	public function vistaConsultarProceso() {
		// Not yet implemented
		$data=$this->_modelo->consultarProceso($_SESSION['aprendiz']['id']);
		parent::vistaConCabecera('aprendiz/menu', 'aprendiz/consultarProceso', $data);
	}
}
?>