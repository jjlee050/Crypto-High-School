<?php
/**
 * The Model class of user to keep track of user objects.
 */
class User extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function registerUser($name, $password, $email) {
        try {
            return $this -> db -> onlyExecute("INSERT INTO `user`(`id`, `name`, `password`, `email`, `last_claim_date_time`, `credit`, `register_date_time`)
                VALUES (0,:name, sha2(:password, 512), :email, NULL, 0, NOW())",
                array(':name' => $name, ':password' => $password, ':email' => $email));
        } catch (Exception $e) {
            ErrorMessage::show($e->getMessage());
        }
    }

    public function checkUserCreds($name, $password) {
        try {
            return $this -> db -> fetchSingle("SELECT * FROM `user`
                WHERE `name` = :name AND `password` = SHA2(:password, 512)",
                array(':name' => $name, ':password' => $password));
        } catch (Exception $e) {
            ErrorMessage::show($e->getMessage());
        }
    }

    public function getUser($name) {
        try {
            return $this -> db -> fetchSingle("SELECT * FROM `user`
                WHERE `name` = :name",
                array(':name' => $name));
        } catch (Exception $e) {
            ErrorMessage::show($e->getMessage());
        }
    }

    public function makeClaim($credit, $name) {
        try {
            //`user` SET `credit` = '$new_amount', `last_claim_date_time` = NOW() WHERE `name` = '$name' 
            return $this -> db -> onlyExecute("UPDATE `user` SET `credit` = :credit, `last_claim_date_time` = NOW() WHERE `name` = :name ",
            array(':credit' => $credit, ':name' => $name));
        } catch (Exception $e) {
            ErrorMessage::show($e->getMessage());
        }
    }

}
?>