<?php

//Includes
include '../../class/Crud.php';
include '../../PHPMailer-master/PHPMailer/PHPMailer.php';
$query = new Crud();
session_start();

echo '<br>';
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
    //echo 'Welkom';
}

else
{
    header('location:login.php');
}
echo '<a href="../index.php"> Dashboard </a>';


//Variables die worden gebruikt voor het uitvoeren van de query
//$orderBy = "ASC";
//$table = "users";
//$where = 'id';
//$columnSort = "userEmail";
//$id = $_GET['id'];
//$columns = array("userEmail", "userPassword", "userPhoto", "userCB");

$columns = array("applicationPayed");
$table = "application";
$where = 'applicationId';
$columnSort = "applicationId";
$id = $_GET['id'];


///////////////////////////////////////////Het uitvoeren van het update
echo '<h1> UPDATE NOG TOEVOEGEN OM TE CHECKEN OF ALLES IS TOEGEVOEGD</h1>';

    echo "<form method = 'post'>
                Betaald:
                Ja <input type='radio' name='applicationPayed' value='1'>
                Nee <input type='radio' name='applicationPayed' value='0'>
                <br>
                <input type='submit' name='submit'>
          </form>
        ";

//Het Update van een user
if (isset($_POST['submit']))
{
    if ($_POST['applicationPayed'] == '1')
    {
        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        $mail->setFrom('from@example.com', 'Your Name');
        $mail->addAddress('myfriend@example.net', 'My Friend');
        $mail->Subject  = 'First PHPMailer Message';
        $mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
        if(!$mail->send())
        {
            echo 'Message was not sent.';
            echo 'Mailer error: ' . $mail->ErrorInfo;
        }

        else
            {
            echo 'Message has been sent.';
        }
    }
    $values = array($_POST['applicationPayed']);
    echo $query->updateRow($table, $columns, $where, $values, $id);
    header('location: overviewPayment.php');

}


/////////////////////////////////////////////////////////////////////////////////////HET WACHTWOORD MOET NOG WORDEN TERUG VERANDERD VAN MD5