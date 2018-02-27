
<?php
require_once 'puzzle_logic.php';
session_start();
$puzzle = new puzzle_logic();
$expiry = new DateTime('+1 year');
setcookie('blank_x', 1, $expiry->getTimestamp());  //Location of Blank x
setcookie('blank_y', 1, $expiry->getTimestamp());  // Location of Blank y

if (isset($_COOKIE['currTable']))
{
    $delimiter = '^';
    $arr = explode($delimiter, $_COOKIE['currTable']);
    $_SESSION["array"] = $arr;
}
$puzzle->valid_click();

////echo "array is" .$arr. "<br>";



