<?php
require_once 'puzzle_logic.php';
$puzzle = new puzzle_logic();
unset($_COOKIE['x']);
unset($_COOKIE['y']);
setcookie("TestCookie", true, time()+3600);


if (!isset($_COOKIE['TestCookie']))
{
    $puzzle->valid_click();

  //  echo "PHP index Line 14" .  "<br>";
}
if (isset($_SESSION['cellFive']))
{
    $tableLink = array();
    $tableLink[0][0] = $_COOKIE['cellOne'] ;
    $tableLink[0][1] = $_COOKIE['cellTwo'] ;
    $tableLink[0][2] = $_COOKIE['cellThree'] ;
    $tableLink[1][0] = $_COOKIE['cellEight'] ;
    $tableLink[1][1] = $_COOKIE['cellBlank'] ;
    $tableLink[1][2] = $_COOKIE['cellFour'] ;
    $tableLink[2][0] = $_COOKIE['cellSeven'] ;
    $tableLink[2][1] = $_COOKIE['cellSix'] ;
    $tableLink[2][2] = $_COOKIE['cellFive'] ;
    $_SESSION["tableLink"]= $tableLink;
  //  echo "PHP index Line 29" .  "<br>";
}

if (!isset($_SESSION['text']))
{
    $_SESSION['text'] = " ";
   // echo "PHP index Line 35" .  "<br>";
}



if (!isset($_COOKIE['cellOne']))
{
    setcookie("cellOne", 1, time()+3600);
}

if (!isset($_COOKIE['cellTwo']))
{
    setcookie("cellTwo", 2, time()+3600);
}
if (!isset($_COOKIE['cellThree']))
{
    setcookie("cellThree", 3, time()+3600);
}
if (!isset($_COOKIE['cellFour']))
{
    setcookie("cellFour", 4, time()+3600);
}
if (!isset($_COOKIE['cellFive']))
{
    setcookie("cellFive", 5, time()+3600);
}
if (!isset($_COOKIE['cellSix']))
{
    setcookie("cellSix", 6, time()+3600);
}
if (!isset($_COOKIE['cellSeven']))
{
    setcookie("cellSeven", 7, time()+3600);
}
if (!isset($_COOKIE['cellEight']))
{
    setcookie("cellEight", 8, time()+3600);
}
if (!isset($_COOKIE['cellBlank']))
{
    setcookie("cellBlank", " ", time()+3600);
}




if (!isset($_SESSION['']))
{
    $_SESSION['text'] = " ";
   // echo ("I am in php line 37");
}

if (isset($_COOKIE['x']) && isset($_COOKIE['y']))
{
    $puzzle->switch_elems();
    unset($_COOKIE['x']);
    unset($_COOKIE['y']);

    $_COOKIE['test'] = "we doing something";
    //header("Refresh:0");
   // location.reload();

}
?>


<!DOCTYPE html>
<html lang="'en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="DeArvis Troutman" >
    <meta name="description" content="Grid Board Game">
    <link rel="stylesheet" href="style.css">
    <title>The Grid Game!!!</title>
    <center>
        <h1>Grid Puzzle</h1>
    </center>
</head>
<body>

<table align="center" style="cursor: pointer;">
    <tr>
        <td align="center" id ="one"><?php echo isset($_COOKIE['cellOne']) ? $_COOKIE['cellOne'] : 1 ?></td>
        <td align="center" id ="two"><?php echo isset($_COOKIE['cellTwo']) ? $_COOKIE['cellTwo'] : 2 ?></td>
        <td align="center" id ="three"><?php echo isset($_COOKIE['cellThree']) ? $_COOKIE['cellThree'] : 3 ?></td>

    </tr>
    <tr>
        <td align="center" id ="eight"><?php echo isset($_COOKIE['cellEight']) ? $_COOKIE['cellEight'] : 8 ?></td>
        <td align="center" id ="blank"><?php echo isset($_COOKIE['cellBlank']) ? $_COOKIE['cellBlank'] : " " ?></td>
        <td align="center" id ="four"><?php echo isset($_COOKIE['cellFour']) ? $_COOKIE['cellFour'] : 4 ?></td>
    </tr>
    <tr>
        <td align="center" id ="seven"><?php echo isset($_COOKIE['cellSeven']) ? $_COOKIE['cellSeven'] : 7 ?></td>
        <td align="center" id ="six"><?php echo isset($_COOKIE['cellSix']) ? $_COOKIE['cellSix'] : 6 ?></td>
        <td align="center" id ="five"><?php echo isset($_COOKIE['cellFive']) ? $_COOKIE['cellFive'] : 5 ?></td>
    </tr>
</table>

<script src="script_table.js"></script>
<br />

<button  id="scrambleButton">Scramble</button>

<p id = "p1"> <?php echo isset($_COOKIE['x']) ? $_COOKIE['x'] : "temp" ?> </p>


</body>
</html>
