var manageUserTable;
var manageUserBankTable;

$(document).ready(function() {
  // top nav bar
  $("#topNavUser").addClass("active");
  // manage product data table
  manageUserTable = $("#manageUserTable").DataTable({
    ajax: "php_action/fetchUser.php",
    order: []
  });

  manageUserBankTable = $("#manageUserBankDetailsTable").DataTable({
    ajax: "php_action/fetchBankDetails.php",
    order: []
  });

  $("#createUserForm")
    .unbind("submit")
    .bind("submit", function() {
      var form = $(this);

      $(".form-group")
        .removeClass("has-error")
        .removeClass("has-success");
      $(".text-danger").remove();

      var username = $("#username").val();
      var pancard = $("#pancard").val();
      var building_no = $("#building_no").val();
      var street_name = $("#street_name").val();
      var landmark = $("#landmark").val();
      var pincode = $("#pincode").val();
      var city = $("#city").val();
      var state = $("#state").val();
      var country = $("#country").val();
      var mobile = $("#mobile").val();
      var bank_name = $("#bank_name").val();
      var ifsc_code = $("#ifsc_code").val();
      var account_name = $("#account_name").val();
      var branch_name = $("#branch_name").val();
      var account_no = $("#account_no").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var cpassword = $("#cpassword").val();

      // form validation
      if (username == "") {
        $("#username").after(
          '<p class="text-danger"> The Username field is required </p>'
        );
        $("#username")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#username")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (pancard == "") {
        $("#pancard").after(
          '<p class="text-danger"> The Pancard field is required </p>'
        );
        $("#pancard")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#pancard")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (building_no == "") {
        $("#building_no").after(
          '<p class="text-danger"> The Building no field is required </p>'
        );
        $("#building_no")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#building_no")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (street_name == "") {
        $("#street_name").after(
          '<p class="text-danger"> The Street Name field is required </p>'
        );
        $("#street_name")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#street_name")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (landmark == "") {
        $("#landmark").after(
          '<p class="text-danger"> The Landmark field is required </p>'
        );
        $("#landmark")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#landmark")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (pincode == "") {
        $("#pincode").after(
          '<p class="text-danger"> The Pincode field is required </p>'
        );
        $("#pincode")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#pincode")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (city == "") {
        $("#city").after(
          '<p class="text-danger"> The City field is required </p>'
        );
        $("#city")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#city")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (state == "") {
        $("#state").after(
          '<p class="text-danger"> The State field is required </p>'
        );
        $("#state")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#state")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (country == "") {
        $("#country").after(
          '<p class="text-danger"> The Country field is required </p>'
        );
        $("#country")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#country")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (mobile == "") {
        $("#mobile").after(
          '<p class="text-danger"> The Mobile field is required </p>'
        );
        $("#mobile")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#mobile")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (bank_name == "") {
        $("#bank_name").after(
          '<p class="text-danger"> The bank_name field is required </p>'
        );
        $("#bank_name")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#bank_name")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (ifsc_code == "") {
        $("#ifsc_code").after(
          '<p class="text-danger"> The IFSC Code field is required </p>'
        );
        $("#ifsc_code")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#ifsc_code")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (account_name == "") {
        $("#account_name").after(
          '<p class="text-danger"> The Account Name field is required </p>'
        );
        $("#account_name")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#account_name")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (branch_name == "") {
        $("#branch_name").after(
          '<p class="text-danger"> The Branch Name field is required </p>'
        );
        $("#branch_name")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#branch_name")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (account_no == "") {
        $("#account_no").after(
          '<p class="text-danger"> The Account No field is required </p>'
        );
        $("#account_no")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#account_no")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (email == "") {
        $("#email").after(
          '<p class="text-danger"> The Email Status field is required </p>'
        );
        $("#email")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#email")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (password == "") {
        $("#password").after(
          '<p class="text-danger"> The Password Status field is required </p>'
        );
        $("#password")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#password")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (cpassword == "") {
        $("#cpassword").after(
          '<p class="text-danger"> The cpassword Status field is required </p>'
        );
        $("#cpassword")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#cpassword")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (password != cpassword) {
        $("#cpassword").after(
          '<p class="text-danger"> Password can not be match </p>'
        );
        $("#cpassword")
          .closest(".form-group")
          .addClass("has-error");
      } else {
        $("#cpassword")
          .closest(".form-group")
          .addClass("has-success");
      } // /else

      if (
        username &&
        pancard &&
        building_no &&
        street_name &&
        landmark &&
        pincode &&
        city &&
        state &&
        country &&
        mobile &&
        bank_name &&
        ifsc_code &&
        account_name &&
        branch_name &&
        account_no &&
        email &&
        password &&
        cpassword
      ) {
        if (validateProduct == true && validateQuantity == true) {
          // create order button
          // $("#createOrderBtn").button('loading');

          $.ajax({
            url: form.attr("action"),
            type: form.attr("method"),
            data: form.serialize(),
            dataType: "json",
            success: function(response) {
              console.log(response);
              // reset button
              $("#createOrderBtn").button("reset");

              $(".text-danger").remove();
              $(".form-group")
                .removeClass("has-error")
                .removeClass("has-success");

            } // /response
          }); // /ajax
        } // if array validate is true
      } // /if field validate is true

      return false;
    }); // /create order form function

  // remove product
}); // document.ready fucntion

