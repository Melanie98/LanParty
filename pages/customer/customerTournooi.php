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

$table = "tournooi";
$columns = array("tournooiName", "userId");
$columnSort = "tournooiId";
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
<div class="topspacer bgded overlay" style="background-image:url('../../images/demo/backgrounds/01.png');">

    <div class="wrapper row1">
        <header id="header" class="hoc clear">

            <div id="logo" class="fl_left">
                <h1><a href="../index.php">Lanparty</a></h1>

            </div>

            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <li class="active"><a class="drop" href="overviewCustomer.php">Menu</a>
                        <ul>
                            <li><a href="#">Gegevens aanpassen</a></li>
                            <li><a href="customerBreakfast.php">Aanmelden voor kerstontbijt</a></li>
                            <li class="active"><a href="customerTournooi.php">Inschrijven voor toernooien</a></li>
                            <li><a href="showPDF.php">Factuur inzien</a></li>
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

    <div id="breadcrumb" class="hoc clear">

        <h6 class="heading">Inschrijven toernooi(en)</h6>
        <ul>
            <li><a href="overviewCustomer.php">Overzicht gebruiker</a></li>
            <li><a href="customerTournooi.php">Inschrijven toernooi(en)</a></li>
        </ul>

    </div>

</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">
            <!-- ################################################################################################ -->
            <h1>Inschrijven voor toernooien</h1>
            <p>Hieronder kun je je inschrijven voor de toernooien</p>
            <br>

            <div class="scrollable">
                <table>
                    <thead>
                    <tr>
                        <th>Naam toernooi</th>
                        <th>Inschrijven</th>
                    </tr>
                    </thead>
                        <?php
                        foreach ($query->selectFromTable($table, null, null, null, null, null, $columnSort, $orderBy) as $value)
                        {
                            //$columns = array("userEmail", "userSurname", "userLastname", "userStudentNr", "userPassword", "userPhoto", "userRights");
                            echo" 
                                <tbody>
                                <tr>
                                    <td>".$value['tournooiName']."</td>
                                    <td><a href=../participate/createParticipate.php?id=". $value['tournooiId'] ."><img src='../../img/register.png'></a></td>     
         
                            ";


                        }
                        echo "   
                </tr>
                </tbody>
            </table>";
?>
            </div>
        </div>
    </main>
</div>
</body>
</html>