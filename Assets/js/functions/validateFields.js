//* =================================================================================================
function validatePwdCurrent(pwdCurrent, alertPwdCurrent) {
  if (verifyIsEmpty(pwdCurrent)) {
    turnAlert(
      "error",
      "Por favor, ingrese su contraseña actual (campo vacío).*",
      alertPwdCurrent
    );
    return false;
  }
  return true;
}
//* -------------------------------------------------------------------------------------------------
function validatePwdNew(pwdCurrent, pwdNew, alertPwdCurrent, alertPwdNew) {
  if (verifyIsEmpty(pwdNew)) {
    turnAlert(
      "error",
      "Por favor, ingrese su contraseña actual (campo vacío).*",
      alertPwdNew
    );
    return false;
  }
  if (pwdCurrent == pwdNew) {
    turnAlert(
      "error",
      "Por favor, ingrese su nueva contraseña (debe ser diferente a la actual).*",
      alertPwdCurrent,
      alertPwdNew
    );
    return false;
  }
  if (!verifyPassword(pwdNew)) {
    turnAlert(
      "error",
      "Por favor, ingrese su nueva contraseña (Por favor, ingrese su nueva contraseña. <br> Requisitos mínimos:<br>- 8 caracteres *<br>- mayúscula *<br>- minúscula *<br>- caracteres especiales *.).*",
      alertPwdNew
    );
    return false;
  }
  return true;
}
//* -------------------------------------------------------------------------------------------------
function validatePwdRepeat(pwdNew, pwdRepeat, alertPwdNew, alertPwdRepeat) {
  if (verifyIsEmpty(pwdRepeat)) {
    turnAlert(
      "error",
      "Por favor, repita su nueva contraseña (campo vacío).3*",
      alertPwdRepeat
    );
    return false;
  } else if (pwdNew != pwdRepeat) {
    turnAlert(
      "error",
      "Por favor, repita su nueva contraseña (debe ser igual a la nueva).*",
      alertPwdNew,
      alertPwdRepeat
    );
    return false;
  }
  return true;
}
//* =================================================================================================
function validateName(name, alertName) {
  if (verifyIsEmpty(name)) {
    turnAlert(
      "error",
      "Por favor, ingrese su nombre (campo vacío).*",
      alertName
    );
    return false;
  } else if (!verifyName(name)) {
    turnAlert(
      "error",
      "Por favor, ingrese su nombre (solo se acepta letras, mínimo de 4 carácteres y sin espacios).*",
      alertName
    );
    return false;
  }
  return true;
}

function validateSurname(surname, alertSurname) {
  if (verifyIsEmpty(surname)) {
    turnAlert(
      "error",
      "Por favor, ingrese su apellido (campo vacío).*",
      alertSurname
    );
    return false;
  } else if (!verifyName(surname)) {
    turnAlert(
      "error",
      "Por favor, ingrese su apellido (solo se acepta letras, mínimo de 4 carácteres y sin espacios).*",
      alertSurname
    );
    return false;
  }
  return true;
}

