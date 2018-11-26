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
			INNER JOIN usuarios ON usuarios.id_usuario=fichas_has_usuarios.usuarios_id_usuario
			INNER JOIN fichas ON fichas.num_ficha=fichas_has_usuarios.fichas_num_ficha 
			INNER JOIN estado ON estado.id_estado=usuarios.estado_usuario_id_estado 
			INNER JOIN programas ON programas.id_programa=fichas.id_programa 
			INNER JOIN trimestres ON trimestres.id_trimestre=fichas.id_trimestre 
			INNER JOIN jornadas ON jornadas.id_jornada=fichas.id_jornada
			INNER JOIN tipo_documento ON tipo_documento.id_doc=usuarios.id_doc WHERE usuarios.roles_id_rol=3
			AND fichas_has_usuarios.fichas_num_ficha=? AND usuarios.estado_usuario_id_estado=1");
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
	public function actualizarEAprendiz($id) {
			try
			{
				$this->_conexion->consultar("UPDATE `usuarios` SET `estado_usuario_id_estado`=? WHERE `id_usuario`=?");
				$this->_conexion->bind(1, 3, PDO::PARAM_INT);
				$this->_conexion->bind(2, $id, PDO::PARAM_INT);
				$this->_conexion->ejecutar();
			} catch (Exception $e) {
				die($e->getMessage());
			}
	}
	/**
	 * Encargado de hacer el proceso de registrar un usuario aprendiz
	 */
	public function registrarAprendices($Data) {
		try{
			$this->_conexion->consultar("INSERT INTO usuarios (nombres, apellidos, id_doc, num_documento, cel_usuario, tel_usuario, correo_instu, correo_perso, contrasenia, estado_usuario_id_estado, roles_id_rol, imagen) VALUES (?,?,?,?,?,?,?,?,?,1,3,?)");
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
			$this->_conexion->bind(10, $Data['img'], PDO::PARAM_STR);
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
		$this->_conexion->consultar("INSERT INTO fichas_has_usuarios (fichas_num_ficha, usuarios_id_usuario) VALUES (?,?)");
		$this->_conexion->bind(1, $ficha, PDO::PARAM_INT);
		$this->_conexion->bind(3, $id, PDO::PARAM_INT);
		return $this->_conexion->ejecutar();
	}
	
	/**

	 */
	public function registrarInicioProceso($Data) {
		try{
			$this->_conexion->consultar("INSERT INTO deserciones (fecha_desercion1, fecha_desercion2, fecha_desercion3, observaciones, id_aprendiz) VALUES (?,?,?,?,?)");
			$this->_conexion->bind(1, $Data['fecha1'], PDO::PARAM_STR);
			$this->_conexion->bind(2, $Data['fecha2'], PDO::PARAM_STR);
            $this->_conexion->bind(3, $Data['fecha3'], PDO::PARAM_STR);
            $this->_conexion->bind(4, $Data['obser'], PDO::PARAM_STR);
			$this->_conexion->bind(5, $Data['id_aprendiz'], PDO::PARAM_INT);
			$this->_conexion->ejecutar();
			return $this->registrarCausa([$this->_conexion->lastId(), $Data['causa']]);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function registrarCausa($Data) {
		try{
			$this->_conexion->consultar("INSERT INTO `deserciones_has_desercausa`(`deserciones_id_desercion`, `desercausa_idDCausa`) VALUES (?,?)");
			$this->_conexion->bind(1, $Data[0], PDO::PARAM_INT);
            $this->_conexion->bind(2, $Data[1], PDO::PARAM_INT);
			return $this->_conexion->ejecutar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function consultaCausas() {
		try{
			$this->_conexion->consultar("SELECT * FROM `desercausa`");
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrarTodos();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function consultaProceso($data) {
		try{
			$this->_conexion->consultar("SELECT usuarios.nombres, usuarios.correo_instu, usuarios.apellidos, tipo_documento.Tip_doc, usuarios.num_documento, usuarios.correo_instu, programas.nom_programa, fichas.num_ficha, competencias.nom_competencia, trimestres.num_trimestre, deserciones.fecha_reporte, deserciones.fecha_desercion1, deserciones.fecha_desercion2, deserciones.fecha_desercion3, desercausa.nombre, deserciones.observaciones FROM `deserciones_has_desercausa` 
			INNER JOIN desercausa ON desercausa.idDCausa = deserciones_has_desercausa.desercausa_idDCausa 
			INNER JOIN deserciones ON deserciones_has_desercausa.deserciones_id_desercion = deserciones.id_desercion 
			INNER join usuarios ON deserciones.id_aprendiz = usuarios.id_usuario 
			INNER JOIN tipo_documento ON tipo_documento.id_doc = usuarios.id_doc 
			INNER JOIN fichas_has_usuarios ON fichas_has_usuarios.usuarios_id_usuario = usuarios.id_usuario 
			INNER JOIN fichas ON fichas.num_ficha = fichas_has_usuarios.fichas_num_ficha 
			INNER JOIN programas ON programas.id_programa = fichas.id_programa 
			INNER JOIN competencias ON competencias.id_programa = programas.id_programa 
			INNER JOIN trimestres ON trimestres.id_trimestre = fichas.id_trimestre WHERE usuarios.id_usuario = ?");
			$this->_conexion->bind(1, $data, PDO::PARAM_INT);
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>