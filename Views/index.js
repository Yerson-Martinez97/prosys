userNameInputElement.addEventListener("input", () => {
  turnAlert("hide", "", alertUserName);
});
passwordInputElement.addEventListener("input", () => {
  turnAlert("hide", "", alertPassword);
});
//* ==================== LOGIN ================================================================
async function login() {
  try {
    const url = `${base_url}Login/login`;
    const frm = document.getElementById("frmLogin");
    const data = new FormData(frm);
    const response = await fetch(url, {
      method: "POST",
      body: data,
    });
    return await response.json();
  } catch (error) {
    console.error("Error en la respuesta:", error);
    throw error;
  }
}
//* -------------------------------------------------------------------------------------------------
async function handleFormLogin(e) {
  e.preventDefault();
  try {
    turnAlert("hide", "", alertUserName, alertPassword);
    responseLogin(await login());
  } catch (error) {
    console.error("Error al iniciar sesión:", error);
  }
}
//* -------------------------------------------------------------------------------------------------
function responseLogin(res) {
  const { icon, status, title, description } = res;
  if (status === "userEmpty") return turnAlert(icon, title, alertUserName);
  if (status === "passwordEmpty") return turnAlert(icon, title, alertPassword);

  if (status === "loginError" || status === "userDisabled") {
    clearField(passwordInputElement);
    return turnAlert(icon, title, alertUserName, alertPassword);
  }

  if (status === "success") {
    turnAlert(icon, title, alertUserName, alertPassword);
    return alertSimple("top", icon, title, description, true, false, 500).then(
      () => {
        clearField(userNameInputElement, passwordInputElement);
        window.location = base_url + "Dashboard/";
      }
    );
  }
  if (status === "error")
    return alertSimple("top", icon, title, description, true, false, 0);
  return console.error("Error inesperado, contactese con el desarrollador");
}
