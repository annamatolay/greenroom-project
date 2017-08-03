/**
 * Responsible for searching in the table. Hide and show the records.
 * @param inputId: HTML input tag id attribute
 * @param columnNum: Database column number
 */
function search(inputId, columnNum) {
    var input, filter, table, tr, td, i;
    input = document.getElementById(inputId);
    filter = input.value.toUpperCase();
    table = document.getElementById("resTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[columnNum];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

/**
 * Responsible for searchable columns input field visualization.
 */
function displayInput() {
    var brand = $("#brandInput");
    var type = $("#typeInput");
    var price = $("#priceInput");

    $("#brandHead").click(function(){
        if (brand.css('display') === 'none') {
            brand.show();
            type.hide();
            price.hide();
        } else {
            brand.hide();
        }
    });
    $("#typeHead").click(function(){
        if (type.css('display') === 'none') {
            type.show();
            brand.hide();
            price.hide();
        } else {
            type.hide();
        }
    });
    $("#priceHead").click(function(){
        if (price.css('display') === 'none') {
            price.show();
            brand.hide();
            type.hide();
        } else {
            price.hide();
        }
    });
}

$(document).ready(function(){
    /**
     * Setting third-party solution for pagination.
     * Source: https://datatables.net/
     */
    $('#resTable').DataTable( {
        "searching": false,
        "pagingType": "full_numbers"
    });

    displayInput();
});