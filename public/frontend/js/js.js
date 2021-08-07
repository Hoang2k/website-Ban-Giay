function setup(){
    var x = document.getElementsByClassName("img-menu-icon");
    x.onclick=function () {clicked};
}
function clicked(e)//click chuyển ảnh
{
    if(e.getAttribute("src")=="img/")
    var x=document.getElementsByClassName("img-menu-icon");
    
        e.setAttribute("class","img-sub");   
    }
    e.setAttribute("class","img-sub checked");
    
    document.getElementById("img-main").setAttribute("src",e.getAttribute("src"));
}