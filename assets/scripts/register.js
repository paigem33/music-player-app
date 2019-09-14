
$(document).ready(function(){

    $("#loginForm").click(function(){
        $("#login").show();
        $('#loginForm').addClass('active');
        $("#register").hide();
        $('#registerForm').removeClass('active');
    })

    $("#registerForm").click(function(){
        console.log('register')
        $("#login").hide();
        $('#loginForm').removeClass('active');
        $("#register").show();
        $('#registerForm').addClass('active');
    })
}); //end doc ready
//TODO: Fix toggling active class when form submit un successful