function validateBirthDate(date, alertBirthDate) {
  if (verifyIsEmpty(date)) {
    turnAlert(
      "error",
      "Por favor, ingrese su fecha de nacimiento (campo vacío).*",
      alertBirthDate
    );
    return false;
  } else if (!verifyBirthDate(date)) {
    turnAlert(
      "error",
      "Por favor, ingrese su fecha de nacimiento (debe ser mayor de 18 años).*",
      alertBirthDate
    );
    return false;
  }
  return true;
}
function validateDate(date, alertRequestDate) {
  if (verifyIsEmpty(date)) {
    turnAlert(
      "error",
      "Por favor, ingrese la fecha de solicitud (campo vacío).*",
      alertRequestDate
    );
    return false;
  } else if (!verifyDate(date)) {
    turnAlert(
      "error",
      "Por favor, ingrese la fecha de solicitud (debe ser fechas inferior a la actual).*",
      alertRequestDate
    );
    return false;
  }
  return true;
}
function validatePhoneNumber(number, alertPhoneNumber) {
  if (verifyIsEmpty(number)) {
    turnAlert(
      "error",
      "Por favor, ingrese su número de teléfono (campo vacío).*",
      alertPhoneNumber
    );
    return false;
  } else if (!verifyPhoneNumber(number)) {
    turnAlert(
      "error",
      "Por favor, ingrese su número de teléfono (solo se aceptan 8 dígitos y con prefijos).*",
      alertPhoneNumber
    );
    return false;
  }
  return true;
}
function validateEmail(email, alertBirthDate) {
  if (verifyIsEmpty(email)) {
    turnAlert(
      "error",
      "Por favor, ingrese su email (campo vacío).*",
      alertBirthDate
    );
    return false;
  } else if (!verifyEmail(email)) {
    turnAlert(
      "error",
      "Por favor, ingrese su email. (Debe ser un correo válido).*",
      alertBirthDate
    );
    return false;
  }
  return true;
}
function validateIdNumber(idNumber, alertIdNumber) {
  if (verifyIsEmpty(idNumber)) {
    turnAlert(
      "error",
      "Por favor, ingrese su número de carnet (campo vacío).*",
      alertIdNumber
    );
    return false;
  } else if (!verifyDigit(idNumber)) {
    turnAlert(
      "error",
      "Por favor, ingrese su número de carnet (Solo se aceptan de 7 a 10 dígitos).*",
      alertIdNumber
    );
    return false;
  }
  return true;
}

function validateComplement(complement, alertComplement) {
  if (verifyIsEmpty(complement)) {
    turnAlert(
      "error",
      "Por favor, seleccione el complemento de su carnet (no seleccionado).*",
      alertComplement
    );
    return false;
  }
  return true;
}
function validateNewPwdNew(pwdNew, alertNewPwdNew) {
  if (verifyIsEmpty(pwdNew)) {
    turnAlert(
      "error",
      "Por favor, ingrese su nueva contraseña (campo vacío).*",
      alertNewPwdNew
    );
    return false;
  } else if (!verifyPassword(pwdNew)) {
    turnAlert(
      "error",
      "Por favor, ingrese su nueva contraseña (Por favor, ingrese su nueva contraseña. <br> Requisitos mínimos:<br>- 8 caracteres *<br>- mayúscula *<br>- minúscula *<br>- caracteres especiales *.).*",
      alertNewPwdNew
    );
    return false;
  }

  return true;
}

function validateNewPwdRepeat(
  newPwdNew,
  newPwdRepeat,
  alertNewPwdNew,
  alertNewPwdRepeat
) {
  if (verifyIsEmpty(newPwdRepeat)) {
    turnAlert(
      "error",
      "Por favor, repita su nueva contraseña (campo vacío).*",
      alertNewPwdRepeat
    );
    return false;
  } else if (newPwdNew != newPwdRepeat) {
    turnAlert(
      "error",
      "Por favor, repita su nueva contraseña (debe ser igual a la nueva).*",
      alertNewPwdNew,
      alertNewPwdRepeat
    );
    return false;
  }
  return true;
}
//* =================================================================================================
function validateDescription(description, alertDescription) {
  if (verifyIsEmpty(description)) {
    turnAlert(
      "error",
      "Por favor, ingrese la descripción (campo vacío).*",
      alertDescription
    );
    return false;
  }
  return true;
}
function validateCancelDate(description, alertCancelDate) {
  if (verifyIsEmpty(description)) {
    turnAlert(
      "error",
      "Por favor, ingrese la descripción (campo vacío).*",
      alertCancelDate
    );
    return false;
  }
  return true;
}
function validateFinishDate(description, alertFinishDate) {
  if (verifyIsEmpty(description)) {
    turnAlert(
      "error",
      "Por favor, ingrese la descripción (campo vacío).*",
      alertFinishDate
    );
    return false;
  }
  return true;
}
function validateNumber(number, alertNumber) {
  if (verifyIsEmpty(number)) {
    turnAlert(
      "error",
      "Por favor, ingrese un valor numérico (campo vacío).*",
      alertNumber
    );
    return false;
  } else if (!verifyNumber(number)) {
    turnAlert("error", "Por favor, se acepta solo numeros ().*", alertNumber);
    return false;
  }
  return true;
}
