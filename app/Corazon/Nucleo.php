<?php
/**
 * @access public
 * @author Amb 302 pc1
 */
session_start();
class Nucleo {
	private $_c;
	private $_m;
	private $_p;

	/**

	 */
	public function Nucleo() {
		$this->_c='Index';
		$this->_m='inicio';
		$this->_p=[];

		$url=isset($_REQUEST['url']) ? explode('/', $_REQUEST['url']) : null;

		if ($url[0]) {
			if (file_exists('../app/controladores/'. ucwords($url[0]). '.php')) {
				$this->_c=$url[0];
				unset($url[0]);
			}
		}
		require_once '../app/controladores/'. $this->_c .'.php';
		$this->_c= new $this->_c();

		if ($url[1]) {
			if (method_exists($this->_c, $url[1])) {
				$this->_m=$url[1];
				unset($url[1]);
			}
		}
		
		$this->_p = $url ? array_values($url) : [];
		$_SESSION['PARAM']=$this->_p[0];
		call_user_func_array([$this->_c, $this->_m], $this->_p);
	}
}
?>