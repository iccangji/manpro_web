$(document).ready(function () {
    // Initialize the plugin
    // $("#JPO").popup();
    $(".JPO_open").click(function () {
        $("#wrapper").css("visibility", "visible");
        $(".popup").css("visibility", "visible");
        let date = $(this).val();
        const dateArr = date.split(" ");
        $("#inputtanggal").val(dateArr[0]);
        $("#inputjam").val(dateArr[1]);
    });
    $(".JPO_close").click(function () {
        $("#wrapper").css("visibility", "hidden");
        $(".popup").css("visibility", "hidden");
    });

    // Set default `pagecontainer` for all popups (optional, but recommended for screen readers and iOS*)
    $.fn.popup.defaults.pagecontainer = "#page";
});
