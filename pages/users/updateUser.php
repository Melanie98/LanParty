<?php

//Includes
include '../../class/Crud.php';
$query = new Crud();
session_start();




//Variables die worden gebruikt voor het uitvoeren van de query
//$orderBy = "ASC";
//$table = "users";
//$where = 'id';
//$columnSort = "userEmail";
//$id = $_GET['id'];
//$columns = array("userEmail", "userPassword", "userPhoto", "userCB");

$columns = array("userEmail", "userPassword", "userPhoto", "userCB", "userRights");
$table = "users";
$where = 'userId';
$columnSort = "userEmail";
$id = $_GET['id'];





    $query = new Crud();
?>

    <!DOCTYPE html>

    <html lang="">

    <head>
        <title>Gebruiker updaten </title>
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
                                    <li><a href="overviewUsers.php">Overzicht gebruikers</a></li>
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

                <h6 class="heading">Gebruiker updaten</h6>
                <ul>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Gebruiker updaten</a></li>
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
                    <br>
                    Email adres: <input type='email' name='userEmail' value='<?php $value['userEmail'] ?>'>
                    </br>
                    Wachtwoord: <input type='password' name='userPassword' value='<?php echo $value['userPassword'] ?>'>
                    </br>
                    Profiel foto: <input type='file' name='userPhoto' value='<?php echo $value['userPhoto'] ?>'>
                    </br>
                    Inschrijven voor kerstontbijt:<br>
                    Ja <input type='radio' name='userCB' value='1'>
                    Nee <input type='radio' name='userCB' value='0'>
                    <br>
                    Rechten toekennen:<br>
                    Ja <input type='radio' name='userRights' value='1'>
                    Nee <input type='radio' name='userRights' value='0'>
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



//Ook nieuwe invoice maken
    if(isset($_POST['aanmaken']))
    {
        if(!empty($_POST['userEmail'] && md5($_POST['userPassword']) && $_POST['userPhoto']&& $_POST['userCB']&& $_POST['userRights']))
        {
            $values = array($_POST['userEmail'], md5($_POST['userPassword']), $_POST['userPhoto'], $_POST['userCB'], $_POST['userRights']);
            echo $query->updateRow($table, $columns, $where, $values, $id);
            echo 'Het updaten is gelukt';
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
