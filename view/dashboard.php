<div id="dashboard">
    <?php 
        echo "<h1> Welcome, " . Session::getSession("username") . "</h1>";
    ?>
    <div class="card">
        <div class="card-header">
            <h5> Your Faucet History </h5>
        </div>
        <div class="card-body">
            <p> Last Claim Date: 
                <?php
                    if ((Session::getSession("lastClaimDate") === NULL) || (empty(Session::getSession("lastClaimDate")))) {
                        echo "-";
                    } else {
                        echo Session::getSession("lastClaimDate");
                    }
                ?> 
            </p>
        </div>
    </div>
    <br/>
    <h5> My Cards </h5>
    <hr/>
    <div class="row">
    <?php
        foreach($this -> usercards as $key => $row)
        {
            echo "<div class='col-lg-3'>";
            echo "<div class='card'>";
            echo "<div class='card-header'>";
            echo "<h5>" . $row["card_name"] . "</h5>";
            echo "</div>";
            echo "<img class='card-img-top' alt='Responsive image' src='". ASSETPATH . "img/samples/ayanami.jpg'/>";
            echo "<div class='card-body'>";
            echo "<ul class='list-unstyled'>";
            echo "<li> DPS: " . $row["dps"] . "</li>";
            echo "<li> RPS: " . $row["rps"] . "</li>";
            echo "<li> Price: " . $row["price"] . "</li>";
            echo "<li> Rarity: " . $row["rarity"] . "</li>";
            echo "<li> Bonus: " . $row["card_bonus"] . "%</li>";
            echo "</ul>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    ?>
    </div>
</div>