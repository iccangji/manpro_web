$(document).ready(function () {
    // alert("ok");
    $("#toggleSignup").click(function () {
        $("#signup-form").trigger("reset");
        $("#login-form").trigger("reset");
        $("#login").hide();
        $("#signup").show();
    });
    $("#toggleLogin").click(function () {
        $("#signup-form").trigger("reset");
        $("#login-form").trigger("reset");
        $("#login").show();
        $("#signup").hide();
    });
});
