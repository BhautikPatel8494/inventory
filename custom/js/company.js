var manageUserTable;
var manageUserBankTable;

$(document).ready(function() {
  $("#topNavUser").addClass("active");
  manageUserTable = $("#manageCompanyTable").DataTable({
    ajax: "php_action/company/fetchCompany.php",
    order: []
  });

  manageUserBankTable = $("#manageUserBankDetailsTable").DataTable({
    ajax: "php_action/user/fetchBankDetails.php",
    order: []
  });

  $("#createCompanyForm")
    .unbind("submit")
    .bind("submit", function() {
      var form = $(this);

      $(".form-group")
        .removeClass("has-error")
        .removeClass("has-success");
      $(".text-danger").remove();

      // var companyName = $("#companyName").val();
      // var ownerName = $("#ownerName").val();
      // var gstin = $("#gstin").val();
      // var building_no = $("#building_no").val();
      // var street_name = $("#street_name").val();
      // var landmark = $("#landmark").val();
      // var pincode = $("#pincode").val();
      // var city = $("#city").val();
      // var state = $("#state").val();
      // var country = $("#country").val();
      // var mobile = $("#mobile").val();
      // var bank_name = $("#bank_name").val();
      // var ifsc_code = $("#ifsc_code").val();
      // var account_name = $("#account_name").val();
      // var branch_name = $("#branch_name").val();
      // var account_no = $("#account_no").val();
      // var email = $("#email").val();

      // // form validation
      // if (companyName == "") {
      //   $("#companyName").after(
      //     '<p class="text-danger"> The CompanyName field is required </p>'
      //   );
      //   $("#companyName")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#companyName")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // // form validation
      // if (ownerName == "") {
      //   $("#ownerName").after(
      //     '<p class="text-danger"> The OwnerName field is required </p>'
      //   );
      //   $("#ownerName")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#ownerName")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (building_no == "") {
      //   $("#building_no").after(
      //     '<p class="text-danger"> The Building no field is required </p>'
      //   );
      //   $("#building_no")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#building_no")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (street_name == "") {
      //   $("#street_name").after(
      //     '<p class="text-danger"> The Street Name field is required </p>'
      //   );
      //   $("#street_name")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#street_name")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (landmark == "") {
      //   $("#landmark").after(
      //     '<p class="text-danger"> The Landmark field is required </p>'
      //   );
      //   $("#landmark")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#landmark")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (pincode == "") {
      //   $("#pincode").after(
      //     '<p class="text-danger"> The Pincode field is required </p>'
      //   );
      //   $("#pincode")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#pincode")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (city == "") {
      //   $("#city").after(
      //     '<p class="text-danger"> The City field is required </p>'
      //   );
      //   $("#city")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#city")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (state == "") {
      //   $("#state").after(
      //     '<p class="text-danger"> The State field is required </p>'
      //   );
      //   $("#state")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#state")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (country == "") {
      //   $("#country").after(
      //     '<p class="text-danger"> The Country field is required </p>'
      //   );
      //   $("#country")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#country")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (mobile == "") {
      //   $("#mobile").after(
      //     '<p class="text-danger"> The Mobile field is required </p>'
      //   );
      //   $("#mobile")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#mobile")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (bank_name == "") {
      //   $("#bank_name").after(
      //     '<p class="text-danger"> The bank_name field is required </p>'
      //   );
      //   $("#bank_name")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#bank_name")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (ifsc_code == "") {
      //   $("#ifsc_code").after(
      //     '<p class="text-danger"> The IFSC Code field is required </p>'
      //   );
      //   $("#ifsc_code")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#ifsc_code")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (account_name == "") {
      //   $("#account_name").after(
      //     '<p class="text-danger"> The Account Name field is required </p>'
      //   );
      //   $("#account_name")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#account_name")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (branch_name == "") {
      //   $("#branch_name").after(
      //     '<p class="text-danger"> The Branch Name field is required </p>'
      //   );
      //   $("#branch_name")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#branch_name")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (account_no == "") {
      //   $("#account_no").after(
      //     '<p class="text-danger"> The Account No field is required </p>'
      //   );
      //   $("#account_no")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#account_no")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (email == "") {
      //   $("#email").after(
      //     '<p class="text-danger"> The Email  field is required </p>'
      //   );
      //   $("#email")
      //     .closest(".form-group")
      //     .addClass("has-error");
      // } else {
      //   $("#email")
      //     .closest(".form-group")
      //     .addClass("has-success");
      // }

      // if (
      //   ownerName &&
      //   gstin &&
      //   building_no &&
      //   street_name &&
      //   landmark &&
      //   pincode &&
      //   city &&
      //   state &&
      //   country &&
      //   mobile &&
      //   bank_name &&
      //   ifsc_code &&
      //   account_name &&
      //   branch_name &&
      //   account_no &&
      //   email
      // ) {
        $.ajax({
          url: form.attr("action"),
          type: form.attr("method"),
          data: form.serialize(),
          dataType: "json",
          success: function(response) {
            console.log(response);
            if (response.success == true) {
              // create order button
              $(".success-messages").html(
                '<div class="alert alert-success">' +
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                  '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' +
                  response.messages +
                  "</div>"
              );

              $("html, body, div.panel, div.pane-body").animate(
                { scrollTop: "0px" },
                100
              );

              // disabled te modal footer button
              $(".editButtonFooter").addClass("div-hide");
              // remove the product row
              $(".removeProductRowBtn").addClass("div-hide");
            } else {
              alert(response.messages);
            }
          }
        });
      // }
      return false;
    });
});
