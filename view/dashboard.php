         
        <script>

//Pop-under window- By JavaScript Kit
//Credit notice must stay intact for use
//Visit http://javascriptkit.com for this script

//specify page to pop-under
var popunder="https://ivle.nus.edu.sg/"

//specify popunder window features
//set 1 to enable a particular feature, 0 to disable
var winfeatures="width=800,height=510,scrollbars=1,resizable=1,toolbar=1,location=1,menubar=1,status=1,directories=0"

//Pop-under only once per browser session? (0=no, 1=yes)
//Specifying 0 will cause popunder to load every time page is loaded
var once_per_session=0

///No editing beyond here required/////

function get_cookie(Name) {
  var search = Name + "="
  var returnvalue = "";
  if (document.cookie.length > 0) {
    offset = document.cookie.indexOf(search)
    if (offset != -1) { // if cookie exists
      offset += search.length
      // set index of beginning of value
      end = document.cookie.indexOf(";", offset);
      // set index of end of cookie value
      if (end == -1)
         end = document.cookie.length;
      returnvalue=unescape(document.cookie.substring(offset, end))
      }
   }
  return returnvalue;
}

function loadornot(){
if (get_cookie('popunder')==''){
loadpopunder()
document.cookie="popunder=yes"
}
}

function loadpopunder(){
win2=window.open(popunder,"",winfeatures)
win2.blur()
window.focus()
}

if (once_per_session==0)
loadpopunder()
else
loadornot()

</script>






        <div class="container text-center">
            <a href="https://hacknroll.nushackers.org/">
            <img class="image" src="https://media.giphy.com/media/AmedNE7qPdv2MiGVKZ/giphy.gif">
            </a>
        </div>

        <br>


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
            echo "<div class='col-lg-3 myCards'>";
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