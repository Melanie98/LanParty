<!DOCTYPE html>

<html lang="">

<head>
    <title>RocketLeagueTournooi</title>
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
                            <li><a href="#">Gegevens aanpassen</a></li>
                            <li><a href="customerBreakfast.php">Aanmelden voor kerstontbijt</a></li>
                            <li class="active"><a href="customerTournooi.php">Inschrijven voor tournooien</a></li>
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
            <h1>&lt;h1&gt; to &lt;h6&gt; - Headline Colour and Size Are All The Same</h1>
            <img class="imgr borderedbox inspace-5" src="../../images/demo/imgr.gif" alt="">
            <p>Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur.</p>
            <p>Dapiensociis <a href="#">temper donec auctortortis cumsan</a> et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem.</p>
            <img class="imgl borderedbox inspace-5" src="../../images/demo/imgl.gif" alt="">
            <p>This is a W3C compliant free website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. For full terms of use of this template please read our <a href="http://www.os-templates.com/template-terms">website template licence</a>.</p>
            <p>You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files. For more website templates visit our <a href="http://www.os-templates.com/">free website templates</a> section.</p>
            <p>Portortornec condimenterdum eget consectetuer condis consequam pretium pellus sed mauris enim. Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</p>
            <h1>Table(s)</h1>
            <div class="scrollable">
                <table>
                    <thead>
                    <tr>
                        <th>Header 1</th>
                        <th>Header 2</th>
                        <th>Header 3</th>
                        <th>Header 4</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="#">Value 1</a></td>
                        <td>Value 2</td>
                        <td>Value 3</td>
                        <td>Value 4</td>
                    </tr>
                    <tr>
                        <td>Value 5</td>
                        <td>Value 6</td>
                        <td>Value 7</td>
                        <td><a href="#">Value 8</a></td>
                    </tr>
                    <tr>
                        <td>Value 9</td>
                        <td>Value 10</td>
                        <td>Value 11</td>
                        <td>Value 12</td>
                    </tr>
                    <tr>
                        <td>Value 13</td>
                        <td><a href="#">Value 14</a></td>
                        <td>Value 15</td>
                        <td>Value 16</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</body>
</html>