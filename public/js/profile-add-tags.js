/**
 * Created by afsoon on 3/11/2017.
 */


  // select2

$(document).ready(function() {
    $(".js-example-basic-single").select2({
        tags: true,
        dir: "rtl",
        maximumSelectionLength: 4
    });

    $(".js-example-basic-multiple").select2();
});


