<?php
include '../../class/Crud.php';

if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
    //echo 'Welkom';
}

else
{
    header('location:login.php');
}


session_start();
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
                                <li><a href="#">Gegevens aanpassen</a></li>
                                <li><a href="customerBreakfast.php">Aanmelden voor kerstontbijt</a></li>
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

        <div id="breadcrumb" class="hoc clear">

            <h6 class="heading">Menu</h6>
            <ul>
                <li><a href="#">Menu</a></li>
            </ul>

        </div>

    </div>
    <?php

    ?>

    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">
                <h1>Welkom op deze pagina</h1>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. </p>
                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. </p>
                <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p>
                <p>Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi</p>
                <p>Portortornec condimenterdum eget consectetuer condis consequam pretium pellus sed mauris enim. Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</p>
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