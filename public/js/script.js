const header = document.querySelector("header");
const wall = document.querySelector(".wall");

/* --------- Date --------- */
date = new Date();
year = date.getFullYear();
document.getElementById("current_date").innerHTML = year;

/* --------- Sticky Navbar --------- */

function stickyNavbar(){
    if(window.scrollY > 300){
        header.classList.add("scrolled")
    }else{
        header.classList.remove("scrolled")
    }
}
window.addEventListener("scroll", stickyNavbar);