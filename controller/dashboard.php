<?php
/**
 * Dashboard page controller example
 * 
 * TODO form and request helper consider to use symfony2 request component
 */
class Dashboard extends Controller {
	function __construct() {
        parent::__construct('usercard');
	    Session::start();
	}
	
	function index() {
        //$this -> viewLoader -> user = $this -> model -> getUser(Session::getSession("username"));
        $this -> viewLoader -> usercards = $this -> model -> getUserCards(Session::getSession("username"));
        //print_r($this -> model -> getUserCards(Session::getSession("username")));
		$this -> viewLoader -> render('dashboard');
	}
}
?>