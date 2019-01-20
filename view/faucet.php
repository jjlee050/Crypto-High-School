<?php
    Banner::show("https://media.giphy.com/media/VTxmwaCEwSlZm/giphy.gif");
?>

<?php 
    $lastClaimDateTime = $this -> user["last_claim_date_time"];
    $currentDateTime = date('Y-m-d H:i:s');
    $timeClaim = date('Y-m-d H:i:s', strtotime('+15 minutes', strtotime($lastClaimDateTime)));
    $interval = strtotime($timeClaim) - strtotime($currentDateTime);

    $years = floor($interval / (365*60*60*24));  
    $months = floor(($interval - $years * 365*60*60*24) / (30*60*60*24));  
    $days = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 

    $hours = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));  
    $minutes = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);  
    
    $seconds = floor(($interval - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));  
?>
<div id="faucet">
    <form method="post" action="faucet/checkCreditClaim" class="container text-center">
	    <fieldset>
            <div class="card">
                <h5 class="card-header">Claim your credits</h5>
                <div class="card-body">
                    <p> You can claim 20 credits for every 15 minutes </p>
                    <p> Your Credit Balance: 
                        <?php
                            echo $this -> user["credit"]. "<br/>";
                            if ((($minutes <= 0) && ($seconds <= 0)) || ($hours < 0) || ($days < 0) || ($months < 0) || ($years < 0) || (!isset($lastClaimDateTime))) { 
                                echo "<script>$(document).ready(function(){ $('#clockdiv').hide();$('#claimSection').show(); });</script>";
                            } else {
                                echo "<script>$(document).ready(function(){ $('#clockdiv').show();$('#claimSection').hide(); });</script>";
                            }                
                        ?>
                    </p>
                </div>
            </div>
            <br/>
            <div id="claimSection" class="card">
                <p> You can claim your credits now. </p>
                <input id="claimBtn" type="submit" name="submit" value="Claim" class="btn btn-primary" />
            </div>
            <div id='clockdiv' class='text-center card'>
                <script>
                    var time_in_minutes = <?php echo $minutes; ?>;
                    var current_time = Date.parse(new Date());
                    var deadline = new Date("<?php echo $timeClaim; ?>");

                    function time_remaining(endtime) {
                        var t = Date.parse(endtime) - Date.parse(new Date());
                        var seconds = Math.floor((t / 1000) % 60);
                        var minutes = Math.floor((t / 1000 / 60) % 60);
                        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                        var days = Math.floor( t / (1000 * 60 * 60 * 24));
                        return {'total': t, 'days': days, 'hours': hours, 'minutes': minutes, 'second': seconds};
                    }

                    function time_remaining(endtime) {
                        var t = Date.parse(endtime) - Date.parse(new Date());
                        var seconds = Math.floor( (t/1000) % 60 );
                        var minutes = Math.floor( (t/1000/60) % 60 );
                        var hours = Math.floor( (t/(1000*60*60)) % 24 );
                        var days = Math.floor( t/(1000*60*60*24) );
                        return {'total': t, 'days': days, 'hours': hours, 'minutes': minutes, 'seconds': seconds};
                    }

                    function run_clock(id, endtime) {
                        var clock = document.getElementById(id);
                        function update_clock() {
                            var t = time_remaining(endtime);
                            clock.innerHTML = '<h1>Countdown to next claim <br/>'+ t.minutes+' m '+ t.seconds + 's <h1>';
                            if(t.total <= 0) {
                                clearInterval(timeinterval);
                                document.getElementById("clockdiv").style.visibility = "hidden"; 
                                document.getElementById("claimSection").style.visibility = "visible"; 
                                document.getElementById("claimSection").style.display = "inline"; 
                            }
                        }
                        update_clock(); // run function once at first to avoid delay
                        var timeinterval = setInterval(update_clock, 1000);
                    }

                    run_clock('clockdiv',deadline);
                </script>
            </div>
            
		</fieldset>
	</form>

</div>