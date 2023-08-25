$(document).ready(function(){
    var login_form = document.getElementById("login"); 
    const btn = $(".login-form .submit-btn");
    const error_msg = $(".login-form .error_msg");

    btn.click(function(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST","../backend/login.php",true);
        xhr.onload = () => {   
            if(xhr.readyState == 4 && xhr.status == 200){
                let data = xhr.response;
                if(data === "Success"){
                    location.href = "../src/index.php";
                }
                else{
                    error_msg.html(xhr.response);
                    error_msg.css("display","block");
                }  
            } 
        }
        let formData = new FormData(login_form);
        xhr.send(formData);
    });
});