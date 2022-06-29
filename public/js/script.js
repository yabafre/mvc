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

//*-------------------searching---------------------*/

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

const search = document.querySelector(".searching");
const inputSearch = document.querySelector('.search');

inputSearch.addEventListener('click', () => {
  search.classList.toggle('active');
});



// myInput.oniput = function () {
//   search.style.display = "block";
// };