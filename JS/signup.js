$(document).ready(function(){
    var signup_form = document.getElementById("signup");
    const btn = $(".signup-form .submit-btn");
    const error_msg = $(".signup-form .error_msg");
    btn.click(function(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST","../backend/Signup.php",true);
        xhr.onreadystatechange = () => {
                let data = xhr.response;
                if(data === "Success"){
                    console.log("hello")
                    location.href = "../src/myProfile.php";
                }
                else{
                    error_msg.html(xhr.response);
                    error_msg.css("display","block");
                }    
        }
        let formData = new FormData(signup_form);
        xhr.send(formData);
    });
});
