<?php
/*
 MODELO DE USUARIO
 */
class UsuarioModelo{
	
	protected $_conexion;
	function __construct()
	{
		try{
			$this->_conexion = new BaseDatos();
		}
		catch(Exception $e){
			die($e);
		}
	}
	/*
	
	*/ 
	public function consultarUsuario($Id) {
		// consultar usuario
		try {
			$this->_conexion->consultar("SELECT * FROM `usuarios` INNER JOIN roles ON usuarios.roles_id_rol=roles.id_rol WHERE num_documento=?");
			$this->_conexion->bind(1, $Id, PDO::PARAM_INT);
			$this->_conexion->ejecutar();
			return $this->_conexion->mostrar();

		} catch (Exception $e) {
			die($e);
		}
	}
	
	/**

	 */
	public function modificarDatos($Data) {
		try {
			// modificar datos
			$this->_conexion->consultar("UPDATE `usuarios` SET `contrasenia`=? WHERE id_usuario=?");
			$this->_conexion->bind(1, $Data['contrasenia'], PDO::PARAM_STR);
			$this->_conexion->bind(2, $Data['id_usuario'], PDO::PARAM_INT);
			return $this->_conexion->ejecutar();

		} catch (Exception $e) {
			die($e);
		}
	}
}
?>