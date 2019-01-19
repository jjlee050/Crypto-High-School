<?php
class Login extends Controller {
	function __construct() {
		
		parent::__construct('user');
		Session::start();
	}
	
	function index() {
		$this -> viewLoader -> render('login');
	}
	
	function checkUser() {
		$name = $_POST["name"];
		$password = $_POST["password"];
		
		if ((empty($name)) || (empty($password))) {
			ErrorMessage::show("Please fill in all required fields.");
			return;
		}

		$result = $this -> model -> checkUserCreds($name, $password);
		if ($result) {
			Session::createSession("username", $name);
			header("Location: ../main");
		} else {
			ErrorMessage::show("Invalid login credentials.");
		}
	}

	function logout() {
		Session::destroy();
		header("Location: ../main");
	}
}
?>