<?php
/**
 * Created by PhpStorm.
 * User: shadow
 * Date: 2/26/2018
 * Time: 1:15 AM
 */
require_once 'puzzle_logic.php';
class puzzle_logic
{

    public function __construct()
    {

    }

    public function switch_elems()  // Coordinates for Clicked Elements
    {
        if($this->valid_click() === false)
        {
            $_SESSION['text'] ="Invalid move";
            return;
        }

        //Vertical
        //Above Empty Cell
        if( $_SESSION["x"] === ($_SESSION["bl_x"] - 1) && $_SESSION["y"] === $_SESSION["bl_y"] && $this->valid_click() === true)
        {
           $_SESSION["x"] = $_SESSION["x"] - 1;


           // $this->check_win();
//        x = x - 1;
//        checkWin();
        return;
    }

        //Below empty cell
        // x == blank x  (bl_x)     y == blank y (bl_y)
        // i == clicked x (x)       j == clicked y (y)
        //   $_SESSION["x"] === ($_SESSION["bl_x"]  - 1) && $_SESSION["y"] ===  $_SESSION["bl_y"]
    if( $_SESSION["x"] === ($_SESSION["bl_x"] + 1) && $_SESSION["y"] === $_SESSION["bl_y"] && $this->valid_click() === true)
    {
        $_SESSION["x"] = $_SESSION["x"] + 1;

       // echo '<script type="text/javascript">swap()</script>';
       // $this->check_win();
//        x = x + 1;
//        checkWin();
        return;
    }

    //Horizontal
    //Left
    if( $_SESSION["x"] === $_SESSION["bl_x"]  && $_SESSION["y"] === ($_SESSION["bl_y"] - 1) && $this->valid_click() === true)
    {
        $_SESSION["y"] = $_SESSION["y"] - 1;

        //echo '<script type="text/javascript">swap()</script>';
        //$this->check_win();
//        y = y - 1;
//        checkWin();
        return;
    }
    //Right
        if( $_SESSION["x"] === $_SESSION["bl_x"]  && $_SESSION["y"] === ($_SESSION["bl_y"] - 1) && $this->valid_click() === true)
    {
        $_SESSION["y"] = $_SESSION["y"] + 1;

       // echo '<script type="text/javascript">swap()</script>';
       // $this->check_win();
//        y = y + 1;
//        checkWin();
    }
        return;
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
            $_SESSION['text'] = $_SESSION['output'];
            return true;}

        // (Left) Check to see if selected cell is to the left of the blank one
        if($_SESSION["x"] === $_SESSION["bl_x"] && $_SESSION["y"] === ( $_SESSION["bl_y"] - 1)) {
            $_SESSION["output"] = "Valid Click";
            $_SESSION['text'] = $_SESSION['output'];
            return true;}

        // (Top) Check to see if selected cell is on top of the blank one
        if($_SESSION["x"] === ($_SESSION["bl_x"]  - 1) && $_SESSION["y"] ===  $_SESSION["bl_y"] ){
            $_SESSION["output"] = "Valid Click";
            $_SESSION['text'] = $_SESSION['output'];
            return true;}

        // (Bottom) Check to see if selected cell is under the blank one
        if($_SESSION["x"] === ($_SESSION["bl_x"]  + 1) && $_SESSION["y"] ===  $_SESSION["bl_y"] ) {
            $_SESSION["output"] = "Valid Click";
            $_SESSION['text'] = $_SESSION['output'];
            return true;}

        $_SESSION["output"] = "Invalid Click";;
        $_SESSION['text'] = $_SESSION['output'];
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
        echo "Congratulations You Won!!!";
       // window.alert("Congratulations You Solved The Puzzle!!!");
        return true;
    }
}