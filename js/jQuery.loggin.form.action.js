$(function () {
    $('#form-login').find("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
            // something to have when submit produces an error ?
            // Not decided if I need it yet
        },
        submitSuccess: function ($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var username = $("input#usuario").val();
            var password = $("input#clave").val();
            $.ajax({
                url: "./php.forms/php.session.loggin.php",
                type: "POST",
                data: {
                    username: username,
                    password: password
                },
                dataType: 'json',
                encode: true
            }).done(function (data) {
                console.log(data);
                if (data.fail === 0) {
                    window.location = data.redirect;
                } else {
                    $('#form-login').trigger("reset");
                    $('#success').html(data.message);
                    //clear all fields
                }
            });
        },
        filter: function () {
                return $(this).is(":visible");
        },
    });
    $("a[data-toggle=\"tab\"]").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});
/*When clicking on Full hide fail/success boxes */
$('#usuario').focus(function () {
    $('#success').html('');
});