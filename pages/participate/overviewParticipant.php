<?php

//Aanroepen van de gebruikte classes
include '../../class/Crud.php';
$query = new Crud();

echo '<a href="../index.php"> Dashboard </a>';

//Variables die worden gebruikt in het selecten vanuit een database
//SELECT `userId`, `tournooiId` FROM `participate` WHERE 1
$table = "participate";
$colmns = array("users.userId", "tournooi.tournooiName");
$coupleTable = array("users", "tournooi");
$row = array("userId", "userId");
$columnSort = "users.userId";
$orderBy = "ASC";


echo '<h1> SELECT </h1>';
echo "<br>
            <table>
                <tr>
                    <th>Student Nummer</th>
                    <th>Student Naam</th>
                    <th>Tournooi Naam</th>
                    ";

foreach ($query->selectFromTable($table, $colmns, null, null, $coupleTable, $row,  $columnSort, $orderBy) as $value)
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

var_dump($query->selectFromTable($table, $colmns, null, null, $coupleTable, $row,  $columnSort, $orderBy));





