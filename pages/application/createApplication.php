<html>
<head>
    <title>Inschrijven voor Kerstonbijt</title>
    <link rel="stylesheet" href="../../css/opmaak.css" />
</head>
<body>

<?php
include '../../class/Crud.php';

$table = "application";
$columns = array("invoiceId", "applicationPayed", "applicationCB");




$query = new Crud();
?>

        <H1> Insert</H1>

        <form method="POST">
            Weet je zeker dat je je voor het kerstontbijt wilt inschrijven?
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

    //Er moet nog een invoiceId aan worden gekoppeld en zorgen dat je je maar een keer per gebruiker kunt inschrijven
    $values = array(1, 0, 1);
    //$values = array($_POST['invoiceId'], 0, 1);
    $query->insertIntoTable($table, $columns, $values);
    echo"Je hebt je ingeschreven voor het kerstontbijt";
    //header( "refresh:0.5;url=../Read/readUser.php" );
}

elseif(isset($_POST['Nee']))
{
    echo"Je hebt je niet ingeschreven voor het kerstontbijt";
    //header('location:../Read/readUser.php');
}


//echo $query->insertIntoTable($table, $columns, $values);