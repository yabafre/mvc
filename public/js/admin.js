//add hovered class dans la liste sélectionné

let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => item.classList.remove("hovered"));
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

//MenuToggle

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

// Select menu

let option = document.querySelectorAll(".navigation ul li:not(:last-child)");
const dash = document.querySelectorAll(".dash");

option.forEach((item, i) => {
  item.addEventListener("click", () => {
    option.forEach((item, i) => {
      item.classList.remove("activate");
      dash[i].classList.remove("activate");
    });
    option[i].classList.add("activate");
    dash[i].classList.add("activate");
  });
});

//counter view

const counter = document.getElementById("counter");

const updateCounter = async () => {
  const data = await fetch("https://api.countapi.xyz/hit/mvc/visite");
  const count = await data.json();
  counter.innerHTML = count.value;
};

updateCounter();
