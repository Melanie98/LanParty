<?php
include '../class/LoginHandler.php';
session_start();
    if(isset($_POST['loginButton']))
    {
        if((new LoginHandler())->logIn($_POST['userName'], $_POST['password']))
        {
            echo 'Welkom';
        }

        else
        {
            echo 'Login';
        }
    }


?>

<html>

<body>

<form method="post">

    Username: <input type="text" name="userName"></br>
    Password: <input type="password" name="password"></br>
    <input type="submit" name="loginButton" value="Login">

</form>
    <!--<a href="insert/insertCustomer.php">Registreer</a>-->
</body>

</html>
