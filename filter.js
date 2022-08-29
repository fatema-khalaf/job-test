$(document).ready(function () {
  $("#getCheckboxesButton").click(function (event) {
    var jender = [];
    var post = [];
    var education = [];
    $("#jender:checked").each(function (index, elem) {
      jender.push($(elem).val());
    });
    $("#post:checked").each(function (index, elem) {
      post.push($(elem).val());
    });
    $("#education:checked").each(function (index, elem) {
      education.push($(elem).val());
    });

    filter(jender, post, education);
  });

  function addData(user) {
    $("#tableBody").append(
      `<tr>
          <td>${user.NAME + " " + user.SECOND_NAME + " " + user.LAST_NAME}</td>
          <td>${user.Email}</td>
          <td>${user.PHONE}</td>
          <td>${user.COMPANY_TITLE}</td>
          <td><button id="myBtn" class='btn2' onclick="showDetails(${
            user.ID
          })">More Details</button>
          </td>
      </tr>`
    );
  }

  function filter(jender, post, education) {
    const tableBody = $("#tableBody");
    const dataLenght = $("#dataLenght");
    $("#loading").css("display", "flex"); // show loading

    tableBody.empty(); // remove old data

    const filterj = jender.length > 0;
    const filterp = post.length > 0;
    const filtere = education.length > 0;
    $.ajax({
      type: "GET",
      url: "getData.php",
      success: function (data) {
        dataLenght.val(JSON.parse(data).length);
        JSON.parse(data).forEach((user) => {
          if (filterj && filterp && filtere) {
            if (
              jender.includes(user.JENDER) &&
              education.includes(user.EDUCATION) &&
              post.includes(user.POST)
            ) {
              addData(user);
            }
          } else if (filterj && filterp && !filtere) {
            if (jender.includes(user.JENDER) && post.includes(user.POST)) {
              addData(user);
            }
          } else if (filterj && !filterp && filtere) {
            if (
              jender.includes(user.JENDER) &&
              education.includes(user.EDUCATION)
            ) {
              addData(user);
            }
          } else if (!filterj && filterp && filtere) {
            if (
              post.includes(user.POST) &&
              education.includes(user.EDUCATION)
            ) {
              addData(user);
            }
          } else if (!filterj && !filterp && filtere) {
            if (education.includes(user.EDUCATION)) {
              addData(user);
            }
          } else if (!filterj && filterp && !filtere) {
            if (post.includes(user.POST)) {
              addData(user);
            }
          } else if (filterj && !filterp && !filtere) {
            if (jender.includes(user.JENDER)) {
              addData(user);
            }
          } else {
            addData(user);
          }
          $("#loading").css("display", "none"); // remove loading
        });
      },
    });
  }
});
