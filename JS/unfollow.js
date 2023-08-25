$(document).ready(function () {
    $(".chat-box").on("click", ".unfollow-btn .btn", function () {
            var btnValue = $(this).text();
            var user_id = $(this).parents(".chat-box-header").find(".user_id").text();
            const chat = $(".chat-box");

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../backend/unfollow.php", true);
            xhr.onload = () => {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let data = xhr.response;
                    if ($(window).width() > 768) {
                        chat.html(data);
                    }
                    else {
                        $(".friends-list-ui").css("display", "block");
                        $(".clubs-list-ui").css("display", "block");
                        $(".chat-box-container").css("display","none");
                    }
                }
            }
            var Data = new FormData();
            Data.append("btnValue", btnValue);
            Data.append("user_id", user_id);
            xhr.send(Data);
        });
});