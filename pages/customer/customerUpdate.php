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

$columns = array("userPassword", "userPhoto");
$table = "users";
$where = 'userId';
$columnSort = "userEmail";
$id = $_SESSION['userRights'];





$query = new Crud();

if(isset($_POST['aanmaken']))
{
    if(!empty(md5($_POST['userPassword']) && $_POST['userPhoto']))
    {
        $values = array(htmlspecialchars(md5($_POST['userPassword'])), htmlspecialchars($_POST['userPhoto']));
        echo $query->updateRow($table, $columns, $where, $values, $id);
        echo 'Het updaten is gelukt';
        header( "refresh:0.5;url=overviewCustomer.php");
    }

    else
    {
        echo"Niet alles is ingevuld, probeer het opnieuw";
    }

}
if(isset($_POST['annuleren']))
{
    echo 'Het toevoegen is geannuleerd';
    header( "refresh:0.5;url=overviewCustomer.php" );
}

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
                            <li class="active"><a href="customerUpdate.php">Gegevens aanpassen</a></li>
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

        <h6 class="heading">Gegevens aanpassen</h6>
        <ul>
            <li><a href="overviewCustomer.php">Overzicht gebruiker</a></li>
            <li><a href="customerTournooi.php">Gegevens aanpassen</a></li>
        </ul>

    </div>

</div>


<!-- End Top Background Image Wrapper -->
<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
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
                            Wachtwoord: <input type='password' name='userPassword' value='<?php echo $value['userPassword'] ?>'>
                            </br>
                            Profiel foto: <input type='file' name='userPhoto' value='<?php echo $value['userPhoto'] ?>'>
                            </br>
                            <input type="submit" name="aanmaken" value="Updaten" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">
                            <input type="submit" name="annuleren" value="Annuleren" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">
                        </fieldset>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>


        <div class="content">
            <!-- ################################################################################################ -->

            </div>
        </div>
</body>
</html>
