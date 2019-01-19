<?php
/**
 * Faucet page controller example
 * 
 * TODO form and request helper consider to use symfony2 request component
 */
class Faucet extends Controller {
    function __construct() {
        parent::__construct('user');
	    Session::start();
    }
    
    function index() {
        $user = $this -> model -> getUser(Session::getSession("username"));
        $this -> viewLoader -> user = $user;
        $this -> viewLoader -> render('faucet');
    }

    function checkCreditClaim() {
        $user = $this -> model -> getUser(Session::getSession("username"));
        date_default_timezone_set('Asia/Singapore');
        $currentDateTime = date('Y-m-d H:i:s');
        
        $lastClaimDateTime = $user['last_claim_date_time'];
        $timeClaim = date('Y-m-d H:i:s', strtotime('+15 minutes', strtotime($lastClaimDateTime)));
        
        if ($currentDateTime > $timeClaim) {
            $newAmount = $user['credit'] + 20;
            $result = $this -> model -> makeClaim($newAmount, Session::getSession("username"));
            if ($result) {
                Session::createSession("lastClaimDate", $currentDateTime);
                header("Location: ../faucet");
            }
        } else {
            AlertBox::alert("You have claimed within the past 15 minutes");
        }
    }
}
?>