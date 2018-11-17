<?php
/**
 * @access public
 * @author Amb 302 pc1
 */
class Instructor extends Controlador {
	/**
	 */
	function __construct() {
		parent::asignacionModelo('instructor');
	}

	/**
	 */
	public function vistaModificarDatos() {

		parent::vistaConCabecera('instructor','instructor/modificarDatos');
	}

	/**
	 */
	public function modificarDatos() {

	}

	/**
	 */
	public function vistaConsultarficha() {
			$Datos = $this->modelo->consultarFichas();
			parent::vistaConCabecera('instructor','instructor/consultFichas', $Datos);

	}

	/**
	 */
	public function vistaConsultarProgramsInscritos() {
	}

	/**
	 */
	public function vistaRegistrarAprendices() {
		$Datos = $this->modelo->consultarAprendicesFicha($_SESSION['PARAM']);
		parent::vistaConCabecera('instructor', 'instructor/consultAprendices', $Datos);
	}
	
	/**
	 */
	public function registrarAprendices() {
		$this->modelo->registrarAprendices($_POST);
		$Datos = $this->modelo->consultarAprendicesFicha($_SESSION['PARAM']);
		parent::vistaConCabecera('instructor', 'instructor/consultAprendices', $Datos);
	}
	
	/**
	 */
	public function vistaRegistrarDesercion() {
	}

	/**
	 */
	public function registrarDesercion() {
		// Not yet implemented
	}
}
?>