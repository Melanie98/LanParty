<html>
    <head>
        <title>Inschrijven voor tournooi</title>
        <link rel="stylesheet" href="../../css/opmaak.css" />
    </head>
    <body>

<?php
include '../../class/Crud.php';

$table = "participate";
$columns = array("userId", "applicationTournooi");
//$columns = $_GET['id'];





$query = new Crud();
?>

        <H1> Insert</H1>

        <form method="POST">
            Weet je zeker dat je je voor dit tournooi wilt inschrijven?
            <br>
            <input type="submit" value="Ja" name="Ja">
            <!--<input type="hidden" name="catId" value=<?//php echo $_GET['id']; ?> >-->
            <input type="submit" value="Nee" name="Nee">

        </form>

    </body>
</html>
<?php
echo '<br>';


if(isset($_POST['Ja']))
{
    //moet nog een user aan worden gekoppeld en er moeten meerdere tournooien kunnen worden ingevuld

    $values = array(1, 1);
    //$values = array($_GET['id'], $_POST['applicationTournooi']);
    $query->insertIntoTable($table, $columns, $values);
    echo"Je hebt je ingeschreven voor het tournooi";
    //header( "refresh:0.5;url=../Read/readUser.php" );
}

elseif(isset($_POST['Nee']))
{
    echo"Je hebt je niet ingeschreven voor het tournooi";
    //header('location:../Read/readUser.php');
}


//echo $query->insertIntoTable($table, $columns, $values);