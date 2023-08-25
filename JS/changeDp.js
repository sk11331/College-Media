$(document).ready(() => {

    //triggering the hidden input which is used to get the input image
    $(".chat-box").on("click",".group-info .edit-btn",() => {
       $(".dp").trigger("click");
    });

    //triggered whenever the input value for dp changes
    $(".profile-dp .dp").change(() => {
        const profileImg = document.getElementById("profile-dp");
        const clubName = $(".chat-box").find(".sender-name .user_id").text();
        console.log(clubName);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../backend/changeDp.php", true);
        xhr.onreadystatechange = () => {
            let data = xhr.response;
        }
        let formdata = new FormData(profileImg);
        formdata.append("club",clubName);
        xhr.send(formdata);
    });

});