<div id="dashboard">
    <?php 
        foreach($this -> usercards as $key => $row)
        {
            echo $row['name'] . "<br/>";
        }
    ?>
</div>