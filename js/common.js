/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
var isOpen = false;
$(function(){
    $(".sold_out footer button").attr('disabled','disabled');
})
function changeNav(){
    if(isOpen){
        closeNav();
        isOpen = false;
    } else{
        openNav();
        isOpen = true;
    }
    feather.replace()
}


function openNav() {
    document.getElementById("sideNav").style.marginTop = $("#header > div:first-child").height();
    document.getElementById("sideNav").style.width = "100%";
    document.getElementById("main").style.marginLeft = "100%";
    $("#menu_icon").attr("data-feather","x")
    $("#header > div:nth-child(2)").css("display","none");

  }
  
  /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("sideNav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    $("#menu_icon").attr("data-feather","menu");
    $("#header > div:nth-child(2)").css("display","flex");
  }
