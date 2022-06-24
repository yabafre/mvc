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

// /*---------------sign hover----------*/
// const sign = document.querySelector(".sign");
// const signMenu = document.querySelector(".option");

// sign.addEventListener('mouseover', ()=>{
//   signMenu.style.display = 'block';
// })