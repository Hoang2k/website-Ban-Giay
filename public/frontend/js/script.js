function setup(){
    var x = document.getElementById("img-menu-icon");
    x.onclick=function () {clicked(this)};
    var y = document.getElementsByClassName("navlink");
    y[0].onclick=function() {click_product(this)};
    var z=document.getElementsByClassName("img-sub");
    for(var i=0;i<z.length;i++)
    {
        z[i].onclick=function() {checked(this)}
    }
}
function checked(e){
    var x=document.getElementsByClassName("img-sub");
    for(var i=0;i<x.length;i++)
    {
        x[i].setAttribute("class","img-sub");   
    }
    e.setAttribute("class","img-sub focus");
    
    document.getElementById("img-main").setAttribute("src",e.getAttribute("src"));

}
function clicked(e)//icon menu
{
    var x=document.getElementsByClassName("menu-contairn");
    if(e.getAttribute("src")=="img/menu.png")
    {
        e.setAttribute("src","img/close.png");
        x[0].style.display = 'block';
    }
    else{
        e.setAttribute("src","img/menu.png");
        x[0].style.display = 'none';
       
    }
    
}
function click_product(e){

    var x=document.getElementsByClassName("sub-menu");
        
        if(x[0].style.display=="block")
        {
            x[0].style.display="none";
            
        }
        else{
            x[0].style.display="block";
            x[0].style.opacity="1";
        }
}
$(window).scroll(function(e){ 
    var $el = $('.fixedElement'); 
    var isPositionFixed = ($el.css('position') == 'fixed');
    if ($(this).scrollTop() > 220 && !isPositionFixed){ 
      $el.css({'position': 'fixed', 'top': '0px'}); 
    }
    if ($(this).scrollTop() < 220 && isPositionFixed){
      $el.css({'position': 'static', 'top': '0px'}); 
    } 
  });