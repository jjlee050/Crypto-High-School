<div id="faucet">
    <form method="post" action="faucet/checkCreditClaim" class="container text-center">
	    <fieldset>
            <legend> Claim from Faucet </legend>
            <p> Claim 20 credits every 15 minutes </p>
			<p> Credit Balance: 
                <?php 
                    $lastClaimDateTime = $this -> user["last_claim_date_time"];
                    $timeClaim = date('Y-m-d H:i:s', strtotime('+15 minutes', strtotime($lastClaimDateTime)));
                    
                    if ((!isset($lastClaimDateTime)) || (empty($lastClaimDateTime)) || ($lastClaimDateTime == NULL)) {
                        $lastClaimDateTime = "-";
                        $timeClaim = "-";
                    }
                    
                    echo $this -> user["credit"];
                    echo('<p> Last Claim Time: ' . $lastClaimDateTime . '</p>
					<p> Next Claim Valid Time: ' . $timeClaim . '</p>');

                ?>
            </p>
			<input type="submit" name="submit" value="Claim" class="btn btn-primary">
		</fieldset>
	</form>

</div>