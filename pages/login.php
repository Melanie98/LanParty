<?php
include '../class/LoginHandler.php';
session_start();
    if(isset($_POST['loginButton']))
    {
        if((new LoginHandler())->logIn($_POST['userName'], $_POST['password']))
        {
            echo  'Welkom';
        }

        else
        {
            echo 'Login';
        }
    }


?>

<!DOCTYPE html>

<html lang="">

<head>
    <title>Inloggen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- Top Background Image Wrapper -->
<div class="topspacer bgded overlay" style="background-image:url('../images/demo/backgrounds/08.jpg');">

    <div class="wrapper row1">
        <header id="header" class="hoc clear">

            <div id="logo" class="fl_left">
                <h1><a href="index.php">Lanparty</a></h1>
            </div>

            <nav id="mainav" class="fl_right" >
                <ul class="clear">
                    <li> <a href="index.php">Home</a></li>
                    <li><a class="drop" href="tournooien.php">Tournooien</a>
                        <ul>
                            <li><a href="overwatch.php">Overwatch</a></li><!--kan van pas zijn-->
                            <li><a href="leagueoflegends.php">League of legends</a></li>
                            <li><a href="rocketleague.php">Rocket League</a></li>

                        </ul>
                    </li>
                    <li class="active"><a href="login.php">Inloggen</a></li>
                </ul>
            </nav>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div id="login">

                <h2>Inloggen</h2>
                <div class="one_quarter">
                    <h6 class="heading"></h6>
                    <p class="btmspace-30"></p>
                    <form method="post">
                        <fieldset>
                            Username: <input class="btmspace-15" name="userName" type="text" value="" placeholder="Email">
                            Password: <input class="btmspace-15" name="password" type="password" value="" placeholder="Password">
                            <button type="submit" name="loginButton" value="Login" style=" color:#FFFFFF; background-color:#00CCBD; border-color:transparent; padding:8px 18px 10px; text-transform:uppercase; font-weight:700; cursor:pointer;">Submit</button>
                        </fieldset>
                    </form>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <?php
                if(isset($_POST['loginButton']))
                {
                    //echo md5('kaas1234');
                    if((new LoginHandler())->logIn($_POST['userEmail'], $_POST['userPassword']))
                    {
                        echo 'Welkom';
                        //echo md5('wachtwoord');

                    }

                    else
                    {
                        echo  'U heeft uw inloggegevens niet goed ingevuld';
                        //var_dump($_POST['userEmail'], $_POST['userPassword']);
                    }
                }
                ?>
            </div>
        </header>

    </div>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


</div>

<div class="wrapper row4 bgded overlay" style="background-image:url('../images/demo/backgrounds/03.png');">
    <footer id="footer" class="hoc clear">

        <div class="one_quarter first">
            <h6 class="heading">Id urna scelerisque</h6>
            <p class="btmspace-30">Lacinia vivamus et dictum ex id malesuada augue sed</p>
            <nav class="btmspace-30">
                <ul class="nospace">
                    <li><a href="index.php"><i class="fa fa-lg fa-home"></i></a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Cookies</a></li>
                    <li><a href="#">Disclaimer</a></li>
                </ul>
            </nav>
            <ul class="faico clear">
                <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
        <div class="one_quarter">
            <h6 class="heading">Augue orci phasellus</h6>
            <ul class="nospace linklist contact">
                <li><i class="fa fa-map-marker"></i>
                    <address>
                        Company Name, Street Name &amp; Number, Town, Postcode/Zip
                    </address>
                </li>
                <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
            </ul>
        </div>
        <div class="one_quarter">
            <h6 class="heading">Sem ultricies congue</h6>
            <ul class="nospace linklist">
                <li><a href="#">Porta bibendum tellus</a></li>
                <li><a href="#">In fringilla felis</a></li>
                <li><a href="#">Aliquam fermentum odio</a></li>
                <li><a href="#">Elit sed faucibus felis</a></li>
                <li><a href="#">Condimentum non donec</a></li>
            </ul>
        </div>
        <div class="one_quarter">
            <h6 class="heading">Nibh ligula maecenas</h6>
            <p class="btmspace-30">Convallis tortor sed gravida ullamcorper aenean sed lectus est donec maximus quam.</p>
            <form method="post" action="#">
                <fieldset>
                    <legend>Newsletter:</legend>
                    <input class="btmspace-15" type="text" value="" placeholder="Name">
                    <input class="btmspace-15" type="text" value="" placeholder="Email">
                    <button type="submit" value="submit">Submit</button>
                </fieldset>
            </form>
        </div>

    </footer>
</div>

<div class="wrapper row5">
    <div id="copyright" class="hoc clear">

        <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">LanpartyLanstedeHarderwijk.nl</a></p>

    </div>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>