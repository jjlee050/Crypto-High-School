<?php
/**
 * Sign up page controller example
 * 
 * TODO form and request helper consider to use symfony2 request component
 */
class Signup extends Controller {
	function __construct() {
		
		parent::__construct('user');
			 	
		/*$this->session=new Session();
		$this->session->start();
			
		if (!$this->session->get('loggedIn') || !($this->session->get('username'))) {
			header('location:' . BASEPATH . 'login');
		} */
	}
	
	function index() {
		$this -> viewLoader -> render('signup');
    }
    
    function registerUser() {
		if (empty($_POST["name"])) {
			AlertBox::alert("Please enter your name.");
			return;
		}
		else if (empty($_POST["email"])) {
			AlertBox::alert("Please enter your email address.");
			return;
		}
		else if (empty($_POST["password"])) {
			AlertBox::alert("Please enter your password.");
			return;
		}
		else if (empty($_POST["confirm_password"])) {
			AlertBox::alert("Please confirm your password.");
			return;
		}
		else if ($_POST["password"] != $_POST["confirm_password"]) {
			AlertBox::alert("Password and confirm password does not match");
			return;
		} else {
			$result = $this -> model -> registerUser($_POST["name"], $_POST["password"], $_POST["email"]);
			if ($result) {
                echo "User created successfully. <a href='../main'/> Done </a>";
            } else {
                echo "Fail to execute query. Return to the previous page.";
            }
		}
    }
}