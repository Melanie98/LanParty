<?php
//Aanroepen van de gebruikte classes
include '../../class/Crud.php';
$query = new Crud();
include '../../class/LoginHandler.php';
session_start();


(new LoginHandler())->checkRights();


//Variables die worden gebruikt in het inserten in een database
$columnId = "applicationId";
$table = "application";
$id = $_GET['id'];
?>
<!DOCTYPE html>

    <html lang="">

    <head>
        <title>Factuur verwijderen </title>
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
                                <li><a href="../customer/createApplication.php">Aanmelden voor kerstontbijt</a></li>
                            </ul>
                        </li>
                        <li><a class="drop">Overzicht</a>
                            <ul>
                                <li><a href="../users/overviewUsers.php">Overzicht gebruikers</a></li>
                                <li><a href="../tournooi/overviewTournooi.php">Overzicht toernooi</a></li>
                                <li><a href="../participate/overviewParticipant.php">Overzicht inschrijvingen toernooi</a></li>
                                <li  class="active"><a href="overviewPayment.php">Overzicht betalingen</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>

        </div>

        <div id="breadcrumb" class="hoc clear">

            <h6 class="heading">Factuur verwijderen</h6>
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Factuur verwijderen</a></li>
            </ul>

        </div>

    </div>

    <div id="login">

        <div class="one_quarter">
            <h6 class="heading"></h6>
            <p class="btmspace-30"></p>
            <form method="post">
                <fieldset>

                    Weet u zeker dat u dit factuur wil verwijderen?
                        <br>
                    <?php
                    echo'

                        <input type="submit" value="Ja" name="Ja" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">
                        <input type="submit" value="Nee" name="Nee" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">
                    <input type="hidden" name="id" value="'. $_GET['id'] .'">
                    ';
                    ?>
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
//Uitvoeren Delete query



if (isset($_POST['Ja']))
{
    echo $query->deleteRow($table, $columnId, $id);

    header('location: overviewPayment.php');
}

if (isset($_POST['Nee']))
{
    header('location: overviewPayment.php');
}