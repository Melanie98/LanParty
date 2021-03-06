<?php
include '../../class/Crud.php';
session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
    //echo 'Welkom';
}

else
{
    header('location:../login.php');
}



$table = "users";
$columns = array("userEmail", "userSurname", "userLastName", "userStudentNr", "userPassword",  "userPhoto", "userCB", "userRights");




$query = new Crud();
?>

    <!DOCTYPE html>

    <html lang="">

    <head>
        <title>Menu</title>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    </head>
    <body id="top">

    <?php

    ?>
    <!-- Top Background Image Wrapper -->
    <div class="topspacer bgded overlay" style="background-image:url('../../images/demo/backgrounds/LANparty 1.png');">

        <div class="wrapper row1">
            <header id="header" class="hoc clear">

                <div id="logo" class="fl_left">
                    <h1><a href="../index.php">Lanparty</a></h1>

                </div>

                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <li><a class="drop" href="overviewCustomer.php">Menu</a>
                            <ul>
                                <li><a href="customerUpdate.php">Gegevens aanpassen</a></li>
                                <li><a href="customerBreakfast.php">Aanmelden voor kerstontbijt</a></li>
                                <li><a href="customerTournooi.php">Inschrijven voor toernooien</a></li>
                                <li><a href="showPDF.php">Factuur inzien</a></li>
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

            <h6 class="heading">Overzicht gebruiker</h6>
            <ul>
                <li><a href="#">Overzicht gebruiker</a></li>
            </ul>

        </div>

    </div>
    <?php

    ?>

    <div class="wrapper row3">
        <main class="hoc container clear">
            <div class="sidebar one_quarter first">
                <!-- ################################################################################################ -->
                <h6>Lorem ipsum dolor</h6>
                <nav class="sdb_holder">
                    <ul>
                        <li><a href="customerUpdate.php">Gegevens aanpassen</a></li>
                        <li><a href="customerBreakfast.php">Aanmelden voor kerstontbijt</a>
                        <li><a href="customerTournooi.php">Inschrijven voor toernooien</a></li>
                        <li><a href="showPDF.php">Factuur inzien</a></li>
                    </ul>
                </nav>

            </div>
            <!-- main body -->

            <div class="content three_quarter">
            <h1>Welkom op deze pagina</h1>
                <p>In dit menu hierboven en hiernaast kun je je gegevens aanpassen je inschrijven voor toernooien en voor het kerstontbijt.</p>
                <p>Ook kun je als je hebt betaald hier je factuur inzien.</p>

                <!-- / main body -->
                <div class="clear"></div>
        </main>
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



//Ook nieuwe invoice maken
if(isset($_POST['aanmaken']))
{
    if(!empty($_POST['userEmail']) && !empty($_POST['userSurname']) && !empty($_POST['userLastName']) && !empty($_POST['userStudentNr']) && !empty($_POST['userPassword']) && !empty($_POST['userPhoto']))
    {
        $values = array($_POST['userEmail'], $_POST['userSurname'], $_POST['userLastName'], $_POST['userStudentNr'], md5($_POST['userPassword']), $_POST['userPhoto'], $_POST['userCB'],  0);
        $query->insertIntoTable($table, $columns, $values);
        echo 'Het toevoegen is gelukt';
        header( "refresh:0.5;url=overviewUsers.php" );
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