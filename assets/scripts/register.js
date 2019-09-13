
$(document).ready(function(){

    $("#loginForm").click(function(){
        console.log('login')
        $("#login").show();
        $("#register").hide();
    })

    $("#registerForm").click(function(){
        console.log('register')
        $("#login").hide();
        $("#register").show();
    })
}); //end doc ready