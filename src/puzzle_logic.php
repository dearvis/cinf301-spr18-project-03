<?php
/**
 * Created by PhpStorm.
 * User: shadow
 * Date: 2/26/2018
 * Time: 1:15 AM
 */

class puzzle_logic
{

    public function __construct()
    {
    }

    public function switch_elems($val1, $val2)  // Coordinates for Clicked Elements
    {

        return $val1 + $val2;
    }

    public function valid_click()
    {
        $_SESSION["x"] =(int)$_COOKIE['x'];
        $_SESSION["y"] =(int)$_COOKIE['y'];
        $_SESSION["bl_x"] =(int)$_COOKIE['blank_x'];
        $_SESSION["bl_y"] =(int)$_COOKIE['blank_y'];



        // (Right) Check to see if selected cell is to the right of the blank one
        if( $_SESSION["x"] === $_SESSION["bl_x"] && $_SESSION["y"] === ( $_SESSION["bl_y"] + 1)) {
            $_SESSION["output"] = "Valid Click";
            echo "<p>Total: " . $_SESSION['output'] . "</p>";
            return true;}

        // (Left) Check to see if selected cell is to the left of the blank one
        if($_SESSION["x"] === $_SESSION["bl_x"] && $_SESSION["y"] === ( $_SESSION["bl_y"] - 1)) {
            $_SESSION["output"] = "Valid Click";
            echo "<p>Total: " . $_SESSION['output'] . "</p>";
            return true;}

        // (Top) Check to see if selected cell is on top of the blank one
        if($_SESSION["x"] === ($_SESSION["bl_x"]  - 1) && $_SESSION["y"] ===  $_SESSION["bl_y"] ){
            $_SESSION["output"] = "Valid Click";
            echo "<p>Total: " . $_SESSION['output'] . "</p>";
            return true;}

        // (Bottom) Check to see if selected cell is under the blank one
        if($_SESSION["x"] === ($_SESSION["bl_x"]  + 1) && $_SESSION["y"] ===  $_SESSION["bl_y"] ) {
            $_SESSION["output"] = "Valid Click";
            echo "<p>Total: " . $_SESSION['output'] . "</p>";
            return true;}


        $_SESSION["output"] = "Invalid Click";;
        echo "<p>Total: " . $_SESSION['output'] . "</p>";
        return false;}


    public function scramble()
    {
    return true;
    }

    public function check_win()
    {
        // Loop Through the table and answer sheet and if they are the same then grid is correct

        $answerSheet = array("1","2","3","8"," ","4","7","6","5");
        $z = 0;
            if ($_SESSION['array'][$z] !== $answerSheet[$z]) // If cell does not match that in the answer sheet return false
            {
                return false;
            }
            $z++;

       // window.alert("Congratulations You Solved The Puzzle!!!");
        return true;
    }
}