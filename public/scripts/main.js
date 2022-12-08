function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
	x.className += " responsive";
  } else {
	x.className = "topnav";
  }
}


const inputs = document.querySelectorAll(".input");

function addcl() {
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove("focus");
    }
}

inputs.forEach((input) => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});

// Sticky Header
$(window).on("scroll", function () {
    if ($(window).scrollTop() > 25) {
        $(".top-container").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
        $(".top-container").removeClass("active");
    }
});
// End Sticky Header

// Menu Mobile
$(document).ready(function () {
    //Remove active class from close-trigger
    $(".navigation-bar  .close-trigger").removeClass("active");

    //Displaying the Menu
    $(".navigation-bar  .navigation-trigger").click(function () {
        $(".menu-1 ul").fadeIn("200");
        $(".navigation-bar  .close-trigger").addClass("active");
    });

    //closing the Menu
    $(".navigation-bar  .close-trigger").click(function () {
        $(".menu-1 ul").fadeOut("200");
        $(this).removeClass("active");
    });
});
// End Menu Mobile

// FAQ
var acc = document.getElementsByClassName("faqAsk");
var i;
var len = acc.length;
for (i = 0; i < len; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}
// End FAQ

// Page Transition
$("#content-boxes").delay(1000).animate({ opacity: "1" }, 700);
