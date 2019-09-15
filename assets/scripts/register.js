
$(document).ready(function(){

    $("#loginForm").click(function(){
        $("#login").show();
        $("#register").hide();
        $("#loginForm").addClass('active');
        $("#registerForm").removeClass('active');
    })

    $("#registerForm").click(function(){
        $("#login").hide();
        $("#register").show();
        $("#registerForm").addClass('active');
        $("#loginForm").removeClass('active');
    })


}); //end doc ready
//TODO: Fix toggling active class when form submit un successful