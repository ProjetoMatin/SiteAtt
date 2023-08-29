function trocarCont(contentId) {
  let CDashboard = document.getElementById(contentId);
  CDashboard.style.display = "none";
  if (CDashboard.style.display === "none" || CDashboard.style.display === "") {
    CDashboard.style.display = "block";
  } else {
    CDashboard.style.display = "none";
  }
}

// TERMINAR