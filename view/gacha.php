<div id="gacha">
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