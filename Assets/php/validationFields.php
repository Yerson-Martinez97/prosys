<?php
//* -------------------------------------------------------------------------------------------------
// function validateEmail($email, $existData)
// {
//     if (isEmpty($email)) {
//         return array('icon' => 'error', 'status' => "emptyEmail", 'title' => "Por favor, ingrese su email (campo vacío).", 'description' => "");
//     }
//     if (!verifyEmail($email)) {
//         return array('icon' => 'error', 'status' => "notMatchedEmail", 'title' => "Por favor, ingrese su email. (Debe ser un correo válido).", 'description' => "");
//     }
//     if ($existData) {
//         return array(
//             'icon' => 'error',
//             'status' => 'emailRepeated',
//             'title' => "Por favor, ingrese su email (este email ya está registrado).",
//             'description' => ""
//         );
//     }
//     return;
// }
//* -------------------------------------------------------------------------------------------------
function validateCI($idNumber, $complement, $existData)
{
    if (isEmpty($idNumber)) {
        return array('icon' => 'error', 'status' => "emptyIdNumber", 'title' => "Por favor, ingrese su número de carnet (campo vacío).", 'description' => "");
    }
    if (isEmpty($complement)) {
        return array('icon' => 'error', 'status' => "emptyComplement", 'title' => "Por favor, seleccione el complemento de su carnet (no seleccionado).", 'description' => "");
    }
    if (!verifyIdNumber($idNumber)) {
        return array('icon' => 'error', 'status' => "notMatchedIdNumber", 'title' => "Por favor, ingrese su número de carnet (Solo se aceptan de 7 a 10 dígitos).", "description" => "");
    }
    if ($existData) {
        return array('icon' => 'error', 'status' => "existIdNumber", 'title' => "Por favor, ingrese su carnet (este carnet ya se encuentra registrado).", "description" => "");
    }
    return;
}

//* =================================================================================================
function validateUserName($username, $existData)
{
    if (isEmpty($username)) {
        return array(
            'icon' => 'error',
            'status' => 'emptyUsername',
            'title' => "Por favor, ingrese su usuario (campo vacío).",
            'description' => ""
        );
    }
    if (!verifyUserName($username)) {
        return array(
            'icon' => 'error',
            'status' => 'notMatchedUsername',
            'title' => "Por favor, ingrese su usuario (usuario incorrecto).",
            'description' => ""
        );
    }
    if ($existData) {
        return array('icon' => 'error', 'status' => "existUserName", 'title' => "Por favor, ingrese su usuario (usuario existente).", "description" => "");
    }
    return false;
}

//* -------------------------------------------------------------------------------------------------

function validateText($text)
{
    if (isEmpty($text)) {
        return array('icon' => 'error', 'status' => "emptyDescription", 'title' => "Por favor, ingrese la descripción de la solicitud (campo vacío).", 'description' => "");
    }

    return false;
}

function validateDate($date)
{
    if (isEmpty($date)) {
        return array('icon' => 'error', 'status' => "emptyRequestDate", 'title' => "Por favor, ingrese la fecha de solicitud (campo vacío).", 'description' => "");
    }
    if (!verifyDate($date)) {
        return array('icon' => 'error', 'status' => "errorDate", 'title' => "Por favor, ingrese la fecha de solicitud (debe ser fechas inferior a la actual).", 'description' => "");
    }
    return false;
}

//* =================================================================================================
// function validateIdNumber($number)
// {
//     if (isEmpty($number)) {
//         return array('icon' => 'error', 'status' => "emptyIdNumber", 'title' => "Por favor, ingrese su carnet de identidad (campo vacío).", 'description' => "");
//     }
//     if (!verifyIdNumber($number)) {
//         return array('icon' => 'error', 'status' => "notMatchedIdNumber", 'title' => "Por favor, ingrese su número de carnet de identidad. (Solo se aceptan de 7 a 10 dígitos)", 'description' => "");
//     }
//     return;
// }

// function validateComplement($complement)
// {
//     if (isEmpty($complement)) {
//         return array('icon' => 'error', 'status' => "emptyComplement", 'title' => "Por favor, ingrese el complemento de su carnet de identidad.", 'description' => "");
//     }
//     return;
// }
