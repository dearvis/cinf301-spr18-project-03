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
        // (Right) Check to see if selected cell is to the right of the blank one
        if($_COOKIE['x'] === $_COOKIE['blank_x'] && $_COOKIE['y'] === ($_COOKIE['blank_y'] + 1)) {return true;}

        // (Left) Check to see if selected cell is to the left of the blank one
        if($_COOKIE['x'] === $_COOKIE['blank_x'] &&  $_COOKIE['y'] ===  ($_COOKIE['blank_y'] - 1)) {return true;}

        // (Top) Check to see if selected cell is on top of the blank one
        if($_COOKIE['x'] === ($_COOKIE['blank_x'] - 1) && $_COOKIE['y'] ===  $_COOKIE['blank_y'] ){return true;}

        // (Bottom) Check to see if selected cell is under the blank one
        if($_COOKIE['x'] === ($_COOKIE['blank_x'] + 1) && $_COOKIE['y'] ===  $_COOKIE['blank_y']) {return true;}

        return false;
    }

    public function scramble()
    {

    }

    public function check_win()
    {
        // Loop Through the table and answer sheet and if they are the same then grid is correct

        $answerSheet = array("1","2","3","8"," ","4","7","6","5");
        $z = 0;
            if ($arr[$z] !== $answerSheet[$z]) // If cell does not match that in the answer sheet return false
            {
                return false;
            }
            $z++;

        window.alert("Congratulations You Solved The Puzzle!!!");
        return true;
    }
}