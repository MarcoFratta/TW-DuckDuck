$(document).ready(function() {
    window.addEventListener('unload', function(event) {
        document.getElementById("addresses").reset();
    }, false);
    //change colour when radio is selected
    $('form input:radio').change(function() {
      // Only remove the class in the specific `box` that contains the radio
      $('div.highlight').removeClass('highlight');
      $(this).closest('.address').addClass('highlight');
    });
});

function check() {
    var form = document.getElementById("addresses");
    if(document.querySelector('input[type="radio"]:checked') == null) {
        window.alert("Scegliere un indirizzo.");
    } else {
        form.submit();
    }
}