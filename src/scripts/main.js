function toggleMenu(action) {
  var myAccount = document.getElementById("myAccount");
  var menuArrow = document.getElementById("dropdown_menu_arrow");
  var dropMenu = document.querySelector(".dropdown-menu");

  if (action === null) {
    myAccount.classList.toggle("forceActive");
  } else {
    if (!myAccount.classList.contains("forceActive")) {
      myAccount.classList.toggle("active", action);
    }
  }

  if (myAccount.classList.contains("active")) {
    dropMenu.style.opacity = 1;
    dropMenu.style.transform = "translateY(0)";
    dropMenu.style.visibility = "visible";
  } else {
    dropMenu.style.opacity = 0;
    dropMenu.style.transform = "translateY(-10px)";
    dropMenu.style.visibility = "hidden";
  }
}
