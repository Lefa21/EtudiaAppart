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
