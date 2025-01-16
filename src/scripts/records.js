async function deleteFile(button) {
  try {
    const docName = button.getAttribute("data-docname"); // Get the docName from the button
    const confirmation = confirm(
      "Are you sure you want to delete this document?",
    );

    if (!confirmation) return;
    // Perform the AJAX request
    const response = await fetch("index.php?module=records&action=deleteFile", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ docName: docName }),
    });
    response.text().then((res) => {
      console.log(res);
      res = JSON.parse(res);
      console.log(res);
      // Redirect or refresh the page after successful deletion
      if (
        res.success //window.location.href = "index.php?module=records&action=monDossier";
      );
      else console.error(res.message);
    });
  } catch (error) {
    console.error("Error:", error);
    alert(error);
  }
}

async function updateUserUrl(btn) {
  try {
    const formElements = btn.parentElement.elements;
    const filesValues = {};
    for (let i = 0; i < formElements.length; i++) {
      if (formElements[i].nodeName != "BUTTON")
        filesValues[formElements[i].name] = formElements[i].value;
    }
    // Perform the AJAX request
    fetch("index.php?module=records&action=updateUserUrl", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(filesValues),
    })
      .then((response) => response.text())
      .then((data) => console.log(data));
  } catch (error) {
    console.error("Error:", error);
    alert(error);
  }
}

var toggleVisibility = (html) => {
  if (html.hidden.valueOf()) html.hidden = false;
  else html.hidden = true;
};
