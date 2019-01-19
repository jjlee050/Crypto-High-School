<?php
class Session {
    public static function start() {
        if(!isset($_SESSION)) {
            session_start();
       }
    }

    public static function createSession($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function getSession($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public static function destroy() {
        session_destroy();
    }
}
?>