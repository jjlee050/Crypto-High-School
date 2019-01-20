//Pop-under window- By JavaScript Kit
//Credit notice must stay intact for use
//Visit http://javascriptkit.com for this script

//specify page to pop-under
var popunder="https://www.youtube.com/embed/usfiAsWR4qU?start=7&autoplay=1&fs=0&controls=0&modestbranding=1&rel=0&showinfo=0&playsinline=0"

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