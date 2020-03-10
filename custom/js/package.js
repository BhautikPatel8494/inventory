var manageProductTable;

$(document).ready(function() {
  $("#navProduct").addClass("active");
  manageProductTable = $("#manageProductTable").DataTable({
    ajax: "php_action/package/fetchPackage.php",
    order: []
  });

  $("#addProductModalBtn")
    .unbind("click")
    .bind("click", function() {
      $("#submitProductForm")[0].reset();

      $(".text-danger").remove();
      $(".form-group")
        .removeClass("has-error")
        .removeClass("has-success");

      $("#submitProductForm")
        .unbind("submit")
        .bind("submit", function() {
          var packageName = $("#packageName").val();
          var rate = $("#rate").val();
          var discription = $("#discription").val();

          if (packageName == "") {
            $("#packageName").after(
              '<p class="text-danger">Package Name field is required</p>'
            );
            $("#packageName")
              .closest(".form-group")
              .addClass("has-error");
          } else {
            $("#packageName")
              .find(".text-danger")
              .remove();

            $("#packageName")
              .closest(".form-group")
              .addClass("has-success");
          }

          if (discription == "") {
            $("#discription").after(
              '<p class="text-danger">Discription field is required</p>'
            );
            $("#discription")
              .closest(".form-group")
              .addClass("has-error");
          } else {
            $("#discription")
              .find(".text-danger")
              .remove();

            $("#discription")
              .closest(".form-group")
              .addClass("has-success");
          }

          if (rate == "") {
            $("#rate").after(
              '<p class="text-danger">Rate field is required</p>'
            );
            $("#rate")
              .closest(".form-group")
              .addClass("has-error");
          } else {
            $("#rate")
              .find(".text-danger")
              .remove();

            $("#rate")
              .closest(".form-group")
              .addClass("has-success");
          }

          if (packageName && discription && rate) {
            $("#createProductBtn").button("loading");

            var form = $(this);
            var formData = new FormData(this);

            $.ajax({
              url: form.attr("action"),
              type: form.attr("method"),
              data: formData,
              dataType: "json",
              cache: false,
              contentType: false,
              processData: false,
              success: function(response) {
                if (response.success == true) {
                  $("#createProductBtn").button("reset");

                  $("#submitProductForm")[0].reset();

                  $(
                    "html, body, div.modal, div.modal-content, div.modal-body"
                  ).animate({ scrollTop: "0" }, 100);

                  $("#add-product-messages").html(
                    '<div class="alert alert-success">' +
                      '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                      '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                      response.messages +
                      "</div>"
                  );

                  $(".alert-success")
                    .delay(500)
                    .show(10, function() {
                      $(this)
                        .delay(3000)
                        .hide(10, function() {
                          $(this).remove();
                        });
                    });
                  manageProductTable.ajax.reload(null, true);

                  $(".text-danger").remove();
                  $(".form-group")
                    .removeClass("has-error")
                    .removeClass("has-success");
                }
              }
            });
          }

          return false;
        });
    });
});

function editPackage(packageId = null) {
  if (packageId) {
    $("#packageId").remove();
    $(".text-danger").remove();
    $(".form-group")
      .removeClass("has-error")
      .removeClass("has-success");
    $(".div-loading").removeClass("div-hide");
    $(".div-result").addClass("div-hide");

    $.ajax({
      url: "php_action/package/fetchSelectedPackage.php",
      type: "post",
      data: { packageId: packageId },
      dataType: "json",
      success: function(response) {
        $(".div-loading").addClass("div-hide");
        $(".div-result").removeClass("div-hide");

        $(".editProductFooter").append(
          '<input type="hidden" name="packageId" id="packageId" value="' +
            response.id +
            '" />'
        );

        $("#editPackageName").val(response.name);
        $("#editRate").val(response.rate);
        $("#editDiscription").val(response.description);

        $("#editProductForm")
          .unbind("submit")
          .bind("submit", function() {
            var packageName = $("#editPackageName").val();
            var rate = $("#editRate").val();
            var discription = $("#editDiscription").val();

            if (productName == "") {
              $("#editPackageName").after(
                '<p class="text-danger">Package Name field is required</p>'
              );
              $("#editPackageName")
                .closest(".form-group")
                .addClass("has-error");
            } else {
              $("#editPackageName")
                .find(".text-danger")
                .remove();
              $("#editPackageName")
                .closest(".form-group")
                .addClass("has-success");
            }

            if (rate == "") {
              $("#editRate").after(
                '<p class="text-danger">Rate field is required</p>'
              );
              $("#editRate")
                .closest(".form-group")
                .addClass("has-error");
            } else {
              $("#editRate")
                .find(".text-danger")
                .remove();
              $("#editRate")
                .closest(".form-group")
                .addClass("has-success");
            }

            if (discription == "") {
              $("#editDiscription").after(
                '<p class="text-danger">Discription field is required</p>'
              );
              $("#editDiscription")
                .closest(".form-group")
                .addClass("has-error");
            } else {
              $("#editDiscription")
                .find(".text-danger")
                .remove();
              $("#editDiscription")
                .closest(".form-group")
                .addClass("has-success");
            }

            if (packageName && discription && rate) {
              $("#editProductBtn").button("loading");

              var form = $(this);
              // var formData = new FormData(this);

              $.ajax({
                url: form.attr("action"),
                type: form.attr("method"),
                data: form.serialize(),
                dataType: "json",
                success: function(response) {
                  console.log(response);
                  if (response.success == true) {
                    $("#editProductBtn").button("reset");

                    // $(
                    //   "html, body, div.modal, div.modal-content, div.modal-body"
                    // ).animate({ scrollTop: "0" }, 100);

                    manageProductTable.ajax.reload(null, true);

                    $(".text-danger").remove();
                    $(".form-group")
                      .removeClass("has-error")
                      .removeClass("has-success");

                    $("#edit-product-messages").html(
                      '<div class="alert alert-success">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                        response.messages +
                        "</div>"
                    );

                    $(".alert-success")
                      .delay(500)
                      .show(10, function() {
                        $(this)
                          .delay(3000)
                          .hide(10, function() {
                            $(this).remove();
                          });
                      });
                  }
                }
              });
            }

            return false;
          });
      }
    });
  } else {
    alert("error please refresh the page");
  }
}

function removePackage(packageId = null) {
  if (packageId) {
    $("#removeProductBtn")
      .unbind("click")
      .bind("click", function() {
        $("#removeProductBtn").button("loading");
        $.ajax({
          url: "php_action/package/removePackage.php",
          type: "post",
          data: { packageId: packageId },
          dataType: "json",
          success: function(response) {
            $("#removeProductBtn").button("reset");
            if (response.success == true) {
              $("#removePackageModal").modal("hide");

              manageProductTable.ajax.reload(null, false);

              $(".remove-messages").html(
                '<div class="alert alert-success">' +
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                  response.messages +
                  "</div>"
              );

              $(".alert-success")
                .delay(500)
                .show(10, function() {
                  $(this)
                    .delay(3000)
                    .hide(10, function() {
                      $(this).remove();
                    });
                });
            } else {
              $(".removeProductMessages").html(
                '<div class="alert alert-success">' +
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                  response.messages +
                  "</div>"
              );

              $(".alert-success")
                .delay(500)
                .show(10, function() {
                  $(this)
                    .delay(3000)
                    .hide(10, function() {
                      $(this).remove();
                    });
                });
            }
          }
        });
        return false;
      });
  }
}
