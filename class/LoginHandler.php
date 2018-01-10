<?php

 include_once 'DBConfi.php';

class LoginHandler extends DBConfi
{
    private $userMail;
    private $userPassword;
    private $userRights;
    private $userId;

    public function __construct()
    {
        parent::__construct();
    }

    public function logIn($userEmail, $userPassword)
    {
        $this->openConnection();
        $this->setUserPassword($userPassword);//SELECT * FROM `users` WHERE `userEmail` = "test@test.nl"
        $stmt = $this->getConn()->prepare('SELECT * FROM `users` WHERE userEmail= :userEmail AND userPassword= :userPassword');
        $stmt->bindParam(':userEmail', $userEmail);
        $stmt->bindParam(':userPassword', $this->getUserPassword());
        $stmt->execute();


//        $this->setCusRights(($stmt->fetch()['cusRights']));
//        $this->setCusId(($stmt->fetch()['cusId']));


        $this->closeConnection();


        if ($stmt->rowCount() != 0) // Kijkt of er een hit is gevonden in de DB met de username en password
        {

            session_start();
            $_SESSION['login'] = true;
            foreach ($stmt->fetchAll() AS $hit)
            {
                $this->setUserRights($hit['userRights']);
                $_SESSION['userId'] = $hit['userId'];
            }

            if ($this->getUserRights() == 0)
            {
                $_SESSION['userRights'] = 0;
                header('location: users/overviewUsers.php');
            }

            if ($this->getUserRights() == 1) {
                $_SESSION['userRights'] = 1;
                header('location: overviewCustomer.php');
            }
        }

        else
        {
            return false;
        }
    }




    public function checkLoggedIn()
    {
        if(isset($_SESSION['login']) && $_SESSION['login'] == true)  //Kijkt of de Session is ingesteld en true isl
        {
            if ($_SESSION['userRights'] == 0)
            {
                $_SESSION['userRights'] = 0;
                header('location: ../dashboard.php');
            }

            if ($_SESSION['userRights'] == 1)
            {
                $_SESSION['userRights'] = 1;
                header('location: /overviewUsers.php');
            }
        }

        else
        {
            header('Location:../login.php');
        }
    }

    public function checkRights()
    {
        if(isset($_SESSION['login']) && $_SESSION['login'] == true)  //Kijkt of de Session is ingesteld en true isl
        {
            if ($_SESSION['userRights'] == 1)
            {
                $_SESSION['userRights'] = 1;
                header('location: ../index.php');
            }

            if ($_SESSION['userRights'] == 0)
            {
                $_SESSION['userRights'] = 0;
                echo "Welkom";
            }
        }

        else
        {
            header('Location:../login.php');
        }
    }

    public function logOut()
    {
        unset($_SESSION['login']);
        header('location: pages/index.php');
    }
///////////////////////////////////////////////////////////////Getters en Setters


    public function getUserMail()
    {
        return $this->userMail;
    }

    public function setUserMail($userMail)
    {
        $this->userMail = $userMail;
    }


    public function getUserPassword()
    {

        return $this->userPassword;
    }

    public function setUserPassword($userPassword)
    {
        $this->userPassword = md5($userPassword);
        //$this->password = $password;
    }

    public function getUserRights()
    {
        return $this->userRights;
    }

    public function setUserRights($userRights)
    {
        $this->userRights = $userRights;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setCusId($userId)
    {
        $this->userId = $userId;
    }

}