<?php

include '../../class/Crud.php';
$query = new Crud();
session_start();


if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
//echo 'Welkom';
}

else
{
header('location:login.php');
}


//Variables die worden gebruikt in het selecten vanuit een database
//SELECT `tournooiId`, `tournooiName`, `tournooiDesc`, `tournooiMax` FROM `tournooi` WHERE 1
$table = "tournooi";
$columnSort = "tournooiName";
$orderBy = "ASC";
?>
<!DOCTYPE html>

<html lang="">

<head>
    <title>Toernooien overzicht </title>
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
                    <li><a class="drop">Aanmaken</a>
                        <ul>
                            <li><a href="createTournooi.php">Toernooi toevoegen</a></li>
                            <li><a href="../participate/createParticipate.php">Aanmelden voor toernooi</a></li>
                        </ul>
                    </li>
                    <li class="active"><a class="drop">Overzicht</a>
                        <ul>
                            <li><a href="../users/overviewUsers.php">Overzicht gebruikers</a></li>
                            <li  class="active"><a href="overviewTournooi.php">Overzicht toernooi</a></li>
                            <li><a href="../participate/overviewParticipant.php">Overzicht inschrijvingen toernooi</a></li>
                            <li><a href="../application/overviewPayment.php">Overzicht betalingen</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>

    </div>

    <div id="breadcrumb" class="hoc clear">

        <h6 class="heading">Toernooien overzicht</h6>
        <ul>
            <li><a href="#">Login</a></li>
            <li><a href="#">Toernooien overzicht</a></li>
        </ul>

    </div>

</div>

<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">
            <div class="scrollable">
                <table>
                    <thead>
                    <tr>
                        <th>Toernooi naam</th>
                        <th>Beschrijving</th>
                        <th>Maximaal aantal spelers</th>
                        <th>Bewerken</th>
                        <th>Verwijderen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        foreach ($query->selectFromTable($table, null, null, null, null, null,  $columnSort, $orderBy) as $value)
                        {
                        //$columns = array("userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights");
                        echo"
                    <tr>
                        <td>".$value['tournooiName']."</td>
                        <td>".$value['tournooiDesc']."</td>
                        <td>".$value['tournooiMax']."</td>
                        <td><a href=../tournooi/updateTournooi.php?id=". $value['tournooiId'] ."><img src='../../img/edit.png'></a></td>
                        <td><a href=../tournooi/deleteTournooi.php?id=". $value['tournooiId'] ."><img src='../../img/delete.png'></a></td>
                        ";


                        }
                        ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
