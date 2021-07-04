// (function ($) {

// })(jQuery);
// $(document).on(function () {
//     alert();
//     // user data add
//     $(document).on("#uase_Add", "submit", function (e) {
//         alert();
//     });
// });

$("#uase_Add").on("submit", function (e) {
    e.preventDefault();
    let name = $(".f_name").val();
    let email = $(".f_email").val();
    let user_type = $(".user_type").val();
    let password = $(".f_password").val();
    let con_passowrd = $(".f_con_password").val();

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content"),
        },
        type: "POST",
        url: "/users/admin-add",
        data: {
            name: name,
            email: email,
            user_type: user_type,
            password: password,
            con_passowrd: con_passowrd,
        },
        success: function (response) {
            $(".f_name").val("");
            $(".f_email").val("");
            $(".user_type").val("");
            $(".f_password").val("");
            $(".f_con_password").val("");
            $.notify(
                {
                    message: "User added successfully ): ",
                },
                {
                    type: "primary",
                    allow_dismiss: false,
                    newest_on_top: false,
                    mouse_over: false,
                    showProgressbar: false,
                    spacing: 10,
                    timer: 2000,
                    placement: {
                        from: "top",
                        align: "right",
                    },
                    offset: {
                        x: 30,
                        y: 30,
                    },
                    delay: 1000,
                    z_index: 10000,
                    animate: {
                        enter: "animated bounce",
                        exit: "animated bounce",
                    },
                }
            );
        },
    });
});

// url: "/admin-add",
