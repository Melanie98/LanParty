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
echo '<a href="../../dashboard.php"> Dashboard </a>';

//Variables die worden gebruikt in het selecten vanuit een database
//SELECT `tournooiId`, `tournooiName`, `tournooiDesc`, `tournooiMax` FROM `tournooi` WHERE 1
$table = "tournooi";
$columnSort = "tournooiName";
$orderBy = "ASC";


echo '<h1> SELECT </h1>';
echo "<br>
            <table>
                <tr>
                    <th>Toernooi naam</th>
                    <th>Beschrijving</th>
                    <th>Maximaal aantal spelers</th>
                    <th>Bewerken</th>
                    <th>Verwijderen</th>
                    ";

foreach ($query->selectFromTable($table, null, null, null, null, null,  $columnSort, $orderBy) as $value)
{
        //$columns = array("userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights");
    echo" 
                    <tr>
                        <td>".$value['tournooiName']."</td>
                        <td>".$value['tournooiDesc']."</td>
                        <td>".$value['tournooiMax']."</td>
                        <td><a href=../tournooi/updateTournooi.php?id=". $value['tournooiId'] ."><img src='../../img/edit.png'></a></td>
                        <td><a href=../tournooi/deleteTournooi.php?id=". $value['tournooiId'] ."><img src='../../img/delete.png'></a></td>
        ";


}
echo "   
                </tr>
            </table>";





