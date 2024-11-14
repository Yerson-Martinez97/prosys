//* =================================================================================================
const messageElement = document.getElementById("msg");
//* ===================================== USER ============================================================
const userNameInputElement = document.getElementById("userName");
const basicAddonUserNameElement = document.getElementById(
  "basic-addon_userName"
);
const advUserNameElement = document.getElementById("adv_userName");
function alertUserName(state, errorMessage) {
  changeAlertMessageStyle(state, errorMessage, messageElement);
  changeInputElementStyle(
    state,
    userNameInputElement,
    userNameInputElement,
    basicAddonUserNameElement,
    advUserNameElement
  );
  changeIconStyle(state, advUserNameElement);
}
//* ===================================== PASSWORD ========================================================
const passwordInputElement = document.getElementById("password");
const basicAddonPassElement = document.getElementById("basic-addon_password");
const advPasswordElement = document.getElementById("adv_password");
const lblPasswordElement = document.getElementById("lblpassword");
function alertPassword(state, errorMessage) {
  changeAlertMessageStyle(state, errorMessage, messageElement);
  changeInputElementStyle(
    state,
    passwordInputElement,
    passwordInputElement,
    basicAddonPassElement,
    advPasswordElement,
    lblPasswordElement
  );
  changeIconStyle(state, advPasswordElement);
}
