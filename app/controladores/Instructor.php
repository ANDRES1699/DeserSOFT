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
			$cPD = $this->modelo->consultaProceso($_POST['id_aprendiz']);
			// $html = require_once '../app/vistas/instructor/formato.php';
			$html= $this->vistaPDF($cPD);
			$this->pdf($html);
		} else {
			echo 'Error!';
			# code...
		}	
	}
	function vistaPDF($cPD){
		return utf8_decode('<div id="sena">
		<img id="logo" src="logosenatext.png">
				<div id="text">
					<label>REPORTE DE DESERCIÓN</label><br>
					<label>F-19-08-9210 V. 1</label><br>
					<label>EJECUCIÓN DE LA FORMACIÓN PROFESIONAL</label>
				</div>
			</div>

			<div id="sena1">
				<label>Nombre del aprendiz:'.$cPD->nombres.''.$cPD->apellidos.'</label><br>
				<label>Documento de identidad:'.$cPD->Tip_doc.'</label>
				<label id="seg">No.'.$cPD->num_documento.'</label><br>
				<label>Programa de Formación:'.$cPD->nom_programa.'</label><br>
				<label>Ficha Caracterización Sofíaplus:'.$cPD->num_ficha.'</label><br>
				<label>Competencia que cursa:'.$cPD->nom_competencia.'</label>
				<label id="seg">Trimestre que cursa:'.$cPD->num_trimestre.'</label><br>
				<label>Fecha reporte:'.$cPD->fecha_reporte.'</label><br>
				<label>Primer fecha:'.$cPD->fecha_desercion1.'</label><br>
				<label>Segunda fecha:'.$cPD->fecha_desercion2.'</label><br>
				<label>Tercera fecha:'.$cPD->fecha_desercion3.'</label><br>
			<div id="causas">	
				<label>CAUSAS DE DESERCIÓN</label><br>
                <h1>'.$cPD->nombre.'</h1><br>
			</div>	
			<div id="observaciones">
				<label>Observaciones:</label><br>
                <h1>'.$cPD->observaciones.'</h1><br>
			</div>	
				<label>VERIFICACIÓN DE REPORTE:</label>
				<label id="seg1">Estado en Sofía:</label><br><br>
				<label>Fecha verificación:</label><br><br>
				<label>Nota: Anexar la notificación de la deserción, enviada por correo al aprendiz.</label><br>
				<br>
				<br>
				<br>
				<br>
				<label id="border">Nombre y firma instructor</label>
				<label id="border">Nombre y firma vocero del Grupo</label><br><br><br><br><br>
				<label id="border">Nombre y firma instructor</label>
				<label id="border">Nombre y firma responsable de seguimiento aprendices</label><br><br><br><br><br>
				<label id="border">Vo.Bo, Coordinador académico</label><br><br><br>
				<label>ACTA No.</label>
				<label id="seg">FECHA:</label><br>
			</div>');
	}
	public function pdf($html) {
		try{
			require_once 'librerias\fpdf\WriteHTML.php';
			$pdf=new PDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','',12);
			$pdf->SetTextColor(15,50,225);
			$pdf->WriteHTML($html);
			$html="<table>
						<thead>
							<tr>
								<td>Id alquiler</td>
								<td>Fecha inicio</td>
								<td>Fecha fin</td>
							</tr>
						</thead>
					</table>";
			$pdf->WriteHTML($html);
			$pdf->Output();
		}catch(Exception $e){
			die($e);
		}

	}
}
?>