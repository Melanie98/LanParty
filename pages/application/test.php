<?php
//Includes
include '../../class/Crud.php';
$query = new Crud();
include '../../class/LoginHandler.php';
session_start();

$table_mail = "users";
$columnSort = "applicationId";
$orderBy = "ASC";

foreach ($query->selectFromTable($table_mail, null, null, null, null, null,  $columnSort, $orderBy) as $value)
{
    //De mail van de persoon naar wie je mailt
    $to = $result['userEmail'];

    // Subject
    $subject = 'Factuur Lanparty';

    //Message

    $message = "<html>
                            <head>
    
                            </head>
                            <body>
                                <p>Geachte ".$value['userSurname']." ".$value['userLastName'].",</p>
                                <p>Hierbij de bevestiging van de betaling.</p>
                                <p>Bij deze heeft u betaald voor de Lanparty 2018 op Landstede Harderwijk.</p>
                                <p>Hieronder vind u het factuur.</p>
                                <a href='../pdfDownload.php'>Download hier</a>
                                <br>
                                <p>Met vriendelijke groeten,</p>
                                <p>Team ICT Landstede</p>
                               
                            </body>
                        </html>";

    //De informatie waarmee hij verzonden word
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/html; charset=iso-8859-1";

    //additional headers
    $usermail = $result['userEmail'];
    $headers[] = "To: " . $result['userEmail'];
    $headers[] = "From: Landstede Harderwijk <info@landstede.nl>";

    mail($to, $subject, $message, implode("\r\n", $headers));
    echo"Factuur verstuurd1";
}



?>