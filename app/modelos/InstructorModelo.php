<?php


/**

 */
class InstructorModelo extends UsuarioModelo {

	/**

	 */
	/**

	 */
	public function consultarFichas() {
		try{
			$this->_conexion->consultar("SELECT * FROM fichas INNER JOIN programas ON fichas.id_programa=programas.id_programa INNER JOIN jornadas ON fichas.id_jornada=jornadas.id_jornada INNER JOIN trimestres ON fichas.id_trimestre=trimestres.id_trimestre");
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrarTodos();
        } catch (Exception $e) {
            die($e->getMessage());
        }
	}
	/**
	 * Encargado de consultar 
	 */
	public function consultarAprendicesFicha($ficha)
	{
		try {
			$this->_conexion->consultar("SELECT * FROM `fichas_has_usuarios` 
			INNER JOIN usuarios ON usuarios.id_usuario=fichas_has_usuarios.usuarios_id_aprendiz
			INNER JOIN fichas ON fichas.num_ficha=fichas_has_usuarios.fichas_num_ficha 
			INNER JOIN estado ON estado.id_estado=usuarios.estado_usuario_id_estado 
			INNER JOIN programas ON programas.id_programa=fichas.id_programa 
			INNER JOIN trimestres ON trimestres.id_trimestre=fichas.id_trimestre 
			INNER JOIN jornadas ON jornadas.id_jornada=fichas.id_jornada
			INNER JOIN tipo_documento ON tipo_documento.id_doc=usuarios.id_doc WHERE usuarios.roles_id_rol=3
			AND fichas_has_usuarios.fichas_num_ficha=?");
			$this->_conexion->bind(1, $ficha, PDO::PARAM_INT);
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrarTodos();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	/**
	 * Encargado de consultar los programas que se han inscrito en la base de datos
	 */
	public function consultarProgramasInscritas($Data) {
			try
			{
				$this->_conexion->consultar("SELECT * FROM programas /*INNER JOIN niveles ON programas.niveles_id_nivel=niveles.id_nivel INNER JOIN estados ON programas.estados_id_estado=estado.id_estado*/");
				$this->_conexion->ejecutar();
				return $this->_conexion->mostrarTodos();
			} catch (Exception $e) {
				die($e->getMessage());
			}
	}
	/**
	 * Encargado de hacer el proceso de registrar un usuario aprendiz
	 */
	public function registrarAprendices($Data) {
		try{
			$this->_conexion->consultar("INSERT INTO usuarios (imagen, nombres, apellidos, id_doc, num_documento, cel_usuario, tel_usuario, correo_instu, correo_perso, contrasenia, estado_usuario_id_estado, roles_id_rol) VALUES ('', ?,?,?,?,?,?,?,?,?,1,3)");
            /*$this->_conexion->bind(1,$Data['imagen'], PDO::PARAM_STR);*/
            /*$this->_conexion->bind(1,$Data['create_time'], PDO::PARAM_DATE);*/
            $this->_conexion->bind(1, $Data['nombres'], PDO::PARAM_STR);
            $this->_conexion->bind(2, $Data['apellidos'], PDO::PARAM_STR);
			$this->_conexion->bind(3, $Data['id_doc'], PDO::PARAM_INT);
            $this->_conexion->bind(4, $Data['num_documento'], PDO::PARAM_STR);
            $this->_conexion->bind(5, $Data['cel_usuario'], PDO::PARAM_STR);
			$this->_conexion->bind(6, $Data['tel_usuario'], PDO::PARAM_STR);
			$this->_conexion->bind(7, $Data['correo_instu'], PDO::PARAM_STR);
			$this->_conexion->bind(8, $Data['correo_perso'], PDO::PARAM_STR);
			$this->_conexion->bind(9, md5('Aprendiz123'), PDO::PARAM_STR);
			/*$this->_conexion->bind(10,$Data['contrasenia'], PDO::PARAM_STR);*/
			$this->_conexion->ejecutar();
			// Aprendiz - ficha se pasan los argumentos a la función
			return $this->registrarAF($this->_conexion->lastId(), $Data['ficha']);
			//////////////////////////////NEED HEEEELP//////////////////////////////////////
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	// Aprendiz - ficha registro a la ficha
	function registrarAF($id, $ficha){
		$this->_conexion->consultar("INSERT INTO fichas_has_usuarios (fichas_num_ficha, usuarios_id_instructor, usuarios_id_aprendiz) VALUES (?,?,?)");
		$this->_conexion->bind(1, $ficha, PDO::PARAM_INT);
		$this->_conexion->bind(2, $_SESSION['Instructor']['id'], PDO::PARAM_INT);
		$this->_conexion->bind(3, $id, PDO::PARAM_INT);
		return $this->_conexion->ejecutar();
	}
	
	/**

	 */
	public function registrarInicioProceso($Data) {
		try{
			$this->_conexion->consultar("INSERT INTO deserciones (fecha_reporte, fecha_desercion1, fecha_desercion2, fecha_desercion3, observaciones, usuarios_id_usuario, causas_id_causa) VALUES (?,?,?,?,?,?,?)");
			$this->_conexion->bind(1, $Data['fecha_reporte'], PDO::PARAM_STR);
			$this->_conexion->bind(2, $Data['fecha_desercion1'], PDO::PARAM_DATE);
			$this->_conexion->bind(3, $Data['fecha_desercion2'], PDO::PARAM_STR);
            $this->_conexion->bind(4, $Data['fecha_desercion3'], PDO::PARAM_STR);
            $this->_conexion->bind(5, $Data['observaciones'], PDO::PARAM_STR);
            $this->_conexion->bind(6, $Data['usuarios_id_usuario'], PDO::PARAM_STR);
			$this->_conexion->bind(7, $Data['causas_id_causa'], PDO::PARAM_STR);
			return $this->_conexion->ejecutar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>