function editUser(userid = null) {
  if (userid) {
    $("#userid").remove();
    // remove text-error
    $(".text-danger").remove();
    // remove from-group error
    $(".form-group")
      .removeClass("has-error")
      .removeClass("has-success");
    // modal spinner
    $(".div-loading").removeClass("div-hide");
    // modal div
    $(".div-result").addClass("div-hide");

    $.ajax({
      url: "php_action/fetchSelectedUser.php",
      type: "post",
      data: { userid: userid },
      dataType: "json",
      success: function(response) {
        // alert(response.product_image);
        // modal spinner
        $(".div-loading").addClass("div-hide");
        // modal div
        $(".div-result").removeClass("div-hide");

        // product id
        $(".editUserFooter").append(
          '<input type="hidden" name="userid" id="userid" value="' +
            response.user_id +
            '" />'
        );
        $(".editUserPhotoFooter").append(
          '<input type="hidden" name="userid" id="userid" value="' +
            response.user_id +
            '" />'
        );

        // product name
        $("#edituserName").val(response.username);
        // quantity
        //$("#editPassword").val(response.quantity);

        // update the product data function
        $("#editUserForm")
          .unbind("submit")
          .bind("submit", function() {
            // form validation
            var username = $("#edituserName").val();
            var userpassword = $("#editPassword").val();

            if (username == "") {
              $("#edituserName").after(
                '<p class="text-danger">User Name field is required</p>'
              );
              $("#edituserName")
                .closest(".form-group")
                .addClass("has-error");
            } else {
              // remov error text field
              $("#edituserName")
                .find(".text-danger")
                .remove();
              // success out for form
              $("#edituserName")
                .closest(".form-group")
                .addClass("has-success");
            } // /else

            if (userpassword == "") {
              $("#editPassword").after(
                '<p class="text-danger">Password field is required</p>'
              );
              $("#editPassword")
                .closest(".form-group")
                .addClass("has-error");
            } else {
              // remov error text field
              $("#editPassword")
                .find(".text-danger")
                .remove();
              // success out for form
              $("#editPassword")
                .closest(".form-group")
                .addClass("has-success");
            } // /else

            if (userpassword && username) {
              // submit loading button
              $("#editUserBtn").button("loading");

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
                  console.log(response);
                  if (response.success == true) {
                    // submit loading button
                    $("#editUserBtn").button("reset");

                    $(
                      "html, body, div.modal, div.modal-content, div.modal-body"
                    ).animate({ scrollTop: "0" }, 100);

                    // shows a successful message after operation
                    $("#edit-user-messages").html(
                      '<div class="alert alert-success">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                        response.messages +
                        "</div>"
                    );

                    // remove the mesages
                    $(".alert-success")
                      .delay(500)
                      .show(10, function() {
                        $(this)
                          .delay(3000)
                          .hide(10, function() {
                            $(this).remove();
                          });
                      }); // /.alert

                    // reload the manage student table
                    manageUserTable.ajax.reload(null, true);
                    manageUserBankTable.ajax.reload(null, true);

                    // remove text-error
                    $(".text-danger").remove();
                    // remove from-group error
                    $(".form-group")
                      .removeClass("has-error")
                      .removeClass("has-success");
                  } // /if response.success
                } // /success function
              }); // /ajax function
            } // /if validation is ok

            return false;
          }); // update the product data function

        // update the product image
        $("#updateProductImageForm")
          .unbind("submit")
          .bind("submit", function() {
            // form validation
            var productImage = $("#editProductImage").val();

            if (productImage == "") {
              $("#editProductImage")
                .closest(".center-block")
                .after(
                  '<p class="text-danger">Product Image field is required</p>'
                );
              $("#editProductImage")
                .closest(".form-group")
                .addClass("has-error");
            } else {
              // remov error text field
              $("#editProductImage")
                .find(".text-danger")
                .remove();
              // success out for form
              $("#editProductImage")
                .closest(".form-group")
                .addClass("has-success");
            } // /else

            if (productImage) {
              // submit loading button
              $("#editProductImageBtn").button("loading");

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
                    // submit loading button
                    $("#editProductImageBtn").button("reset");

                    $(
                      "html, body, div.modal, div.modal-content, div.modal-body"
                    ).animate({ scrollTop: "0" }, 100);

                    // shows a successful message after operation
                    $("#edit-productPhoto-messages").html(
                      '<div class="alert alert-success">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                        response.messages +
                        "</div>"
                    );

                    // remove the mesages
                    $(".alert-success")
                      .delay(500)
                      .show(10, function() {
                        $(this)
                          .delay(3000)
                          .hide(10, function() {
                            $(this).remove();
                          });
                      }); // /.alert

                    // reload the manage student table
                    manageUserTable.ajax.reload(null, true);
                    manageUserBankTable.ajax.reload(null, true);

                    $(".fileinput-remove-button").click();

                    $.ajax({
                      url: "php_action/fetchProductImageUrl.php?i=" + userid,
                      type: "post",
                      success: function(response) {
                        $("#getProductImage").attr("src", response);
                      }
                    });

                    // remove text-error
                    $(".text-danger").remove();
                    // remove from-group error
                    $(".form-group")
                      .removeClass("has-error")
                      .removeClass("has-success");
                  } // /if response.success
                } // /success function
              }); // /ajax function
            } // /if validation is ok

            return false;
          }); // /update the product image
      } // /success function
    }); // /ajax to fetch product image
  } else {
    alert("error please refresh the page");
  }
} // /edit product function

