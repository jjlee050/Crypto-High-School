<?php
/**
 * Main page controller example
 * 
 * TODO form and request helper consider to use symfony2 request component
 */
class Main extends Controller {
	function __construct() {
		parent::__construct('main_model');
	}
	
	function index() {
		$this -> viewLoader -> render('main');
	}
}