<?php 
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

        //creates a new instance of the class
        $account = new Account($con);

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    function getInputValue($name){
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
?>


<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/scripts/register.js"></script>
</head>
<body>

    <?php
        if(isset($_POST['signupButton'])){
            echo '<script>
                    $(document).ready(function(){
                        $("#login").hide();
                        $("#loginForm").addClass("active");
                        $("#register").show();
                        $("#registerForm").removeClass("active");
                    }); 
                 </script>';
        } else {
            echo '<script>
                    $(document).ready(function(){
                        $("#login").show();
                        $("#loginForm").removeClass("active");
                        $("#register").hide();
                        $("#registerForm").addClass("active");
                    });
                </script>';
        };
    ?>
    

    <div id="inputContainer">
        <div class="textBox">
            <h1>Get great music,<br> right now</h1>
            <h2>Listen to loads of songs for free</h2>
            <h3><i class="fas fa-check"></i>Discover music you'll fall in love with</h3>
            <h3><i class="fas fa-check"></i>Create your own playlists</h3>
            <h3><i class="fas fa-check"></i>Follow artists to keep up to date</h3>
        </div>
        <div>
            <div class="formButtons">
                <div class="hasAccount">
                    <span id="loginForm" class="active">Sign in</span>
                </div>
                <div class="hasAccount">
                    <span id="registerForm">Sign up</span>
                </div>
            </div>
            <form action="register.php" id="login" method="POST">
                <?php echo $account->getError(Constants::$loginFailed); ?>
                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="loginUsername" required value="<?php getInputValue('loginUsername'); ?>">
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="loginPassword" required>
                <button type="submit" name="loginButton">Login</button>

                
            </form>

            <form action="register.php" id="register" method="POST">
                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <?php echo $account->getError(Constants::$usernameTaken); ?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required value="<?php getInputValue('username'); ?>">

                <?php echo $account->getError(Constants::$firstNameLength); ?>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" required value="<?php getInputValue('firstName'); ?>">

                <?php echo $account->getError(Constants::$lastNameLength); ?>
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" required value="<?php getInputValue('lastName'); ?>">

                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$usernameTaken); ?>
                <label for="Email">Email</label>
                <input type="email" id="email" name="email" required value="<?php getInputValue('email'); ?>">

                <label for="email2">Confirm Email</label>
                <input type="email" id="email2" name="email2" required value="<?php getInputValue('email2'); ?>">

                <?php echo $account->getError(Constants::$passwordsLength); ?>
                <?php echo $account->getError(Constants::$passwordsNotAlphanumeric); ?>
                <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <label for="password2">Confirm Password</label>
                <input type="password" id="password2" name="password2" required>

                <button type="submit" name="signupButton">Sign up</button>


            </form>
        </div>
    </div>
</body>
</html>