<?php

//Aanroepen van de gebruikte classes
include '../../class/Crud.php';
$query = new Crud();

echo '<a href="../../index.php"> Dashboard </a>';

//Variables die worden gebruikt in het selecten vanuit een database
//SELECT `userId`, `tournooiId` FROM `participate` WHERE 1
$table = "participate";
$coupleTable = "users";
$row = array("userId", "userId");
$columnSort = "userId";
$orderBy = "ASC";


echo '<h1> SELECT </h1>';
echo "<br>
            <table>
                <tr>
                    <th>Student Nummer</th>
                    <th>Student Naam</th>
                    <th>Tournooi Naam</th>
                    ";

foreach ($query->selectFromTable($table, null, null, null, $coupleTable, null,  $columnSort, $orderBy) as $value)
{
        //$columns = array("userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights");
    echo" 
                    <tr>
                        <td>".$value['userId']."</td>
                        <td>".$value['tournooiId']."</td>
                        <td>".$value['tournooiName']."</td>
        ";


}
echo "   
                </tr>
            </table>";

var_dump($query->selectFromTable($table, null, null, null, $coupleTable, null,  $columnSort, $orderBy));





