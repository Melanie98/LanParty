<?php

//Aanroepen van de gebruikte classes
include '../../class/Join.php';
$query = new Join();

echo '<a href="../index.php"> Dashboard </a>';

//Variables die worden gebruikt in het selecten vanuit een database
//SELECT users.userId, tournooi.tournooiName FROM participate JOIN users ON users.userId = participate.userId JOIN tournooi ON tournooi.userId = participate.userId ORDER BY users.userId ASC
$table = "participate";
$colmns = array("users.userEmail", "tournooi.tournooiName");
$coupleTable = array("users", "tournooi");
$row = array("userId", "tournooiId");
$columnSort = "users.userId";
$orderBy = "ASC";


echo '<h1> SELECT </h1>';
echo "<br>
            <table>
                <tr>
                    <th>Factuur Nummer</th>
                    <th>Student Nummer</th>
                    <th>Betaling</th>
                    ";

foreach ($query->joinPaymentOverview() as $value)
{
        //$columns = array("userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights");
    echo" 
                    <tr>
                        <td>".$value['invoiceId']."</td>
                        <td>".$value['userStudentNr']."</td>
                        <td>".$value['applicationPayed']."</td>
                        <td><a href=../application/updatePayment.php?id=". $value['applicationId'] ."><img src='../../img/edit.png'></a></td>
                        <td><a href=../application/deleteApplication.php?id=". $value['applicationId'] ."><img src='../../img/delete.png'></a></td>
        ";


}
echo "   
                </tr>
            </table>";
echo "Betaling: 0 = nee, 1 = ja";







