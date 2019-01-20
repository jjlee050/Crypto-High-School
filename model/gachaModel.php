<?php 
class GachaModel extends Model {
    public function getAllCards($rarity) {
        try {
            return $this -> db -> fetchAllAssoc("SELECT `card_id` FROM card_data
                WHERE `rarity` = :rarity ORDER BY `card_id` DESC",
                array(':rarity' => $rarity));
        } catch (Exception $e) {
            ErrorMessage::show($e->getMessage());
        }
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

    public function getCard($cardId) {
        try {
            return $this -> db -> fetchSingle("SELECT * FROM `card_data`
                WHERE `card_id` = :cardId",
                array(':cardId' => $cardId));
        } catch (Exception $e) {
            ErrorMessage::show($e->getMessage());
        }
    }

    public function updateUserCredit($newCredit, $name) {
        try {
            return $this -> db -> onlyExecute("UPDATE `user`
                SET `credit` = :new_credit WHERE `name` = :name",
                array(':new_credit' => $newCredit, ':name' => $name));
        } catch (Exception $e) {
            ErrorMessage::show($e->getMessage());
        }
    }

    public function insertUserCard($userId, $cardId, $cardBonus) {
        try {
            return $this -> db -> onlyExecute("INSERT INTO `user_card`(`user_id`,`card_id`,`card_bonus`)
                VALUES(:userId, :cardId, :cardBonus)",
                array(':userId' => $userId, ':cardId' => $cardId, ':cardBonus' => $cardBonus));
        } catch (Exception $e) {
            ErrorMessage::show($e->getMessage());
        }
    }
}
?>