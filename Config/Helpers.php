<?php
function strClean($name)
{
    // /^\s|\s$/ blank spaces at the beginning or end
    // Replacements are provided in the same order as patterns. In this case, a space ' ' is specified as a replacement for the first pattern and an empty string ' ' is specified as a replacement for the second pattern.

    // Argument 01: Array containing regular expressions to search in the text.
    // Argument 02: Array containing replacement strings for each corresponding regular expression.
    // Argument 03: String where it will be done: the search and replace
    $name = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $name);
    $name = trim($name);
    // Remove backslashes
    $name = stripslashes($name);
    // Replaces all script or sql query strings to an empty string
    $name = str_ireplace('<script>', '', $name);
    $name = str_ireplace('</script>', '', $name);
    $name = str_ireplace('<script type=>', '', $name);
    $name = str_ireplace('<script src>', '', $name);
    $name = str_ireplace('SELECT * FROM', '', $name);
    $name = str_ireplace('DELETE FROM', '', $name);
    $name = str_ireplace('INSERT INTO', '', $name);
    $name = str_ireplace('SELECT COUNT(*) FROM', '', $name);
    $name = str_ireplace('DROP TABLE', '', $name);
    $name = str_ireplace("OR '1'='1", '', $name);
    $name = str_ireplace('OR ´1´=´1', '', $name);
    $name = str_ireplace("OR `1`=`1`", '', $name);
    $name = str_ireplace('IS NULL', '', $name);
    $name = str_ireplace('LIKE "', '', $name);
    $name = str_ireplace("LIKE '", '', $name);
    $name = str_ireplace('LIKE ´', '', $name);
    $name = str_ireplace('LIKE `', '', $name);
    $name = str_ireplace('OR "a"="a', '', $name);
    $name = str_ireplace("OR 'a'='a", '', $name);
    $name = str_ireplace('OR ´a´=´a', '', $name);
    $name = str_ireplace('OR `a`=`a', '', $name);
    $name = str_ireplace('--', '', $name);
    $name = str_ireplace('^', '', $name);
    $name = str_ireplace('[', '', $name);
    $name = str_ireplace(']', '', $name);
    $name = str_ireplace('==', '', $name);
    return $name;
}
// ================================= EMPTY ========================================================
function isEmpty($name)
{
    return trim($name) === '';
}
// ================================= PASSWORD =====================================================
function verifyPassword($password)
{
    $passwordPattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/';
    return preg_match($passwordPattern, $password);
}
// ================================= NAME =========================================================
function verifyName($name)
{
    $pattern = "/^[a-zA-Z]{4,}$/";
    return preg_match($pattern, $name);
}
// ================================= BIRTHDATE ====================================================
function verifyBirthDate($date)
{
    $providedDate = strtotime($date);
    $currentDate = time();

    $isOver18 = date('Y', $currentDate) - date('Y', $providedDate) > 18;

    if (date('Y', $currentDate) - date('Y', $providedDate) === 18) {
        $isOver18 =
            date('n', $currentDate) > date('n', $providedDate) ||
            (date('n', $currentDate) === date('n', $providedDate) &&
                date('j', $currentDate) >= date('j', $providedDate));
    }

    return $isOver18;
}
// ================================= CI ===========================================================
function verifyCi($number)
{
    $pattern = "/^[0-9]{7,10}$/";
    return preg_match($pattern, $number);
}
// ================================= EMAIL ========================================================
function verifyEmail($email)
{
    $pattern = '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?)*\.[a-zA-Z]{2,}$/';

    return preg_match($pattern, $email);
}
// ================================= AMOUNT =======================================================
function verifyAmount($amount)
{
    $pattern = '/^\d+(\.\d{2})?$/';
    return preg_match($pattern, $amount);
}
// ================================= DIGITAL =======================================================
function verifyNumber($number)
{
    $pattern = '/^\d+$/';
    return preg_match($pattern, $number);
}
// ================================= FULL NAME ====================================================
function verifyFullName($name)
{
    $pattern = '/^[a-zA-Z]+(?: [a-zA-Z]+){0,3}$/';
    $pattern = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(?: [a-zA-ZáéíóúÁÉÍÓÚñÑ]+){0,3}$/';
    return preg_match($pattern, $name);
}
// ================================= ACCESS USER CONTROL ==========================================
function accessUserControl($userId, $userState)
{
    if (!isset($userId)) redirectToHomePage();
    if ($userState != "a" && $userId != 1) redirectToHomePage();
}
// ================================= RESPONSE =====================================================
function sendJsonResponse($msg)
{
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    exit();
}
// ================================= REDIRECT =====================================================
function redirectToHomePage()
{
    // session_destroy();
    header("location: " . BASE_URL);
}

