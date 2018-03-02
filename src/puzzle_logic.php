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
            $_COOKIE['test'] = "Invalid click";
            return;
        }

        //Vertical
        //Above Empty Cell
        if( $_SESSION["x"] === ($_SESSION["bl_x"] - 1) && $_SESSION["y"] === $_SESSION["bl_y"] && $this->valid_click() === true)
        {
          $this->check_win();

           $_SESSION["bl_x"] = $_SESSION["x"] + 1;
           $_SESSION["tableLink"][$_SESSION["x"]][$_SESSION["y"]] = $_COOKIE["cellBlank"];
           $_SESSION["tableLink"][$_SESSION["bl_x"]][$_SESSION["bl_y"]] = $_SESSION["tableLink"][$_SESSION["x"]][$_SESSION["y"]];
            $_COOKIE["test"] = "Switched Cells";
           return;
        }

        //Below empty cell
        // x == blank x  (bl_x)     y == blank y (bl_y)
        // i == clicked x (x)       j == clicked y (y)
        //   $_SESSION["x"] === ($_SESSION["bl_x"]  - 1) && $_SESSION["y"] ===  $_SESSION["bl_y"]
    if( $_SESSION["x"] === ($_SESSION["bl_x"] + 1) && $_SESSION["y"] === $_SESSION["bl_y"] && $this->valid_click() === true)
    {
        $this->check_win();
        $_SESSION["bl_x"] = $_SESSION["x"] - 1;
        $_SESSION["tableLink"][$_SESSION["x"]][$_SESSION["y"]] = $_COOKIE['cellBlank'];
        $_SESSION["tableLink"][$_SESSION["bl_x"]][$_SESSION["bl_y"]] = $_SESSION["tableLink"][$_SESSION["x"]][$_SESSION["y"]];
        $_COOKIE['test'] = "Switched Cells";

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
        $this->check_win();
        $_SESSION["bl_y"] = $_SESSION["bl_y"] + 1;
        $_SESSION["tableLink"][$_SESSION["x"]][$_SESSION["y"]] = $_COOKIE['cellBlank'];
        $_SESSION["tableLink"][$_SESSION["bl_x"]][$_SESSION["bl_y"]] = $_SESSION["tableLink"][$_SESSION["x"]][$_SESSION["y"]];
        $_COOKIE['test'] = "Switched Cells";
        //echo '<script type="text/javascript">swap()</script>';
        //$this->check_win();
//        y = y - 1;
//        checkWin();
        return;
    }
    //Right
        if( $_SESSION["x"] === $_SESSION["bl_x"]  && $_SESSION["y"] === ($_SESSION["bl_y"] - 1) && $this->valid_click() === true)
    {
        $this->check_win();
        $_SESSION["bl_y"] = $_SESSION["bl_y"] - 1;
        $_SESSION["tableLink"][$_SESSION["x"]][$_SESSION["y"]] = $_COOKIE['cellBlank'];
        $_SESSION["tableLink"][$_SESSION["bl_x"]][$_SESSION["bl_y"]] = $_SESSION["tableLink"][$_SESSION["x"]][$_SESSION["y"]];
        $_COOKIE['test'] = "Switched Cells";
        //echo '<script type="text/javascript">swap()</script>';

       // echo '<script type="text/javascript">swap()</script>';
       // $this->check_win();
//        y = y + 1;
//        checkWin();
    }
        return;
    }

    public function valid_click()
    {
        $val1 =isset($_COOKIE['x'])?$_COOKIE['x']:'';
        $_SESSION["x"] =(int)$val1;
        $val2 =isset($_COOKIE['y'])?$_COOKIE['y']:'';
        $_SESSION["y"] =(int)$val2;
        $_SESSION["bl_x"] =(int)$_COOKIE['blank_x'];
        $val3 =isset($_COOKIE['blank_x'])?$_COOKIE['blank_x']:'';
        $_SESSION["x"] =(int)$val3;
        $val4 =isset($_COOKIE['blank_y'])?$_COOKIE['blank_y']:'';
        $_SESSION["bl_y"] =(int)$val4;


        // (Right) Check to see if selected cell is to the right of the blank one
        if( $_SESSION["x"] === $_SESSION["bl_x"] && $_SESSION["y"] === ( $_SESSION["bl_y"] + 1)) {
            $_SESSION['text'] = "Valid Output";

            return true;}

        // (Left) Check to see if selected cell is to the left of the blank one
        if($_SESSION["x"] === $_SESSION["bl_x"] && $_SESSION["y"] === ( $_SESSION["bl_y"] - 1)) {
            $_SESSION['text'] = "Valid Output";
            return true;}

        // (Top) Check to see if selected cell is on top of the blank one
        if($_SESSION["x"] === ($_SESSION["bl_x"]  - 1) && $_SESSION["y"] ===  $_SESSION["bl_y"] ){
            $_SESSION['text'] = "Valid Output";
            return true;}

        // (Bottom) Check to see if selected cell is under the blank one
        if($_SESSION["x"] === ($_SESSION["bl_x"]  + 1) && $_SESSION["y"] ===  $_SESSION["bl_y"] ) {
            $_SESSION['text'] = "Valid Output";
            return true;}

            // Invalid Click
        $_SESSION['text'] = "Invalid Click";;
        return false;}


    public function scramble()
    {
    return true;
    }

    public function check_win()
    {
        // Loop Through the table and answer sheet and if they are the same then grid is correct

        $answerSheet = array("1","2","3","8"," ","4","7","6","5");
        $currentTable = array( $_COOKIE['cellOne'], $_COOKIE['cellTwo'],$_COOKIE['cellThree'],$_COOKIE['cellEight'],
                               $_COOKIE['cellBlank'],$_COOKIE['cellFour'],$_COOKIE['cellSeven'],$_COOKIE['cellSix'],
                               $_COOKIE['cellFive']);
        $z = 0;
            if ($currentTable[$z] !== $answerSheet[$z]) // If cell does not match that in the answer sheet return false
            {
                echo ("Hello Out there puzzle logic line 146");
                return false;
            }
            $z++;
        echo "Congratulations You Won!!!";
       // window.alert("Congratulations You Solved The Puzzle!!!");
        return true;
    }
}