<?php

//Includes
include '../../class/Crud.php';
$query = new Crud();

echo '<a href="../index.php"> Dashboard </a>';


//Variables die worden gebruikt voor het uitvoeren van de query
//$orderBy = "ASC";
//$table = "users";
//$where = 'id';
//$columnSort = "userEmail";
//$id = $_GET['id'];
//$columns = array("userEmail", "userPassword", "userPhoto", "userCB");

$columns = array("applicationPayed");
$table = "application";
$where = 'applicationId';
$columnSort = "applicationId";
$id = $_GET['id'];


///////////////////////////////////////////Het uitvoeren van het update
echo '<h1> UPDATE NOG TOEVOEGEN OM TE CHECKEN OF ALLES IS TOEGEVOEGD</h1>';

    echo "<form method = 'post'>
                Betaald:
                Ja <input type='radio' name='applicationPayed' value='1'>
                Nee <input type='radio' name='applicationPayed' value='0'>
                <br>
                <input type='submit' name='submit'>
          </form>
        ";

//Het Update van een user
if (isset($_POST['submit']))
{
    $values = array($_POST['applicationPayed']);
    echo $query->updateRow($table, $columns, $where, $values, $id);
    header('location: overviewPayment.php');

}


/////////////////////////////////////////////////////////////////////////////////////HET WACHTWOORD MOET NOG WORDEN TERUG VERANDERD VAN MD5