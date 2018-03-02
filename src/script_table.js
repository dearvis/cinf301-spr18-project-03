/*
 * See https://stackoverflow.com/questions/45656949/how-to-return-the-row-and-column-index-of-a-table-cell-by-clicking
 * which includes a Jquery solution too.
 */
var bool = false;
var clicked;

window.onload = function() {
    const table = document.querySelector('table');
    const rows = document.querySelectorAll('tr');
    const rowsArray = Array.from(rows);


    table.addEventListener('click', (event) => {
        const rowIndex = rowsArray.findIndex(row => row.contains(event.target));
        const columns = Array.from(rowsArray[rowIndex].querySelectorAll('td'));
        const columnIndex = columns.findIndex(column => column == event.target);
        console.log(rowIndex);
        console.log(columnIndex);
        document.cookie = 'x=' + rowIndex;
        document.cookie = 'y=' + columnIndex;
        del_testcookie("TestCookie");
        setTimeout("location.reload(true);",1500);


        if(bool === false) {   // Initial blank location
           document.cookie = 'blank_x=1';
           document.cookie = 'blank_y=1';

           bool = true;
            location.reload();
       }


    })};
function del_cookiesXY() {
    document.cookie = 'x' +
        '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
    document.cookie = 'y' +
        '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
}

function del_testcookie() {
    document.cookie = 'TestCookie' +
        '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
}


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
