$(document).ready(function () {

  $('.multiple-select').select2({
    multiple: true,
  });
  $('.single-select').select2();

})

function goBack() {
  window.history.back(); // Navigates to the previous page in history
}

function submitForm(form) {
  for (var instance in CKEDITOR.instances) {
    CKEDITOR.instances[instance].updateElement();
  }
  let formData = new FormData(form);
  let url = $(form).attr("action");

  $.ajax({
    type: "POST",
    url: url,
    data: formData,
    processData: false,
    contentType: false,
    beforeSend: function () {
      $("#submitBtn").prop("disabled", true);
      $('body').waitMe({
        effect: 'roundBounce',
        text: '',
        bg: 'rgba(255, 255, 255, 0.7)',
        color: 'rgb(12, 10, 10)',
      });
    },
    success: function (response) {
      if (response.success) {
        $('body').waitMe("hide");
        toastr.success(response.message);

        setTimeout(() => {
          window.location.href = response.url;
        }, 1500);
      }
    },
    error: function (xhr) {
      $("#submitBtn").prop("disabled", false);
      $('body').waitMe("hide");
      if (xhr.status === 422) {
        let errors = xhr.responseJSON.errors;
        Object.keys(errors).forEach((key) => {
          $("#" + key + "_error").text(errors[key][0]);
        });
        toastr.error("Please correct the errors and try again.");
      } else {
        toastr.error("Something went wrong! Try again.");
      }
    }
  });
}

function updateForm(form) {
  for (var instance in CKEDITOR.instances) {
    CKEDITOR.instances[instance].updateElement();
  }
  let formData = new FormData(form);
  let url = $(form).attr("action");
  // if (typeof CKEDITOR !== "undefined" && CKEDITOR.instances.description) {
  //   formData.set("description", CKEDITOR.instances.description.getData());
  // }
  $(".error-text").text("");
  $.ajax({
    type: "POST",
    url: url,
    data: formData,
    processData: false,
    contentType: false,
    beforeSend: function () {
      $("#updateBtn").prop("disabled", true);
      $('body').waitMe({
        effect: 'roundBounce',
        text: '',
        bg: 'rgba(255, 255, 255, 0.7)',
        color: 'rgb(12, 10, 10)',
      });
    },
    success: function (response) {
      if (response.success) {
        $('body').waitMe("hide");
        toastr.success(response.message); // Success message
        setTimeout(() => {
          window.location.href = response.url; // Redirect after success
        }, 1500);
      }
    },
    error: function (xhr) {
      $("#updateBtn").prop("disabled", false); // Re-enable button
      $('body').waitMe("hide");
      if (xhr.status === 422) {
        let errors = xhr.responseJSON.errors;
        Object.keys(errors).forEach((key) => {
          $("#" + key + "_error").text(errors[key][0]); // Show validation errors
        });
        toastr.error("Please correct the errors and try again.");
      } else {
        toastr.error("Something went wrong! Try again.");
      }
    }
  })
}


