function alertSimple(
  $position = "top",
  $icon,
  $title = "",
  $text = "",
  $confirm = false,
  $cancel = false,
  $timer = 0
) {
  return Swal.fire({
    position: $position,
    icon: $icon,
    title: $title,
    text: $text,
    showConfirmButton: $confirm,
    confirmButtonText: "Aceptar",
    confirmButtonColor: "#3085d6",
    timer: $timer,
    allowOutsideClick: false,
    backdrop: false,
    showCancelButton: $cancel,
    cancelButtonText: "Cancelar",
    // confirmButtonColor: "#3085d6",
  });
}

function turnAlert(icon, title, ...elements) {
  elements.forEach((element) => element(icon, title));
}

function convertToCamelCase(phrase) {
  var word = phrase.split(" ");
  for (var i = 0; i < word.length; i++) {
    word[i] = word[i].charAt(0).toUpperCase() + word[i].slice(1).toLowerCase();
  }
  return word.join(" ");
}

async function findUserProfile() {
  try {
    const response = await fetch(`${base_url}User/findUser/${id}`);
    if (!response.ok)
      throw new Error("Hubo un problema con la solicitud de usuario");
    return await response.json();
  } catch (error) {
    console.error("Error al recuperar los datos del usuario:", error);
  }
}
