<?php
    Banner::show4("https://media.giphy.com/media/VjefwjZeFTLH2/giphy.gif");
?>

<div id="gacha">
    <!-- NEW CAROUSEL -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php 
                $totalCards = count($this->cards);
                for($i = 0; $i < $totalCards; $i++) {
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='". $i."'";
                    if ($i == 0) {
                        echo "class='active'>";
                    }
                    echo "</li>";
                }
            ?>
        </ol>
        <div class="carousel-inner">
            <script>
                $(document).ready(function(){
                    $(".carousel-item:first").addClass("active");
                });
            </script>
            <?php 
                foreach($this -> cards as $key => $row) {
                    echo "<div class='carousel-item'>";
                    echo "<img class='d-block w-100 h-25' src='" . ASSETPATH . "img/samples/" . $row["card_img"] . "' alt='Responsive image'>";
                    echo "</div>";
                }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <form action="gacha/collectCard" method="post">
        <div class="card">
            <div class="card-header">
                <h5> Information </h5>
            </div>
            <div class="card-body">
                <p> Select option from Gacha </p>
                <p> Pull 1 Common card Costs 200 Credits </p>
                <p> Pull 1 Rare card Costs 600 Credits </p>
                <hr/>
                <p> Your Credit Balance: 
                    <?php
                        echo $this -> user["credit"];
                    ?>
                </p>
                <hr/>
                <b><?php
                    if ((!empty(Session::getSession("latestRetrievedCard"))) && (!empty(Session::getSession("latestRetrievedBonus")))) {
                        echo "You receive " . Session::getSession("latestRetrievedCard")["card_name"] . " with the bonus of " . Session::getSession("latestRetrievedBonus") . "%. ";
                        Session::createSession("latestRetrievedCard","");
                        Session::createSession("latestRetrievedBonus","");
                    }
                ?><b>
            </div>
        </div>
        <br/>
        <div class="form-group text-center">
            <input type="submit" name="commonPull" value="Pull Common" class="btn btn-success" />
            <input type="submit" name="rarePull" value="Pull Rare" class="btn btn-warning"/>
        </div>
    </form>
</div>