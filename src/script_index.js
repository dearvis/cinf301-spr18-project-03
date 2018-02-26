/*
 * Author: DeArvis Troutman
 * Class: Web Applications
 * Date: February 14th, 2018
 *
 */       // Cell index for the blank Cell

window.onload = function() {
    const table = document.querySelector('table');   // Selects the Table Class
    const rows = document.querySelectorAll('tr');    // Selects the tr Class
    const rowsArray = Array.from(rows);              // Array from the rows in the table
    checkWin();
    table.addEventListener('click', (event) => {
        const rowIndex = rowsArray.findIndex(row => row.contains(event.target));
        const columns = Array.from(rowsArray[rowIndex].querySelectorAll('td'));
        const columnIndex = columns.findIndex(column => column == event.target);
        console.log(rowIndex, columnIndex);


    })
};

function switch_elems(i, j) {
    const table = document.querySelector('table');
    if(valid_click(i,j) === false)
    {
        document.getElementById("p1").innerHTML = "Invalid Move";
        return;
    }

    //Vertical
    //Above Empty Cell
    if(i === (x - 1) && j === y && valid_click(i,j) === true)
    {
        let empty_val = table.rows[i].cells[j].innerHTML; // new spot clicked is moving too  (B)
        let clicked_val = table.rows[x].cells[y].innerHTML; // E
        document.getElementById("p1").innerHTML = " ";
        table.rows[i].cells[j].innerHTML = clicked_val.toString();
        table.rows[x].cells[y].innerHTML = empty_val.toString();
        x = x - 1;
        checkWin();
        return;
    }

    //Below empty cell
    if(i === (x + 1) && j === y && valid_click(i,j) === true)
    {
        let empty_val = table.rows[i].cells[j].innerHTML;
        let clicked_val = table.rows[x].cells[y].innerHTML;
        document.getElementById("p1").innerHTML = " ";
        table.rows[i].cells[j].innerHTML = clicked_val.toString();
        table.rows[x].cells[y].innerHTML = empty_val.toString();
        x = x + 1;
        checkWin();
        return;
    }

    //Horizontal
    //Left
    if(i === x && j === (y - 1) && valid_click(i,j) === true)
    {
        let empty_val = table.rows[i].cells[j].innerHTML; // new spot clicked is moving too  (B)
        let clicked_val = table.rows[x].cells[y].innerHTML;
        document.getElementById("p1").innerHTML = " ";
        table.rows[i].cells[j].innerHTML = clicked_val.toString();
        table.rows[x].cells[y].innerHTML = empty_val.toString();
        y = y - 1;
        checkWin();
        return;
    }
    //Right
    if(i === x && j === (y + 1) && valid_click(i,j) === true)
    {
        let empty_val = table.rows[i].cells[j].innerHTML; // new spot clicked is moving too Coordinates for NEW empty cell
        let clicked_val = table.rows[x].cells[y].innerHTML; // Coordinates for new empty cell moving too clicked coordinates
        document.getElementById("p1").innerHTML = " ";
        table.rows[i].cells[j].innerHTML = clicked_val.toString();
        table.rows[x].cells[y].innerHTML = empty_val.toString();
        y = y + 1;
        checkWin();
    }

}

function valid_click(i,j) {

    // (Right) Check to see if selected cell is to the right of the blank one
    if(i === x && j === (y + 1)) {return true;}

    // (Left) Check to see if selected cell is to the left of the blank one
    if(i === x && j === (y - 1)) {return true;}

    // (Top) Check to see if selected cell is on top of the blank one
    if(i === (x - 1) && j === y ){return true;}

    // (Bottom) Check to see if selected cell is under the blank one
    if(i === (x + 1) && j === y) {return true;}

    return false;
}

function scramble() {
    const table = document.querySelector('table');   // Selects the Table Class

    //Nested For Loop to shuffle values in the Table
    for (var i = 0; i  < table.rows.length; i++) {
        for (var j = 0; j  < table.rows.length; j++) {
            var m = Math.floor(Math.random() * (2));
            var n = Math.floor(Math.random() * (2));
            var temp = table.rows[i].cells[j].innerHTML;
            var blank = " ";
            if (table.rows[m].cells[n].innerHTML.toString() === blank) // Check to see if empty cell if it is change x and y
            {
                x = i;
                y = j;
               // document.getElementById("p1").innerHTML = "x and y are at, " + i + ", " + j;
            }
            //         Location                                    String Value
            table.rows[i].cells[j].innerHTML = table.rows[m].cells[n].innerHTML.toString();
            table.rows[m].cells[n].innerHTML = temp.toString();


        }
    }
}

   function checkWin()
    {
        // Loop Through the table and answer sheet and if they are the same then grid is correct
        var answerSheet = ["1","2","3","8"," ","4","7","6","5"];
        const table = document.querySelector('table');
        let z = 0;
        for (var g = 0; g < table.rows.length; g++) {
            for (var h = 0; h < table.rows.length; h++) {
                if (table.rows[g].cells[h].innerHTML.toString() !== answerSheet[z]) // If cell does not match that in the answer sheet return false
                {
                    return false;
                }
                    z++;
            }
        }
        window.alert("Congratulations You Solved The Puzzle!!!");
        return true;
    }


