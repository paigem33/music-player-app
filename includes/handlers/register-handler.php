<?php 

    function sanitizeFormPassword($inputText){
        $inputText = strip_tags($inputText); //take tags from string
        return $inputText;
    }

    function sanitizeFormUsername($inputText){
        $inputText = strip_tags($inputText); //take tags from string
        $inputText = str_replace(" ", "", $inputText); //replace every blank with empty string
        return $inputText;
    }

    function sanitizeFormString($inputText){
        $inputText = strip_tags($inputText); //take tags from string
        $inputText = str_replace(" ", "", $inputText); //replace every blank with empty string
        $inputText = ucfirst(strtolower($inputText));
        return $inputText;
    }

    if(isset($_POST['loginButton'])){
       //login button pressed
    }

    if(isset($_POST['signupButton'])){
        //register button pressed
        $username = sanitizeFormUsername($_POST['username']);
        $firstName = sanitizeFormString($_POST['firstName']);
        $lastName = sanitizeFormString($_POST['lastName']);
        $email = sanitizeFormString($_POST['email']);
        $email2 = sanitizeFormString($_POST['email2']);
        $password = sanitizeFormPassword($_POST['password']);
        $password2 = sanitizeFormPassword($_POST['password2']);
        
     }

?>