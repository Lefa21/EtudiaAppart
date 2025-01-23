function toggleMenu(html, action) {
  const menuButton = document.getElementById(html.id);
  const menuContainer = menuButton.closest(".menu_container");
  let dropdownMenu;
  if (html.id == "myAccount") {
    dropdownMenu = html.querySelector(".dropdown-menu");
  } else if (html.id == "extend_banner") {
    dropdownMenu = html.parentElement.querySelector(".banner-extended");
    dropdownMenu.classList.toggle("forceActive");
    if (dropdownMenu.classList[1] == "forceActive")
      dropdownMenu.style["display"] = "block";
    else dropdownMenu.style["display"] = "none";
    return;
  } else {
    dropdownMenu = menuContainer.querySelector(".dropdown-menu");
  }

  dropdownMenu.addEventListener("click", (event) => {
    event.stopPropagation();
  });

  if (action === null) {
    menuContainer.classList.toggle("forceActive");
  } else {
    if (!menuContainer.classList.contains("forceActive")) {
      menuContainer.classList.toggle("active", action);
    }
  }

  if (
    menuContainer.classList.contains("active") ||
    menuContainer.classList.contains("forceActive")
  ) {
    //dropdownMenu.style.height = contentHeight; // Appliquer la hauteur calculée
    dropdownMenu.style.opacity = 1;
    dropdownMenu.style.transform = "translateY(-20px)";
    dropdownMenu.style.visibility = "visible";
  } else {
    // Réinitialiser la hauteur pour une transition fluide$
    dropdownMenu.style.opacity = 0;
    dropdownMenu.style.transform = "translateY(-30px)";
    dropdownMenu.style.visibility = "hidden";
  }
}
