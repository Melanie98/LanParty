<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="css/opmaak.css" />
    </head>
    <body>
        <br>
        <H1>Dashboard</H1>
        <table>
            <tr>
            <td><a href="pages/users/createUser.php">Aanmaken gebruiker</a></td>
            <td><a href="pages/tournooi/createTournooi.php">Aanmaken tournooi</a></td>

            <td><a href="pages/participate/createParticipate.php">Inschrijven voor tournooi</a></td>
            <td><a href="pages/application/createApplication.php">Inschrijven voor kerstontbijt</a></td>
            </tr>
            <tr>
            <td><a href="pages/users/overviewUsers.php">Overzicht Gebruikers</a></td>
            <td><a href="pages/tournooi/overviewTournooi.php">Overzicht Toernooien</a></td>
            <td><a href="pages/participate/overviewParticipant.php">Overzicht Aanmeldingen</a></td>
            <td><a href="pages/application/overviewPayment.php">Betalings Overzicht</a></td>
            </tr>
        </table>

    </body>
</html>

<?php
session_start();
include 'class/LoginHandler.php';

echo '<br>';
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
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

else
{
    header('location:login.php');
}

?>