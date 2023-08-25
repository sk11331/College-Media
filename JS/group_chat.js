$(document).ready(function(){

    //displaying the friend name if clicked
    $(".clubs-list-ui").on("click",".frnd",function(){
        var user_id = $(this).find(".info .user_id").text();
        const chat_box = $(".chat-box");
        var init_info = $(".initial-info");
        console.log(user_id);
        console.log(1);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../backend/group_chat.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.status){
                let data = xhr.response;
                chat_box.html(data);
                init_info.css("display","none");
                    
                    const chat = $(".chat-box").find(".chats");
                    var receiver_id = $(".chat-box").find(".user_id").text();
                    
                    let Xhr = new XMLHttpRequest(); 
                    Xhr.open("POST", "../backend/display-grp-msg.php", true);
                    Xhr.onload = ()=>{
                        if(Xhr.readyState == 4 && xhr.status){
                            let data = Xhr.response;
                            chat.html(data);
                            //auto-scroll of chats to the bottom
                            $(".chat-box").animate({scrollTop: $(".chat-box")[0].scrollHeight},1000);
                        }
                    }
                    var dat = new FormData();
                    dat.append('receiver_id',receiver_id);
                    Xhr.send(dat);
                    
            }
        }
        var dat = new FormData();
        dat.append('user_id',user_id);
        xhr.send(dat);

    });

    //sending the user typed message to php
    $(".chat-box").on('click',".text-bar .msg-send-icon",function(){
        var msg = $(".text-bar textarea");
        var receiver_id = $(".chat-box .sender-name .user_id").text();
        console.log(receiver_id);
        if(msg.val().trim()!=""){
            let xhr = new XMLHttpRequest(); 
            xhr.open("POST", "../backend/insert-grp-msg.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState == 4 && xhr.status){
                    let data = xhr.response;
                    if(data === "success"){
                        msg.val("");

                        //getting the chats dynamically
                        const chat = $(".chat-box").find(".chats");
                        let xhr = new XMLHttpRequest(); 
                        xhr.open("POST", "../backend/display-grp-msg.php", true);
                        xhr.onload = ()=>{
                            if(xhr.readyState == 4 && xhr.status){
                                let data = xhr.response;
                                chat.html(data);
                            }
                        }
                        var dat = new FormData();
                        dat.append('receiver_id',receiver_id);
                        xhr.send(dat);
                    }
                }
            }
            var dat = new FormData();
            dat.append('msg',msg.val());
            dat.append('receiver_id',receiver_id);
            xhr.send(dat);
        }
        //scrolling the chats to the bottom
        $(".chat-box").animate({scrollTop: $(".chats")[0].scrollHeight},1000);
    });

    //dynamically getting the messages
    setInterval(()=>{
        var receiver_id = $(".chat-box .sender-name .user_id").text();
        const chat = $(".chat-box").find(".chats");
        let xhr = new XMLHttpRequest(); 
        xhr.open("POST", "../backend/display-grp-msg.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == 4 && xhr.status){
                let data = xhr.response;
                chat.html(data);
            }
        }
        var dat = new FormData();
        dat.append('receiver_id',receiver_id);
        xhr.send(dat);
    },200);
});