<!DOCTYPE html>

<html lang="">

<head>
<title>LanpartyLandstedeHarderwijk</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<!-- Top Background Image Wrapper -->
<div class="topspacer bgded overlay" style="background-image:url('https://ishetalpauze.nl/img/dynamic_bg.php');">

  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 

      <div id="logo" class="fl_left">
        <h1><a href="index.php">Lanparty</a></h1>
      </div>

      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a class="drop" href="tournooien.php">Tournooien</a>
            <ul>
              <!--<li><a href="pages/gallery.html">Gallery</a></li>-->
              <li><a href="overwatch.php">Overwatch</a></li>
              <li><a href="leagueoflegends.php">League of legends</a></li>
              <li><a href="rocketleague.php">Rocket League</a></li>
              <!--<li><a href="pages/sidebar-left.html">Sidebar Left</a></li>-->
              <!--<li><a href="pages/sidebar-right.html">Sidebar Right</a></li>-->
              <!--<li><a href="pages/basic-grid.html">Basic Grid</a></li>-->
            </ul>
          </li>
          <!--<li><a class="drop" href="#">Dropdown</a>-->
            <!--<ul>-->
              <!--<li><a href="#">Level 2</a></li>-->
              <!--<li><a class="drop" href="#">Level 2 + Drop</a>-->
                <!--<ul>-->
                  <!--<li><a href="#">Level 3</a></li>-->
                  <!--<li><a href="#">Level 3</a></li>-->
                  <!--<li><a href="#">Level 3</a></li>-->
                <!--</ul>-->
              <!--</li>-->
              <!--<li><a href="#">Level 2</a></li>-->
            <!--</ul>-->
          <!--</li>-->
          <!--<li><a href="#">Link Text</a></li>-->
            <?php


            if (!isset($_SESSION['login']) || $_SESSION['login'] == false)
            {
                echo "<li><a href='login.php'>Inloggen</a></li>";
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



        </ul>
      </nav>
    </header>

  </div>

  <div id="pageintro" class="hoc clear">
    <div class="flexslider basicslider"> 

      <ul class="slides">
        <li>
          <article>
            <p class="heading">Welkom bij</p>
            <h2 class="heading">Lanparty 2017</h2>
            <p>Op deze pagina kun je je inschrijven voor de lanparty, voor tournooien en voor het kerstontbijt</p>
            <footer><a class="btn" href="users/createUser.php">Inschrijven voor de lanparty</a></footer>
          </article>
        </li>
        <!--<li>-->
          <!--<article>-->
            <!--<p class="heading">Enim quam sit amet luctus augue</p>-->
            <!--<h2 class="heading">Aliquam ac ut iaculis</h2>-->
            <!--<p>Arcu vel pulvinar commodo urna nunc laoreet velit nec aliquet</p>-->
            <!--<footer><a class="btn" href="#">Curabitur</a></footer>-->
          <!--</article>-->
        <!--</li>-->
        <!--<li>-->
          <!--<article>-->
            <!--<p class="heading">Ante neque tristique fermentum</p>-->
            <!--<h2 class="heading">Id porta non mi sed a</h2>-->
            <!--<p>Diam pulvinar euismod urna sed tristique nunc porta tempor</p>-->
            <!--<footer><a class="btn" href="#">Vehicula</a></footer>-->
          <!--</article>-->
        <!--</li>-->
      </ul>

    </div>
  </div>

  <div id="introblocks" class="hoc clear">
    <ul class="nospace">

      <li>
        <div><i class="fa fa-3x fa-clock-o"></i>
          <h4 class="heading">Betaal tijden voor lanparty</h4>
          <p>10.15 - 10.30 & <br>14:30 - 14:45/ Mon. - Fri.</p>
        </div>
      </li>
      <li>
        <div><i class="fa fa-3x fa-home"></i>
          <h4 class="heading">Plaats</h4>
          <p>Lerarenkamer</p>
        </div>
      </li>
      <li>
        <div><i class="fa fa-3x fa-envelope-o"></i>
          <h4 class="heading">Voor vragen stuur een mail aan</h4>
          <p>gdijkstra@landstede.nl</p>
        </div>
      </li>

    </ul>
  </div>

</div>

<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
<script src="../layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>