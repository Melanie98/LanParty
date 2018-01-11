<?php

//Includes
include '../../class/Crud.php';

include '../../class/LoginHandler.php';
session_start();


(new LoginHandler())->checkRights();


$columns = array("applicationPayed");
$table = "application";
$where = 'applicationId';
$columnSort = "applicationId";
$orderBy = "ASC";
$id = $_GET['id'];

$query = new Crud();

?>
<!DOCTYPE html>

    <html lang="">

    <head>
        <title>Betaald ja of nee </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    </head>
    <body id="top">



        <!-- Top Background Image Wrapper -->
        <div class="topspacer bgded overlay" style="background-image:url('../../images/demo/backgrounds/LANparty 1.png');">

            <div class="wrapper row1">
                <header id="header" class="hoc clear">

                    <div id="logo" class="fl_left">
                        <h1><a href="../index.php">Lanparty</a></h1>
                    </div>

                    <nav id="mainav" class="fl_right">
                        <ul class="clear">
                            <li><a class="drop">Aanmaken</a>
                                <ul>
                                    <li><a href="../tournooi/createTournooi.php">Toernooi toevoegen</a></li>
                                </ul>
                            </li>
                            <li><a class="drop">Overzicht</a>
                                <ul>
                                    <li><a href="../users/overviewUsers.php">Overzicht gebruikers</a></li>
                                    <li><a href="../tournooi/overviewTournooi.php">Overzicht toernooi</a></li>
                                    <li><a href="../participate/overviewParticipant.php">Overzicht inschrijvingen toernooi</a></li>
                                    <li><a href="../application/overviewPayment.php">Overzicht betalingen</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="../logout.php">Uitloggen</a>
                            </li>
                        </ul>
                    </nav>
                </header>

            </div>

            <div id="breadcrumb" class="hoc clear">

                <h6 class="heading">Betaald ja of nee </h6>
                <ul>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Betaald ja of nee </a></li>
                </ul>

            </div>

        </div>



    <div id="login">

        <div class="one_quarter">
            <h6 class="heading"></h6>
            <p class="btmspace-30"></p>
            <?php
            foreach ($query->selectFromTable($table, null, $where, $id, null, null, null, $columnSort) as $value)
            {
                ?>


            <form method="post">
                <fieldset>
                    Betaald:<br>
                    Ja <input type='radio' name='payed' value='1'>
                    Nee <input type='radio' name='payed' value='0'>
                    <br>

                    <input type="submit" name="aanmaken" value="Updaten" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">
                    <input type="submit" name="annuleren" value="Annuleren" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">
                </fieldset>
            </form>
                <?php
                }
                ?>
        </div>
    </div>
    <!-- End Top Background Image Wrapper -->


    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->
    <script src="../../layout/scripts/jquery.min.js"></script>
    <script src="../../layout/scripts/jquery.backtotop.js"></script>
    <script src="../../layout/scripts/jquery.mobilemenu.js"></script>
    </body>
    </html>


<?php

///////////////////////////////////////////Het uitvoeren van het update



//Het Update van een betaling
if (isset($_POST['aanmaken']))
{
    if(!isset($_POST['payed']))
    {
        echo "vul ja of nee in";
    }

    elseif(isset($_POST['payed']))
    {

        $values = array($_POST['payed']);
        echo $query->updateRow($table, $columns, $where, $values, $id);
        //var_dump($_POST['applicationPayed']);

        if ($_POST['payed'] == '1')
        {

            $table_mail = "users";
            $columnSort_mail = "userId";
            //send email met factuur

            //var_dump($query->selectFromTable($table_mail, null, $where_mail, null, null, null, $columnSort_mail, $orderBy));
            foreach ($query->selectFromTable($table_mail, null, null, null, null, null, $columnSort_mail, $orderBy) as $value)
            {
                //word 2x verstuurd
                //De mail van de persoon naar wie je mailt
                $to = $value['userEmail'];

                // Subject
                $subject = 'Factuur Lanparty';

                //Message

                $message = "<html>
                                <head>
        
                                </head>
                                <body>
                                    <p>Geachte " . $value['userSurname'] . " " . $value['userLastName'] . ",</p>
                                    <p>Hierbij de bevestiging van de betaling.</p>
                                    <p>Bij deze heeft u betaald voor de Lanparty 2018 op Landstede Harderwijk.</p>
                                    <p>Hieronder vind u het factuur.</p>
                                    <a href='http://127.0.0.1:8080/LanParty/pages/pdfDownload.php?id=". $value['userId'] ."'>Download hier</a>
                                    <br>
                                    <p>Met vriendelijke groeten,</p>
                                    <p>Team ICT Landstede</p>
                                </body>
                            </html>";

                //De informatie waarmee hij verzonden word
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-type: text/html; charset=iso-8859-1";

                //additional headers
                $usermail = $value['userEmail'];
                $headers[] = "To: " .$value['userEmail'];
                $headers[] = "From: Landstede Harderwijk <info@landstede.nl>";

                mail($to, $subject, $message, implode("\r\n", $headers));
                //echo"Factuur verstuurd1";
            }

            //echo"Factuur verstuurd";
            //var_dump($query->selectFromTable($table_mail, null, null, null, null, null, $columnSort, $orderBy));
            echo"geupdate en mail verstuurd";
            //header("refresh:0.5;url=overviewPayment.php" );
        }

        else
        {
            echo"geupdate";
            header("refresh:0.5;url=overviewPayment.php" );
        }
    }

    //header("refresh:0.5;url=../overviewPayment.php" );

}

elseif(isset($_POST['annuleren']))
{
    echo 'Het toevoegen is geannuleerd';
    header( "refresh:0.5;url=overviewPayment.php" );
}


/////////////////////////////////////////////////////////////////////////////////////HET WACHTWOORD MOET NOG WORDEN TERUG VERANDERD VAN MD5