// ================================= DIGIT 2 INT 2 DECIMAL ========================================
function verifyDigit2_2($value)
{
    $normalizedValue = str_replace(',', '.', $value);
    // $pattern = '/^\d{1,3}(\.\d{0,2})?$/';
    $pattern = '/^\d{1,2}?$/';
    return preg_match($pattern, $normalizedValue);
}
// ================================= DIGIT 1-4 ========================================
function verifyDigit1to4($value)
{
    $normalizedValue = str_replace(',', '.', $value);
    $pattern = '/^\d{1,4}?$/';
    return preg_match($pattern, $normalizedValue);
}
// ================================= DIGIT 1 INT 4 DECIMAL ========================================
function verifyDigit1_4($value)
{
    $normalizedValue = str_replace(',', '.', $value);
    // $pattern = '/^\d{1,3}(\.\d{0,2})?$/';
    $pattern = '/^\d{1,4}?$/';
    return preg_match($pattern, subject: $normalizedValue);
}
// ================================= FLOAT 1-4 . 2 DECIMAL ========================================
function verifyFloat1_4__1_2($value)
{
    $pattern = '/^(?!.*[,.]{2})\d{1,4}([.,]\d{1,2})?$/';
    return preg_match($pattern, $value);
}
// ================================= VARCHAR ===========================================
function verifyVarchar($value, $max)
{
    $pattern = '/^.{0,' . $max . '}$/';
    return preg_match($pattern, $value);
}
// ================================= NAMES =============================================
function verifyNames($name)
{
    $pattern = '/^[a-zA-Z]+( [a-zA-Z]+){0,1}$/';
    return preg_match($pattern, $name);
}
// ================================= PHONE =============================================
function verifyPhone($phone)
{
    $pattern = "/^(?:\+\d{0,3}\s?)?\d{8}$/";
    return preg_match($pattern, $phone);
}
// ================================= DATE ==============================================
function verifyDate($date)
{
    $providedDate = new DateTime($date);
    $currentDate = new DateTime();
    return $providedDate < $currentDate;
}
// ================================= DAY ==============================================
function verifyDay($days)
{
    $pattern = '/^(60|[1-5]?[0-9])$/';
    return preg_match($pattern, $days);
}
// ================================= MONTH ==============================================
function verifyWarranty($date)
{
    $pattern = '/^(0?[1-9]|1[0-9]|2[0-4])$/';    // Expresión regular para validar meses de garantía (1-24)
    return preg_match($pattern, $date);
}
// ================================= USERNAME ===========================================
function verifyUserName($user)
{
    $pattern = '/^(?=.{4,}$)[a-zA-Z][a-zA-Z0-9]*(?:[-_][a-zA-Z0-9]+)*$/';
    return preg_match($pattern, $user);
}
// ================================= SERIAL NUMBER ===========================================
function verifySerialNumber($serialNumber)
{
    $pattern = '/^(?!.*[_-]$)[a-zA-Z0-9_-]{4,50}$/'; // Acepta letras, números, guiones y guiones bajos, pero no termina en _ o -
    return preg_match($pattern, $serialNumber) === 1;
}
