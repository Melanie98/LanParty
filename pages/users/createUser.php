<html>
    <head>
        <title>Gebruiker toevoegen</title>
        <link rel="stylesheet" href="../../css/opmaak.css" />
    </head>
    <body>
    </body>
</html>
<?php
    include '../../class/Crud.php';

    $table = "users";
    $columns = array("userEmail", "userSurname", "userLastName", "userStudentNr", "userPassword",  "userPhoto", "userCB", "userRights");




    $query = new Crud();
?>

    <H1> Insert</H1>
    <table>
        <form method="POST">
            <td>
                Email:
            </td>
            <td>
                <input type="email" name="userEmail">
            </td>
            </tr>
            <td>
                Voornaam:
            </td>
            <td>
                <input type="text" name="userSurname">
            </td>
            </tr>
            <tr>
            <td>
                Achternaam:
            </td>
            <td>
                <input type="text" name="userLastName">
            </td>
            </tr>
            <tr>
            <td>
                Student nummer:
            </td>
            <td>
                <input type="text" name="userStudentNr">
            </td>
            </tr>
            <tr>
                <td>
                    Wachtwoord:
                </td>
                <td>
                    <input type="password" name="userPassword">
                </td>
            </tr>
            <tr>
                <td>
                    Foto:
                </td>
                <td>
                    <input type="file" name="userPhoto" id="img">
                </td>
            </tr>
            <tr>
                <td>
                    Inschrijven voor kerstontbijt:
                </td>
                <td>

                    Ja <input type="radio" name="userCB" value="1">
                    Nee <input type="radio" name="userCB" value="0">

                </td>
            </tr>
            <td></td>
            <td>
                <input type="submit" name="aanmaken" value="Aanmaken">
                <input type="submit" name="annuleren" value="Annuleren">
            </td>
        </form>
    </table>
<?php
echo '<br>';

//Ook nieuwe invoice maken
    if(isset($_POST['aanmaken']))
    {
        if(!empty($_POST['userEmail']) && !empty($_POST['userSurname']) && !empty($_POST['userLastName']) && !empty($_POST['userStudentNr']) && !empty($_POST['userPassword']) && !empty($_POST['userPhoto']))
        {
            $values = array($_POST['userEmail'], $_POST['userSurname'], $_POST['userLastName'], $_POST['userStudentNr'], md5($_POST['userPassword']), $_POST['userPhoto'], $_POST['userCB'],  0);
            $query->insertIntoTable($table, $columns, $values);
            echo 'Het toevoegen is gelukt';
            header( "refresh:0.5;url=readUser.php" );
        }

        else
        {
            echo"Niet alles is ingevuld, probeer het opnieuw";
        }

    }
    if(isset($_POST['annuleren']))
    {
        echo 'Het toevoegen is geannuleerd';
        header( "refresh:0.5;url=../dashboard.php" );
    }

    //echo $query->insertIntoTable($table, $columns, $values);