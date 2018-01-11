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
$columns = array("applicationPayed", "userId", "invoiceId");
$columnSort = "userId";
$orderBy = "ASC";



$query = new Crud();
?>
<!DOCTYPE html>

<html lang="">

<head>
    <title>InschrijvenToernooi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- Top Background Image Wrapper -->
<div class="topspacer bgded overlay" style="background-image:url('../../images/demo/backgrounds/LANparty 1.png');">

    <div class="wrapper row1">
        <header id="header" class="hoc clear">

            <div id="logo" class="fl_left">
                <h1><a href="../index.php">Lanparty</a></h1>

            </div>

            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <li class="active"><a class="drop" href="overviewCustomer.php">Menu</a>
                        <ul>
                            <li><a href="customerUpdate.php">Gegevens aanpassen</a></li>
                            <li><a href="customerBreakfast.php">Aanmelden voor kerstontbijt</a></li>
                            <li><a href="customerTournooi.php">Inschrijven voor toernooien</a></li>
                            <li class="active"><a href="showPDF.php">Factuur inzien</a></li>
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

        <h6 class="heading">Factuur inzien</h6>
        <ul>
            <li><a href="overviewCustomer.php">Overzicht gebruiker</a></li>
            <li><a href="customerTournooi.php">Factuur inzien</a></li>
        </ul>

    </div>

</div>
<!-- End Top Background Image Wrapper -->

<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">
            <!-- ################################################################################################ -->
            <h1>Factuur</h1>
            <p>Hieronder kun je je factuur zien als je hebt betaald</p>
            <br>

            <?php
            foreach ($query->selectFromTable($table, $columns, null, null, null, null, null, $columnSort, $orderBy) as $value)
            {
                if($value['applicationPayed'] == 1)
                {
                    echo"<td><a href=../pdfTable.php?id=". $value['invoiceId'] ."><img src='../../img/pdf.png'></a></td>";
                }

                else
                {
                    echo"je hebt niet betaald";
                }
            }
            ?>

        </div>
    </main>
</div>
</body>
</html>