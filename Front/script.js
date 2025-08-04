

function showAdminLogin() {
  const panel = document.getElementById("admin-login-container");

  if (panel) {
    const clonedPanel = panel.cloneNode(true); // On duplique le panneau

    document.body.innerHTML = ''; // On efface le reste de la page

    document.body.appendChild(clonedPanel); // On insère le clone
    clonedPanel.style.display = "flex";
  }
}

