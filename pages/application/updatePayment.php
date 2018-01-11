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
    <?php
    if (!isset($_SESSION['login']) || $_SESSION['login'] == false)
    {
        echo "<br/><a href=../login.php> Login </a>";
    }

    else
    {
        echo '<form method="post" xmlns="http://www.w3.org/1999/html">
            </br><input type="submit" name="logout" value="Logout">
        </form>';
        ?>
        <!-- Top Background Image Wrapper -->
        <div class="topspacer bgded overlay" style="background-image:url('../../images/demo/backgrounds/01.png');">

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
        <?php
        if (isset($_POST['logout']))
        {
            $logout = (new LoginHandler())->logOut();
            echo $logout;
        }
    }
    ?>

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
                    <form method = 'post'>
                    Betaald:<br>
                    Ja <input type='radio' name='applicationPayed' value='1'>
                    Nee <input type='radio' name='applicationPayed' value='0'>
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
if (isset($_POST['aanmaken'])) {
    $values = array($_POST['applicationPayed']);
    echo $query->updateRow($table, $columns, $where, $values, $id);
    var_dump($_POST['applicationPayed']);

   if($_POST['applicationPayed'] == '1')
   {
       $table_mail = "users";

       //send email met factuur
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
           echo"Factuur verstuurd";
       }

       echo"Factuur verstuurd";
   }

    //header("refresh:0.5;url=../overviewPayment.php" );

}

elseif(isset($_POST['annuleren']))
{
    echo 'Het toevoegen is geannuleerd';
    header( "refresh:0.5;url=overviewPayment.php" );
}


/////////////////////////////////////////////////////////////////////////////////////HET WACHTWOORD MOET NOG WORDEN TERUG VERANDERD VAN MD5