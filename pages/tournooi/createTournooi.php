<html>
<head>
    <title>Tournooi toevoegen</title>
    <link rel="stylesheet" href="../../css/opmaak.css" />
</head>
<body>
</body>
</html>
<?php
include '../../class/Crud.php';
session_start();

echo '<br>';
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
    //echo 'Welkom';
}

else
{
    header('location:login.php');
}
$table = "tournooi";
$columns = array("tournooiName", "tournooiDesc", "tournooiMax");




$query = new Crud();
?>

<H1> Insert</H1>
<table>
    <form method="POST">
        <td>
            Tournooi naam:
        </td>
        <td>
            <input type="text" name="tournooiName">
        </td>
        </tr>
        <td>
            Tournooi beschrijving:
        </td>
        <td>
            <textarea name="tournooiDesc" cols="25" rows="5"></textarea>
        </td>
        </tr>
        <tr>
            <td>
                Maximaal aantal deelnemers:
            </td>
            <td>
                <input type="number" name="tournooiMax">
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


if(isset($_POST['aanmaken']))
{

    if(!empty($_POST['tournooiName']) && !empty($_POST['tournooiDesc']) && !empty($_POST['tournooiMax']))
    {
        $values = array($_POST['tournooiName'], $_POST['tournooiDesc'], $_POST['tournooiMax']);
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