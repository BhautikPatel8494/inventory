"use strict";
(function($) {
  function scroll_to_class(element_class, removed_height) {
    var scroll_to = $(element_class).offset().top - removed_height;
    if ($(window).scrollTop() != scroll_to) {
      $(".form-wizard")
        .stop()
        .animate({ scrollTop: scroll_to }, 0);
    }
  }

  function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data("number-of-steps");
    var now_value = progress_line_object.data("now-value");
    var new_value = 0;
    if (direction == "right") {
      new_value = now_value + 100 / number_of_steps;
    } else if (direction == "left") {
      new_value = now_value - 100 / number_of_steps;
    }
    progress_line_object
      .attr("style", "width: " + new_value + "%;")
      .data("now-value", new_value);
  }

  jQuery(document).ready(function() {
    /*
			Form
		*/
    $(".form-wizard fieldset:first").fadeIn("slow");

    $(".form-wizard .required").on("focus", function() {
      $(this).removeClass("input-error");
    });

    // next step
    $(".form-wizard .btn-next").on("click", function() {
      var parent_fieldset = $(this).parents("fieldset");

      var step = parent_fieldset.attr("id");
      var next_step = true;
      // navigation steps / progress steps
      var current_active_step = $(this)
        .parents(".form-wizard")
        .find(".form-wizard-step.active");
      var progress_line = $(this)
        .parents(".form-wizard")
        .find(".form-wizard-progress-line");

      // fields validation
      if (step == "step1") {
        // console.log(step);
        //Email
        var email = $("#email").val();
        if (email.length == 0) {
          alert("Email Required");
          next_step = false;
          return false;
        }
        var regex = /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;
        if (!regex.test($("#email").val())) {
          alert("Invalid Email");
          next_step = false;
          return false;
        }

        // Password
        var passwd = $('input[name="Password"]').val();
        var copasswd = $('input[name="Confirmpassword"]').val();
        if (passwd.length == 0) {
          alert("Password Required");
          next_step = false;
        } else if (passwd.length < 6) {
          alert("Password Required Minimum 6 characters");
          next_step = false;
        } else {
          if (passwd != copasswd) {
            alert("Password Does not Match....");
            next_step = false;
          }
        }
      } else if (step == "step2") {
        var fname = $("#person_name").val();
        var pancard = $("#pancard").val();
        var building_no = $("#building_no").val();
        var street_name = $("#street_name").val();
        var landmark = $("#landmark").val();
        var city = $("#city").val();
        var pincode = $("#pincode").val();
        var state = $("#state").val();
        var country = $("#country").val();
        var mobile = $("#mobile").val();

        //firm name
        if (fname.length == " ") {
          alert("Firm Name Field cannot be left empty");
          next_step = false;
          return false;
        }
        var regex = /^[a-zA-Z\s-, ]+$/;
        if (!regex.test($("#company_name").val())) {
          alert("Firm Name must be in alphabets only");
          next_step = false;
          return false;
        }

        //pancard
        if (pancard.length == " ") {
          alert("Pancard No Field cannot be left emptysss");
          next_step = false;
          return false;
        }

        if (pancard.length != 10) {
          alert("Pancard No must be 10 Characters");
          next_step = false;
          return false;
        }
        //gstin

        if (building_no.length == " ") {
          alert("Building No Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[-_ a-zA-Z0-9]+$/;
        if (!regex.test($("#building_no").val())) {
          alert("Building Number must be in alphanumeric only");
          next_step = false;
          return false;
        }

        if (street_name.length == " ") {
          alert("Street Name Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[a-zA-Z\s-, ]+$/;
        if (!regex.test($("#street_name").val())) {
          alert("Street Name must be in alphabetics only");
          next_step = false;
          return false;
        }

        if (landmark.length == " ") {
          alert("Landmark Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[a-zA-Z\s-, ]+$/;
        if (!regex.test($("#landmark").val())) {
          alert("Landmark must be in alphabetics only");
          next_step = false;
          return false;
        }

        if (city.length == " ") {
          alert("City Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[a-zA-Z\s-, ]+$/;
        if (!regex.test($("#city").val())) {
          alert("City must be in alphabetics only");
          next_step = false;
          return false;
        }

        if (pincode.length == " ") {
          alert("Pincode Field cannot be left empty");
          next_step = false;
          return false;
        }
        if (pincode.length != 6) {
          alert("Pincode Must Be 6 Characters");
          next_step = false;
          return false;
        }
        var regex = /^[0-9]+$/;
        if (!regex.test($("#pincode").val())) {
          alert("Pincode must be numeric  only");
          next_step = false;
          return false;
        }

        if (state.length == " ") {
          alert("State Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[a-zA-Z\s-, ]+$/;
        if (!regex.test($("#state").val())) {
          alert("State must be in alphabetics only");
          next_step = false;
          return false;
        }

        if (country.length == " ") {
          alert("Country Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[a-zA-Z\s-, ]+$/;
        if (!regex.test($("#country").val())) {
          alert("Country must be in alphabetics only");
          next_step = false;
          return false;
        }

        if (mobile.length == " ") {
          alert("Mobile Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[0-9]+$/;
        if (!regex.test($("#mobile").val())) {
          alert("Mobile must be numeric only");
          next_step = false;
          return false;
        }

        if (mobile.length != 10) {
          alert("Mobile must be 10 digits");
          next_step = false;
          return false;
        }
      } else if (step == "step3") {
        var bank_name = $("#bank_name").val();
        var ifsc_code = $("#ifsc_code").val();
        var account_name = $("#account_name").val();
        var branch_name = $("#branch_name").val();
        var account_no = $("#account_no").val();
        var status = $("#status").val();

        if (bank_name.length == " ") {
          alert("Bank Name Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[a-zA-Z\s-, ]+$/;
        if (!regex.test($("#bank_name").val())) {
          alert("Bank Name must be in alphabetics only");
          next_step = false;
          return false;
        }

        if (ifsc_code.length == " ") {
          alert("Ifsc Code Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[a-zA-Z0-9]+$/;
        if (!regex.test($("#ifsc_code").val())) {
          alert("Ifsc Code must be in alphanumeric only");
          next_step = false;
          return false;
        }

        if (ifsc_code.length != 11) {
          alert("Ifsc Code musy be 11 Characters");
          next_step = false;
          return false;
        }

        if (account_name.length == " ") {
          alert("Account Holder Name Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[a-zA-Z\s-, ]+$/;
        if (!regex.test($("#account_name").val())) {
          alert("Account Holder Name must be in alphabetics only");
          next_step = false;
          return false;
        }

        if (branch_name.length == " ") {
          alert("Branch Name Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[a-zA-Z\s-, ]+$/;
        if (!regex.test($("#branch_name").val())) {
          alert("Branch Name must be in alphabetics only");
          next_step = false;
          return false;
        }

        if (account_no.length == " ") {
          alert("Account Number Field cannot be left empty");
          next_step = false;
          return false;
        }

        var regex = /^[0-9]+$/;
        if (!regex.test($("#account_no").val())) {
          alert("Account Number must be numeric only");
          next_step = false;
          return false;
        }

        // if(status.length == " "){
        // 	alert("Status Field cannot be left empty");
        // 	next_step = false;
        // 	return false;
        // }

        // if(status != 0 || status != 1 ){
        // 	alert("Bank Status Field must be 0 or 1");
        // 	next_step = false;
        // 	return false;
        // }

        // var nBytes = 0,
        // oFiles = $('#certificate').val();
        // nFiles = oFiles.length;

        // if(nFiles.length == " "){
        // 	alert("Certificate Field cannot be left empty");
        // 	next_step = false;
        // 	return false;
        // }
        // if(!nFiles >= 1024){
        // 	alert("Certificate size must be less than 1Mb");
        // 	next_step = false;
        // 	return false;
        // }
      }
      /* parent_fieldset.find('.required').each(function() {
				if( $(this).val() == "" ) {
					$(this).addClass('input-error');
					next_step = false;
				}
				else {
					$(this).removeClass('input-error');
				}
			}); */
      // fields validation

      if (next_step) {
        parent_fieldset.fadeOut(400, function() {
          // change icons
          current_active_step
            .removeClass("active")
            .addClass("activated")
            .next()
            .addClass("active");
          // progress bar
          bar_progress(progress_line, "right");
          // show next step
          $(this)
            .next()
            .fadeIn();
          // scroll window to beginning of the form
          scroll_to_class($(".form-wizard"), 20);
        });
      }
    });

    // previous step
    $(".form-wizard .btn-previous").on("click", function() {
      // navigation steps / progress steps
      var current_active_step = $(this)
        .parents(".form-wizard")
        .find(".form-wizard-step.active");
      var progress_line = $(this)
        .parents(".form-wizard")
        .find(".form-wizard-progress-line");

      $(this)
        .parents("fieldset")
        .fadeOut(400, function() {
          // change icons
          current_active_step
            .removeClass("active")
            .prev()
            .removeClass("activated")
            .addClass("active");
          // progress bar
          bar_progress(progress_line, "left");
          // show previous step
          $(this)
            .prev()
            .fadeIn();
          // scroll window to beginning of the form
          scroll_to_class($(".form-wizard"), 20);
        });
    });

    // submit
    $(".form-wizard").on("submit", function(e) {
      // fields validation
      $(this)
        .find(".required")
        .each(function() {
          if ($(this).val() == "") {
            e.preventDefault();
            $(this).addClass("input-error");
          } else {
            $(this).removeClass("input-error");
          }
        });
      // fields validation
    });
  });

  // image uploader scripts

  var $dropzone = $(".image_picker"),
    $droptarget = $(".drop_target"),
    $dropinput = $("#inputFile"),
    $dropimg = $(".image_preview"),
    $remover = $('[data-action="remove_current_image"]');

  $dropzone.on("dragover", function() {
    $droptarget.addClass("dropping");
    return false;
  });

  $dropzone.on("dragend dragleave", function() {
    $droptarget.removeClass("dropping");
    return false;
  });

  $dropzone.on("drop", function(e) {
    $droptarget.removeClass("dropping");
    $droptarget.addClass("dropped");
    $remover.removeClass("disabled");
    e.preventDefault();

    var file = e.originalEvent.dataTransfer.files[0],
      reader = new FileReader();

    reader.onload = function(event) {
      $dropimg.css("background-image", "url(" + event.target.result + ")");
    };

    console.log(file);
    reader.readAsDataURL(file);

    return false;
  });

  $dropinput.change(function(e) {
    $droptarget.addClass("dropped");
    $remover.removeClass("disabled");
    $(".image_title input").val("");

    var file = $dropinput.get(0).files[0],
      reader = new FileReader();

    reader.onload = function(event) {
      $dropimg.css("background-image", "url(" + event.target.result + ")");
    };

    reader.readAsDataURL(file);
  });

  $remover.on("click", function() {
    $dropimg.css("background-image", "");
    $droptarget.removeClass("dropped");
    $remover.addClass("disabled");
    $(".image_title input").val("");
  });

  $(".image_title input").blur(function() {
    if ($(this).val() != "") {
      $droptarget.removeClass("dropped");
    }
  });

  // image uploader scripts
})(jQuery);
