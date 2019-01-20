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
        $this -> viewLoader -> cards = $this -> model -> getAllCards();
        //print_r($this -> model -> getAllCards("common"));
        $this -> viewLoader -> render('gacha');
    }

    function collectCard() {

        $user = $this -> model -> getUser(Session::getSession("username"));
        $userCredit = $user["credit"];
        $cardBonus = rand(1, 10);
        $rarity = "";

        if (isset($_POST['commonPull'])) {
            if ($userCredit < COMMON_PULL_COST) {
                AlertBox::alert("You do not have enough credit to pull a common card");
                return;
            } else {
                $userCredit -= COMMON_PULL_COST;
                $rarity = "common";
            }
        } else if (isset($_POST['rarePull'])) {
            if ($userCredit < RARE_PULL_COST) {
                AlertBox::alert("You do not have enough credit to pull a rare card");
                return;
            } else {
                $userCredit -= RARE_PULL_COST;
                $rarity = "rare";
            }
        } else {
            AlertBox::alert("No options selected.");
        }

        $cards = array();
        foreach($this -> model -> getAllCardsByRarity($rarity) as $key => $row) {
            array_push($cards, $row["card_id"]);
        }
        $cardId = $cards[array_rand($cards, 1)];
        $card = $this -> model -> getCard($cardId);

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