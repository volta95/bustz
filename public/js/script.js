window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("navbar").className = "nav-bar";
  } else {
    document.getElementById("navbar").className = "";
  }
}
new WOW().init();


$(document).ready(function(){
    $(function () {
        $("#customers-testimonials").owlCarousel({
            items: 1,
            autoplay: true,
            smartSpeed: 700,
            loop: true,
            autoplayHoverPause: true,
        });
    });
    $('#owl-service').owlCarousel({
        center: true,
        items:4,
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        margin:10,
        responsive:{
            600:{
                items:3
            },
            480:{
                    items:1
                    },
        }
    });
    $("#team-members").owlCarousel({
        items: 3,
        autoplay: true,
        smartSpeed: 700,
        loop: true,
        autoplayHoverPause: true,
    });



  });

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
var dropdown = document.getElementsByClassName("dropdown-bt");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
var dropdwn=document.getElementsByClassName("drop-dwn");
var j;

for(j=0;j<dropdwn.length;j++){
    dropdwn[j].addEventListener("click",function(){
 this.classList.toggle("active");
 var dropdwnContent = this.nextElementSibling;
 if( dropdwnContent.style.display === "block"){
     dropdwnContent.style.display = "none";
 } else{
     dropdwnContent.style.display = "block";
 }
    })
}
