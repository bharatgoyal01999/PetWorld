function pet_prof(){

  var ld=document.querySelector(".pet_prof");
  ld.showModal();
  var bd=document.querySelector("body");
  bd.style.opacity=0.5;


}
function close_pet_prof() {
  var ld=document.querySelector(".pet_prof");
  ld.close();
  var bd=document.querySelector("body");
  bd.style.opacity=1;


}

function open_trades() {
  var l=document.querySelector(".prof");
  l.close();
  var ld=document.querySelector(".trades");
  ld.showModal();
}
function openProf2() {
 
  var ld=document.querySelector(".prof");
  ld.showModal();
}



function openProf() {
  var i=document.querySelector(".image");
  i.style.opacity="0.3";
  var ld=document.querySelector(".prof");
  ld.showModal();
}
function closeProf() {
  var ld=document.querySelector(".prof");
  ld.close();
  var l=document.querySelector(".trades");
  l.close();
  var i=document.querySelector(".image");
  i.style.opacity="1";

}
var myIndex=0;
carousel();

function carousel() {
  var i;
var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000); // Change image every 2 seconds
}
 function calllogin()
{

var ld=document.querySelector(".Login_div");
  var lmodal=document.getElementById("mylmodal");//get the modal
  var lbtn=document.getElementById("loginbtn");//get the button that open mymodal
  var lspan=document.getElementsByClassName("closel")[0];//get the span modal that closes the mymodal
  lbtn.onclick = function()
  {var i=document.querySelector(".image");
  i.style.opacity="0.3";
    lmodal.style.display = "block";
    ld.showModal();

  }
  lspan.onclick = function()
  {var i=document.querySelector(".image");
    i.style.opacity="1";
    lmodal.style.display="none";
    ld.close();
  }
  window.onclick=function(event)
  {
    if(event.target==lmodal)
    {
      lmodal.style.display="none";
      ld.close();
    }
  }
}
function callsignup()
{

  var l=document.querySelector(".signup_div");
  var smodal=document.getElementById("mysmodal");//get the modal
  var sbtn=document.getElementById("signbtn");//get the button that open mymodal
  var sspan=document.getElementsByClassName("closes")[0];

  sbtn.onclick = function()
  {  var i=document.querySelector(".image");
    i.style.opacity="0.3";
    smodal.style.display = "block";
    l.showModal();
  }
  sspan.onclick = function()
  {  var i=document.querySelector(".image");
    i.style.opacity="1";
    smodal.style.display="none";
    l.close();
  }
  window.onclick=function(event)
  {
    if(event.target==smodal)
    {
      smodal.style.display="none";
      l.close();
    }
  }

}
