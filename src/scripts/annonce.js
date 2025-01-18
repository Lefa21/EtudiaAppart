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
        if (!JSON.parse(data).success && JSON.parse(data)?.redirect)
          window.location.href = `${JSON.parse(data).redirect}`;
        else console.error(JSON.parse(data).message);
      });
  } catch (error) {
    console.error("Error:", error);
    alert(error);
  }
}