// remove product
function removeUser(userid = null) {
  if (userid) {
    // remove product button clicked
    $("#removeProductBtn")
      .unbind("click")
      .bind("click", function() {
        // loading remove button
        $("#removeProductBtn").button("loading");
        $.ajax({
          url: "php_action/removeUser.php",
          type: "post",
          data: { userid: userid },
          dataType: "json",
          success: function(response) {
            // loading remove button
            $("#removeProductBtn").button("reset");
            if (response.success == true) {
              // remove product modal
              $("#removeUserModal").modal("hide");

              // update the product table
              manageUserTable.ajax.reload(null, false);
              manageUserBankTable.ajax.reload(null, true);

              // remove success messages
              $(".remove-messages").html(
                '<div class="alert alert-success">' +
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                  response.messages +
                  "</div>"
              );

              // remove the mesages
              $(".alert-success")
                .delay(500)
                .show(10, function() {
                  $(this)
                    .delay(3000)
                    .hide(10, function() {
                      $(this).remove();
                    });
                }); // /.alert
            } else {
              // remove success messages
              $(".removeUserMessages").html(
                '<div class="alert alert-success">' +
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                  response.messages +
                  "</div>"
              );

              // remove the mesages
              $(".alert-success")
                .delay(500)
                .show(10, function() {
                  $(this)
                    .delay(3000)
                    .hide(10, function() {
                      $(this).remove();
                    });
                }); // /.alert
            } // /error
          } // /success function
        }); // /ajax fucntion to remove the product
        return false;
      }); // /remove product btn clicked
  } // /if userid
} // /remove product function
