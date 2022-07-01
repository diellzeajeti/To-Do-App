<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form class="main-form" action="includes/process-form.php" method="post">
        <div class="form-nav">
            <button type="button" id="login-btn">Log in</button>
            <button type="button" id="signup-btn">Sign up</button>
        </div>
        <div class="signup-form hidden">
            <h2>Create account</h2>
            <label for="user">Username</label>
            <input type="text" id="user" name="uid" placeholder="Username">

            <label for="pwd">Password</label>
            <input type="password" id="pwd" name="pwd" placeholder="Password">

            <label for="pwdrepeat">Confirm password</label>
            <input type="password" id="pwdrepeat" name="pwdrepeat" placeholder="Password">

            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Email">

            <button type="submit" name="signup">Sign up</button>
        </div>
        <div class="login-form">
            <h2>Log in</h2>
            <label for="userL">Username</label>
            <input type="text" id="userL" name="uidL" placeholder="Username">

            <label for="pwdL">Password</label>
            <input type="password" id="pwdL" name="pwdL" placeholder="Password">
            
            <button type="submit" name="login">Log in</button>
        </div>
        
    </form>
    

    <script src="js/script.js"></script>
</body>
</html>