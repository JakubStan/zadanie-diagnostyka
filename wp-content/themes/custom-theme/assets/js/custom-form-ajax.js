var AjaxForm = (function ($) {
  var formSelector = "#custom-form";
  var messageSelector = "#form-message";

  function init() {
    $(document).on("submit", formSelector, handleSubmit);
  }

  function handleSubmit(e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("nonce", $("#custom_form_nonce_field").val());

    $.ajax({
      url: $(formSelector).attr("action"),
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: showLoader,
      success: handleSuccess,
      error: handleError,
      complete: hideLoader,
    });
  }

  function showLoader() {
    $(messageSelector).html('<div class="loading">Wysyłanie...</div>');
  }

  function hideLoader() {
    $(".loading").remove();
  }

  function handleSuccess(response) {
    if (response.success) {
      displayMessage(response.message, "success");
      $(formSelector)[0].reset(); // Reset formularza po sukcesie
    } else if (response.errors) {
      displayErrors(response.errors);
    } else {
      displayMessage("Nieoczekiwany błąd.", "error");
    }
  }

  function handleError(xhr) {
    if (xhr.responseJSON && xhr.responseJSON.errors) {
      displayErrors(xhr.responseJSON.errors);
    } else {
      displayMessage(
        "Wystąpił problem podczas wysyłania formularza. Spróbuj ponownie.",
        "error"
      );
    }
  }

  function displayMessage(message, type) {
    var messageClass = type === "success" ? "success" : "error";
    $(messageSelector)
      .html('<div class="' + messageClass + '">' + message + "</div>")
      .removeClass("success error")
      .addClass(messageClass);
  }

  function displayErrors(errors) {
    var errorHtml = errors
      .map(function (error) {
        return '<div class="error-item">' + error + "</div>";
      })
      .join("");
    $(messageSelector).html(errorHtml).removeClass("success").addClass("error");
  }

  return {
    init: init,
  };
})(jQuery);

jQuery(document).ready(function () {
  AjaxForm.init();
});
