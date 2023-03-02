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

function goToSection(openingSection){
  toggleContentsTable();
  if(openingSection != '' && openingSection != null){
    let parentElement = document.getElementById(openingSection);
    let buttonElement = parentElement.getElementsByClassName('collapsible')[0];
    let openElement = parentElement.getElementsByClassName('content')[0];
    if (openElement.style.maxHeight == 0){
      buttonElement.classList.toggle('active');
      openElement.style.marginTop = 60 + "px";
      openElement.style.marginBottom = 60 + "px";
      openElement.style.maxHeight = openElement.scrollHeight + "px";
      
    }
  }
}


function escapeFromMenu(event){
  if(event.key === "Escape" && menuToggle == true)
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

function setupContentsTable(){
var fold = document.getElementById("button-contents");
    if(fold){
    fold.addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      let contentContainer = document.getElementById("contents-table")
      if (contentContainer.classList.contains("content-table-open")){
        contentContainer.classList.remove("content-table-open");
        content.classList.remove("content-open");
        content.ariaExpanded = false;
      } else {
        contentContainer.classList.add("content-table-open");
        content.classList.add("content-open");
        content.ariaExpanded = true;
      }
    });
  }
}
function toggleContentsTable(){
  let content = document.getElementById("button-contents");
  let contentContainer = document.getElementById("contents-table")
  content.classList.toggle("active");
    if (contentContainer.classList.contains("content-table-open")){
      contentContainer.classList.remove("content-table-open");
      content.classList.remove("content-open");
      content.ariaExpanded = false;
    } else {
      contentContainer.classList.add("content-table-open");
      content.classList.add("content-open");
      content.ariaExpanded = true;
    }
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
    navLinks[i].addEventListener('click', addEventToLink, false);
  }

  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.maxHeight){
        content.style.maxHeight = null;
        content.style.marginTop = 0 + "px";
        content.style.marginBottom = 0 + "px";
        content.classList.remove('animate-content');
      } else {
        content.style.marginTop = 60 + "px";
        content.style.marginBottom = 60 + "px";
        content.style.maxHeight = 100 + "%";
        content.classList.add('animate-content');
      }
    });
  }

  setupContentsTable();

  myTopButton = document.getElementById("to-top-btn");

  window.onscroll = function() {scrollFunction(myTopButton)};
}

