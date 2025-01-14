function deleteFile(button) {
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
    .then((response) => response.json()) // Parse JSON response
    .then((data) => {
      if (data.success) {
        // Redirect or refresh the page after successful deletion
        window.location.href = "index.php?module=records&action=monDossier";
      } else {
        alert(data.message); // Display error message if any
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("An error occurred while deleting the document.");
    });
}

var toggleVisibility = (html) => {
  if (html.hidden.valueOf()) html.hidden = false;
  else html.hidden = true;
};

/*
const presentationDiv = document.getElementById("presentation");
const writtenText = document.getElementById("writtenText");
console.log(presentationDiv);

presentationDiv.addEventListener("keydown", function (event) {
  let key;
  key = event.key; // The actual key pressed
  console.log(key);
  if (key == " ") key = "&nbsp;";
  if (key == "Enter") key = "\n";
  if (key == "Tabulation") key = "\t";
  if (key == "Backspace") {
    key = "";
    let newText = writtenText.innerText;
    newText.split("").pop();
    writtenText.innerText = newText;
  } else writtenText.innerText += key;
});
*/
