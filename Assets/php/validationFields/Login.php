<?php
function validateLogin($user, $password, $PermissionData)
{
    if (isEmpty($user))
        return array('icon' => 'error', 'status' => 'userEmpty', 'title' => "Campo vacío", 'description' => "");
    if (isEmpty($password))
        return array('icon' => 'error', 'status' => 'passwordEmpty', 'title' => "Campo vacío", 'description' => "");
    if ($PermissionData == false)
        return array('icon' => 'error', 'status' => 'loginError', 'title' => "Credenciales incorrectas");
    if ($PermissionData['state'] != "a" && $PermissionData['id'] != 1)
        return array('icon' => 'warning', 'status' => 'userDisabled', 'title' => "Usuario inhabilitado");
    return false;
}
