<?php

//Aanroepen van de gebruikte classes
include '../../class/Crud.php';
$query = new Crud();

echo '<a href="../../index.php"> Dashboard </a>';

//Variables die worden gebruikt in het selecten vanuit een database

$table = "users";
$columnSort = "userStudentNr";
$orderBy = "ASC";


echo '<h1> SELECT </h1>';
echo "<br>
            <table>
                <tr>
                    <th>Student nummer</th>
                    <th>Email</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Wachtwoord</th>
                    <th>Profiel foto</th>
                    <th>Aanmelding voor kerstontbijt</th>
                    <th>Rechten</th>
                    
                    ";
foreach ($query->selectFromTable($table, null, null, null, null, null,  $columnSort, $orderBy) as $value)
{
        //$columns = array("userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights");
    echo" 
                    <tr>
                        <td>".$value['userStudentNr']."</td>
                        <td>".$value['userEmail']."</td>
                        <td>".$value['userSurname']."</td>
                        <td>".$value['userLastName']."</td>
                        <td>".$value['userPassword']."</td>
                        <td>".$value['userPhoto']."</td>
                        <td>".$value['userCB']."</td>
                        <td>".$value['userRights']."</td>
                        
";


}
echo "   
                </tr>
            </table>";





