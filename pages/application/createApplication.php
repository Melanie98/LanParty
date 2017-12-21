<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
    //echo 'Welkom';
}

else
{
    header('location:login.php');
}

include '../../class/Crud.php';

$table = "application";
$columns = array("invoiceId", "applicationPayed", "applicationCB");




$query = new Crud();
?>
    <!DOCTYPE html>

    <html lang="">

    <head>
        <title>Aanmelden voor kerstontbijt </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    </head>
    <body id="top">

    <!-- Top Background Image Wrapper -->
    <div class="topspacer bgded overlay" style="background-image:url('../../images/demo/backgrounds/01.png');">

        <div class="wrapper row1">
            <header id="header" class="hoc clear">

                <div id="logo" class="fl_left">
                    <h1><a href="../index.php">Lanparty</a></h1>
                </div>

                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <li class="active"><a class="drop">Aanmaken</a>
                            <ul>
                                <li><a href="../tournooi/createTournooi.php">Toernooi toevoegen</a></li>
                                <li><a href="../participate/createParticipate.php">Aanmelden voor toernooi</a></li>
                                <li class="active"><a href="../application/createApplication.php">Aanmelden voor kerstontbijt</a></li>
                            </ul>
                        </li>
                        <li><a class="drop">Overzicht</a>
                            <ul>
                                <li><a href="../users/overviewUsers.php">Overzicht gebruikers</a></li>
                                <li><a href="../tournooi/overviewTournooi.php">Overzicht toernooi</a></li>
                                <li><a href="../participate/overviewParticipant.php">Overzicht inschrijvingen toernooi</a></li>
                                <li><a href="overviewPayment.php">Overzicht betalingen</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>

        </div>

        <div id="breadcrumb" class="hoc clear">

            <h6 class="heading">Aanmelden voor kerstontbijt</h6>
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Aanmelden voor kerstontbijt</a></li>
            </ul>

        </div>

    </div>

    <div id="login">

        <div class="one_quarter">
            <h6 class="heading"></h6>
            <p class="btmspace-30"></p>
            <form method="post">
                <fieldset>

                        Weet je zeker dat je je voor het kerstontbijt wilt inschrijven?
                        <br>
                        <input type="submit" value="Ja" name="Ja" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">
                        <!--<input type="hidden" name="catId" value=<?//php echo $_GET['id']; ?> >-->
                        <input type="submit" value="Nee" name="Nee" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">

                </fieldset>
            </form>
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
echo '<br>';


if(isset($_POST['Ja']))
{

    //Er moet nog een invoiceId aan worden gekoppeld en zorgen dat je je maar een keer per gebruiker kunt inschrijven
    $values = array(1, 0, 1);
    //$values = array($_POST['invoiceId'], 0, 1);
    $query->insertIntoTable($table, $columns, $values);
    echo"Je hebt je ingeschreven voor het kerstontbijt";
    //header( "refresh:0.5;url=../Read/readUser.php" );
}

elseif(isset($_POST['Nee']))
{
    echo"Je hebt je niet ingeschreven voor het kerstontbijt";
    //header('location:../Read/readUser.php');
}


//echo $query->insertIntoTable($table, $columns, $values);