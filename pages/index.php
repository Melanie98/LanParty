<?php
include '../class/LoginHandler.php';

session_start();

echo '<br>';
if (!isset($_SESSION['login']) || $_SESSION['login'] == false)
{
    echo "<br/><a href=login.php> Login </a>";
}

else
{
    echo '<form method="post" xmlns="http://www.w3.org/1999/html">
                </br><input type="submit" name="logout" value="Logout">
             </form>';

    if (isset($_POST['logout']))
    {
        $logout = (new LoginHandler())->logOut();
        echo $logout;
    }
}