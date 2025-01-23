function redirectTo(annonce) {
  try {
    const annonceId = annonce.firstElementChild.textContent;
    //console.log("Id: " + annonceId);

    // Redirect to the desired page with id_ad as a query parameter
    window.location.href = `index.php?module=annonce&action=annoncePage&id_ad=${encodeURIComponent(annonceId)}`;
  } catch (error) {
    console.error("Error:", error);
    alert(error);
  }
}

function adApply(annonceId) {
  try {
    // Perform the AJAX request
    fetch(
      `index.php?module=annonce&action=annonceApply&id_ad=${encodeURIComponent(annonceId)}`,
      {
        method: "POST",
      },
    )
      .then((response) => response.text())
      .then((data) => {
        console.log(JSON.parse(data));
        // Redirect or refresh the page after successful deletion
        if (JSON.parse(data).success && JSON.parse(data)?.redirect)
          window.location.href = `${JSON.parse(data).redirect}`;
        else console.error(JSON.parse(data).message);
      });
  } catch (error) {
    console.error("Error:", error);
    alert(error);
  }
}

// REPORT POPUP
const popup = document.getElementById("reportPopup");
function adReportPopup() {
  popup.style.display = "flex";
}

function closePopup() {
  popup.style.display = "none";
}

window.addEventListener("click", (event) => {
  if (event.target === popup) {
    closePopup();
  }
});
////////////////

function adReportSend(html) {
  const action = html.parentElement.action.split("/").slice(-1)[0];
  const annonceId = document.getElementById("annonceId").textContent;
  const repType = document.getElementById("reportType");

  const formTags = ["TEXTAREA", "SELECT"];
  const formElements = html.parentElement.elements;
  const reportInputs = {};
  for (let i = 0; i < formElements.length; i++) {
    //console.log(formElements[i]);
    if (formTags.includes(formElements[i].nodeName)) {
      reportInputs[formElements[i].name] = formElements[i].value;
    }
  }

  if (reportInputs["reportType"] == "") {
    repType.style = "border: 1px solid red;";
    alert('Le champ "nature du signalement" doit être rempli.');
    return;
  } else repType.style.border = "border: 1px solid black;";
  const report = confirm(
    `Voulez vous vraiment signaler cette annonce pour cause: ${reportInputs["reportType"]}?`,
  );
  if (!report) return;

  try {
    // Perform the AJAX request
    fetch(`${action}&id_ad=${encodeURIComponent(annonceId)}`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(reportInputs),
    })
      .then((response) => response.text())
      .then((data) => {
        console.log(JSON.parse(data));
        // Redirect or refresh the page after successful deletion
        if (JSON.parse(data).success) alert(JSON.parse(data).message);
        else {
          console.error(JSON.parse(data).message);
          alert(JSON.parse(data).message);
        }
        if (JSON.parse(data).redirect)
          window.location.href = `${JSON.parse(data).redirect}`;
      });
  } catch (error) {
    console.error("Error:", error);
    alert(error);
  }

  return;
}
