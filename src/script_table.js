/*
 * See https://stackoverflow.com/questions/45656949/how-to-return-the-row-and-column-index-of-a-table-cell-by-clicking
 * which includes a Jquery solution too.
 */
window.onload = function() {
    const table = document.querySelector('table');
    const rows = document.querySelectorAll('tr');
    const rowsArray = Array.from(rows);
    var currentTable = new Array(9);
    table.addEventListener('click', (event) => {
        const rowIndex = rowsArray.findIndex(row => row.contains(event.target));
        const columns = Array.from(rowsArray[rowIndex].querySelectorAll('td'));
        const columnIndex = columns.findIndex(column => column == event.target);
        console.log(rowIndex, columnIndex);

        let j = 0;
        for (let g = 0; g < table.rows.length; g++) {
            for (let h = 0; h < table.rows.length; h++) {
                let tmp = table.rows[g].cells[h].innerHTML.toString();
                 currentTable[j] = tmp.charAt(0);
                 j+=1;
            }}

        delimiter = '^';
        var myPostString = currentTable.join(delimiter);
        let x = rowIndex;
        let y = columnIndex;
        document.cookie="x=" + rowIndex;
        document.cookie="y=" + columnIndex;
        document.cookie="currTable=" + myPostString;
         //  window.alert(myPostString);

           // window.location.href = "handler.php?w1=" + myPostString;


          //  console.log(currentTable[0]);

           location.href = 'handler.php';
        //document.cookie = "row_clicked=" + i;
    })
};

