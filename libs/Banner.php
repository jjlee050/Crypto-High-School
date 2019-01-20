<?php
class Banner {
    public static function show($img) {
        echo '<div class="container text-center">';
        echo '<a href="https://hacknroll.nushackers.org/">';
        echo '<img class="image" src="'. $img . '">';
        echo '</a>';
        echo '</div><br>';
    }

    public static function show4($img) {
        echo '<div class="container text-center">';
        echo '<a href="https://hacknroll.nushackers.org/">';
        echo '<img class="image" src="'. $img . '">';
        echo '<img class="image" src="'. $img . '">';
        echo '<img class="image" src="'. $img . '">';
        echo '<img class="image" src="'. $img . '">';
        echo '</a>';
        echo '</div><br>';
    }
}
?>