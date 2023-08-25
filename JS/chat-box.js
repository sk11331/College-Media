$(document).ready(function () {

    //displaying the friend name if clicked
    $(".users-list").on("click", ".friends-list .frnd", function () {
        
        //variables
        var user_id = $(this).find(".user_id").text();
        const chat_box = $(".chat-box");
        const init_info = $(".initial-info");
        console.log(user_id);
        
        //ajax start
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../backend/chat-box.php", true);
        xhr.onload = () => {
            if (xhr.readyState == 4 && xhr.status) {
                let data = xhr.response;
                chat_box.html(data);
                init_info.css("display", "none");

                //variables
                const chat = $(".chat-box").find(".chats");
                var receiver_id = $(".chat-box").find(".user_id").text();

                //ajax start
                let Xhr = new XMLHttpRequest();
                Xhr.open("POST", "../backend/display-msg.php", true);
                Xhr.onload = () => {
                    if (Xhr.readyState == 4 && xhr.status) {
                        let data = Xhr.response;
                        chat.html(data);
                        //scrolling the chats to the bottom
                        $(".chat-box").animate({ scrollTop: $(".chat-box")[0].scrollHeight }, 1000);
                    }
                }

                var dat = new FormData();
                dat.append('receiver_id', receiver_id);
                Xhr.send(dat);

            }
        }

        var dat = new FormData();
        dat.append('user_id', user_id);
        xhr.send(dat);

    });

    //sending the user typed message to php
    $(".chat-box").on('click', ".text-bar .msg-send-icon", function () {
        //variables
        var receiver_id = $(".chat-box .sender-name .user_id").text();
        var msg = $(".text-bar textarea");
        //console.log(msg.val());

        //checking whether the msg is empty
        if (msg.val().trim() != '') {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../backend/insert-msg.php", true);
            xhr.onload = () => {
                if (xhr.readyState == 4 && xhr.status) {
                    let data = xhr.response;
                    if (data === "success") {
                        msg.val("");
                        //scrolling the chats to the bottom
                        $(".chat-box").animate({ scrollTop: $(".chat-box")[0].scrollHeight }, 1000);
                    }
                }
            }

            var dat = new FormData();
            dat.append('msg', msg.val());
            dat.append('receiver_id', receiver_id);
            xhr.send(dat);
        }
    });

    //dynamically getting the messages
    setInterval(() => {

        //variables
        var receiver_id = $(".chat-box .sender-name .user_id").text();
        const chat = $(".chat-box").find(".chats");

        //ajax start
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../backend/display-msg.php", true);
        xhr.onload = () => {
            if (xhr.readyState == 4 && xhr.status) {
                let data = xhr.response;
                chat.html(data);
            }
        }

        var dat = new FormData();
        dat.append('receiver_id', receiver_id);
        xhr.send(dat);
    }, 200);


    //frequently updating the online status
    setInterval(() => {

        //variables
        var receiver_id = $(".chat-box .sender-name .user_id").text();
        const status = $(".chat-box").find(".chat-box-header .online-status");

        //ajax start
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../backend/online_status.php", true);
        xhr.onload = () => {
            if (xhr.readyState == 4 && xhr.status) {
                let data = xhr.response;
                //console.log(data);
                status.text(data);
            }
        }
        
        var dat = new FormData();
        dat.append('receiver_id', receiver_id);
        xhr.send(dat);
    }, 500);


    $(".chat-box").on("click",".camera-icon",function(){
        $(".img_sender").trigger("click");
    });
});