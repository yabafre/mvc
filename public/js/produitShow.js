//********* Caroussell******** */

function currentDiv(n) {
    showDivs((slideIndex = n));
  }
  
  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {
      slideIndex = 1;
    }
    if (n < 1) {
      slideIndex = x.length;
    }
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
    }
    x[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " w3-opacity-off";
  }
  
  //********* Div déroulante******** */
  
  const divSelect = document.querySelectorAll(".title");
  const disaVar = document.querySelectorAll(".var");
  const ion = document.getElementsByName("chevron-down-outline");
  
  divSelect.forEach((item, i) => {
    item.addEventListener("click", () => {
      item.classList.toggle("active");
      
      disaVar.forEach((div) => {
        div.classList.toggle("active");
      });
      ion.forEach((ico) => {
        ico.style.transition = "0.5s";
        if (divSelect[i].classList.contains("active")) {
          ion[i].style.transform = "rotate(-180deg)";
        } else {
          ico.style.transform = "rotate(0deg)";
        }
      });
      
    });
});

