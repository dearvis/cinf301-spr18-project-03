<html>
<head>
    <title>Puzzle</title>
</head>
<body>
<?php
require_once 'puzzle_logic.php';
session_start();
$expiry = new DateTime('+1 year');
setcookie('blank_x', '1', $expiry->getTimestamp());  //Location of Blank x
setcookie('blank_y', '1', $expiry->getTimestamp());  // Location of Blank y

if (isset($_COOKIE['currTable']))
{
    $delimiter = '^';
    $arr = explode($delimiter, $_COOKIE['currTable']);
}
print_r($arr);
//
//echo "clicked x is" .$_COOKIE['x']. "<br>";
//echo "clicked y is" .$_COOKIE['y']. "<br>";
//echo "blank x is" .$_COOKIE['blank_x']. "<br>";
//echo "blank y is" .$_COOKIE['blank_y']. "<br>";
////echo "array is" .$arr. "<br>";

?>
</body>

</html>

