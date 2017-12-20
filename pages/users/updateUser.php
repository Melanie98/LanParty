<?php

//Includes
include '../../class/Crud.php';
$query = new Crud();
session_start();

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
echo '<a href="../index.php"> Dashboard </a>';


//Variables die worden gebruikt voor het uitvoeren van de query
//$orderBy = "ASC";
//$table = "users";
//$where = 'id';
//$columnSort = "userEmail";
//$id = $_GET['id'];
//$columns = array("userEmail", "userPassword", "userPhoto", "userCB");

$columns = array("userEmail", "userPassword", "userPhoto", "userCB", "userRights");
$table = "users";
$where = 'userId';
$columnSort = "userEmail";
$id = $_GET['id'];


///////////////////////////////////////////Het uitvoeren van het update
echo '<h1> UPDATE NOG TOEVOEGEN OM TE CHECKEN OF ALLES IS TOEGEVOEGD</h1>';
//Opvragen van informatie uit de database
foreach ($query->selectFromTable($table, null, $where, $id, null, null, null, $columnSort) as $value)
{
    //"userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights")
    echo "<form method = 'post'>
                Email addres: <input type='text' name='userEmail' value='" . $value['userEmail'] . "'>
                </br>
                Password: <input type='password' name='userPassword' value='" . $value['userPassword'] . "'>
                </br>
                Profiel foto: <input type='file' name='userPhoto' value='" . $value['userPhoto'] . "'>
                </br>
                Inschrijven voor kerstontbijt:
                Ja <input type='radio' name='userCB' value='1'>
                Nee <input type='radio' name='userCB' value='0'>
                <br>
                Rechten toekennen:
                Ja <input type='radio' name='userRights' value='1'>
                Nee <input type='radio' name='userRights' value='0'>
                <br>
                <input type='submit' name='submit'>
          </form>
        ";
}

//Het Update van een user
if (isset($_POST['submit']))
{
    $values = array($_POST['userEmail'], md5($_POST['userPassword']), $_POST['userPhoto'], $_POST['userCB'], $_POST['userRights']);
    echo $query->updateRow($table, $columns, $where, $values, $id);
    echo "geupdate";
}


/////////////////////////////////////////////////////////////////////////////////////HET WACHTWOORD MOET NOG WORDEN TERUG VERANDERD VAN MD5