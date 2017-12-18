<?php

//Aanroepen van de gebruikte classes
include '../../class/Crud.php';
$query = new Crud();

echo '<a href="../../index.php"> Dashboard </a>';

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
                    ";

foreach ($query->selectFromTable($table, null, null, null, null, null,  $columnSort, $orderBy) as $value)
{
        //$columns = array("userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights");
    echo" 
                    <tr>
                        <td>".$value['tournooiName']."</td>
                        <td>".$value['tournooiDesc']."</td>
                        <td>".$value['tournooiMax']."</td>
        ";


}
echo "   
                </tr>
            </table>";





