themeBtn=document.querySelector(".theme-switcher")
body=document.querySelector("body")
nav=document.querySelector(".headerbox")
mx=document.querySelector(".maincard")
catImages=document.querySelectorAll(".noBlend")
themeBtn.onclick = function () {
    if(body.className==="light"){
        body.className="dark";
        nav.style.filter="invert(1)"
        mx.style.backgroundColor="white"
        mx.style.color="black"
        themeBtn.innerHTML="<img src=\"icons/sun.svg\" alt=\"\">";
        
    }
    else{
        body.className="light"
        mx.style.backgroundColor="black"
        mx.style.color="white"
        nav.style.filter="invert(0)"
        themeBtn.innerHTML="<img src=\"icons/moon.svg\" alt=\"\">";
    };}
cbar=document.querySelector(".selectcat")
cat1=document.querySelector(".cat1")
cat2=document.querySelector(".cat2")
cat3=document.querySelector(".cat3")
cat4=document.querySelector(".cat4")
cat5=document.querySelector(".cat5")
laps=document.querySelector(".laptopsec")
phns=document.querySelector(".phonesec")
aces=document.querySelector(".acesec")
ards=document.querySelector(".ardsec")
coms=document.querySelector(".comsec")
cat1.onclick = function(){
    cbar.style.marginLeft="32px"
    cat1.style.opacity="100%"
    cat2.style.opacity="50%"
    cat3.style.opacity="50%"
    cat4.style.opacity="50%"
    cat5.style.opacity="50%"
    laps.style.display="inline"
    phns.style.display="none"
    aces.style.display="none"
    ards.style.display="none"
    coms.style.display="none"

}
cat2.onclick = function(){
    cbar.style.marginLeft="303px"
    cat1.style.opacity="50%"
    cat2.style.opacity="100%"
    cat3.style.opacity="50%"
    cat4.style.opacity="50%"
    cat5.style.opacity="50%"
    laps.style.display="none"
    phns.style.display="inline"
    aces.style.display="none"
    ards.style.display="none"
    coms.style.display="none"
}
cat3.onclick = function(){
    cbar.style.marginLeft="574px"
    cat1.style.opacity="50%"
    cat2.style.opacity="50%"
    cat3.style.opacity="100%"
    cat4.style.opacity="50%"
    cat5.style.opacity="50%"
    laps.style.display="none"
    phns.style.display="none"
    aces.style.display="inline"
    ards.style.display="none"
    coms.style.display="none"
}
cat4.onclick = function(){
    cbar.style.marginLeft="846px"
    cat1.style.opacity="50%"
    cat2.style.opacity="50%"
    cat3.style.opacity="50%"
    cat4.style.opacity="100%"
    cat5.style.opacity="50%"
    laps.style.display="none"
    phns.style.display="none"
    aces.style.display="none"
    ards.style.display="inline"
    coms.style.display="none"
}
cat5.onclick = function(){
    cbar.style.marginLeft="1117px"
    cat1.style.opacity="50%"
    cat2.style.opacity="50%"
    cat3.style.opacity="50%"
    cat4.style.opacity="50%"
    cat5.style.opacity="100%"
    laps.style.display="none"
    phns.style.display="none"
    aces.style.display="none"
    ards.style.display="none"
    coms.style.display="inline"
}
document.getElementById("photo").onchange = function() {
    document.getElementById("photo_update").submit();
};