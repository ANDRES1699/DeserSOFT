<?php

/**

 */
class AprendizModelo extends Usuario {

	/**

	 */
	public function Aprendiz() {
		// Not yet implemented
	}

	/**
	 */
	public function consultarFallas($Data) {
		// Not yet implemented
		try {
			$this->_conexion->consultar("SELECT * FROM `inasistencias` INNER JOIN usuarios ON usuarios.id_usuario =inasistencias.usuarios_id_usuario WHERE usuarios.id_usuario=?");
			$this->_conexion->bind(1, $Data, PDO::PARAM_INT);
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrarTodos();

		} catch (Exception $e) {
			die($e);
		}
	}
	
	/**


	 */
	public function registrarJustificacion($Data) {
		// Not yet implemented
			try {
				$this->_conexion->consultar("INSERT INTO `justificaciones`(`fecha_justificacion`, `usuarios_id_usuario`, `tipo_justificaciones_id_tipo_justificacion`, `estados_id_estado`) VALUES (?,?,?,?)");
				$this->_conexion->bind(1, $Data['fecha_justificacion'], PDO::PARAM_STR);
				$this->_conexion->bind(2, $Data['usuarios_id_usuario'], PDO::PARAM_INT);
				$this->_conexion->bind(3, $Data['tipo_justificaciones_id_tipo_justificacion'], PDO::PARAM_INT);
				$this->_conexion->bind(4, 2, PDO::PARAM_INT);
				return $this->_conexion->ejecutar();

			} catch (Exception $e) {
				die($e);
			}
			
		}
		
		/**
	
		 */
		public function consultarProceso($Id) {
			try {
				$this->_conexion->consultar("SELECT * FROM `deserciones` INNER JOIN usuarios ON deserciones.usuarios_id_usuario=usuarios.id_usuario WHERE usuarios.id_usuario=? AND deserciones.estados_id_estado=1");
				$this->_conexion->bind(1, $Id, PDO::PARAM_INT);
				$this->_conexion->ejecutar();
				return $this->_conexion->mostrar();
				
			} catch (Exception $e) {
				die($e);
			}
			// Not yet implemented
		}
		
		/**
	
	
		 */
		public function modificarDatos($Data) {
			try {
				$this->_conexion->consultar("UPDATE `usuarios` SET `imagen`=?, `nombre`=?,`apellido`=?,`cel_usuario`=?,`tel_usuario`=?,`correo_person`=?,`correo_instu`=?,`contrasenia`=?, `tip_documentos_id_doc`=? WHERE id_usuario=?");
				$this->_conexion->bind(1, $Data['imagen'], PDO::PARAM_STR);
				$this->_conexion->bind(2, $Data['nombre'], PDO::PARAM_STR);
				$this->_conexion->bind(4, $Data['apellido'], PDO::PARAM_STR);
				$this->_conexion->bind(5, $Data['cel_usuario'], PDO::PARAM_STR);
				$this->_conexion->bind(6, $Data['tel_usuario'], PDO::PARAM_STR);
				$this->_conexion->bind(7, $Data['correo_person'], PDO::PARAM_STR);
				$this->_conexion->bind(8, $Data['correo_instu'], PDO::PARAM_STR);
				$this->_conexion->bind(9, $Data['contrasenia'], PDO::PARAM_STR);
				$this->_conexion->bind(10, $Data['tip_documentos_id_doc'], PDO::PARAM_INT);
				$this->_conexion->bind(11, $Data['id_usuario'], PDO::PARAM_INT);
				return $this->_conexion->ejecutar();
			
			} catch (Exception $e) {
				die($e);
			}
			// Not yet implemented
		}
}
?> 