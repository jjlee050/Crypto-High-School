          
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












        <div class="text-center">
            <a href="https://hacknroll.nushackers.org/">
            <img class="image" src="https://media.giphy.com/media/VjefwjZeFTLH2/giphy.gif">
            <img class="image" src="https://media.giphy.com/media/VjefwjZeFTLH2/giphy.gif">
            <img class="image" src="https://media.giphy.com/media/VjefwjZeFTLH2/giphy.gif">
            <img class="image" src="https://media.giphy.com/media/VjefwjZeFTLH2/giphy.gif">

            </a>
        </div>

        <br>


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