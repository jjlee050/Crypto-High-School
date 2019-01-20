<?php
// Valid constant names
define("COMMON_PULL_COST", 200);
define("RARE_PULL_COST", 600);

class Gacha extends Controller {
    function __construct() {
        parent::__construct('gachaModel');
	    Session::start();
    }

    function index() {        
        $this -> viewLoader -> user = $this -> model -> getUser(Session::getSession("username"));
        $this -> viewLoader -> usercards = $this -> model -> getUserCards(Session::getSession("username"));
        //print_r($this -> model -> getUserCards(Session::getSession("username")));
        $this -> viewLoader -> render('gacha');
    }

    function collectCard() {
        $totalCards = count($this -> model -> getAllCards());
        $user = $this -> model -> getUser(Session::getSession("username"));
        $userCredit = $user["credit"];
        $cardId = rand(1, $totalCards);
        $card = $this -> model -> getCard($cardId);
        $cardBonus = rand(1, 10);

        if (isset($_POST['commonPull'])) {
            if ($userCredit < COMMON_PULL_COST) {
                AlertBox::alert("You do not have enough credit to pull a common card");
            } else {
                $userCredit -= COMMON_PULL_COST;
            }
        } else if (isset($_POST['rarePull'])) {
            if ($userCredit < RARE_PULL_COST) {
                AlertBox::alert("You do not have enough credit to pull a rare card");
            } else {
                $userCredit -= RARE_PULL_COST;
            }
        } else {
            AlertBox::alert("No options selected.");
        }

        $result = $this -> model -> updateUserCredit($userCredit, Session::getSession("username"));
        $result2 = $this -> model -> insertUserCard($user["id"], $cardId, $cardBonus);
        if (($result) && ($result2)) {
            Session::createSession("latestRetrievedCard", $card);
            Session::createSession("latestRetrievedBonus", $cardBonus);
            header("Location: ../gacha");
        }
    }
}
?>