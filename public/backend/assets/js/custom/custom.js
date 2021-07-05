(function ($) {
    $(document).ready(function () {
        //datatable
        $("table#datatable").DataTable();

        // User Status update
        $(".user_status_update").change(function () {
            // e.preventDefault();
            let id = $(this).attr("data_id");

            //Input checkbox checked or uncheck under jquery prop() function
            if ($(this).prop("checked") == true) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    type: "POST",
                    url: "/users/admin-status-update",
                    data: { id: id, status: 1 },
                    success: function (data) {
                        console.log(data);
                        $.notify(
                            {
                                message: data.msg,
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
                    error: function (data) {
                        $.notify(
                            {
                                message: data.msg,
                            },
                            {
                                type: "danger",
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
            } else {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    type: "POST",
                    url: "/users/admin-status-update",
                    data: { id: id, status: 0 },
                    success: function (data) {
                        console.log(data);
                        $.notify(
                            {
                                message: data.msg,
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
                    error: function (data) {
                        $.notify(
                            {
                                message: data.msg,
                            },
                            {
                                type: "danger",
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
            }
        });

        // User trash list show
        $(document).on("click", ".user_trash_list", function (e) {
            // e.preventDefault();

            $.ajax({
                url: "/users/trash-list",
                type: "GET",
                success: function (data) {
                    console.log(data);
                },
            });
        });

        // User Trash update
        $(".user_trash_update").change(function () {
            // e.preventDefault();
            let id = $(this).attr("data_id");

            //Input checkbox checked or uncheck under jquery prop() function
            if ($(this).prop("checked") == true) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    type: "POST",
                    url: "/users/admin-trash-update",
                    data: { id: id, trash: 0 }, // reverse is stattus becasse false is checked
                    success: function (data) {
                        console.log(data);
                        $.notify(
                            {
                                message: data.msg,
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
                    error: function (data) {
                        $.notify(
                            {
                                message: data.msg,
                            },
                            {
                                type: "danger",
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
            } else {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    type: "POST",
                    url: "/users/admin-trash-update",
                    data: { id: id, trash: 1 }, // reverse is stattus becasse false is checked
                    success: function (data) {
                        console.log(data);
                        $.notify(
                            {
                                message: data.msg,
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
                    error: function (data) {
                        $.notify(
                            {
                                message: data.msg,
                            },
                            {
                                type: "danger",
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
            }
        });

        // User Trash 1 update
        $(".user_trash_update_1").change(function () {
            // e.preventDefault();
            let id = $(this).attr("data_id");

            //Input checkbox checked or uncheck under jquery prop() function
            if ($(this).prop("checked") == true) {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    type: "POST",
                    url: "/users/admin-trash-update",
                    data: { id: id, trash: 1 }, // reverse is trash becasse true is checked
                    success: function (data) {
                        console.log(data);
                        $.notify(
                            {
                                message: data.msg,
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
                    error: function (data) {
                        $.notify(
                            {
                                message: data.msg,
                            },
                            {
                                type: "danger",
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
            } else {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    type: "POST",
                    url: "/users/admin-trash-update",
                    data: { id: id, trash: 0 }, // reverse is trash becasse true is checked
                    success: function (data) {
                        console.log(data);
                        $.notify(
                            {
                                message: data.msg,
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
                    error: function (data) {
                        $.notify(
                            {
                                message: data.msg,
                            },
                            {
                                type: "danger",
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
            }
        });
    });
})(jQuery);

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

// user edit data show modal admin purpose
$(".edit_user").click(function (e) {
    e.preventDefault();
    let edit_id = $(this).attr("edit_id");

    $.ajax({
        url: "/users/admin-edit-data/" + edit_id,
        type: "GET",
        success: function (data) {
            $(".f_name").val(data.name);
            $(".f_email").val(data.email);
            $(".user_type").val(data.user_type);
            $(".id").val(data.id);

            $("#edit_users").modal("show");
        },
    });
});

// user edit data store admin purpose
$("#uase_edit").on("submit", function (e) {
    e.preventDefault();
    let name = $(".f_name").val();
    let email = $(".f_email").val();
    let user_type = $(".user_type").val();
    let id = $(".id").val();
    // console.log(id + " " + name + " " + email + " " + user_type);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content"),
        },
        type: "POST",
        url: "/users/admin-edit-store",
        data: {
            name: name,
            email: email,
            user_type: user_type,
            id: id,
        },
        success: function (response) {
            // console.log(response);
            $(".f_name").val("");
            $(".f_email").val("");
            $(".user_type").val("");
            $.notify(
                {
                    message: response.success,
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
        error: function (response) {
            $.notify(
                {
                    message: response.error,
                },
                {
                    type: "danger",
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
