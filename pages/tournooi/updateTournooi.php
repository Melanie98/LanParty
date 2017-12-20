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

$columns = array("tournooiName", "tournooiDesc", "tournooiMax");
$table = "tournooi";
$where = 'tournooiId';
$columnSort = "tournooiName";
$id = $_GET['id'];


///////////////////////////////////////////Het uitvoeren van het update
echo '<h1> UPDATE NOG TOEVOEGEN OM TE CHECKEN OF ALLES IS TOEGEVOEGD</h1>';
//Opvragen van informatie uit de database
foreach ($query->selectFromTable($table, null, $where, $id, null, null, null, $columnSort) as $value)
{
    //"userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights")
    echo "<form method = 'post'>
                Tournooi naam: <input type='text' name='tournooiName' value='" . $value['tournooiName'] . "'>
                </br>
                Beschrijving: <textarea name='tournooiDesc' cols='25' rows='5'>" . $value['tournooiDesc'] . "</textarea>
                </br>
                Maximaal aantal deelnemers: <input type='number' name='tournooiMax' value='" . $value['tournooiMax'] . "'>
                </br>
                <input type='submit' name='submit'>
          </form>
        ";
}

//Het Update van een user
if (isset($_POST['submit']))
{
    $values = array($_POST['tournooiName'], $_POST['tournooiDesc'], $_POST['tournooiMax']);
    echo $query->updateRow($table, $columns, $where, $values, $id);
    echo "geupdate";
}


/////////////////////////////////////////////////////////////////////////////////////HET WACHTWOORD MOET NOG WORDEN TERUG VERANDERD VAN MD5