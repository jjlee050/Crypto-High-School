<?php
/**
 * Main page controller example
 * 
 * TODO form and request helper consider to use symfony2 request component
 */
class Main extends Controller {
	function __construct() {
		parent::__construct('user');
		Session::start();
	}
	
	function index() {
		$this -> viewLoader -> user = $this -> model -> getUser(Session::getSession("username"));
		$this -> viewLoader -> render('main');
	}
}