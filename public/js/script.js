const header = document.querySelector("header");
const wall = document.querySelector(".wall");

/* --------- Date --------- */
date = new Date();
year = date.getFullYear();
document.getElementById("current_date").innerHTML = year;

/* --------- Sticky Navbar --------- */

function stickyNavbar() {
  if (window.scrollY > 300) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
}
window.addEventListener("scroll", stickyNavbar);

/* --------- Scrolling check --------- */

if (document.location.toString().match("#categorie")) {
  $("html, body").animate(
    { scrollTop: $("#categorie").offset().top - 1000 },
    speed
  );
}

// /*---------------menu hover----------*/

const navMenu = document.querySelector(".hamburger");
const navLinks = document.querySelector(".main-navlinks");

if(navMenu){
  navMenu.addEventListener("click", () => {
    navLinks.classList.toggle("eneable");
    signMenu.classList.remove("eneable");
  });
}
