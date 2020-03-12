var managePermissionTable;

$(document).ready(function() {
  managePermissionTable = $("#managePermissionTable").DataTable({
    ajax: "php_action/permission/fetchUserPermission.php",
    order: []
  });
});

function editPermission(userId = null, type = null) {
  var typeId = $(type).attr("id");
  var test = $(`#${typeId}`).text();
  if (userId) {
    $.ajax({
      url: "php_action/permission/editPermission.php",
      data: { userId: userId, status: test == "Yes" ? 0 : 1, type: typeId },
      type: "post",
      dataType: "json",
      success: function(response) {
        if (test == "Yes") {
          $(`#${typeId}`)
            .text("No")
            .removeClass("label label-success")
            .addClass("label label-danger");
        } else {
          $(`#${typeId}`)
            .text("Yes")
            .removeClass("label label-danger")
            .addClass("label label-success");
        }
      }
    });
  } else {
    alert("error!! Refresh the page again");
  }
}
