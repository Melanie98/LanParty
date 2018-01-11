<?php
/**
 * Created by PhpStorm.
 * User: melan
 * Date: 10-1-2018
 * Time: 13:22
 */

foreach ($query->selectFromTable($table, null, null, null, null, null,  $columnSort, $orderBy) as $value)
{
    //De mail van de persoon naar wie je mailt
        $to = "John@student.landstede.nl";

    // Subject
        $subject = 'Factuur Lanparty naam';

    //Message

        $message = "<html>
                    <body>
                    
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
}