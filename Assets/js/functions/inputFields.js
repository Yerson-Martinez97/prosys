function clearField(...elements) {
  elements.forEach((element) => {
    element.value = "";
  });
}

function changeInputElementStyle(state, inputElement, ...elements) {
  const validClasses = ["text-secondary", "text-danger", "text-warning"];
  const errorClasses = ["is-invalid", "border-1", "border-danger"];
  const warningClasses = ["is-invalid", "border-1", "border-warning"];
  const successClasses = ["is-invalid", "border-1", "border-success"];
  const fieldClasses = ["is-invalid", "border-1", "border-primary"];
  inputElement.classList.remove(...validClasses);
  elements.forEach((element) => {
    element.classList.remove(...successClasses);
    element.classList.remove(...warningClasses);
    element.classList.remove(...errorClasses);
    element.classList.remove(...fieldClasses);
    if (state === "success") {
      element.classList.add(...successClasses);
      inputElement.classList.add("text-secondary");
    } else if (state === "error") {
      element.classList.add(...errorClasses);
      inputElement.classList.add("text-danger");
    } else if (state === "warning") {
      element.classList.add(...warningClasses);
      inputElement.classList.add("text-warning");
    } else if (state === "typing") {
      element.classList.add(...fieldClasses);
      inputElement.classList.add("text-secondary");
    } else if (state === "hide") {
      inputElement.classList.add("text-secondary");
    }
  });
}

function changeAlertMessageStyle(state, msg = "", element) {
  const alertDangerClasses = ["my-4", "alert", "alert-danger"];
  const alertWarningClasses = ["my-4", "alert", "alert-warning"];
  const alertSuccessClasses = ["my-4", "alert", "alert-success"];
  element.classList = [];
  if (state === "error") {
    element.classList.add(...alertDangerClasses);
    element.innerHTML = msg;
  } else if (state === "warning") {
    element.classList.add(...alertWarningClasses);
    element.innerHTML = msg;
  } else if (state === "success") {
    element.classList.add(...alertSuccessClasses);
    element.innerHTML = msg;
  } else {
    element.classList.add("d-none");
    element.innerHTML = "";
  }
}

function changeIconStyle(state, ...elements) {
  const iconClasses = ["bx", "bxs-info-circle", "bx-flashing"];
  elements.forEach((element) => {
    if (state === "error") {
      element.classList.add(...iconClasses);
      element.style.color = "#f00";
    } else if (state === "warning") {
      element.classList.add(...iconClasses);
      element.style.color = "#ffab00";
    } else {
      element.classList.remove(...iconClasses);
      element.style.color = "";
    }
  });
}
