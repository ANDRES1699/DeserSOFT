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
		$data = $this->modelo->consultaCausas();
		parent::vistaConCabecera('instructor', 'instructor/consultAprendices', $Datos, $data);
	}
	
	/**
	 */
	public function registrarAprendices() {
		$this->modelo->registrarAprendices($_POST);
		header('Location: '.RUTA_URL.'instructor/vistaRegistrarAprendices');
	}
	
	public function registrarDesercion() {
		if ($this->modelo->registrarInicioProceso($_POST)) {
			echo 'Registrado!';
		} else {
			echo 'Error!';
			# code...
		}	
	}
	public function pdf($html) {
		try{
			require_once 'librerias\fpdf\WriteHTML.php';
			$pdf=new PDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','',12);
			$pdf->WriteHTML($html);
			$pdf->Output();
		}catch(Exception $e){
			die($e);
		}

	}
}
?>