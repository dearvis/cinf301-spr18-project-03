/*
 * See https://stackoverflow.com/questions/45656949/how-to-return-the-row-and-column-index-of-a-table-cell-by-clicking
 * which includes a Jquery solution too.
 */
var currentTable = new Array(9);
var bool = false;
var clicked = false;
window.onload = function() {
    const table = document.querySelector('table');
    const rows = document.querySelectorAll('tr');
    const rowsArray = Array.from(rows);


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

        if(bool === false) {
           document.cookie = "x=" + rowIndex;
           document.cookie = "y=" + columnIndex;
           document.cookie = "blank_x=1";
           document.cookie = "blank_y=1";
            document.cookie="currTable=" + myPostString;
           bool = true;
       }

        if(clicked === true) {
            let empty_val = table.rows[parseInt(getCookie("blank_x"))].cells[parseInt(getCookie("blank_y"))].innerHTML; // new spot clicked is moving too  (B)
            let clicked_val = table.rows[parseInt(getCookie("x"))].cells[parseInt(getCookie("y"))].innerHTML; // E
            table.rows[parseInt(getCookie("blank_x"))].cells[parseInt(getCookie("blank_y"))].innerHTML = clicked_val.toString();
            table.rows[parseInt(getCookie("x"))].cells[parseInt(getCookie("y"))].innerHTML = empty_val.toString();
        }
        if(clicked !== true){

        }

    })};
    function getCookie(name) {
        function escape(s) {
            return s.replace(/([.*+?\^${}()|\[\]\/\\])/g, '\\$1');
        }
        var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
        return match ? match[1] : null;
    }

    function swap()
    {
        const table = document.querySelector('table');
        let empty_val = table.rows[parseInt(getCookie("blank_x") )].cells[parseInt(getCookie("blank_y") )].innerHTML; // new spot clicked is moving too  (B)
        let clicked_val = table.rows[parseInt(getCookie("x"))].cells[parseInt(getCookie("y"))].innerHTML; // E
        table.rows[parseInt(getCookie("blank_x") )].cells[parseInt(getCookie("blank_y") )].innerHTML = clicked_val.toString();
        table.rows[parseInt(getCookie("x"))].cells[parseInt(getCookie("y"))].innerHTML = empty_val.toString();
    }


$.ajax({
    url: 'handler.php',
    success: function(data) {
        $('.result').html(data);
    }
});


