<?php

//Aanroepen van de gebruikte classes
include '../../class/Join.php';
$query = new Join();
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
//SELECT users.userId, tournooi.tournooiName FROM participate JOIN users ON users.userId = participate.userId JOIN tournooi ON tournooi.userId = participate.userId ORDER BY users.userId ASC
$table = "participate";
$colmns = array("users.userEmail", "tournooi.tournooiName");
$coupleTable = array("users", "tournooi");
$row = array("userId", "tournooiId");
$columnSort = "users.userId";
$orderBy = "ASC";


?>

<!DOCTYPE html>

<html lang="">

<head>
<title>Overzicht betalingen</title>
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
              <li><a href="../tournooi/createTournooi.php">Toernooi toevoegen</a></li>
              <li><a href="../participate/createParticipate.php">Aanmelden voor toernooi</a></li>
            </ul>
          </li>
          <li class="active"><a class="drop">Overzicht</a>
            <ul>
              <li><a href="../users/overviewUsers.php">Overzicht gebruikers</a></li>
              <li><a href="../tournooi/overviewTournooi.php">Overzicht toernooi</a></li>
              <li><a href="../participate/overviewParticipant.php">Overzicht inschrijvingen tournooi</a></li>
              <li class="active"><a href="overviewPayment.php">Overzicht betalingen</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>

  </div>

  <div id="breadcrumb" class="hoc clear">

    <h6 class="heading">Overzicht betalingen</h6>
    <ul>
      <li><a href="#">Login</a></li>
      <li><a href="#">Overzicht betalingen</a></li>
    </ul>

  </div>

</div>

<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">
            <!-- ################################################################################################ -->
            <div class="scrollable">
                <br>
                <table>
                    <thead>
                    <tr>
                        <th>Factuur Nummer</th>
                        <th>Student Nummer</th>
                        <th>Betaling</th>
                        <th>Bewerken</th>
                        <th>Verwijderen</th>
                    </tr>
                    </thead>
                    <?php
                        foreach ($query->joinPaymentOverview() as $value)
                        {
                        //$columns = array("userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights");
                        echo"
                    <tbody>
                    <tr>
                        <td>".$value['invoiceId']."</td>
                        <td>".$value['userStudentNr']."</td>
                        <td>".$value['applicationPayed']."</td>
                        <td><a href=../application/updatePayment.php?id=". $value['applicationId'] ."><img src='../../img/edit.png'></a></td>
                        <td><a href=../application/deleteApplication.php?id=". $value['applicationId'] ."><img src='../../img/delete.png'></a></td>
                        ";


                        }
                       echo"
                    </tr>
                </tbody>
                </table>";
?>
                Betaling: 0 = nee, 1 = ja

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

