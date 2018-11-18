<?php

/**
 * @access public
 * @author Futurist
 */
class BaseDatos{
	private $_db;
	private $_resultado;
	/**
	 * @AssociationType Usuario
	 * @AssociationKind Composition
	 */
	/**
	 * @access public
	 * Conexión a la base de datos.
	 */
	public function BaseDatos() {
		try{
			$this->_db=new PDO('mysql: host = localhost; dbname=desersoft; charset=utf8', 'root', null);
			$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			die($e->getMessage());	
		}
	}

	/**
	 * @access public
	 *  Asignar sentencia a $_resultado.
	 */
	public function consultar($sentencia) {
			$this->_resultado = $this->_db->prepare($sentencia);
	}

	/**
	 * @access public
	 * Ejecutar sentencia.
	 */
	public function ejecutar() {
		try{
			return $this->_resultado->execute();
		}
		catch(Exception $e){
			die($e);
		}

	}
	/**
	 * @access public
	 * Llenar la sentencia $posicion, $valor, $tipo (bindValue(':c', $c, PDO::PARAM_INT)).
	 */
	public function bind($p, $v, $t) {
			$this->_resultado->bindValue($p, $v, $t);
	}
	

	/**
	 * @access public
	 * Mostrar un registro.
	 */
	public function mostrar() {
			return $this->_resultado->fetch(PDO::FETCH_OBJ);
	}
	public function lastId(){
		return $this->_db->lastInsertId();
	}
	/**
	 * @access public
	 * Mostrar todos los registros.
	 */
	public function mostrarTodos() {
		return $this->_resultado->fetchAll(PDO::FETCH_OBJ);
	}
	
	/**
	 * @access public
	 * Obtener la cantidad de filas que regresa un consulta.
	 */
	public function cantidadFilas() {
			$this->_resultado->rowCount();

	}
}
?>