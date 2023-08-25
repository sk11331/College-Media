$(document).ready(function(){
    $(".pwd-show-icon").click(function(){
        var pwd_field = $(this).parent().children('input');
        var pwd_eye_icon = $(this).children('img'); 
        if(pwd_field.attr('type')=='password'){
            pwd_field.attr('type','text');
            pwd_eye_icon.attr('src','../assets/bootstrap-icons-1.4.1/eye-slash-fill.svg');
        }
        else if(pwd_field.attr('type')=='text'){
            pwd_field.attr('type','password');
            pwd_eye_icon.attr('src','../assets/bootstrap-icons-1.4.1/eye-fill.svg');
        }
    });
});