<?php
/**
 * Sign up page controller example
 * 
 * TODO form and request helper consider to use symfony2 request component
 */
class Signup extends Controller {
	function __construct() {
		parent::__construct('user');
	}
	
	function index() {
		$this -> viewLoader -> render('signup');
    }
    
    function registerUser() {
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$confirmPassword = $_POST["confirm_password"];
		
		if ((empty($name)) || (empty($email)) || (empty($password)) || (empty($confirmPassword))) {
			ErrorMessage::show("Please fill in all required fields.");
			return; 
		} else if ($password != $confirmPassword) {
			ErrorMessage::show("Password and confirm password does not match.");
			return;
		}
		
		$result = $this -> model -> registerUser($name, $password, $email);
		if ($result) {
            echo "User created successfully. <br/> Click <a href='../main'/> here </a> to resume activities.";
        }
	}
}
?>