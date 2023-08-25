$(document).ready(function(){
    const panel_left = $(".panel-left");
    const panel_right = $(".panel-right");
    const signup_form = $(".signup-form");
    const login_form = $(".login-form");
    $(".signup-nav .signup").on("click",function(){
    panel_left.css("transform","translateX(0%)");
    panel_right.css("transform","translateX(200%)");
    signup_form.css("transform","translateX(0%)");
    login_form.css("transform","translateX(-200%)");
    });

    $(".login-nav .login").on("click",function(){
        panel_left.css("transform","translateX(-100%)");
        panel_right.css("transform","translateX(100%)");
        signup_form.css("transform","translateX(200%)");
        login_form.css("transform","translateX(0%)");
    });

    $(".login-form .nav-link").on("click",function(){
        panel_left.css("transform","translateX(0%)");
        panel_right.css("transform","translateX(200%)");
        signup_form.css("transform","translateX(0%)");
        login_form.css("transform","translateX(-200%)");
    });

    $(".signup-form .nav-link").on("click",function(){
        panel_left.css("transform","translateX(-100%)");
        panel_right.css("transform","translateX(100%)");
        signup_form.css("transform","translateX(200%)");
        login_form.css("transform","translateX(0%)");
    });
});
