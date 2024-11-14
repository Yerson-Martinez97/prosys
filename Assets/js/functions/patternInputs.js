function isEqualValues(first, second) {
  return first == second ? true : false;
}
/*
    ^: Coincide con el inicio de la cadena.
    [a-zA-Z]+: Coincide con uno o más caracteres que sean letras del alfabeto.
    [a-zA-Z]: Representa un rango de letras del alfabeto, tanto mayúsculas como minúsculas.
    +: Indica que la letra del alfabeto puede aparecer una o más veces en la cadena.
    $: Coincide con el final de la cadena.
    En resumen, esta expresión regular solo coincidirá con nombres que consistan completamente en letras del alfabeto, ya sea en mayúsculas o minúsculas, sin incluir ningún otro tipo de carácter como números, espacios o símbolos.           
*/
function verifyIsEmpty(...names) {
  const emptyPattern = /^\s*$/;
  let isValid = false;

  for (let name of names) {
    if (emptyPattern.test(name)) {
      isValid = true;
      break;
    }
  }
  return isValid;
}
function verifyDigit(...numbers) {
  const digitPattern = /^[0-9]{7,10}$/;
  let isValid = false;

  for (let number of numbers) {
    if (digitPattern.test(number)) {
      isValid = true;
      break;
    }
  }
  return isValid;
}

function verifyName(name) {
  const namePattern = /^[a-zA-Z]{4,}$/;
  return namePattern.test(name);
}

function verifyBirthDate(date) {
  const providedDate = new Date(date);
  const currentDate = new Date();

  // Restar los años y comprobar si la diferencia es mayor o igual a 18
  let isOver18 = currentDate.getFullYear() - providedDate.getFullYear() > 18;

  // Si tienen la misma edad, verificar los meses y días
  if (currentDate.getFullYear() - providedDate.getFullYear() === 18) {
    isOver18 =
      currentDate.getMonth() > providedDate.getMonth() ||
      (currentDate.getMonth() === providedDate.getMonth() &&
        currentDate.getDate() >= providedDate.getDate());
  }

  return isOver18;
}
function verifyDate(date) {
  const providedDate = new Date(date);
  const currentDate = new Date();

  return providedDate < currentDate;
}

/*
    ^: Coincide con el inicio de la cadena.
    (?:\+\d{0,3}\s?)?: Este es un grupo de no captura (?: ... )? que coincide opcionalmente con un prefijo internacional opcional, seguido opcionalmente de un espacio. Explicado:
    \+: Coincide con el carácter "+" literal.
    \d{0,3}: Coincide con entre 0 y 3 dígitos. Esto permite un prefijo internacional de hasta tres dígitos.
    \s?: Coincide opcionalmente con un espacio en blanco después del prefijo internacional.
    ?: Indica que el grupo completo (prefijo internacional y espacio opcional) es opcional.
    \d{8}: Coincide con exactamente 8 dígitos. Esto asegura que el número de teléfono tenga una longitud de 8 dígitos.
    $: Coincide con el final de la cadena.
    En resumen, esta expresión regular aceptará números de teléfono que tengan un prefijo internacional opcional seguido de 8 dígitos. El prefijo internacional puede estar precedido opcionalmente por un "+" y puede estar seguido opcionalmente por un espacio en blanco.
*/
function verifyPhoneNumber(phone) {
  const phonePattern = /^(?:\+\d{0,3}\s?)?\d{8}$/;
  return phonePattern.test(phone);
}
function verifyNumber(number) {
  const numberPattern = /^(?:\+\d{0,3}\s?)?(?:\d*\.)?\d+$/;
  return numberPattern.test(number);
}
/*
    ^
    [a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+   // Parte del nombre de usuario
    @
    [a-zA-Z0-9]                        // Primer carácter del dominio
    (?:                                // Grupo no capturador
    [a-zA-Z0-9-]*                    // Puede haber letras, dígitos o guiones medios
    [a-zA-Z0-9]                      // Último carácter del dominio
    )?                                 // El dominio puede tener de cero a un guion medio
    (?:                                // Grupo no capturador para el dominio
    \.                               // Punto separador
    [a-zA-Z0-9]                      // Primer carácter del siguiente subdominio
    (?:                              // Grupo no capturador para el subdominio
        [a-zA-Z0-9-]*                  // Puede haber letras, dígitos o guiones medios
        [a-zA-Z0-9]                    // Último carácter del subdominio
    )?                               // El subdominio puede tener de cero a un guion medio
    )*                                 // Puede haber cero o más subdominios
    \.                                 // Punto antes del dominio
    [a-zA-Z]{2,}                       // Extensión del dominio de al menos dos caracteres alfabéticos
    $

    ^: Coincide con el inicio de la cadena.
    [a-zA-Z0-9.!#$%&'*+/=?^_{|}~-]+`: Coincide con uno o más caracteres válidos en el nombre de usuario.
    @: Coincide con el carácter "@".
    [a-zA-Z0-9]: Coincide con el primer carácter del dominio.
    (?:[a-zA-Z0-9-]*[a-zA-Z0-9])?: Coincide con cero o un grupo de caracteres que pueden ser letras, dígitos o guiones medios, seguido por un carácter que puede ser una letra, un dígito o un guion medio. Esto permite que el dominio tenga un guion medio, pero no al principio o al final.
    (?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?)*: Coincide con cero o más subdominios separados por puntos. Cada subdominio comienza con un punto y un carácter alfanumérico, seguido opcionalmente por un grupo de caracteres que pueden ser letras, dígitos o guiones medios, terminando con un carácter alfanumérico.
    \.: Coincide con el punto antes de la extensión del dominio.
    [a-zA-Z]{2,}: Coincide con la extensión del dominio que consta de al menos dos caracteres alfabéticos.
    $: Coincide con el final de la cadena.

    En resumen, esta expresión regular valida direcciones de correo electrónico que cumplan con los estándares comunes, permitiendo subdominios y caracteres especiales en el nombre de usuario, y asegurando que el dominio tenga un guion medio, si es necesario, pero no al principio o al final del dominio.
 */
