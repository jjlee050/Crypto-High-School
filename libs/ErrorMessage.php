<?php
class ErrorMessage {
    public static function show($msg) {
        echo "<b> Error: </b> " . $msg . "<br/> Click <a href=". $_SERVER['HTTP_REFERER'] ."> here </a> to the previous page.";
    }
}
?>