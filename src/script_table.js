/*
 * See https://stackoverflow.com/questions/45656949/how-to-return-the-row-and-column-index-of-a-table-cell-by-clicking
 * which includes a Jquery solution too.
 */
window.onload = function() {
    const table = document.querySelector('table');
    const rows = document.querySelectorAll('tr');
    const rowsArray = Array.from(rows);

    table.addEventListener('click', (event) => {
        const rowIndex = rowsArray.findIndex(row => row.contains(event.target));
        const columns = Array.from(rowsArray[rowIndex].querySelectorAll('td'));
        const columnIndex = columns.findIndex(column => column == event.target);
        console.log(rowIndex, columnIndex);
        let x = rowIndex;
        let y = columnIndex;
        document.cookie="x=" + rowIndex;
        document.cookie="y=" + columnIndex;
        location.href = 'puzzle_logic.php';
        //document.cookie = "row_clicked=" + i;
    })
};

