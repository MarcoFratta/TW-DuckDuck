

$(function () {
  $("#edit_products > article").each(function () {
    addListener(this);
  });
});


function addListener(val) {
    var request;  

    $(val).find('button[id*="delete"]').click(function () {
      // Prevent default posting of form - put here to work in case of errors
      if (!confirm('Sei sicuro di voler eliminare il prodotto?')) {
        // Save it!
        return;
      } 
    event.preventDefault();
    
    // Abort any pending request
    if (request) {
      request.abort();
    }
    // setup some local variables
    var $form = $(val);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var form = $(val).children("form").get(0);
    var formData = new FormData(form);

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
      url: "ajax/delete.php?type=normal",
      type: "post",
      data: formData,
      cache: false,
      contentType: false,
      processData: false
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR) {
      location.reload()
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
      // Log the error to the console
      console.error("The following error occurred: " + textStatus, errorThrown);
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
      // Reenable the inputs
      $inputs.prop("disabled", false);
    });
    });




    $(val).find('button[id*="save"]').click(function () {
    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
      request.abort();
    }
    // setup some local variables
    var $form = $(val);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var form = $(val).children("form").get(0);
    var formData = new FormData(form);

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
      url: "ajax/update_product.php?type=normal",
      type: "post",
      data: formData,
      cache: false,
      contentType: false,
      processData: false
      
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR) {
      // Log a message to the console
      //console.log(response);
      location.reload()
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
      // Log the error to the console
      console.error("The following error occurred: " + textStatus, errorThrown);
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
      // Reenable the inputs
      $inputs.prop("disabled", false);
    });
  });
}
