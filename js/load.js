var myVar;
$(window).on("load", function() {
    if ($("#preloader").length) {
        $("#preloader")
            .delay(800)
            .fadeOut("fast", function() {
                $(this).remove();
            });
    }
});