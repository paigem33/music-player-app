<?php 
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

        //creates a new instance of the class
        $account = new Account();

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
</head>
<body>
    <div id="inputContainer">
        <form action="register.php" id="login" method="POST">
            <h2>Login to your account</h2>
            <label for="loginUsername">Username</label>
            <input type="text" id="loginUsername" name="loginUsername" placeholder="Username" required>
            <label for="loginPassword">Password</label>
            <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" required>
            <button type="submit" name="loginButton">Login</button>
        </form>

        <form action="register.php" id="register" method="POST">
            <h2>Create your free account</h2>

            <?php echo $account->getError(Constants::$usernameLength); ?>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required value="<?php getInputValue('username'); ?>">

            <?php echo $account->getError(Constants::$firstNameLength); ?>
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" placeholder="First Name" required value="<?php getInputValue('firstName'); ?>">

            <?php echo $account->getError(Constants::$lastNameLength); ?>
            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Last Name" required value="<?php getInputValue('lastName'); ?>">

            <?php echo $account->getError(Constants::$emailInvalid); ?>
            <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
            <label for="Email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required value="<?php getInputValue('email'); ?>">

            <label for="email2">Confirm Email</label>
            <input type="email" id="email2" name="email2" placeholder="Confirm Email" required value="<?php getInputValue('email2'); ?>">

            <?php echo $account->getError(Constants::$passwordsLength); ?>
            <?php echo $account->getError(Constants::$passwordsNotAlphanumeric); ?>
            <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <label for="password2">Confirm Password</label>
            <input type="password" id="password2" name="password2" placeholder="Confirm Password" required>

            <button type="submit" name="signupButton">Signup</button>
        </form>
    </div>
</body>
</html>