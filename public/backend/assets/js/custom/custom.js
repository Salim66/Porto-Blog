(function ($) {
    $(document).ready(function () {
        //datatable
        $("table#datatable").DataTable();

        //CKEditor
        CKEDITOR.replace("content");

        //============== Delete Script ==============
        // delete by switch alert

        $("#delete").on("click", function (e) {
            e.preventDefault();
            let form = $(this).closest("form");
            // let id = $(this).attr("delete_id");

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to delete this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        });

        //============notify js =============
        function notifyFun(success) {
            $.notify(
                {
                    message: success,
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
        }

        //============= User ==============

        //user add script
        $("#uase_Add").on("submit", function (e) {
            e.preventDefault();
            let name = $(".f_name").val();
            let email = $(".f_email").val();
            let user_type = $(".user_type").val();
            let password = $(".f_password").val();
            let con_passowrd = $(".f_con_password").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
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

                    notifyFun(response.success);
                },
            });
        });

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
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
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

                    notifyFun(response.success);
                },
            });
        });

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

                        notifyFun(response.success);
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

                        notifyFun(response.success);
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

                        notifyFun(response.success);
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

                        notifyFun(response.success);
                    },
                });
            }
        });

        // User Trash page update
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

                        notifyFun(response.success);
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

                        notifyFun(response.success);
                    },
                });
            }
        });

        // user profile edit
        $(".edit_profile").click(function (e) {
            e.preventDefault();
            let edit_id = $(this).attr("edit_id");

            $.ajax({
                url: "/profile/edit/" + edit_id,
                type: "GET",
                success: function (data) {
                    console.log(data);
                    $(".id").val(data.id);
                    $(".f_name").val(data.name);
                    $(".f_email").val(data.email);
                    $(".f_cell").val(data.cell);
                    $(".f_address").val(data.address);
                    $(".user_type").val(data.user_type);
                    $(".f_photo_val").attr(
                        "src",
                        "uploads/users/" + data.photo
                    );
                    $(".f_photo_show").attr(
                        "src",
                        "/uploads/users/" + data.photo
                    );

                    $("#edit_user_prifile").modal("show");
                },
            });
        });

        //User image load
        $(document).on("change", "#image_file", function (e) {
            e.preventDefault();
            let image_url = URL.createObjectURL(e.target.files[0]);
            $("#user_photo").attr("src", image_url);
        });

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

        // user profile update
        $("#uase_profile_edit").on("submit", function (e) {
            e.preventDefault();
            let name = $(".f_name").val();
            let email = $(".f_email").val();
            let cell = $(".f_cell").val();
            let address = $(".f_address").val();
            let user_type = $(".user_type").val();
            // console.log(
            //     id +
            //         " " +
            //         name +
            //         " " +
            //         email +
            //         " " +
            //         cell +
            //         " " +
            //         address +
            //         " " +
            //         photo +
            //         " " +
            //         user_type
            // );

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },
                method: "POST",
                url: "/profile/update",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    notifyFun(response.success);
                },
            });
        });

        // User change password
        $("#change_password").on("submit", function (e) {
            e.preventDefault();
            let old_pass = $(".old_password").val();
            let new_pass = $(".new_password").val();
            // console.log(old_pass + " " + new_pass);

            if (
                old_pass == "" ||
                old_pass == null ||
                new_pass == "" ||
                new_pass == null
            ) {
                $.notify(
                    {
                        message: "Please fill all the field!",
                    },
                    {
                        type: "warning",
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
            } else {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    method: "POST",
                    url: "/profile/update-password",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // console.log(response);
                        $(".old_password").val("");
                        $(".new_password").val("");

                        notifyFun(response.success);
                    },
                });
            }
        });

        //================ Category =================

        // Category store
        $("#category_Add").on("submit", function (e) {
            e.preventDefault();
            let name = $(".c_name").val();

            if (name == "" || name == null) {
                $.notify(
                    {
                        message: "Category name is required !",
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
            } else {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    method: "POST",
                    url: "/categories/store",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // console.log(response);
                        $(".c_name").val("");
                        $(".c_parent_id").val("");

                        notifyFun(response.success);
                    },
                });
            }
        });

        // Edit category model show with data
        $(".edit_category").click(function (e) {
            e.preventDefault();
            let edit_id = $(this).attr("edit_id");

            $.ajax({
                url: "/categories/edit/" + edit_id,
                type: "GET",
                success: function (data) {
                    console.log(data);
                    $(".c_name").val(data.name);
                    $(".parent_id").val(data.parent_id);
                    $(".edit_id").val(data.id);

                    $("#edit_category").modal("show");
                },
            });
        });

        // update category
        $("#category_edit").on("submit", function (e) {
            e.preventDefault();
            let name = $(".c_name").val();
            let parent_id = $(".parent_id").val();
            // console.log(name + " " + parent_id);

            if (name == "" || name == null) {
                $.notify(
                    {
                        message: "Category name is reqired!",
                    },
                    {
                        type: "warning",
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
            } else {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    method: "POST",
                    url: "/categories/update",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // console.log(response);
                        $(".c_name").val("");
                        $(".parent_id").val("");

                        notifyFun(response.success);
                    },
                });
            }
        });

        // category Status update
        $(".category_status_update").change(function () {
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
                    url: "/categories/status-update",
                    data: { id: id, status: 1 },
                    success: function (response) {
                        // console.log(response);

                        notifyFun(response.success);
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
                    url: "/categories/status-update",
                    data: { id: id, status: 0 },
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
                    },
                });
            }
        });

        // category Trash update
        $(".category_trash_update").change(function () {
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
                    url: "/categories/trash-update",
                    data: { id: id, trash: 0 }, // reverse is stattus becasse false is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
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
                    url: "/categories/trash-update",
                    data: { id: id, trash: 1 }, // reverse is stattus becasse false is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
                    },
                });
            }
        });

        // category Trash page update
        $(".category_trash_update_1").change(function () {
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
                    url: "/categories/trash-update",
                    data: { id: id, trash: 1 }, // reverse is trash becasse true is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
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
                    url: "/categories/trash-update",
                    data: { id: id, trash: 0 }, // reverse is trash becasse true is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
                    },
                });
            }
        });

        //================ Tag =================

        // Tag store
        $("#tag_add").on("submit", function (e) {
            e.preventDefault();
            let name = $(".t_name").val();

            if (name == "" || name == null) {
                $.notify(
                    {
                        message: "Tag name is required !",
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
            } else {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    method: "POST",
                    url: "/tags/store",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // console.log(response);
                        $(".t_name").val("");

                        notifyFun(response.success);
                    },
                });
            }
        });

        // Edit tag model show with data
        $(".edit_tag").click(function (e) {
            e.preventDefault();
            let edit_id = $(this).attr("edit_id");

            $.ajax({
                url: "/tags/edit/" + edit_id,
                type: "GET",
                success: function (data) {
                    // console.log(data);
                    $(".t_name").val(data.name);
                    $(".edit_id").val(data.id);

                    $("#edit_tag").modal("show");
                },
            });
        });

        // update tag
        $("#tag_edit").on("submit", function (e) {
            e.preventDefault();
            let name = $(".t_name").val();
            // console.log(name + " " + parent_id);

            if (name == "" || name == null) {
                $.notify(
                    {
                        message: "Tag name is reqired!",
                    },
                    {
                        type: "warning",
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
            } else {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    method: "POST",
                    url: "/tags/update",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // console.log(response);
                        $(".t_name").val("");

                        notifyFun(response.success);
                    },
                });
            }
        });

        // tag Status update
        $(".tag_status_update").change(function () {
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
                    url: "/tags/status-update",
                    data: { id: id, status: 1 },
                    success: function (response) {
                        // console.log(response);

                        notifyFun(response.success);
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
                    url: "/tags/status-update",
                    data: { id: id, status: 0 },
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
                    },
                });
            }
        });

        // tag Trash update
        $(".tag_trash_update").change(function () {
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
                    url: "/tags/trash-update",
                    data: { id: id, trash: 0 }, // reverse is stattus becasse false is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
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
                    url: "/tags/trash-update",
                    data: { id: id, trash: 1 }, // reverse is stattus becasse false is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
                    },
                });
            }
        });

        // tag Trash page update
        $(".tag_trash_update_1").change(function () {
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
                    url: "/tags/trash-update",
                    data: { id: id, trash: 1 }, // reverse is trash becasse true is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
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
                    url: "/tags/trash-update",
                    data: { id: id, trash: 0 }, // reverse is trash becasse true is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
                    },
                });
            }
        });

        //================== Post ==================

        function postType(post_type) {
            // select psot type
            if (post_type == "Image") {
                $(".post_image").show();
            } else {
                $(".post_image").hide();
            }

            if (post_type == "Gallery") {
                $(".post_image_g").show();
            } else {
                $(".post_image_g").hide();
            }

            if (post_type == "Video") {
                $(".post_image_v").show();
            } else {
                $(".post_image_v").hide();
            }

            if (post_type == "Audio") {
                $(".post_image_a").show();
            } else {
                $(".post_image_a").hide();
            }
        }

        // Post Type Select
        $("#post_format").on("change", function (e) {
            let post_type = $(this).val();
            postType(post_type);
        });

        // Post image load
        $(document).on("change", "#post_image", function (e) {
            e.preventDefault();
            let image_url = URL.createObjectURL(e.target.files[0]);
            $("#post_image_load").attr("src", image_url);
        });

        // Post image gallery load
        $(document).on("change", "#post_image_g", function (e) {
            e.preventDefault();

            let post_gellary_url = "";
            for (let i = 0; i < e.target.files.length; i++) {
                let image_url = URL.createObjectURL(e.target.files[i]);
                post_gellary_url +=
                    '<img class="shadow" style="width: 150px; margin-right: 10px" src="' +
                    image_url +
                    '" />';
            }

            $(".post_gallery_image").html(post_gellary_url);
        });

        // Post store
        $("#post_add").on("submit", function (e) {
            e.preventDefault();
            let title = $(".p_title").val();

            if (title == "" || title == null) {
                $.notify(
                    {
                        message: "Post title is required !",
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
            } else {
                // data pass by ckeditor
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    method: "POST",
                    url: "/posts/store",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        $(".p_type").val("");
                        $(".p_cat").val("");
                        $(".p_tag").val("");
                        $(".p_title").val("");

                        notifyFun(response.success);
                    },
                });
            }
        });

        // Edit post model show with data
        $(".edit_post").click(function (e) {
            e.preventDefault();
            let edit_id = $(this).attr("edit_id");

            $.ajax({
                url: "/posts/edit/" + edit_id,
                type: "GET",
                success: function (data) {
                    // console.log(data);
                    let photo = JSON.parse(data.featured);
                    // console.log(photo);
                    $(".edit_id").val(data.id);
                    $(".p_title").val(data.title);
                    $("#category_id").html(data.category_list);
                    $("#tag_id").html(data.tag_list);
                    $("#post_format").val(photo.post_type);
                    $("#post_image_load").attr(
                        "src",
                        "/uploads/posts/" + photo.post_image
                    );
                    $("#post_gallery_image").append(
                        "src",
                        "/uploads/posts/" + photo.post_image
                    );
                    let post_gellary_url = "";
                    photo.post_gallery.forEach(function (gallery) {
                        post_gellary_url +=
                            '<img class="shadow" style="width: 150px; margin-right: 10px" src="/uploads/posts/' +
                            gallery +
                            '" />';
                    });
                    $(".post_gallery_image").html(post_gellary_url);

                    CKEDITOR.instances.content.setData(
                        data.content,
                        function () {
                            this.checkDirty();
                        }
                    );

                    $(".post_audio").val(photo.post_audio);
                    $(".post_video").val(photo.post_video);

                    postType(photo.post_type);

                    $("#edit_post").modal("show");
                },
            });
        });

        // update post
        $("#post_edit").on("submit", function (e) {
            e.preventDefault();
            let title = $(".p_title").val();
            // console.log(name + " " + parent_id);

            if (title == "" || title == null) {
                $.notify(
                    {
                        message: "Post title is reqired!",
                    },
                    {
                        type: "warning",
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
            } else {
                // data pass by ckeditor
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                            "content"
                        ),
                    },
                    method: "POST",
                    url: "/posts/update",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);

                        notifyFun(response.success);
                    },
                });
            }
        });

        // single post preview
        $(".preview_post").click(function (e) {
            e.preventDefault();
            let edit_id = $(this).attr("edit_id");

            $.ajax({
                url: "/posts/preview/" + edit_id,
                type: "GET",
                success: function (data) {
                    if (data.post_type != "") {
                        $("#p_type").show();
                        $("#post_details_modal #post_type").html(
                            data.post_type
                        );
                    } else {
                        $("#p_type").hide();
                    }

                    if (data.title != "") {
                        $("#p_t").show();
                        $("#post_details_modal #post_title").html(data.title);
                    } else {
                        $("#p_t").hide();
                    }

                    if (data.slug != "") {
                        $("#p_s").show();
                        $("#post_details_modal #post_slug").html(data.slug);
                    } else {
                        $("#p_s").hide();
                    }

                    if (data.categories != "") {
                        $("#p_c").show();
                        for (const category of data.categories) {
                            $("#post_details_modal #post_category").append(
                                "" +
                                    '<span class="select_category">' +
                                    category["name"] +
                                    "," +
                                    " " +
                                    "</span>"
                            );
                        }
                    } else {
                        $("#p_c").hide();
                    }

                    if (data.tags != "") {
                        $("#p_tag").show();
                        for (const tag of data.tags) {
                            $("#post_details_modal #post_tag").append(
                                "" +
                                    '<span class="select_tag">' +
                                    tag["name"] +
                                    "," +
                                    " " +
                                    "</span>"
                            );
                        }
                    } else {
                        $("#p_tag").hide();
                    }

                    if (data.status != "") {
                        $("#p_sta").show();
                        $("#post_details_modal #post_status").html(data.status);
                    } else {
                        $("#p_sta").hide();
                    }

                    if (data.content != "") {
                        $("#p_con").show();
                        $("#post_details_modal #post_content").html(
                            data.content
                        );
                    } else {
                        $("#p_con").hide();
                    }

                    if (data.post_image != "") {
                        $("#p_i").show();
                        $("#post_details_modal #post_image img").attr(
                            "src",
                            "/uploads/posts/" + data.post_image
                        );
                    } else {
                        $("#p_i").hide();
                    }

                    if (data.post_gallery != "") {
                        $("#p_g").show();
                        for (const gallery of data.post_gallery) {
                            $("#post_details_modal #post_g_image").append(
                                "" +
                                    '<span class="gallery_image"><img width="150" style="margin: 5px;" src="/uploads/posts/' +
                                    gallery +
                                    '" alt=""></span>'
                            );
                        }
                    } else {
                        $("#p_g").hide();
                    }

                    if (data.post_audio != null && data.post_audio != "") {
                        $("#p_a").show();
                        $("#post_details_modal #post_audio").append(
                            "" +
                                '<span class="p_audio"><iframe width="400" height="250" src="' +
                                data.post_audio +
                                '" frameborder="0"></iframe></span>'
                        );
                    } else {
                        $("#p_a").hide();
                    }

                    if (data.post_video != null && data.post_video != "") {
                        $("#p_v").show();
                        $("#post_details_modal #post_video").append(
                            "" +
                                '<span class="p_video"><iframe width="400" height="250" src="' +
                                data.post_video +
                                '" frameborder="0"></iframe></span>'
                        );
                    } else {
                        $("#p_v").hide();
                    }

                    $("#post_details_modal").modal("show");
                },
            });
        });

        // single post gallery image and category and tag problem solve
        $(document).on("click", "#remove_gallary_image", function (event) {
            event.preventDefault();
            $(".gallery_image").remove();
            $(".p_video").remove();
            $(".p_audio").remove();
            $(".select_category").remove();
            $(".select_tag").remove();
        });

        // post Status update
        $(".post_status_update").change(function () {
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
                    url: "/posts/status-update",
                    data: { id: id, status: 1 },
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
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
                    url: "/posts/status-update",
                    data: { id: id, status: 0 },
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
                    },
                });
            }
        });

        // post add Trash update
        $(".post_trash_update").change(function () {
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
                    url: "/posts/trash-update",
                    data: { id: id, trash: 0 }, // reverse is stattus becasse false is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
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
                    url: "/posts/trash-update",
                    data: { id: id, trash: 1 }, // reverse is stattus becasse false is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
                    },
                });
            }
        });

        // post remove Trash page update
        $(".post_trash_update_1").change(function () {
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
                    url: "/posts/trash-update",
                    data: { id: id, trash: 1 }, // reverse is trash becasse true is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
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
                    url: "/posts/trash-update",
                    data: { id: id, trash: 0 }, // reverse is trash becasse true is checked
                    success: function (response) {
                        // console.log(response);
                        notifyFun(response.success);
                    },
                });
            }
        });
    });
})(jQuery);
