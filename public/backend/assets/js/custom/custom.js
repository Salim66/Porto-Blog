(function ($) {
    $(document).ready(function () {
        //datatable
        $("table#datatable").DataTable();

        //CKEditor
        CKEDITOR.replace("content");

        //============== Delete Script ==============//

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
        });// delete by switch alert

        // user delete by ajax
        $(document).on("click", '#delete_ajax', function (e) {
            e.preventDefault();
            // let form = $(this).closest("form");
            let id = $(this).attr("delete_id");
            // alert(id);

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
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                                "content"
                            ),
                        },
                        method: 'POST',
                        url: '/users/delete',
                        data: {id: id},
                        success: function(response){
                            // console.log(response);

                            showUserTrash();
                            categoryTrashTable();
                            notifyFun(response.success);
                        }

                    });
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        });

        // category delete by ajax
        $(document).on("click", '#category_delete_ajax', function (e) {
            e.preventDefault();
            // let form = $(this).closest("form");
            let id = $(this).attr("delete_id");
            // alert(id);

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
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                                "content"
                            ),
                        },
                        method: 'POST',
                        url: '/categories/delete',
                        data: {id: id},
                        success: function(response){
                            // console.log(response);

                            categoryTrashTable();
                            notifyFun(response.success);
                        }

                    });
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        });

        // tag delete by ajax
        $(document).on("click", '#tag_delete_ajax', function (e) {
            e.preventDefault();
            // let form = $(this).closest("form");
            let id = $(this).attr("delete_id");
            // alert(id);

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
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                                "content"
                            ),
                        },
                        method: 'POST',
                        url: '/tags/delete',
                        data: {id: id},
                        success: function(response){
                            // console.log(response);

                            TagTrashTable();
                            notifyFun(response.success);
                        }

                    });
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        });

        // tag delete by ajax
        $(document).on("click", '#post_delete_ajax', function (e) {
            e.preventDefault();
            // let form = $(this).closest("form");
            let id = $(this).attr("delete_id");
            // alert(id);

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
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                                "content"
                            ),
                        },
                        method: 'POST',
                        url: '/posts/delete',
                        data: {id: id},
                        success: function(response){
                            // console.log(response);

                            TagTrashTable();
                            notifyFun(response.success);
                        }

                    });
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        });


        //============notify js =============//
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

        //============= User ==============//

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

        //user table show
        function showUser() {
            $.ajax({
                url: "/users/show-all-users",
                method: "GET",
                success: function (response) {
                    $("#user_table").empty();
                    // console.log(response);
                    // sidebar total trash show
                    $('#total_user_trash_count').html('('+response.count+')');

                    for (data of response.all_data) {
                        let element =
                            "<tr>\n" +
                            "    <td>\n" +
                            '        <img style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #9900ff" src="/uploads/users/' +
                            data.photo +
                            '" alt="User Image" onerror="this.src=\'uploads/users/avatar3.png\'">\n' +
                            "    </td>\n" +
                            '    <td>"' +
                            data.name +
                            '"</td>\n' +
                            '    <td>"' +
                            data.user_type +
                            '"</td>\n' +
                            "    <td>\n" +
                            "\n" +
                            '        <div class="media-body text-center switch-sm">\n' +
                            '            <label class="switch">\n' +
                            '                <input type="checkbox" class="user_status_update" data_id="' +
                            data.id +
                            '"';
                        if (data.status == 1) {
                            element += "checked";
                        }
                        element +=
                            ' ><span class="switch-state"></span>\n' +
                            "            </label>\n" +
                            "        </div>\n" +
                            "\n" +
                            "    </td>\n" +
                            "    <td>\n" +
                            '        <div class="media-body text-center switch-sm">\n' +
                            '            <label class="switch">\n' +
                            '                <input type="checkbox" class="user_trash_update" data_id="' +
                            data.id +
                            '"';
                        if (data.trash == false) {
                            element += "checked";
                        }
                        element +=
                            '><span class="switch-state"></span>\n' +
                            "            </label>\n" +
                            "        </div>\n" +
                            "    </td>\n" +
                            "    <td>\n" +
                            '        <a title="Edit User" edit_id="' +
                            data.id +
                            '" class="btn btn-info-gradien btn-pill edit_user"><i class="fas fa-user-edit text-white"></i></a>\n' +
                            "\n" +
                            "    </td>\n" +
                            "</tr>";
                        $("#user_table").append(element);
                    }
                },
            });
        }
        showUser();

        // user edit data show modal admin purpose
        $(document).on("click", ".edit_user", function (e) {
            e.preventDefault();
            let edit_id = $(this).attr("edit_id");
            // alert(edit_id);

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

        // user edit data store update admin purpose
        $(document).on("submit", "#uase_edit", function (e) {
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
                    showUser();

                    $(".f_name").val("");
                    $(".f_email").val("");
                    $(".user_type").val("");

                    notifyFun(response.success);
                    $("#edit_users").modal("hide");
                },
            });
        });

        // User Status update
        $(document).on("change", ".user_status_update", function () {
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

                        notifyFun(data.success);
                        showUser();
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

                        notifyFun(data.success);
                        showUser();
                    },
                });
            }
        });

        // User trash list show
        function showUserTrash(){
            $.ajax({
                url: "/users/trash-list/by-ajax",
                type: "GET",
                success: function (response) {
                    $("#user_trash_list").empty();
                    // console.log(response);
                    // sidebar total trash show
                    $('#total_user_trash_count').html('('+response.length+')');

                    for (data of response) {
                        let element =
                            "<tr>\n" +
                            "    <td>\n" +
                            '        <img style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #9900ff" src="/uploads/users/' +
                            data.photo +
                            '" alt="User Image" onerror="this.src=\'/uploads/users/avatar3.png\'">\n' +
                            "    </td>\n" +
                            '    <td>"' +
                            data.name +
                            '"</td>\n' +
                            '    <td>"' +
                            data.user_type +
                            '"</td>\n' +
                            "    <td>\n" +
                            "\n" +
                            '        <div class="media-body text-center switch-sm">\n' +
                            '            <label class="switch">\n' +
                            '                <input type="checkbox" class="user_status_update" data_id="' +
                            data.id +
                            '"';
                        if (data.status == 1) {
                            element += "checked";
                        }
                        element +=
                            ' ><span class="switch-state"></span>\n' +
                            "            </label>\n" +
                            "        </div>\n" +
                            "\n" +
                            "    </td>\n" +
                            "    <td>\n" +
                            '        <div class="media-body text-center switch-sm">\n' +
                            '            <label class="switch">\n' +
                            '                <input type="checkbox" class="user_trash_update_1" data_id="' +
                            data.id +
                            '"';
                        if (data.trash == true) {
                            element += "checked";
                        }
                        element +=
                            '><span class="switch-state"></span>\n' +
                            "            </label>\n" +
                            "        </div>\n" +
                            "    </td>\n" +
                            "    <td>\n" +
                            '     <form style="display: inline;" action="" method="POST">\n' +
                            '      <button title="User Delete" delete_id="' +
                            data.id +
                            '" type="submit" id="delete_ajax" class="btn btn-danger-gradien btn-pill"><i class="fas fa-trash text-white"></i></button>\n' +
                            "     </form>\n" +
                            "\n" +
                            "    </td>\n" +
                            "</tr>";
                        $("#user_trash_list").append(element);
                    }
                },
            });
        }
        showUserTrash();

        // User Trash update
        $(document).on("change", ".user_trash_update", function () {
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
                        // console.log(data);

                        showUser();
                        notifyFun(data.success);
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
                        // console.log(data);

                        showUser();
                        notifyFun(data.success);
                    },
                });
            }
        });

        // User Trash page update
        $(document).on("change", ".user_trash_update_1", function () {
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
                        // console.log(data.success);
                        showUserTrash();
                        notifyFun(data.success);
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
                        // console.log(data.success);
                        showUserTrash();
                        notifyFun(data.success);
                    },
                });
            }
        });

        // user profile
        function userProfile(){
            $.ajax({
                url: "/profile/view/data",
                type: "GET",
                success: function(response){
                    // console.log(response);
                    //duplicate entity remove
                    $('#user_profile_load_by_ajax').empty();
                    let date = new Date(response.created_at);

                    let element = '           <div class="card hovercard text-center">\n' +
                        '              <div class="cardheader"></div>\n' +
                        '              <div class="user-image">\n' +
                        '                <div class="avatar"><img style="width: 120px; height: 120px; border-radius: 50%; border: 2px solid #9900ff;" class="shadow" src="/uploads/users/' +
                        response.photo +
                        '" alt="User Image" onerror="this.src=\'/uploads/users/avatar3.png\'"></div>\n' +
                        '                <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>\n' +
                        '              </div>\n' +
                        '              <div class="info">\n' +
                        '                <div class="row">\n' +
                        '                  <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">\n' +
                        '                    <div class="row">\n' +
                        '                      <div class="col-md-6">\n' +
                        '                        <div class="ttl-info text-left ml-5">\n' +
                        '                          <h6><i class="fa fa-envelope"></i>   Email</h6><span>'+response.email+'</span>\n' +
                        '                        </div>\n' +
                        '                      </div>\n' +
                        '                      <div class="col-md-6">\n' +
                        '                        <div class="ttl-info text-left ml-4">\n' +
                        '                          <h6><i class="fa fa-calendar"></i>   Created</h6><span>'+date.toDateString()+'</span>\n' +
                        '                        </div>\n' +
                        '                      </div>\n' +
                        '                    </div>\n' +
                        '                  </div>\n' +
                        '                  <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">\n' +
                        '                    <div class="user-designation">\n' +
                        '                      <div class="title"><a target="_blank" href="#">'+response.name+'</a></div>\n' +
                        '                      <div class="desc mt-2">'+response.user_type+'</div>\n' +
                        '                    </div>\n' +
                        '                  </div>\n' +
                        '                  <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">\n' +
                        '                    <div class="row">\n' +
                        '                      <div class="col-md-6">\n' +
                        '                        <div class="ttl-info text-left">\n' +
                        '                          <h6><i class="fa fa-phone"></i>   Contact Us</h6><span>Bangladesh +88'+response.cell+'</span>\n' +
                        '                        </div>\n' +
                        '                      </div>\n' +
                        '                      <div class="col-md-6">\n' +
                        '                        <div class="ttl-info text-left">\n' +
                        '                          <h6><i class="fa fa-location-arrow"></i>   Location</h6><span>'+response.address+'</span>\n' +
                        '                        </div>\n' +
                        '                      </div>\n' +
                        '                    </div>\n' +
                        '                  </div>\n' +
                        '                </div>\n' +
                        '                <div>\n' +
                        '                    <a title="Edit Profile" edit_id="'+response.id+'" class="btn btn-info-gradien btn-pill edit_profile"><i class="fas fa-user-edit text-white"></i></a>\n' +
                        '                </div>\n' +
                        '                <hr>\n' +
                        '                <div class="social-media">\n' +
                        '                  <ul class="list-inline">\n' +
                        '                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>\n' +
                        '                    <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>\n' +
                        '                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>\n' +
                        '                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>\n' +
                        '                    <li class="list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>\n' +
                        '                  </ul>\n' +
                        '                </div>\n' +
                        '                <div class="follow">\n' +
                        '                  <div class="row">\n' +
                        '                    <div class="col-6 text-md-right border-right">\n' +
                        '                      <div class="follow-num counter">25869</div><span>Follower</span>\n' +
                        '                    </div>\n' +
                        '                    <div class="col-6 text-md-left">\n' +
                        '                      <div class="follow-num counter">659887</div><span>Following</span>\n' +
                        '                    </div>\n' +
                        '                  </div>\n' +
                        '                </div>\n' +
                        '              </div>\n' +
                        '            </div>';
                    $('#user_profile_load_by_ajax').append(element);
                }
            });
        }
        userProfile();

        //User image load
        $(document).on("change", "#image_file", function (e) {
            e.preventDefault();
            let image_url = URL.createObjectURL(e.target.files[0]);
            $("#user_photo").attr("src", image_url);
        });

        // // user edit data show modal admin purpose
        // $(".edit_user").click(function (e) {
        //     e.preventDefault();
        //     let edit_id = $(this).attr("edit_id");
        //
        //     $.ajax({
        //         url: "/users/admin-edit-data/" + edit_id,
        //         type: "GET",
        //         success: function (data) {
        //             $(".f_name").val(data.name);
        //             $(".f_email").val(data.email);
        //             $(".user_type").val(data.user_type);
        //             $(".id").val(data.id);
        //
        //             $("#edit_users").modal("show");
        //         },
        //     });
        // });

        // user profile edit
        $(document).on('click', ".edit_profile", function (e) {
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

        // user profile update
        $("#user_profile_edit").on("submit", function (e) {
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
                    userProfile();
                    notifyFun(response.success);
                    $("#edit_user_prifile").modal("hide");
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

        //================ Category =================//

        // Category table show by ajax
        function categoryTable(){
            $.ajax({
                url: "/categories/view/data",
                method: "GET",
                success: function (response) {
                    $("#category_table").empty();
                    // console.log(response);
                    // sidebar total trash show
                    $('#total_category_trash_count').html('('+response.count+')');

                    for (data of response.all_data) {
                        let element = '<tr>\n' +
                            '                                        <td>'+data.parent_id+'</td>\n' +
                            '                                        <td>'+data.name+'</td>\n' +
                            '                                        <td>\n' +
                            '\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="category_status_update" data_id="'+data.id+'"'; if(data.status == true) { element +='checked'; }  element += '><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="category_trash_update" data_id="'+data.id+'"'; if(data.trash == false) { element += 'checked'; } element +='><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <a title="Edit Category" edit_id="'+data.id+'" class="btn btn-info-gradien btn-pill edit_category"><i class="fas fa-edit text-white"></i></a>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                    </tr>';
                        $("#category_table").append(element);
                    }
                },
            });
        }
        categoryTable();

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
        $(document).on('click', ".edit_category", function (e) {
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

                        categoryTable();
                        notifyFun(response.success);
                        $("#edit_category").modal("hide");
                    },
                });
            }
        });

        // category Status update
        $(document).on('change', ".category_status_update", function () {
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
                        categoryTable();
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
                        categoryTable();
                        notifyFun(response.success);
                    },
                });
            }
        });

        // category Trash update
        $(document).on('change', ".category_trash_update", function () {
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

                        categoryTable();
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

                        categoryTable();
                        notifyFun(response.success);
                    },
                });
            }
        });

        // Category Trash Show
        function categoryTrashTable(){
            $.ajax({
                url: "/categories/trash/by-ajax",
                method: "GET",
                success: function (response) {
                    $('#category_trash_list_table').empty();
                    // console.log(response);
                    // sidebar total trash show
                    $('#total_category_trash_count').html('('+response.length+')');

                    for(data of response) {
                        let element = '<tr>\n' +
                            '                                        <td>' + data.parent_id + '</td>\n' +
                            '                                        <td>' + data.name + '</td>\n' +
                            '                                        <td>\n' +
                            '\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="category_status_update" data_id="' + data.id + '"'; if(data.status == true) { element +='checked'; } element += ' ><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="category_trash_update_1" data_id="'+data.id+'"'; if(data.trash == true) { element +='checked'; } element += ' ><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '\n' +
                            '                                            <form style="display: inline;" action="" method="POST">\n' +
                            '                                                <button delete_id="'+data.id+'" type="submit" id="category_delete_ajax" class="btn btn-danger-gradien btn-pill"><i class="fas fa-trash text-white"></i></button>\n' +
                            '                                            </form>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                    </tr>';
                        $('#category_trash_list_table').append(element);
                    }
                }
            });
        }
        categoryTrashTable();

        // category Trash page update
        $(document).on('change', ".category_trash_update_1", function () {
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

                        categoryTrashTable();
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

                        categoryTrashTable();
                        notifyFun(response.success);
                    },
                });
            }
        });

        //================ Tag =================//

        // show all Tag Table
        function TagTable(){
            $.ajax({
                url: "/tags/view/data",
                method: "GET",
                success: function (response) {
                    $("#tag_table").empty();
                    console.log(response);
                    // sidebar total trash show
                    $('#total_tag_trash_count').html('('+response.count+')');

                    for (data of response.all_data) {
                        let element = '<tr>\n' +
                            '                                        <td>'+data.name+'</td>\n' +
                            '                                        <td>\n' +
                            '\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="tag_status_update" data_id="'+data.id+'"';  if(data.status == true) {  element +='checked'; } element +='><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="tag_trash_update" data_id="'+data.id+'"';  if(data.trash == false) { element +='checked'; } element +='><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <a title="Edit Tag" edit_id="'+data.id+'" class="btn btn-info-gradien btn-pill edit_tag"><i class="fas fa-edit text-white"></i></a>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                    </tr>';
                        $("#tag_table").append(element);
                    }
                },
            });
        }
        TagTable();

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
        $(document).on('click', ".edit_tag", function (e) {
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
                        TagTable();
                        $("#edit_tag").modal("hide");
                    },
                });
            }
        });

        // tag Status update
        $(document).on('change', ".tag_status_update", function () {
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

                        TagTable();
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

                        TagTable();
                        notifyFun(response.success);
                    },
                });
            }
        });

        // tag Trash update
        $(document).on('change', ".tag_trash_update",function () {
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

                        TagTable();
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

                        TagTable();
                        notifyFun(response.success);
                    },
                });
            }
        });

        // Tag Trash show
        function TagTrashTable(){
            $.ajax({
                url: "/tags/trash/by-ajax",
                method: "GET",
                success: function (response) {
                    $("#tag_trash_table").empty();
                    // console.log(response);
                    // sidebar total trash show
                    $('#total_tag_trash_count').html('('+response.length+')');

                    for (data of response) {
                        let element = '<tr>\n' +
                            '                                        <td>'+data.name+'</td>\n' +
                            '                                        <td>\n' +
                            '\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="tag_status_update" data_id="'+data.id+'"';  if(data.status == true) { element +='checked'; } element +='><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="tag_trash_update_1" data_id="'+data.id+'"';  if(data.trash == true) { element +='checked'; } element +='><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <form style="display: inline;" action="" method="POST">\n' +
                            '                                                <button delete_id="'+data.id+'" type="submit" id="tag_delete_ajax" class="btn btn-danger-gradien btn-pill"><i class="fas fa-trash text-white"></i></button>\n' +
                            '                                            </form>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                    </tr>';
                        $("#tag_trash_table").append(element);
                    }
                },
            });
        }
        TagTrashTable();

        // tag Trash page update
        $(document).on('change', ".tag_trash_update_1", function () {
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
                        //

                        TagTrashTable();
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

                        TagTrashTable();
                        notifyFun(response.success);
                    },
                });
            }
        });

        //================== Post ==================//

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

        // show all Post Table
        function postTable(){
            $.ajax({
                url: "/posts/view/data",
                method: "GET",
                success: function (response) {
                    $("#post_table").empty();
                    console.log(response);
                    // sidebar total trash show
                    $('#total_post_trash_count').html('('+response.count+')');

                    for (data of response.all_data) {
                        let featured_info = JSON.parse(data.featured);
                        // console.log(featured_info);
                        let element = '<tr>\n' +
                            '                                        <td>\n' +
                            '                                            '; if(featured_info.post_image != null) { element += '\n' +
                            '                                            <img width="50"\n' +
                            '                                                src="/uploads/posts/'+featured_info.post_image+'"\n' +
                            '                                                alt="">\n' +
                            '                                            ';} if(featured_info.post_gallery != null) { element += '\n' +
                            '                                            <img width="50"\n' +
                            '                                                src="/uploads/posts/'+featured_info.post_gallery[0]+'"\n' +
                            '                                                alt="">\n' +
                            '                                            '; }  if(featured_info.post_video != null) { element += '\n' +
                            '                                            <iframe width="50" height="50" src="'+featured_info.post_video+'"\n' +
                            '                                                frameborder="0"></iframe>\n' +
                            '                                            '; } if(featured_info.post_audio != null) { element += '\n' +
                            '                                            <iframe width="50" height="50" src="'+featured_info.post_audio+'"\n' +
                            '                                                frameborder="0"></iframe>\n' +
                            '                                            '; } element += '\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            ';
                                                                    for (category of data.categories) { element += '\n' +
                                                                           category.name
                                                                     }
                                                                    element += '\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            ';
                                                                    for (tag of data.tags) { element += '\n' +
                                                                           tag.name
                                                                      }
                                                                    element += '\n' +
                            '                                        </td>\n' +
                            '                                        <td>'+data.title.substring(0, 15) + "..."+'</td>\n' +
                            '                                        <td>'+featured_info.post_type+'</td>\n' +
                            '                                        <td>'+data.views+'</td>\n' +
                            '                                        <td>'+data.user.name+'</td>\n' +
                            '                                        <td>\n' +
                            '\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="post_status_update" data_id="'+data.id+'"';  if(data.status == true) { element +='checked'; } element += '><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="post_trash_update" data_id="'+data.id+'"';  if(data.trash == false) { element +='checked'; } element += '><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <a title="Preview" edit_id="'+data.id+'" class="btn btn-warning btn-sm preview_post d-inline"><i class="fas fa-eye text-white"></i></a>\n' +
                            '                                            <a title="Edit Post" edit_id="'+data.id+'" class="btn btn-info btn-sm edit_post d-inline"><i class="fas fa-edit text-white"></i></a>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                    </tr>';
                        $("#post_table").append(element);
                    }
                },
            });
        }
        postTable();

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
                        $("#post_add")[0].reset();
                        $(".js-example-placeholder-multiple")
                            .val(null)
                            .trigger("change");
                        for (instance in CKEDITOR.instances) {
                            CKEDITOR.instances[instance].updateElement();
                            CKEDITOR.instances[instance].setData("");
                        }
                        $("#post_image").val(null);
                        $("#post_image_g").val(null);
                        // console.log(response);
                        // $(".p_cat").val("");
                        // $(".p_tag").val("");
                        // $(".p_title").val("");

                        notifyFun(response.success);
                    },
                });
            }
        });

        // Edit post model show with data
        $(document).on('click', ".edit_post", function (e) {
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
                        message: "Post title is required!",
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

                        postTable();
                        notifyFun(response.success);
                        $("#edit_post").modal("hide");
                    },
                });
            }
        });

        // single post preview
        $(document).on('click', ".preview_post", function (e) {
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
        $(document).on('change', ".post_status_update", function () {
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

                        postTable();
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

                        postTable();
                        notifyFun(response.success);
                    },
                });
            }
        });

        // post add Trash update
        $(document).on('change', ".post_trash_update",function () {
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

                        postTable();
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

                        postTable();
                        notifyFun(response.success);
                    },
                });
            }
        });

        // show all Post Table
        function postTrashTable(){
            $.ajax({
                url: "/posts/trash/by-ajax",
                method: "GET",
                success: function (response) {
                    $("#post_trash_table").empty();
                    console.log(response);
                    // sidebar total trash show
                    $('#total_post_trash_count').html('('+response.length+')');

                    for (data of response) {
                        let featured_info = JSON.parse(data.featured);
                        // console.log(featured_info);
                        let element = '<tr>\n' +
                            '                                        <td>\n' +
                            '                                            '; if(featured_info.post_image != null) { element += '\n' +
                            '                                            <img width="50"\n' +
                            '                                                src="/uploads/posts/'+featured_info.post_image+'"\n' +
                            '                                                alt="">\n' +
                            '                                            ';} if(featured_info.post_gallery != null) { element += '\n' +
                            '                                            <img width="50"\n' +
                            '                                                src="/uploads/posts/'+featured_info.post_gallery[0]+'"\n' +
                            '                                                alt="">\n' +
                            '                                            '; }  if(featured_info.post_video != null) { element += '\n' +
                            '                                            <iframe width="50" height="50" src="'+featured_info.post_video+'"\n' +
                            '                                                frameborder="0"></iframe>\n' +
                            '                                            '; } if(featured_info.post_audio != null) { element += '\n' +
                            '                                            <iframe width="50" height="50" src="'+featured_info.post_audio+'"\n' +
                            '                                                frameborder="0"></iframe>\n' +
                            '                                            '; } element += '\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            ';
                                                                    for (category of data.categories) { element += '\n' +
                                                                        category.name
                                                                    }
                                                                    element += '\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            ';
                                                                    for (tag of data.tags) { element += '\n' +
                                                                        tag.name
                                                                    }
                                                                    element += '\n' +
                            '                                        </td>\n' +
                            '                                        <td>'+data.title.substring(0, 15) + "..."+'</td>\n' +
                            '                                        <td>'+featured_info.post_type+'</td>\n' +
                            '                                        <td>'+data.views+'</td>\n' +
                            '                                        <td>'+data.user.name+'</td>\n' +
                            '                                        <td>\n' +
                            '\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="post_status_update" data_id="'+data.id+'"';  if(data.status == true) { element +='checked'; } element += '><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <div class="media-body text-center switch-sm">\n' +
                            '                                                <label class="switch">\n' +
                            '                                                <input type="checkbox" class="post_trash_update_1" data_id="'+data.id+'"';  if(data.trash == true) { element +='checked'; } element += '><span class="switch-state"></span>\n' +
                            '                                                </label>\n' +
                            '                                            </div>\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <form style="display: inline;" action="" method="POST">\n' +
                            '                                                <button delete_id="'+data.id+'" type="submit" id="post_delete_ajax" class="btn btn-danger-gradien btn-pill"><i class="fas fa-trash text-white"></i></button>\n' +
                            '                                            </form>\n' +
                            '\n' +
                            '                                        </td>\n' +
                            '                                    </tr>';
                        $("#post_trash_table").append(element);
                    }
                },
            });
        }
        postTrashTable();

        // post remove Trash page update
        $(document).on('change', ".post_trash_update_1", function () {
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

                        postTrashTable();
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

                        postTrashTable();
                        notifyFun(response.success);
                    },
                });
            }
        });


        //================= Drofify JS ==================//
        // Drofify js
        $(".dropify").dropify({
            messages: {
                default: "Drag and drop a file here or click",
                replace: "Drag and drop or click to replace",
                remove: "Remove",
                error: "Ooops, something wrong happended.",
            },
        });
    });
})(jQuery);
