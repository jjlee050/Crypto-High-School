<?php
/**
 * Main page controller example
 * 
 * TODO form and request helper consider to use symfony2 request component
 */
class Main extends Controller {
	function __construct() {
		
		parent::__construct('main_model');
			 	
		/*$this->session=new Session();
		$this->session->start();
			
		if (!$this->session->get('loggedIn') || !($this->session->get('username'))) {
			header('location:' . BASEPATH . 'login');
		} */
	}
	
	function index() {
		$this -> viewLoader -> render('main');
	}
}