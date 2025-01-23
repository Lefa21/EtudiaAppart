async function deleteFile(button) {
  try {
    const docName = button.getAttribute("data-docname"); // Get the docName from the button
    const confirmation = confirm(
      "Are you sure you want to delete this document?",
    );

    if (!confirmation) return;
    // Perform the AJAX request
    fetch("index.php?module=records&action=deleteFile", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ docName: docName }),
    })
      .then((response) => response.text())
      .then((data) => {
        console.log(JSON.parse(data));
        // Redirect or refresh the page after successful deletion
        if (JSON.parse(data).success)
          window.location.href = "index.php?module=records&action=monDossier";
        else console.error(JSON.parse(data).message);
      });
  } catch (error) {
    console.error("Error:", error);
    alert(error);
  }
}

async function updateUserInfos(btn) {
  try {
    const formTags = ["TEXTAREA", "SELECT"];

    const formElements = btn.parentElement.elements;
    const filesValues = {};
    for (let i = 0; i < formElements.length; i++) {
      //console.log(formElements[i]);
      if (formTags.includes(formElements[i].nodeName)) {
        filesValues[formElements[i].name] = formElements[i].value;
      } else if (
        formElements[i].nodeName == "INPUT" &&
        (formElements[i]["type"] == "text" || formElements[i]["type"] == "date")
      ) {
        filesValues[formElements[i].name] = formElements[i].value;
      } else if (
        formElements[i].nodeName == "INPUT" &&
        formElements[i]["type"] == "radio" &&
        formElements[i].checked
      ) {
        filesValues[formElements[i].name] = formElements[i].value;
      }
    }
    console.log(filesValues);

    let alerted = false;
    // Perform the AJAX request
    fetch("index.php?module=records&action=updateUserInfos", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(filesValues),
    })
      .then((response) => response.text())
      .then((data) => {
        console.log(JSON.parse(data));
        // Redirect or refresh the page after successful deletion
        if (JSON.parse(data).success) {
          alerted = true;
          document.getElementById("wrong_url").hidden = true;
          alert("Url bien enregistrée");
        } else if (JSON.parse(data).message === "Invalid URL.") {
          alerted = true;
          document.getElementById("wrong_url").hidden = false;
        } else {
          alerted = true;
          console.error(JSON.parse(data).message);
        }
      })
      .finally(() => {
        if (!alerted) alert("Informations bien enregistrées");
      });
  } catch (error) {
    console.error("Error:", error);
    alert(error);
  }
  //window.location.href = "index.php?module=records&action=monDossier";
}

var toggleVisibility = (html) => {
  if (html.hidden.valueOf()) html.hidden = false;
  else html.hidden = true;
};
