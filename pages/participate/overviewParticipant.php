<?php

//Aanroepen van de gebruikte classes
include '../../class/Join.php';
$query = new Join();
$db = new DBConfi();


echo '<a href="../../dashboard.php"> Dashboard </a>';

//Variables die worden gebruikt in het selecten vanuit een database
//SELECT `userId`, `tournooiId` FROM `participate` WHERE 1
$table = "participate";
$colmns = array("users.userId", "tournooi.tournooiName");
$coupleTable = array("tournooi", "userId");
$row = array("tournooiId", "userId");
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

foreach ($query->joinParticipateOverview() as $value)
{
        //$columns = array("userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights");
    echo" 
                    <tr>
                        <td>".$value['userStudentNr']."</td>
                        <td>".$value['userEmail']."</td>
                        <td>".$value['tournooiName']."</td>
        ";


}
echo "   
                </tr>
            </table>";





