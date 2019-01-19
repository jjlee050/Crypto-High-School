<?php
class Login extends Controller {
	function __construct() {
		
		parent::__construct('user');
			 	
		/*$this->session=new Session();
		$this->session->start();
			
		if (!$this->session->get('loggedIn') || !($this->session->get('username'))) {
			header('location:' . BASEPATH . 'login');
		} */
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
			echo "User login successfully. <br/> Click <a href='../main'/> here </a> to resume activities.";
		}
	}
}
?>