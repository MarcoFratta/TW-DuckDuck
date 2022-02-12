$(document).ready(function() {
    window.addEventListener('unload', function(event) {
        $("input:radio[name=filter]:checked")[0].checked = false;
    }, false);

    $('form input:radio').change(function() {
        $('#filtersContainer').submit();
    });
});

function toggleFilters() {
    if ($('#filtersContainer').css('display') == 'none') {
        $('#filtersContainer').css('display','flex');
    } else {
          $('#filtersContainer').css('display','none');
    }
}

function applyFilter(cat) {
    /* category.php?category=cat */

}

