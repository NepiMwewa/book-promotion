var menuToggle = false, isMobile = false;
 
//toggle menu open or closed
function toggleMenu(){
  let menuDiv = document.getElementById("menu-nav");
  let headerId = document.getElementById("header-id");
  let hamburgerMenu = document.getElementById("menu-toggle");
  if(!menuToggle){
    menuDiv.classList.add("menu-view");
    headerId.classList.remove("header-content");
    hamburgerMenu.ariaExpanded = true;
    menuToggle = true;
  }else{
    menuDiv.classList.remove("menu-view");
    headerId.classList.add("header-content");
    hamburgerMenu.ariaExpanded = false;
    menuToggle = false;
  }
}


function escapeFromMenu(event){
  console.log("event: " + event.buttons);
  if((event.key === "Escape" || event.buttons == 0 ) && menuToggle == true)
    {
      toggleMenu();
    }
}

window.addEventListener("resize", windowChangedSize);

function windowChangedSize(){
  
  if(window.innerWidth <= 1000){
    isMobile = true;
  }else{
    if(menuToggle){
      toggleMenu();
    }
    isMobile = false;
  }
}

function scrollFunction(myButton) {
  if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
    myButton.style.display = "block";
  } else {
    myButton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

window.onload = init;

// onload function
function init() {
  let hamburgerMenu = document.getElementById("menu-toggle");
  let mainMenu = document.getElementById("main-menu");
  
  hamburgerMenu.addEventListener('keydown', (event) => escapeFromMenu(event));
  mainMenu.addEventListener('keydown', (event) => escapeFromMenu(event));

  windowChangedSize();

  let navLinks = document.getElementsByClassName("closeTab");
  for (var i = 0; i < navLinks.length; i++) {
    navLinks[i].firstChild.addEventListener('click', escapeFromMenu, true);
  }

  myTopButton = document.getElementById("to-top-btn");

  window.onscroll = function() {scrollFunction(myTopButton)};
}

