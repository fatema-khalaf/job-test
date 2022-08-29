$(document).ready(function () {
  $("body").on("DOMSubtreeModified", "#tableBody", function () {
    let rowsPerPage = 4;
    let rows = $("#my-table tbody tr");
    const rowsCount = rows.length;
    const pageCount = Math.ceil(rowsCount / rowsPerPage);
    const numbers = $("#numbers");

    numbers.empty(); // remove existing pagination

    for (var i = 0; i < pageCount; i++) {
      numbers.append('<li><a href="#">' + (i + 1) + "</a></li>");
    }

    const allRows = $("#dataLenght").val();
    $("#numbers li:first-child a").addClass("active"); // add active class

    $("#showAll").click(function () {
      rowsPerPage = allRows;
      displayRows(1);
    });

    displayRows(1); // display first page

    $("#numbers li a").click(function (e) {
      var $this = $(this);

      e.preventDefault();

      $("#numbers li a").removeClass("active"); // remove active class

      $this.addClass("active");

      if ($this.text() !== "All rows") {
        rowsPerPage = 4;
        displayRows($this.text());
      }
    });

    function displayRows(index) {
      var start = (index - 1) * rowsPerPage;
      var end = start + rowsPerPage;

      rows.hide(); // hide all rows

      rows.slice(start, end).show(); //Show the proper rows for this page.
    }
  });
});
