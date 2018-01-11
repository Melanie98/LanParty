<?php
include '../../class/Crud.php';
include '../../class/LoginHandler.php';
session_start();


(new LoginHandler())->checkRights();

$table = "tournooi";
$columns = array("tournooiName", "tournooiDesc", "tournooiMax");




$query = new Crud();
?>
<!DOCTYPE html>

<html lang="">

<head>
    <title>Toernooi toevoegen </title>
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
                            <li class="active"><a href="createTournooi.php">Toernooi toevoegen</a></li>
                        </ul>
                    </li>
                    <li><a class="drop">Overzicht</a>
                        <ul>
                            <li><a href="../users/overviewUsers.php">Overzicht gebruikers</a></li>
                            <li><a href="overviewTournooi.php">Overzicht toernooi</a></li>
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

        <h6 class="heading">Toernooi toevoegen</h6>
        <ul>
            <li><a href="#">Login</a></li>
            <li><a href="#">Toernooi toevoegen</a></li>
        </ul>

    </div>

</div>



<div id="login">

    <div class="one_quarter">
        <h6 class="heading"></h6>
        <p class="btmspace-30"></p>
        <form method="post">
            <fieldset>

                        Tournooi naam:


                        <input class="btmspace-15" type="text" name="tournooiName">



                        Tournooi beschrijving:

                        <textarea class="btmspace-15" name="tournooiDesc" cols="25" rows="5"></textarea>

                            Maximaal aantal deelnemers:

                            <input type="number" name="tournooiMax">

                        <input type="submit" name="aanmaken" value="Aanmaken" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">
                        <input type="submit" name="annuleren" value="Annuleren" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">

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


if(isset($_POST['aanmaken']))
{

    if(!empty($_POST['tournooiName']) && !empty($_POST['tournooiDesc']) && !empty($_POST['tournooiMax']))
    {
        $values = array($_POST['tournooiName'], $_POST['tournooiDesc'], $_POST['tournooiMax']);
        $query->insertIntoTable($table, $columns, $values);
        echo 'Het toevoegen is gelukt';
        header( "refresh:0.5;url=readUser.php" );
    }

    else
    {
        echo"Niet alles is ingevuld, probeer het opnieuw";
    }

}
if(isset($_POST['annuleren']))
{
    echo 'Het toevoegen is geannuleerd';
    header( "refresh:0.5;url=../dashboard.php" );
}

//echo $query->insertIntoTable($table, $columns, $values);