let nav=document.querySelector("nav");
let iconMenu=document.getElementById("icon-menu");

iconMenu.onclick=function(){
    console.log(nav.style.display);
    if (nav.style.display == "none")
        nav.style.display = "block";
    else
        nav.style.display = "none";
}