function verifyEmail(email) {
  const emailPattern =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?)*\.[a-zA-Z]{2,}$/;

  return emailPattern.test(email);
}
/*
    ^: Coincide con el inicio de la cadena.
    [0-9]: Es una clase de caracteres que coincide con cualquier dígito numérico del 0 al 9.
    {7}: Es un cuantificador que indica que el dígito numérico anterior (en este caso, [0-9]) debe aparecer exactamente 7 veces consecutivas.
    $: Coincide con el final de la cadena.
    
    Por lo tanto, en conjunto, ^[0-9]{7}$ asegura que la cadena de entrada conste únicamente de 7 dígitos numéricos, sin ningún otro carácter antes o después.
*/
function verifyIdNumber(idNumber) {
  const ciPattern = /^[0-9]{7,10}$/;
  return ciPattern.test(idNumber);
}

/*
    ^: Coincide con el inicio de la cadena.
    (?=.*\d): Este es un "positive lookahead" que asegura que la cadena contenga al menos un dígito (\d). La parte (?= ... ) es una afirmación de búsqueda que verifica que la cadena contenga al menos un dígito. .*\d significa que puede haber cero o más caracteres seguidos de al menos un dígito. Busca cualquier parte de la cadena que contenga al menos un dígito, independientemente de lo que haya antes o después de ese dígito en la cadena.
    (?=.*[a-z]): Este es otro "positive lookahead" que asegura que la cadena contenga al menos una letra minúscula ([a-z]).
    (?=.*[A-Z]): Otro "positive lookahead" que asegura que la cadena contenga al menos una letra mayúscula ([A-Z]).
    (?=.*[\W_]): Este es otro "positive lookahead" que asegura que la cadena contenga al menos un caracter especial ([\W_]). \W coincide con cualquier caracter que no sea alfanumérico y _ coincide con el caracter _.
    .{8,}: Esto coincide con cualquier caracter (.) que aparezca al menos 8 veces ({8,}). En otras palabras, la contraseña debe tener al menos 8 caracteres de longitud.
    $: Coincide con el final de la cadena.

    En resumen, esta expresión regular asegura que la contraseña cumpla con los siguientes criterios:
    - Debe contener al menos un dígito.
    - Debe contener al menos una letra mayúscula.
    - Debe contener al menos una letra minúscula.
    - Debe contener al menos un caracter especial.
    - Debe tener una longitud mínima de 8 caracteres.
*/
function verifyPassword(password) {
  const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;
  return passwordPattern.test(password);
}

// function capitalize(texto) {
//   return texto
//     .split(" ") // Divide el texto en palabras
//     .map(
//       (palabra) =>
//         palabra.charAt(0).toUpperCase() + palabra.slice(1).toLowerCase()
//     ) // Capitaliza la primera letra de cada palabra
//     .join(" "); // Une las palabras de nuevo en una cadena
// }

function capitalizeFL(texto) {
  if (texto.length === 0) {
    return texto; // Devuelve el texto sin cambios si está vacío
  }
  return texto.charAt(0).toUpperCase() + texto.slice(1).toLowerCase();
}
function capitalize(str) {
  return str
    .split(" ") // Divide la cadena en un array de palabras
    .map((word) => word.charAt(0).toUpperCase() + word.slice(1)) // Convierte la primera letra a mayúscula
    .join(" "); // Une las palabras de nuevo en una cadena
}
