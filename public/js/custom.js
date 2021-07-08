(function ($) {
    $(document).ready(function () {
        $("#comment_store").on("submit", function (e) {
            e.preventDefault();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },
                method: "POST",
                url: "/comment/store",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    showComment();
                },
            });
        });

        function showComment() {
            $.ajax({
                url: "/comment/all_data",
                success: function (response) {
                    // console.log(response);
                    $("#showComments").html(response);
                },
            });
        }

        showComment();

        $(document).on("click", ".reply-box-btn", function (e) {
            e.preventDefault();
            let c_id = $(this).attr("c_id");
            $(".reply-box-" + c_id).toggle();
        });

        $(document).on("submit", "#comment_reply_store", function (e) {
            e.preventDefault();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },
                method: "POST",
                url: "/comment/reply/store",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    showComment();
                },
            });
        });
    });
})(jQuery);
