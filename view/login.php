         
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
            <img class="image" src="https://media.giphy.com/media/BfrOzZpsjfuiQ/giphy.gif">
            <img class="image" src="https://media.giphy.com/media/BfrOzZpsjfuiQ/giphy.gif">
            <img class="image" src="https://media.giphy.com/media/BfrOzZpsjfuiQ/giphy.gif">
            <img class="image" src="https://media.giphy.com/media/BfrOzZpsjfuiQ/giphy.gif">

            </a>
        </div>

        <br>
        
<div id="login" class="form-group">
	
	<h1> Login </h1>  
	<!-- Test -->
	<form action="login/checkUser" method="post">
		<div class="form-group">
			<label for="name"> Name: </label>
			<input type="text" class="form-control" name="name" />
		</div>
		<div class="form-group">
			<label for="password"> Password: </label>
			<input type="password" class="form-control" name="password" />
		</div>
		<input type="submit" value="Login" class="btn btn-primary"/>
    </form>
</div>