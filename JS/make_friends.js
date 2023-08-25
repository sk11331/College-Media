$(document).ready(function(){    
    $('.friends-list-ui').on('click',".request-btn",function(){
        console.log("hi");
        var uname = $(this).parents(".frnd").find(".info").text();
        var btnValue  = $(this).text();
        console.log(btnValue);
        let xhr = new XMLHttpRequest();
        console.log(uname);         
        //sending the username of the id which the current user requested
        xhr.open("POST","../backend/make_friends.php?uname="+uname+"&btnValue="+btnValue,true);
        xhr.onload = () =>{
            let data = xhr.response;
            //console.log(data);
            $(this).text(data);
        } 
        xhr.send();
    });
});