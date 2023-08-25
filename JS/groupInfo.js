$(document).ready(function(){

    //on clicking the chat-box header
    const chatBox = $(".chat-box");
    chatBox.on("click",".chat-box-header .profile-img",function(){
        const groupInfo = $(".group-info");
        var clubName = $(".chat-box-header .user_id").text();

        let xhr = new XMLHttpRequest();
        xhr.open("POST","../backend/groupInfo.php?clubName="+clubName,true);
        xhr.onreadystatechange = () => {
                let data = xhr.response;
                groupInfo.html(data);
                $(".chat-box .group-info").show("slow");
        }
        xhr.send();
    });

    //on clicking the back button
    chatBox.on("click",".group-info .back-btn i",function(){
        console.log("hi");
        $(".chat-box .group-info").hide("fast");
    });

    //on clicking the request related buttons
    $('.chat-box').on('click',".request-btn",function(){
        console.log("hi");
        var uname = $(this).parents(".member").children(".profile-pic").children(".user_id").text();
        var btnValue  = $(this).text();
        console.log(btnValue);
        let xhr = new XMLHttpRequest();

        //sending the username of the id which the current user requested
        xhr.open("POST","../backend/make_friends.php?uname="+uname+"&btnValue="+btnValue,true);
        xhr.onload = () =>{
            let data = xhr.response;
            //console.log(data)
        } 
        xhr.send();
    });


    /*setInterval(() =>{
        const groupInfo = $(".group-info");
        var clubName = $(".chat-box-header .user_id").text();

        let xhr = new XMLHttpRequest();
        xhr.open("POST","../backend/groupInfo.php?clubName="+clubName,true);
        xhr.onreadystatechange = () => {
                let data = xhr.response;
                 groupInfo.html(data);
        }
        xhr.send();
    },500);*/
});


