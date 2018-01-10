<?php

//Includes
include '../../class/Crud.php';
$query = new Crud();
include '../../class/LoginHandler.php';
session_start();


(new LoginHandler())->checkRights();

//Variables die worden gebruikt voor het uitvoeren van de query
//$orderBy = "ASC";
//$table = "users";
//$where = 'id';
//$columnSort = "userEmail";
//$id = $_GET['id'];
//$columns = array("userEmail", "userPassword", "userPhoto", "userCB");

$columns = array("applicationPayed");
$table = "application";
$where = 'applicationId';
$columnSort = "applicationId";
$id = $_GET['id'];

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
                                    <li><a href="../participate/createParticipate.php">Aanmelden voor toernooi</a></li>
                                    <li><a href="../application/createApplication.php">Aanmelden voor kerstontbijt</a></li>
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
if (isset($_POST['aanmaken']))
{
//    if ($_POST['applicationPayed'] == '1')
//    {
//        $mail = new \PHPMailer\PHPMailer\PHPMailer();
//        $mail->setFrom('from@example.com', 'Your Name');
//        $mail->addAddress('myfriend@example.net', 'My Friend');
//        $mail->Subject  = 'First PHPMailer Message';
//        $mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
//        if(!$mail->send())
//        {
//            echo 'Message was not sent.';
//            echo 'Mailer error: ' . $mail->ErrorInfo;
//        }
//
//        else
//            {
//            echo 'Message has been sent.';
//        }
//    }
    $values = array($_POST['applicationPayed']);
    echo $query->updateRow($table, $columns, $where, $values, $id);
    header('location: overviewPayment.php');

}

elseif(isset($_POST['annuleren']))
{
    echo 'Het toevoegen is geannuleerd';
    header( "refresh:0.5;url=../dashboard.php" );
}


/////////////////////////////////////////////////////////////////////////////////////HET WACHTWOORD MOET NOG WORDEN TERUG VERANDERD VAN MD5