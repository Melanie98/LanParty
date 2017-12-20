<?php

//Aanroepen van de gebruikte classes
include '../../class/Crud.php';
$query = new Crud();

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

echo '<a href="../index.php"> Dashboard </a>';

//Variables die worden gebruikt in het inserten in een database
$columnId = "userId";
$table = "users";
$id = $_GET['id'];

echo '<h1> DELETE </h1>';

//Uitvoeren Delete query
echo "
    <form method='post'>
        Weet u zeker dat u deze gebruiker wil verwijderen?
        <br>
        <input type='submit' name='ja' value='ja'>
        <input type='submit' name='nee' value='nee'>
        <input type='hidden' name='id' value='". $_GET['id'] ."'>
    </form>";


if (isset($_POST['ja']))
{
    echo $query->deleteRow($table, $columnId, $id);

    header('location: overviewUsers.php');
}

if (isset($_POST['nee']))
{
    header('location: overviewUsers.php');
}