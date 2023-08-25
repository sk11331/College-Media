$(document).ready(function () {
    const btn = $(".save-btn .btn");
    const form = $("#profile-form");
    const form_data = document.getElementById("profile-form");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../backend/get_Profile.php", true);
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status) {
            let data = $.parseJSON(xhr.response);
            //console.log(data);
            set_profile(data);
        }
    }
    xhr.send();

    $(".edit-icon i").on("click", function () {
        btn.prop("disabled", false);
        form.find('input').prop("readonly", false);
        //console.log(btn.text());
    });

    btn.on("click", function () {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../backend/update_Profile.php", true);
        xhr.onload = () => {
            if (xhr.readyState == 4 && xhr.status) {
                let data = $.parseJSON(xhr.response);
                console.log(data);
                console.log(data.img);
                set_profile(data);
                btn.prop("disabled", true);
                form.find('input').prop("readonly", true);
            }
        }
        var dat = new FormData(form_data);
        xhr.send(dat);
    });

    function set_profile(data) {
        var img_loc = "../backend/Profile_pics/"+data.img;
        $(".fname").attr("value", data.fname);
        $(".lname").attr("value", data.lname);
        $(".pass").attr("value", data.pass);
        $(".course").attr("value", data.course);
        $(".dept").attr("value", data.dept);
        $(".year").attr("value", data.year);
        $('.cname').attr("value",data.cname);
        $('.input_img').attr("value",data.img);
        $(".profile-img img").attr("src",img_loc);
    }
});