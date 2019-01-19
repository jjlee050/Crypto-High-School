<?php

class AlertBox {
    public static function alert($msg) {
			echo '<script>';
			echo 'alert("' . $msg . '");';
			echo 'window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";';
			echo '</script>';
    }
}
?>