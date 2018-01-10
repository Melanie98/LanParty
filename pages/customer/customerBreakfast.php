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
                                <li><a href="#">Gegevens aanpassen</a></li>
                                <li class="active"><a href="customerBreakfast.php">Aanmelden voor kerstontbijt</a></li>
                                <li><a href="customerTournooi.php">Inschrijven voor tournooien</a></li>
                            </ul>
                        </li>

                        <li>
                            <?php
                            if (!isset($_SESSION['login']) || $_SESSION['login'] == false)
                            {
                                echo "<a href=../login.php> Login </a>";
                            }
                            else
                            {
                                echo '<form method="post" xmlns="http://www.w3.org/1999/html">
                                        </br><input type="submit" name="logout" value="Logout">
                                    </form>';
                                if (isset($_POST['logout']))
                                {
                                    $logout = (new LoginHandler())->logOut();
                                    echo $logout;
                                }
                            }
                            ?>
                        </li>
                    </ul>
                </nav>
            </header>

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