
<?php
require_once 'puzzle_logic.php';
session_start();
$puzzle = new puzzle_logic();

if (!isset($_SESSION['text']))
{
    $_SESSION['text'] = " ";
}

if (isset($_COOKIE['currTable']))
{
    $delimiter = '^';
    $arr = explode($delimiter, $_COOKIE['currTable']);
    $_SESSION["array"] = $arr;
}

$puzzle->switch_elems();





