<?php
/**
 * The Model class of UserCard to keep track of user's card objects.
 */
class UserCard extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function getUserCards($name) {
        try {
            return $this -> db -> fetchAllAssoc("SELECT * FROM user_card as uc
                INNER JOIN user as u ON uc.user_id = u.id 
                INNER JOIN card_data as cd ON uc.card_id = cd.card_id
                WHERE u.name = :name",
                array(':name' => $name));
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

}
?>