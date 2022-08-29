$(document).ready(function () {
  const tableBody = $("#tableBody");
  const dataLenght = $("#dataLenght");
  $("#loading").css("display", "flex"); // add loading
  $.ajax({
    type: "GET",
    url: "getData.php",
    success: function (data) {
      dataLenght.val(JSON.parse(data).length); // set data length for pagination
      JSON.parse(data).forEach((user) => {
        tableBody.append(`<tr>
                  <td>${
                    user.NAME + " " + user.SECOND_NAME + " " + user.LAST_NAME
                  }</td>
                  <td>${user.Email}</td>
                  <td>${user.PHONE}</td>
                  <td>${user.COMPANY_TITLE}</td>
                  <td><button id="myBtn" class='btn2' onclick="showDetails(${
                    user.ID
                  })">More Details</button>
                  </td>
              </tr>`);
      });
      $("#loading").css("display", "none"); // remove loading spiner
    },
  });
});
