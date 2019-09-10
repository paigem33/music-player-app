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
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required>

            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" placeholder="First Name" required>

            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>

            <label for="Email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="email2">Confirm Email</label>
            <input type="email" id="email2" name="email2" placeholder="Confirm Email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <label for="password2">Confirm Password</label>
            <input type="password" id="password2" name="password2" placeholder="Confirm Password" required>

            <button type="submit" name="signupButton">Signup</button>
        </form>
    </div>
</body>
</html>