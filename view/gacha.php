<div id="gacha">

<!-- NEW CAROUSEL -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 h-25" src="<?php echo ASSETPATH; ?>img/samples/1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-25" src="<?php echo ASSETPATH; ?>img/samples/2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 h-25" src="<?php echo ASSETPATH; ?>img/samples/3.jpg" alt="Third slide">
            </div>
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